<?php

require_once '../models/Article.php';

$articleId = $_GET['id'];

$article = Article::findById($articleId);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?= $article->getTitle() ?></h1>
    <img src="<?= $article->getCover() ?>" />
    <p>
        <?= $article->getContent() ?>
    </p>
    <div>
        Published in <?= $article->getCategory()->getName() ?> on <?= $article->getCreatedAt()->format('Y-m-d H:i:s') ?>
    </div>
</body>
</html>
