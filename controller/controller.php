<?php

class Controller
{
    
    
    public function __construct()
    {
        $this->dbConnect = new PDO('mysql:host=db762095726.hosting-data.io;dbname=db762095726;charset=utf8', 'dbo762095726', 'A1t@101010');
    }
    public function listpost()
    {   
        
        $blogManager = new BlogManager($this->dbConnect);
        $req = $blogManager->getList();
        require ('view/mainPagePostView.php');
        
    }
    
    public function post($id)
    {
        $blogManager = new BlogManager($this->dbConnect);
        $article = $blogManager->get($id);
        $commentManager = new CommentManager($this->dbConnect);
        $comment = $commentManager->getListByPostId($id);
        require ('view/postView.php');
        
    }
    
    public function addCom()
    {
        
        
        $com = new Comment();
        
        $com->setAuthor(htmlspecialchars($_POST['pseudo']));
        $com->setPostId($_POST['id']);
        $com->setContentCom(htmlspecialchars($_POST['message']));
        date_default_timezone_set('Europe/Paris');
        $com->setDatePostCom(date('Y-m-d H:i:s'));
        $com->setReport(0);
        
        $commentManager = new CommentManager($this->dbConnect);
        $commentManager->add($com);
        
        $this->post($_POST['id']);
        
        
        
    }
    
    public function reportCom($id)
    {
        $commentManager = new CommentManager($this->dbConnect);
        $comment = $commentManager->get($id);
        $report = $comment->report();
        $report++;
        $comment->setReport($report);
        $commentManager->update($comment);
        $_SESSION['com'.$_GET['id']] = 'ok';
        $this->post($comment->postId());
        
        
    }
    public function aboutPage()
    {
        require ('view/aboutView.php');
    }
    public function contactPage()
    {
        require ('view/contactView.php');
    }
    public function sendMail($email,$mes)
    {
        $from = $email;
        $to = "jimmyragon@gmail.com";
        $subject = "Contact";
        $message = $mes." adresse email:".$from;
        $headers = "From:" . $from;
        
        mail($to,$subject,$message, $headers);
        
        $this->contactPage();
        
    }
}
