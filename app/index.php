<?php
    require_once 'Html/Form.php';

    $form = new Form();

    //type - name - label
    $form->add_fields("name", "text", "Name");
    $form->add_fields("email", "email", "Email");
    $form->add_fields("password", "password", "Password");

    //head
    $title = "Main Page";
    $style = "styles/style.css";
    $favicon = "images/favicon.png";

    //pages
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
        
        <nav class="navbar">
            <?php require_once 'Html/Navbar.php'; ?>
        </nav>

        <div class="container-form">
            <?php 
                echo $form->generator();
            ?>
        </div>
    
    </body>

</html>