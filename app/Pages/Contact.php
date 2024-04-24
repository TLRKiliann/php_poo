<?php
    $title = "Contact Page";
    $style = "./styles/style.css";
    $favicon = "images/favicon.png";

    $home = 'index.php';
	$about = 'Pages/About.php';
	$contact = 'Pages/Contact.php';
?>

<!DOCTYPE html>
<html>

    <head>
        <?php require_once 'Html/Head.php'; ?>
    </head>

    <body>
        <header>
            <h1>Contact</h1>
        </header>
        <nav class="navbar">
            <?php require_once 'Html/Navbar.php'; ?>
        </nav>

    </body>

</html>