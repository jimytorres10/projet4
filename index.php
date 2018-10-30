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
   
}
else{
    $blogArticles = new Controller();
    $blogArticles->listpost();
} 


