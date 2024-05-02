<?php
    //session_start(); not necessary
    require_once('../includes/cookie_helper.php');
    
    /*
    //With namspace App
    require_once('app/Form.php');
    use App\Form; 
    */
    
    require_once('../app/Autoloader.php');
    App\Autoloader::register();

    //dynamic pages with 'p' in URL
    if (isset($_GET['p'])) {
        $p = $_GET['p'];
    } elseif(isset($_GET['l'])) {
        $l = 'login';
    } elseif(isset($_GET['c'])) {
        $c = 'confirmation';
    } elseif(isset($_GET['a'])) {
        $a = 'about';
    } elseif(isset($_GET['g'])) {
        $g = 'game';
    } else {
        $p = 'home';
    }

    $db = new App\Database('mytable');

    //stock require into cache
    ob_start();
    if ($p === 'home') {
        require('../pages/home.php');
    } elseif ($p === 'article') {
        require('../pages/article.php');
    } elseif ($a === 'about') {
        require('../pages/about.php');
    } elseif($l === 'login') {
        require('../login/form.php');
    } elseif($c === 'confirmation') {
        require('../pages/confirmation.php');
    } elseif($g === 'game') {
        require('../pages/game.php');
    }
    $content = ob_get_clean();
    require('../pages/templates/default.php');
    //../public/index.php?l=login
    //../public/index.php?c=confirmation
?>