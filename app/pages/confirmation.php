<?php
    session_start();
    $username = htmlspecialchars($_POST['name']);
    $_SESSION['username'] = $username;

    $cookie_name = "username";
    $cookie_value = $username;
    setcookie($cookie_name, $username, time() + 365*24*3600, null, null, false, true);

    require_once '../html/Form.php';
    $form = new Form();

    $title = "About Page";
    $style = "../styles/styles.css";
    $favicon = "../images/favicon.png";

    $home = '../index.php';
	$about = 'about.php';
	$contact = 'contact.php';
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
            
            <h1>Confirmation</h1>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $username = htmlspecialchars($_POST['name']);
                    $password = $_POST['password'];

                    if ($form->validate_credentials($username, $password)) {
                        echo "Bienvenue, " . $username . "! Vous êtes connecté. ";
                        echo '<a href="game.php">Go to game !</a>';
                    } else {
                        echo "Nom d'utilisateur ou mot de passe incorrect. ";
                        echo '<a href="../index.php">Retour à la page d\'accueil</a>';
                    }
                } else {
                    header("Location: ../index.php");
                    exit();
                }
            ?>

        </main>

    </body>

</html>