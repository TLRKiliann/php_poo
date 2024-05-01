<?php
    require_once('../includes/cookie_helper.php');

    //head
    $title = "Home Page";
    $style = "../public/css/styles.css";
    $favicon = "../images/favicon.png";

    //routes
    $login = '../public/index.php';
    $about = 'about.php';
    $home = 'home.php';
    $contact = 'contact.php';
    $str_session_name = get_username_from_cookie();

    //---PDO

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
            <h1>Home</h1>
        </main>

        <ul>
            <?php foreach($db->query('SELECT * FROM articles') as $post); ?>
                <li>
                    <a href="index.php?p=post&id=<?= $post->id; ?>">
                        <?= $post->title; ?>
                    </a>
                </li>
        </ul>

    </body>

</html>