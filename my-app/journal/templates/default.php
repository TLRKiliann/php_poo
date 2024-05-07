<?php 
    session_start();
    require_once('../includes/cookie_helper.php');
    $str_session_name = get_username_from_cookie();

    if (!isset($_SESSION['username'])) {
        header('Location: ../login/form.php');
    }

    //head
    $title = "Default Page";
    $style = "../public/css/styles.css";
    $favicon = "../images/favicon.png";

    //routes
    $login = '../login/form.php';
	$about = '../pages/about.php';
    $home = 'index.php?p=home';
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

            <h1>Content is displayed from journal/templates/default.php</h1>
    
        </main>

    </body>

</html>
