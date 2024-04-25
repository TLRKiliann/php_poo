<?php
    require_once '../Html/Form.php';
    $form = new Form();

    $title = "About Page";
    $style = "../styles/styles.css";
    $favicon = "../images/favicon.png";

    $home = '../index.php';
	$about = 'About.php';
	$contact = 'Contact.php';
?>

<!DOCTYPE html>
<html>

    <head>
        <?php require_once '../Html/Head.php'; ?>
    </head>

    <body>
        
        <header>
            <nav class="navbar">
                <?php require_once '../Html/Navbar.php'; ?>
            </nav>
        </header>

        <main>
            
            <h1>Confirmation</h1>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $username = $_POST['name'];
                    $password = $_POST['password'];

                    if ($form->validate_credentials($username, $password)) {
                        echo "Bienvenue, " . $username . "! Vous êtes connecté. ";
                        echo '<a href="Game.php">Go to game !</a>';
                    } else {
                        echo "Nom d'utilisateur ou mot de passe incorrect. ";
                        echo '<a href="../index.php">Retour à la page d\'accueil</a>';
                    }
                } else {
                    header("Location: ../index.php");
                }
            ?>

        </main>

    </body>

</html>