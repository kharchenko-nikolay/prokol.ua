<?php

/* Если в адресной строке есть id статьи с которой пользователь вернулся по кнопке (вернутся назад)
то вычисляю по этому id какой сейчас номер страницы, каждые 5 статей в разделе выполненные работы
считается как одна страница, тоесть если на странице например 15 статей то это уже 3 страницы */
function getArticlesCount($articleId, int $articlesLimit) : int {

    if (is_numeric($articleId)){

        if ($articleId % $articlesLimit === 0){
            $pageNumber = ($articleId / $articlesLimit);
        } else{
            $pageNumber = ($articleId / $articlesLimit + 1);
        }

        $articlesCount = $pageNumber * $articlesLimit;

    } else{
        $articlesCount = $articlesLimit;
    }

    return $articlesCount;
}

//Собирает html с короткими статьями о работах для страницы Выполненные работы
function collectsWorksInHtml(array $works, string $html, bool $mainHeading) : string {

    foreach($works as $work){

        $html .= "<div class='container-section' id='{$work['id']}'>
                 <div class='container-center'>";

        if($mainHeading === false){
            $html .= '<hr><h2 class="main-heading">Выполненные работы</h2><hr>';
            $mainHeading = true;
        }

        $imgTitle = stristr($work['photo_name'], '.', true);
        $shortDescription = mb_substr($work['description'], 0, 170);

        $html .= "<article class='container-article'>
                  <div class='article-info'>
                      <time datetime='{$work['create_date']}'>Дата: {$work['create_date']}</time>
                      <span>Просмотры: {$work['number_views']}</span>
                  </div>
                  <img src='/public/images/photo-works/{$work['photo_name']}'
                       alt='$imgTitle' title='$imgTitle'>
                  <h3>{$work['heading']}</h3>
                  <p>$shortDescription ...</p>
                  <hr style='margin-bottom: 30px'>
                  <a class='detail' href='/vypolnennye-raboty/{$work['page_name']}'>Подробнее</a>
              </article>
              </div>
              </div>";
    }

    return $html;
}