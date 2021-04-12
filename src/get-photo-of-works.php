<?php

$handle = opendir('public/images/photo-works');
$html = '';

//Собирает из папки все фотографии, для вывода на главной странице в карусели
while(($imgName = readdir($handle)) !== false){

    if($imgName === '..' || $imgName === '.') continue;

    $imgTitle = stristr($imgName, '.', true);

    $html .= "<img src='public/images/types-works/$imgName' alt='$imgTitle' title='$imgTitle' hidden>";
}

closedir($handle);
echo $html;
