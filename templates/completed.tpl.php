<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
</head>
<body>
<h1><?= $title ?></h1>

<?php foreach ($posts as $index => $post): ?>
<?php if ($post['completed'] == true ): ?>
    <h3><?= $post['title'] ?></h3>
    <div><?= $post['text'] ?></div>
    <div><a href='/delete?index=<?= $index ?>'>Удалить задачу</a></div>
<?php endif; ?>
<?php endforeach; ?>

</body>
</html>
