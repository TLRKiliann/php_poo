<?php
    declare(strict_types=1);

    session_start();
    require_once('../includes/cookie_helper.php');
    require_once('../app/Game.php');

    //$str_session_name = $_SESSION['username'];
    $str_session_name = get_username_from_cookie();

    use App\Game;

    $user = new Game($str_session_name, 0, 100);
    $computer = new Game("Computer", 0, 100);

    //head
    $title = "Game Page";
    $style = "../public/css/styles.css";
    $favicon = "../images/favicon.png";

    //routes
    $login = '../login/form.php';
	$about = 'about.php';
    $home = 'home.php';
    $single = 'single.php';
	$contact = 'contact.php';
    $str_session_name;
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
            
            <h1>Game</h1>

            <p class="paragraph">atk = attack (random 1 - 40)</p>
            <p class="paragraph">dfs = defense (atk/4)</p>

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

                    <div class="box-btnlbl">
                        <div class="box-atk">
                            <button type="button" id="btn_atk">Atk</button>
                            <label id="lbl_atk"></label>

                            <script type="text/javascript">
                                let js_atk  = '<?php echo $php_atk; ?>';
                            </script>
                        </div>

                        <div class="box-dfs">
                            <label id="lbl_dfs_1"></label>
                            <button type="button" id="btn_dfs_1">Dfs</button>                        
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

                    <div class="box-btnlbl">
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

            <p class="paragraph">(You only have 3 defenses per round)</p>

            <div class="square-move">
                <div id="square">
                </div>
            </div>

            <div class="message-round">
                <p id="round-player"></p>
            </div>

            <div class="refresher-box">
                <button type="button" id="btn-refresh">
                    Refresh
                </button>
            </div>

        </main>

        <script src="../public/js/game.js"></script>
        
    </body>

</html>