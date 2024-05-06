<?php
    session_start();
    require_once('../includes/cookie_helper.php');
    
    // Avoid XSS (cross site scripting) !
    $username = htmlspecialchars($_POST['username']);
    
    $cookie_name = "username";
    setcookie($cookie_name, $username, time() + 365 * 24 * 3600, '/', null, false, false);
    /*
        Delete cookie with:
        setcookie($cookie_name, "", time() - 10);
    */
    $_SESSION['username'] = $username;

    //login
    require_once('../app/Form.php');
    use App\Form;

    $form = new Form();

    //head
    $title = "Confirmation Page";
    $style = "../public/css/styles.css";
    $favicon = "../images/favicon.png";

    //routes
    $home = '../public/index.php?p=home';
    $game = '../pages/game.php';
	$about = '../pages/about.php';
    $contact = '../pages/contact.php';
    $login = 'form.php';

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
                    $password = $_POST['password'];
                    if ($form->validate_credentials($username, $password)) {
                        echo "Bienvenue, " . $username . "! Vous êtes connecté. ";
                        echo '<a class="linktogame" href="../pages/game.php">Go to game !</a>';
                    } else {
                        echo "Nom d'utilisateur ou mot de passe incorrect. ";
                        echo '<a class="goback" href="form.php">Retour à la page d\'accueil</a>';
                    }
                } else {
                    header("Location: form.php");
                    exit();
                }
            ?>

        </main>

    </body>
</html>