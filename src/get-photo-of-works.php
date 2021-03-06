<?php

$handle = opendir('public/images/types-works');
$html = '';

//Собирает из папки все пути фотографий, для вывода на главной странице в карусели
while(($imageName = readdir($handle)) !== false){

    if($imageName === '..' || $imageName === '.') continue;

    $description = stristr($imageName, '.', true);

    $html .= "<img src='public/images/types-works/$imageName' alt='$description' title='$description' hidden>";
}

closedir($handle);
echo $html;
