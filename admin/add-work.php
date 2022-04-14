<?php

session_start();

require_once '../src/functions.php';

authorizationCheck();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex,nofollow">
    <title>Добавить работу</title>
    <link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/add-work.css">
</head>
<body>
<a href="logout.php" class="logout btn btn-lg btn-danger" role="button">Выход</a>
<div class="center">
    <form class="width-form" action="add-work-to-database.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="heading" class="form-label">Заголовок</label>
            <input type="text" name="heading" class="form-control" id="heading" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea name="description" class="form-control" id="description" rows="10" required></textarea>
        </div>
        <div class="mb-3">
            <label for="page-name" class="form-label">Название страницы в адресной строке</label>
            <input type="text" name="pageName" class="form-control" id="page-name" required>
        </div>
        <div class="mb-3">
            <label for="photos" class="form-label">Выберите фотографии</label>
            <input type="file" name="photos[]" class="form-control" id="photos" accept="image/*" multiple required>
        </div>
        <button type="submit" name="btnSubmit" class="btn btn-primary form-control">Отправить</button>
    </form>
</div>
</body>
</html>
