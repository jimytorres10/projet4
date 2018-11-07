<?php
require ('controller/controller.php');
require ('utilitaire/config.php');

spl_autoload_register(function ($class_name) {
    include 'model/'.$class_name . '.php';
});
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
    }
    else{
        $blogArticles = new Controller();
        $blogArticles->listpost();
    } 
}
catch (Exception $e){
    echo 'erreur';
}

