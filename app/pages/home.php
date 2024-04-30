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

    $pdo = new PDO('mysql:host=XXXX.XXXX.XXXX.XXXX;port:XXXX;dbname=mytable', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $res = $pdo->query('SELECT * FROM articles');
    var_dump($res->fetchAll(PDO::FETCH_OBJ));
    var_dump($res->fetchAll());

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

    </body>

</html>