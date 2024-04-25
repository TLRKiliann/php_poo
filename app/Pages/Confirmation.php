<?php
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
                    //var_dump($_POST);
                    if (isset($_POST['name'])) {
                        $name = $_POST['name'];
                        //echo "Le nom d'utilisateur est : " . $name;
                    } else {
                        echo "Le nom d'utilisateur n'a pas été transmis.";
                    }
                    echo "Bienvenue, " . $name . "! Vous êtes connecté.";
                } else {
                    header("Location: index.php");
                }
            ?>
        </main>

    </body>

</html>