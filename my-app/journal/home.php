<?php
/*     require_once('../app/Autoloader.php');
    App\Autoloader::register();
    $db = new App\Database('mytable'); */
?>
    <h1>Home</h1>

    <div class="default-div">
        <?php
            //1) foreach ($db->query('SELECT * FROM articles', 'App\Table\Article') as $post):
            //2) foreach (App\App::getDatabase()->query('SELECT * FROM articles', 'App\Table\Article') as $post): 
            foreach (\App\Table\Article::getLast() as $post):
        ?>

            <li>
                <a href="<?= $post->getUrl(); ?>">
                    <?= $post->title; ?>
                </a>
            </li>

            <p><?= $post->getExtrait(); ?></p>

            <a href="<?php 'index.php?p=article&id'; ?>"></a>

        <?php endforeach; ?>
    </div>

