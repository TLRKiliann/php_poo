<?php
    session_start();
    require_once('../includes/cookie_helper.php');
    
    $username = htmlspecialchars($_POST['name']);
    $_SESSION['username'] = $username;

    $cookie_name = "username";
    $cookie_value = $username;
    setcookie($cookie_name, $username, time() + 365*24*3600, null, null, false, true);

    require_once '../html/Form.php';

    use App\html\Form;

    $form = new Form();

    //head
    $title = "Confirmation Page";
    $style = "../styles/styles.css";
    $favicon = "../images/favicon.png";

    //routes
    $home = '../index.php';
	$about = 'about.php';
    $products = 'products.php';
	$contact = 'contact.php';
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
            
            <h1>Confirmation</h1>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $username = htmlspecialchars($_POST['name']);
                    $password = $_POST['password'];

                    if ($form->validate_credentials($username, $password)) {
                        echo "Bienvenue, " . $username . "! Vous êtes connecté. ";
                        echo '<a class="linktogame" href="game.php">Go to game !</a>';
                    } else {
                        echo "Nom d'utilisateur ou mot de passe incorrect. ";
                        echo '<a class="goback" href="../index.php">Retour à la page d\'accueil</a>';
                    }
                } else {
                    header("Location: ../index.php");
                    exit();
                }
            ?>

        </main>

    </body>

</html>