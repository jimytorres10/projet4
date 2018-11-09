<?php

class Controller
{
    public function listpost()
    {   
        
        $db = new PDO('mysql:host=localhost;dbname=blogjf;charset=utf8', 'root', 'root');
        $blogManager = new BlogManager($db);
        $req = $blogManager->getList();
        require ('view/mainPagePostView.php');
    }
    
    public function post($id)
    {
        $db = new PDO('mysql:host=localhost;dbname=blogjf;charset=utf8', 'root', 'root');
        $blogManager = new BlogManager($db);
        $article = $blogManager->get($id);
        $commentManager = new CommentManager($db);
        $comment = $commentManager->getListByPostId($id);
        require ('view/postView.php');

        
    }
    
    public function addCom()
    {
        
        
        $com = new Comment();
        
        $com->setAuthor($_POST['pseudo']);
        $com->setPostId($_POST['id']);
        $com->setContentCom($_POST['message']);
        $com->setDatePostCom(date('Y-m-d H:i:s'));
        $com->setReport(0);
        
        $db = new PDO('mysql:host=localhost;dbname=blogjf;charset=utf8', 'root', 'root');
        $commentManager = new CommentManager($db);
        $commentManager->add($com);
        
        $this->post($_POST['id']);
        
        
        
    }
    
    public function reportCom($id)
    {
        $db = new PDO('mysql:host=localhost;dbname=blogjf;charset=utf8', 'root', 'root');
        $commentManager = new CommentManager($db);
        $comment = $commentManager->get($id);
        $report = $comment->report();
        $report++;
        $comment->setReport($report);
        $commentManager->update($comment);
        
        $this->post($comment->postId());
        
    }
}
