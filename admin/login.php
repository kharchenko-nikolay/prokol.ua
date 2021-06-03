<?php

require_once '../src/functions.php';
$loginConfig = require_once 'loginConfig.php';

if (isset($_POST['login']) && isset($_POST['password'])){

    $login = $password = '';
    extract($_POST);

    if ($login === $loginConfig['login'] && $password === $loginConfig['password']){
        session_start();

        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;

        header('Location: add-work.php');
    } else{
        printMessage('Неверный логин или пароль!', 'index.php');
    }

} else{
    header('Location: index.php');
}