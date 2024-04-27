<?php
    session_start();
    require_once('../includes/cookie_helper.php');

    $title = "Contact Page";
    $style = "../styles/styles.css";
    $favicon = "../images/favicon.png";

    $home = '../index.php';
	$about = 'about.php';
	$contact = 'contact.php';
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