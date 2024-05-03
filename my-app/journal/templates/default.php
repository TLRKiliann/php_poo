<?php 
    session_start();
    require_once('../includes/cookie_helper.php');
    $str_session_name = get_username_from_cookie();

    if (!empty($_SESSION['username'])) {
        echo 'login ok';
        echo $str_session_name;
    } else {
        echo 'not logged in !';
        //header('Location: ../public/index.php?c=confirmation');
    }

    //head
    $title = "Default Page";
    $style = "../public/css/styles.css";
    $favicon = "../images/favicon.png";

    //routes
    $login = '../login/form.php';
	$about = '../pages/about.php';
    $home = '../public/index.php?p=home';
    $game = '../pages/game.php';
	$contact = '../pages/contact.php';
	$str_session_name = get_username_from_cookie();
?>

<!DOCTYPE html>
<html>
    
    <head>
        <?php require_once '../html/Head.php'; ?>
    </head>

    <body>
        
        <header>
            <nav class="navbar">
                <?php require_once '../html/Navbar.php'; ?>
            </nav>
        </header>

        <main>

            <?= $content; ?>

            <h1>Content is displayed from pages/templates/default.php</h1>

        </main>

    </body>

</html>
