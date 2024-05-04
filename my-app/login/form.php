<?php
    session_start();
    require_once('../includes/cookie_helper.php');
    require('../app/Form.php');

    //type - name - label
    $form = new App\Form();
    $form->add_fields("username", "text", "Name");
    $form->add_fields("email", "email", "Email");
    $form->add_fields("password", "password", "Password");

    //head
    $title = "Login Page";
    $style = "../public/css/styles.css";
    $favicon = "../images/favicon.png";

    //routes
    $home = '../public/index.php?p=home';
    $game = '../pages/game.php';
	$about = '../pages/about.php';
    $contact = '../pages/contact.php';
    $login = 'form.php';
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
                    <div class="sub-form">

                        <?php 
                            echo $form->generator();
                            echo '<div class="signup-div">';
                            echo '<a class="signup" href="signup.php">Sign Up</a>';
                            echo '</div>';
                        ?>

                    </div>
                </div>
                
            </div>
            
        </main>
    
    </body>
</html>
