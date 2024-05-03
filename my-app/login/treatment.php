<?php
    //Retrive data from db
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $pdo = new PDO("mysql:host=192.168.18.9;dbname=mytable", "koala33", "Ko@l@tr3379");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //INSERT by REQUEST SQL
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $stmt->execute(array(':username' => $username, ':email' => $email, ':password' => $hashed_password));

    echo "Inscription success !";

    //head
    $title = "Sign Up Confirmed";
    $style = "../public/css/styles.css";
    $favicon = "../images/favicon.png";

    //routes
    $home = '../public/index.php?p=home';
    $game = '../pages/game.php';
	$about = '../pages/about.php';
    $contact = '../pages/contact.php';
    $login = 'form.php';
    //$str_session_name = get_username_from_cookie();
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
            <a href="form.php">Go to login</a>
        </main>
    
    </body>

</html>