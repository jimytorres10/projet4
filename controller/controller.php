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
        require ('view/postView.php');
    }
}