<?php
require ('controller/controller.php');
require ('model/blog.php');
require ('model/blogManager.php');

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
}
else{
    $blogArticles = new Controller();
    $blogArticles->listpost();
} 


