<?php
    session_start();
    require_once('../includes/cookie_helper.php');

    //head
    $title = "Contact Page";
    $style = "../public/css/styles.css";
    $favicon = "../images/favicon.png";

    //routes
    $login = '../login/form.php';
	$about = 'about.php';
    $home = 'home.php';
    $article = 'article.php';
	$contact = 'contact.php';
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