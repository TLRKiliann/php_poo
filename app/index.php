<?php
    require_once 'Html/Form.php';

    $form = new Form();

    //type - name - label
    $form->add_fields("name", "text", "Name");
    $form->add_fields("email", "email", "Email");
    $form->add_fields("password", "password", "Password");
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="keywords" content="HTML, CSS, PHP">
        <meta name="author" content="Esteban Catanea">
        <link rel="stylesheet" type="text/css" href="styles/styles.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        
        <div class="container-form">
            <?php 
                echo $form->generator();
            ?>
        </div>

    </body>

</html>