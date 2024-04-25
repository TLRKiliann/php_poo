<?php
    require_once '../class/Game.php';

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

                    <h2>Gamer 1</h2>

                    <div class="div-php">
                        <?php
                            $user->get_data();
                            $php_variable = $user->get_atk();
                            //echo $php_variable;
                        ?>
                    </div>

                    <div class="box-result">
                        <div class="box-atk">
                            <button type="button" id="btn_atk">Atk</button>
                            <label id="lbl_atk"></label>

                            <script type="text/javascript">
                                let js_variable  = '<?php echo $php_variable; ?>';
                            </script>
                        </div>

                        <div class="box-dfs">
                            <button type="button" id="btn_dfs">Dfs</button>
                            <label id="lbl_dfs"></label>
                        </div>
                    </div>

                </section>

                <section class="sect-player-two">

                    <h2>Gamer 2</h2>

                    <div class="div-php">
                        <?php
                            $computer->get_data();
                            //echo $user->get_score();
                            $php_variable_2 = $computer->get_atk();
                            //echo $php_variable_2;
                        ?>
                    </div>

                    <div class="box-result">
                        <div class="box-atk">
                            <button type="button" id="btn_atk_2">Atk</button>
                            <label id="lbl_atk_2"></label>
                            
                            <script type="text/javascript">
                                let js_variable_2  = '<?php echo $php_variable_2; ?>';
                            </script>
                        </div>

                        <div class="box-dfs">
                            <button type="button" id="btn_dfs_2">Dfs</button>
                            <label id="lbl_dfs_2"></label>
                        </div>
                    </div>

                </section>

            </section>

        </main>

        <script src="../js/game.js"></script>
        
    </body>

</html>