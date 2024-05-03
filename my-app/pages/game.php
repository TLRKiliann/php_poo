<?php
    session_start();
    require_once('../includes/cookie_helper.php');
    require_once('../app/Game.php');
    use App\Game;

    //$display_uri = $_SERVER['REQUEST_URI'];
    //var_dump($display_uri, "server_uri");

    $display_software = $_SERVER['SERVER_SOFTWARE'];
    var_dump($display_software, "server_software");

    $display_proto = $_SERVER['SERVER_PROTOCOL'];
    var_dump($display_proto, 'path_proto');

    $str_session_name = get_username_from_cookie();

    //returns to login if $_SESSION not defined
    if (empty($str_session_name)) {
        header('Location: ../login/form.php');
        exit();
    } 

    /*
        It's preferable to retrieve cookie value 
        rather than $_SESSION['username'];
    */
    $user = new Game($str_session_name, 0, 100);
    $computer = new Game("Computer", 0, 100);

    //head
    $title = "Game Page";
    $style = "../public/css/styles.css";
    $favicon = "../images/favicon.png";

    //routes
    $home = '../public/index.php?p=home';
    $game = 'game.php';
	$about = 'about.php';
	$contact = 'contact.php';
    $login = '../login/form.php';
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

            <h1 class="h1-game">Game</h1>

            <div class="container-game">

                <div class="box-game">

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
                                    <button type="button" id="btn_atk_2" disabled>Atk</button>
                                    <label id="lbl_atk_2"></label>
                                    
                                    <script type="text/javascript">
                                        let js_atk_2  = '<?php echo $php_atk_2; ?>';
                                    </script>
                                </div>

                                <div class="box-dfs">
                                    <label id="lbl_dfs_2"></label>
                                    <button type="button" id="btn_dfs_2" disabled>Dfs</button>
                                </div>
                            </div>

                        </section>

                    </section>

                    <p class="paragraph">(You only have 3 defenses per round)</p>

                    <div class="square-frame">
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


                </div>

            </div>

        </main>

        <script src="../public/js/game.js"></script>

    </body>
</html>