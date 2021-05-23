<?php

require_once 'database/ConnectDb.php';
require_once 'database/Work.php';
require_once 'functions.php';
$configDb = require_once 'database/configDb.php';

$connectDb = new ConnectDb($configDb);
$pdo = $connectDb->getPDO();
$work = new Work($pdo);

$pageNumber = $_GET['page'];
$articleLimit = 5;
$offset = $pageNumber * $articleLimit;

$sqlCondition = "LIMIT 5 OFFSET $offset";
$works = $work->getWorks($sqlCondition);

if(!empty($works)){

    $html = collectsWorksInHtml($works, '', true);
    echo json_encode($html);

} else{
    echo json_encode(null);
}

