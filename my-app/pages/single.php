<?php
    session_start();
    require_once('../includes/cookie_helper.php');

    //head
    $title = "Single Page";
    $style = "../public/css/styles.css";
    $favicon = "../images/favicon.png";

    //routes
    $login = '../login/form.php';
	$about = 'about.php';
    $home = 'home.php';
    $single = 'single.php';
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
            <h1>Single</h1>

            <section>
                <p><a href="../public/index.php?p=single">Single</a></p>
            </section>

        </main>

    </body>

</html>

