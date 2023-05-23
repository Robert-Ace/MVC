<?php

/**
 * @var array $vars
 * @var string $title
 */


?>

<h1><?php echo $title; ?></h1>
<h3>На нашем сайте мы публикуем самые важые новости.</h3>
<div>
    <?php foreach ($vars as $item): ?>
        <h2><?php echo $item['title']; ?></h2>
        <p><?php echo $item['description']; ?></p>
        <p><?php echo $item['text']; ?></p>

        <a href="/news/<?php echo $item['id']; ?>/">
            подробнее
        </a>
    <?php endforeach; ?>
</div>


