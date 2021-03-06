<?php

class Controller
{
    public function __construct()
    {
        $this->dbConnect = new PDO('mysql:host=localhost;dbname=blogjf;charset=utf8', 'root', 'root');
    }
    public function addCommentAndArticle()
    {   
        
        //article
        $blogManager = new BlogManager($this->dbConnect);
        $req = $blogManager->getList();
        
        //commentaire
        $comment = new CommentManager($this->dbConnect);
        $listComment = $comment->getList();
        
        require ('../view/viewAdmin/adminView.php');
        
    }
    
    
    
    public function delete($id)
    {
        $blogManager = new BlogManager($this->dbConnect);
        $blogManager->delete($id);
        $commentManager = new CommentManager($this->dbConnect);
        $comDelete = $commentManager->getListByPostId($id);
        foreach ($comDelete as $deleteCom)
        {
            $commentManager->delete($deleteCom->id());
        }
        $this->addCommentAndArticle();
        
    }
    public function deleteCom($id)
    {
        $comDelete = new CommentManager($this->dbConnect);
        $comDelete->delete($id);
        $this->addCommentAndArticle();
        
    }
    public function viewForm()
    {   
        if (isset($_POST['id']))
        {
            $blogManager = new BlogManager($this->dbConnect);
            $article = $blogManager->get($_POST['id']);
            
        }
        require('../view/viewAdmin/createPost.php');
    }
    
    public function saveArticle()
    {
        $newArticle = new Blog();
        if (isset($_POST['id']))
        {
        $newArticle->setId($_POST['id']);
        
        }
        $newArticle->setTitle($_POST['title']);
        $newArticle->setAuthor('Jean Forteroche');
        $newArticle->setContent($_POST['content']);
        $newArticle->setDatePost(date('Y-m-d H:i:s'));
        
        
        $addArticle = new BlogManager($this->dbConnect);
        $addArticle->save($newArticle);
        $this->addCommentAndArticle();
        
        
        
    }
    public function restartReport($id)
    {
        $commentManager = new CommentManager($this->dbConnect);
        $comment = $commentManager->get($id);
        $comment->setReport('0');
        $commentManager->update($comment);
        $this->addCommentAndArticle();
        
        
    }
    
    
   
}
