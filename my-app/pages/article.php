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
    $article = 'article.php';
	$contact = 'contact.php';
	$str_session_name = get_username_from_cookie();
//<p><a href="index.php?p=single">Single</a></p>

    require_once('../app/Autoloader.php');
    App\Autoloader::register();
    $db = new App\Database('mytable');
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
                <?php $post = $db->prepare('SELECT * FROM articles WHERE id = ?', [$_GET['id']], 'App\Table\Article', true);?>
            
                <?php var_dump($post, "post");?>
                <h2><?= $post->title; ?></h2>
            
                <p><?= $post->content ?></p>

            </section>

        </main>

    </body>

</html>

