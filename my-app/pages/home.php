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

/*     $pdo = new PDO('');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $res = $pdo->query('SELECT * FROM articles');
    //var_dump($res->fetchAll(PDO::FETCH_OBJ));
    $data = $res->fetchAll(PDO::FETCH_OBJ);
    var_dump($data[0]->title); */
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