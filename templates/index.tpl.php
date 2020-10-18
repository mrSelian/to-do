<!doctype html>
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
    <?php if (isset($_GET['completed'])): ?>
            <?php if ($post['completed'] == true ): ?>
                <h2><?= $post['title'] ?></h2>
                <div><b>Добавлено: </b><i><?= $post['creation_date'] ?></i></div>
                <div><b>Дата начала: </b><i><?= $post['start_date'] ?></i></div>
                <div><b> Завершено: </b><i><?= $post['end_date'] ?></i></div>
                <br>
                <div><?= $post['text'] ?></div>
                <br>
                <div><b>Статус: </b><i><?= $post['status'] ?></i></div>
                <br>
                <div><a href='/delete?index=<?= $index ?>'>Удалить задачу</a></div>
                <br>
    <?php endif; ?>
        <?php else: ?>
        <?php if ($post['completed'] == false ): ?>
            <h2><?= $post['title'] ?></h2>
                <div><b>Добавлено: </b><i><?= $post['creation_date'] ?></i></div>
                <div><b>Дата начала: </b><i><?= $post['start_date'] ?></i></div>
                <div><b> Завершить до: </b><i><?= $post['deadline_date'] ?></i></div>
                <br>
            <div><?= $post['text'] ?></div>
                <br>
                <div><b>Статус: </b><i><?= $post['status'] ?></i></div>
                <br>
    <?php if ($post['status'] == 'Ожидает Подтверждения' ): ?>
    <div><a href='/verify?index=<?= $post['id'] ?>'>Подтвердить выполнение</a></div>
    <div><a href='/delete?index=<?= $index ?>'>Удалить задачу</a></div>
    <?php else: ?>
            <div><a href='/complete?index=<?= $post['id'] ?>'>Завершить задачу</a></div>
            <div><a href='/delete?index=<?= $index ?>'>Удалить задачу</a></div>
            <br>
                <br>
                <?php endif; ?>
        <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>


    <form action="/create" method="post" >
        <input type="text" name="title" placeholder="Заголовок TO-DO">
        <br>
        <textarea name="text" placeholder="Текст" cols="22" rows="6"> </textarea>
        <br>
        <label for="date">Дата начала выполнения: </label>
        <br>
        <input type="date" id="date" name="start_date"/>
        <br>
        <label for="date">Завершить до: </label>
        <br>
        <input type="date" id="date" name="deadline_date"/>
        <br>
        <input type="submit" value="Создать">
    </form>
<br>
    <br>
<?php if (isset($_GET['completed'])): ?>
    <a href="/">Показать текущие задачи</a>
    <?php else: ?>
        <a href="/?completed">Показать завершённые задачи</a>
    <?php endif; ?>

</body>
</html>
