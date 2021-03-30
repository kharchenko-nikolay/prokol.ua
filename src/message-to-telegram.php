<?php

$configTelegram = require_once 'configTelegram.php';

//Если name и phone существуют отправить сообщение на телеграм
if(isset($_GET['name']) && isset($_GET['phone'])) {

    $message = $_GET['name'] . "\n" . $_GET['phone'];
    messageToTelegram($configTelegram, $message);
}

//Функция отправления сообщения боту в телеграм
function messageToTelegram($config, $message)
{
    $ch = curl_init();

    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => "https://api.telegram.org/bot{$config['token']}/sendMessage",
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => $config['id'],
                'text' => $message,
            ),
        )
    );

    curl_exec($ch);
}

