<?php
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

            <h2>Sign Up</h2>
            
            <div class="container-form">
                <div class="box-form">
                    <div class="sub-form">

                        <form action="treatment.php" method="post">
                            <label for="username">Username :</label>
                            <input type="text" id="username" name="username" required><br><br>

                            <label for="email">Email :</label>
                            <input type="email" id="email" name="email" required><br><br>

                            <label for="password">Password :</label>
                            <input type="password" id="password" name="password" required><br><br>

                            <input type="submit" value="S'inscrire" class="submit-btn">
                        </form>
                        <div class="signup-div">
                            <a href="form.php" class="signup">Go to login</a>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </body>
</html>

<?php
    /*
        $pdo = new PDO("mysql:host=192.168.18.9;dbname=mytable", "username", "password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $password = "123456";
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $username = "Esteban";

        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->execute(array(':username' => $username, ':password' => $hashed_password));
    */
?>