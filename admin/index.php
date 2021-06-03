<?php

session_start();
$loginConfig = require_once 'loginConfig.php';

if (isset($_SESSION['login']) && isset($_SESSION['password'])){

    if ($_SESSION['login'] === $loginConfig['login'] && $_SESSION['password'] === $loginConfig['password']){
        header('Location: add-work.php');
    }
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex,nofollow">
    <title>Админка</title>
    <link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/add-work.css">
</head>
<body>
<div class="center">
    <form action="login.php" method="post">
        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input type="text" name="login" class="form-control" id="login" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary form-control">Войти</button>
    </form>
</div>
</body>
</html>
