<?php
    require_once('../app/Autoloader.php');
    App\Autoloader::register();
    $db = new App\Database('mytable');
?>
    <h1>Home</h1>

    <?php foreach ($db->query('SELECT * FROM articles', 'App\Table\Article') as $post): ?>

        <li>
            <a href="<?= $post->getUrl(); ?>">
                <?= $post->title; ?>
            </a>
        </li>

        <p><?= $post->getExtrait(); ?></p>

        <a href="<?php 'index.php?p=article&id'; ?>"></a>

    <?php endforeach; ?>

