<?php
    require_once('../includes/cookie_helper.php');

    //head
    $title = "Home Page";
    $style = "../public/css/styles.css";
    $favicon = "../images/favicon.png";

    //routes
    $login = '../login/form.php';
    $about = 'about.php';
    $home = 'home.php';
    $single = 'single.php';
    $contact = 'contact.php';
    $str_session_name = get_username_from_cookie();

    //---PDO make test with db here (README.md)

    require_once('../app/Autoloader.php');
    App\Autoloader::register();

    $db = new App\Database('mytable');
    /*
    $pdo = new PDO('mysql:dbname=mytable;host=192.168.18.9;port=3306', 'koala33', 'Ko@l@tr3379');
    $req = $pdo->query('SELECT * FROM articles');
    $res = $req->fetchAll(PDO::FETCH_OBJ);
    var_dump($res);
    */
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
            
            <?php foreach($db->query('SELECT * FROM articles', 'App\Table\Article') as $post): ?>
                
                <?php var_dump($post); ?>

                <li>
                    <a href="<?php $post->getUrl(); ?>">
                        <?= $post->title; ?>
                    </a>
                </li>

                <p><?php $post->getExtrait(); ?></p>


            <?php endforeach; ?>
        </ul>

    </body>

</html>