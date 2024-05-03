<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire d'inscription</title>
    </head>
    <body>
        <h2>Formulaire d'inscription</h2>
        <form action="treatment.php" method="post">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required><br><br>
            
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required><br><br>
            
            <input type="submit" value="S'inscrire">
        </form>
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