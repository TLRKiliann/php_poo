<?php
    require_once '../class/Game.php';

    /* if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['name'];
        var_dump($_POST);
        var_dump($username);
    } else {
        var_dump($_POST, "Error,");
    } */

    $user = new Game("Yourname", 0, 100);
    $computer = new Game("Computer", 0, 100);

    $title = "Game Page";
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

            <section class="container-sect">

                <section class="sect-player-one">

                    <h2>
                        <?php echo $user->get_name(); ?>
                    </h2>

                    <div id="div-php">
                        <?php
                            $getLife = $user->get_life();
                            echo "Life: " . $getLife;
                            $php_atk = $user->get_atk();
                        ?>

                        <script type="text/javascript">
                            let life_js = '<?php echo $getLife; ?>';
                        </script>

                    </div>

                    <div class="box-result">
                        <div class="box-atk">
                            <button type="button" id="btn_atk">Atk</button>
                            <label id="lbl_atk"></label>

                            <script type="text/javascript">
                                let js_atk  = '<?php echo $php_atk; ?>';
                            </script>
                        </div>

                        <div class="box-dfs">
                            <label id="lbl_dfs"></label>
                            <button type="button" id="btn_dfs">Dfs</button>                        
                        </div>
                    </div>

                </section>

                <section class="sect-player-two">

                    <h2>
                        <?php echo $computer->get_name(); ?>
                    </h2>

                    <div id="div-php2">
                        
                        <?php
                            $getLife2 = $computer->get_life();
                            echo "Life: " . $getLife2;
                            $php_atk_2 = $computer->get_atk();
                        ?>

                        <script type="text/javascript">
                            let life_js2 = '<?php echo $getLife2; ?>';
                        </script>

                    </div>

                    <div class="box-result">
                        <div class="box-atk">
                            <button type="button" id="btn_atk_2">Atk</button>
                            <label id="lbl_atk_2"></label>
                            
                            <script type="text/javascript">
                                let js_atk_2  = '<?php echo $php_atk_2; ?>';
                            </script>
                        </div>

                        <div class="box-dfs">
                            <label id="lbl_dfs_2"></label>
                            <button type="button" id="btn_dfs_2">Dfs</button>
                        </div>
                    </div>

                </section>

            </section>

            <div class="square-move">
                <div id="square">
                </div>
            </div>

            <div class="message-round">
                <p id="round-player"></p>
            </div>

        </main>

        <script src="../js/game.js"></script>
        
    </body>

</html>