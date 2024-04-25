<?php
    $title = "About Page";
    $style = "../styles/styles.css";
    $favicon = "../images/favicon.png";

    $home = '../index.php';
	$about = 'About.php';
	$contact = 'Contact.php';
?>

<!DOCTYPE html>
<html>

    <head>
        <?php require_once '../Html/Head.php'; ?>
    </head>

    <body>

        <header>
            <nav class="navbar">
                <?php require_once '../Html/Navbar.php'; ?>
            </nav>
        </header>

        <main>
            <h1>About</h1>
        </main>

    </body>

</html>