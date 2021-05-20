<?php

$photos = [];
$maxCountImg = 30;
$html = '';

//Считываю все пути фотографий в папке и добавляю в массив
foreach (glob('public/images/photo-works/*.jpg') as $pathToPhoto){
    $photos[] = $pathToPhoto;
}

//Перемешиваю массив чтобы какждый раз на главной странице в карусели были разные фотографии
shuffle($photos);

if(count($photos) > $maxCountImg){
    $photos = array_slice($photos, 0, $maxCountImg);
}

foreach ($photos as $imgPath) {
    $imgName = substr(strrchr($imgPath, '/'), 1);
    $imgTitle = stristr($imgName, '.', true);

    $html .= "<img src='$imgPath' alt='$imgTitle' title='$imgTitle' hidden>";
}

echo $html;