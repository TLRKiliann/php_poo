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

    //$_GLOBALS['db'] = new App\Database('mytable');
    $db = new App\Database('mytable');

    //stock require into $content & access to page with $p option
    ob_start();
    if ($p === 'home') {
        require('../pages/home.php');
    } elseif ($p === 'article') {
        require('../pages/article.php');
    }
    $content = ob_get_clean();
    require('../pages/templates/default.php');
?>
