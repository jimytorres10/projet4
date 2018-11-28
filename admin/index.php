<?php
require ('../controller/adminController/controller.php');

spl_autoload_register(function ($class_name) {
    include '../model/'.$class_name . '.php';
});
    require ('../model/BlogManager.php');
    require ('../model/Blog.php');
    require ('../model/Comment.php');
    require ('../model/CommentManager.php');
    
        if (isset($_GET['action']))
    {
        if ($_GET['action'] == 'addCommentAndArticle')
        {
            $blogArticles = new Controller();
            $blogArticles->addCommentAndArticle();
            $comment = new Controller();
            
            
        }
        if ($_GET['action'] == 'deleteArticle') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $blogArticles = new Controller();
                $blogArticles->delete($_GET['id']);
                
                
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
        if ($_GET['action'] == 'deleteCom') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $comDelete = new Controller();
                $comDelete->deleteCom($_GET['id']);
                
                
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
        if ($_GET['action'] == 'save')
        {
            if (isset($_POST['title'])  && isset($_POST['content']) ){
                $controller = new Controller();
                $controller->saveArticle();
                           
            }else{
                throw new Exception('id non défini');
            }
        }
        if ($_GET['action'] == 'form')
        {
            $form = new Controller();
            $form->viewForm();
        }
        if ($_GET['action'] == 'restartReport')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
            $restartComment = new Controller();
            $restartComment->restartReport($_GET['id']);
            }
        }
    }
    else{
        $blogArticles = new Controller();
        $blogArticles->addCommentAndArticle();
        $comment = new Controller();
        echo realpath('chemin.php'); 
        
    }