window.onload = (function (){

    url = window.location.href;
    array = url.split('/');
    articleId = array[array.length - 1];

    //Если в конце url найден id статьи то скролит к ней, выполняет функцию якоря
    if (!isNaN(articleId)){
        document.getElementById(articleId).scrollIntoView(true);
    }

})();

