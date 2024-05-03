<?php
    session_start();
    require_once('../includes/cookie_helper.php');

    //head
    $title = "Contact Page";
    $style = "../public/css/styles.css";
    $favicon = "../images/favicon.png";

    //routes
    $home = '../public/index.php?p=home';
    $game = 'game.php';
	$about = 'about.php';
	$contact = 'contact.php';
    $login = '../login/form.php';
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
            <h1>Contact</h1>
        </main>

    </body>

</html>