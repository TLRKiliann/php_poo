<?php
    session_start();
    require_once('../includes/cookie_helper.php');
    
    /*
    //With namspace App
    require_once('app/Form.php');
    use App\Form; 
    */
    
    require('../app/Autoloader.php');

    Autoloader::register();
    $form = new App\Form();





    //type - name - label
    $form->add_fields("username", "text", "Name");
    $form->add_fields("email", "email", "Email");
    $form->add_fields("password", "password", "Password");

    //head
    $title = "Login Page";
    $style = "css/styles.css";
    $favicon = "../images/favicon.png";

    //routes
    $login = 'index.php';
	$about = '../pages/about.php';
    $home = '../pages/home.php';
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

            <h1>Login</h1>

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