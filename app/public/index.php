<?php
    //session_start();
    require_once('../includes/cookie_helper.php');
    
    /*
    //With namspace App
    require_once('class/Form.php');
    use App\Form; 
    */
    
    require('../class/Autoloader.php');

    Autoloader::register();
    $form = new App\Form();

    //type - name - label
    $form->add_fields("username", "text", "Name");
    $form->add_fields("email", "email", "Email");
    $form->add_fields("password", "password", "Password");

    //head
    $title = "Home Page";
    $style = "css/styles.css";
    $favicon = "../images/favicon.png";

    //routes
    $home = 'index.php';
	$about = '../pages/about.php';
    $products = '../pages/products.php';
	$contact = '../pages/contact.php';
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

            <h1>Home</h1>

            <div class="container-form">
                <div class="box-form">
                    <?php 
                        echo $form->generator();
                    ?>
                </div>
            </div>

        </main>
    
    </body>

</html>