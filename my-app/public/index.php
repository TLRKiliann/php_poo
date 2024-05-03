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
    } else {
        $p = 'home';
    }

    $db = new App\Database('mytable');

    //stock require into cache
    ob_start();
    if ($p === 'home') {
        require('../journal/home.php');
    } elseif ($p === 'article') {
        require('../journal/article.php');
    }
    $content = ob_get_clean();
    require('../journal/templates/default.php');
?>