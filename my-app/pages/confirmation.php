<?php
    //require_once('../includes/cookie_helper.php');
    
    $username = htmlspecialchars($_POST['username']);
    $cookie_name = "username";
    setcookie($cookie_name, $username, time() + 365 * 24 * 3600, null, null, false, false);
    
    $_SESSION['username'] = $username;

    //login
    require_once('../app/Form.php');
    use App\Form;

    $form = new Form();
?>
            
    <h1>Confirmation</h1>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $password = $_POST['password'];
            if ($form->validate_credentials($username, $password)) {
                echo "Bienvenue, " . $username . "! Vous êtes connecté. ";
                echo '<a class="linktogame" href="../public/index.php?g=game">Go to game !</a>';
            } else {
                echo "Nom d'utilisateur ou mot de passe incorrect. ";
                echo '<a class="goback" href="../public/index.php?l=login">Retour à la page d\'accueil</a>';
            }
        } else {
            header("Location: ../public/index.php?l=login");
            exit();
        }
    ?>
