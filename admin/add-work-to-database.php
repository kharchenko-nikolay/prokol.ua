<?php

session_start();

require_once '../src/database/ConnectDb.php';
require_once '../src/database/Work.php';
require_once '../src/functions.php';

authorizationCheck();

if (isset($_POST['btnSubmit'])){

    $connect = new ConnectDb();
    $pdo = $connect->getPDO();
    $work = new Work($pdo);

    $resultAddWork = $work->addWork($_POST['heading'], $_POST['description'], $_POST['pageName']);

    //Если работа успешно добавлена в базу данных, добавляю фотографии к ней
    if($resultAddWork === true){

        $resultAddPhotos = $work->addPhotosToWork($_FILES['photos']);

        if($resultAddPhotos === true){
            printMessage('Работа успешно добавлена!', 'add-work.php');
        } else{
            printMessage('Ошибка загрузки фотографий!', 'add-work.php');
        }

    } else{
        printMessage('Ошибка добавления информации о работе!', 'add-work.php');
    }

} else {
    header('Location: add-work.php');
}

