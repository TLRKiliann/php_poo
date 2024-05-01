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

    //$db = new App\Database('mytable');

    try {
        $db = new App\Database('mytable');
    } catch (Exception $e) {
        echo 'Erreur lors de l\'instanciation de la classe Database : ' . $e->getMessage();
        exit; // Arrêter l'exécution du script
    }

    //stock require into $content & access to page with $p option
    ob_start();
    if ($p === 'home') {
        require('../pages/home.php');
    } elseif ($p === 'single') {
        require('../pages/single.php');
    }
    $content = ob_get_clean();
    require('../pages/templates/default.php');
?>
