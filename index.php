<?php
$route = isset($_GET['route']) ? $_GET['route'] : '';
require_once('Controller/ProductController.php');
switch($route){
    case 'add':
        $news = new ProductController();
        $news->add();
        break;
    case 'edit':
        $news = new ProductController();
        $news->edit();
        break;
    case 'delete':
        $news = new ProductController();
        $news->delete();
        break;
    default:
        $home = new ProductController();
        $home->listing();
        break;
}
