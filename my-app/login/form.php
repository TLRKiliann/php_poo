<?php
    require_once('../includes/cookie_helper.php');
    require('../app/Form.php');

    //type - name - label
    $form = new App\Form();
    $form->add_fields("username", "text", "Name");
    $form->add_fields("email", "email", "Email");
    $form->add_fields("password", "password", "Password");

    //head
/*     $title = "Login Page";
    $style = "../public/css/styles.css";
    $favicon = "../images/favicon.png";
 */
/*     //routes
    $login = '../public/index.php?l=login';
	$about = '../public/index.php?a=about';
    $home = '../public/index.php?p=home';
    $game = '../public/index.php?g=game';
    $article = '../pages/article.php';
	$contact = '../pages/contact.php';
	$str_session_name = get_username_from_cookie(); */
?>
    <h1>Login</h1>

    <div class="container-form">
        <div class="box-form">
            <?php 
                echo $form->generator();
            ?>
        </div>
    </div>

