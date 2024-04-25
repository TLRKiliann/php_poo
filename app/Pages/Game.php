<?php
    require_once '../class/Game.php';

    $user = new Game("GamerName", 100);
    $computer = new Game("Computer", 100);

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
            
            <h1>Game</h1>

            <section>

                <section>
                    <h2>You</h2>

                    <?php
                       echo $user->getData();
                    ?>
                    <label id="lbl_atk"></label>
                    <button type="button" id="btn_atk">Atk</button>

                    <label id="lbl_dfs"></label>
                    <button type="button" id="btn_dfs">Dfs</button>

                </section>

                <section>
                    <h2>Gamer 2</h2>

                    <?php
                        echo $computer->getData();
                    ?>
                    <label id="lbl_atk_2"></label>
                    <button type="button" id="btn_atk_2">Atk</button>

                    <label id="lbl_dfs_2"></label>
                    <button type="button" id="btn_dfs_2">Dfs</button>

                </section>

            </section>

        </main>

        <script src="../js/game.js"></script>
        
    </body>

</html>