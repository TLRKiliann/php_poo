    <?php $post = $db->prepare('SELECT * FROM articles WHERE id = ?', [$_GET['id']], 'App\Table\Article', true); ?>

    <h2><?= $post->id . "." . $post->title; ?></h2>

    <p><?= $post->content ?></p>

    <p><a href="<?= '../public/index.php?p=home'; ?>">Go back</a></p>