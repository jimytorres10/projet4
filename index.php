<?php
session_start();
require ('controller/controller.php');


require ('model/BlogManager.php');
require ('model/Blog.php');
require ('model/Comment.php');
require ('model/CommentManager.php');
try
{
    if (isset($_GET['action']))
    {
        if ($_GET['action'] == 'listPost')
        {
            $blogArticles = new Controller();
            $blogArticles->listpost();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $blogArticles = new Controller();
                $blogArticles->post($_GET['id']);
                
                
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
        if ($_GET['action'] == 'com')
        {
            if (isset($_POST['id'])  && $_POST['id'] > 0){
                $controller = new Controller();
                $controller->addCom();
                           
            }else{
                throw new Exception('id non défini');
            }
        }
        if ($_GET['action'] == 'reportCom')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0 )
            {
                $report = new Controller();
                $report->reportCom($_GET['id']);
                
                
                
            }else{
                throw new Exception('id non défini');
            }
            
        }
        if ($_GET['action'] == 'about')
        {
            $about =new Controller();
            $about->aboutPage();
        }
        if ($_GET['action'] == 'contact')
        {
            $contact =new Controller();
            $contact->contactPage();
        }
        if ($_GET['action'] == 'sendMail')
        {
            $sendMessage =new Controller();
            $sendMessage->sendMail($_POST['mail'], $_POST['message']);
            $msg = 'ff';
        }
    }
    else{
        $blogArticles = new Controller();
        $blogArticles->listpost();
    } 
}
catch (Exception $e){
    echo 'erreur';
}

