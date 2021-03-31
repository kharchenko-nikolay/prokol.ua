window.onload = (function (){

    let url = window.location.href;
    let array = url.split('/');
    let articleId = array[array.length - 1];
    let btnMoreWorks = document.querySelector('.more-works');
    let articlesLimit = 5;
    let pageNumber = 0;
    let idCheck = false;

    //Если в конце url найден id статьи то скролит к ней, выполняет функцию якоря
    if (!isNaN(articleId)){
        document.getElementById(articleId).scrollIntoView(true);
    }

    /* Клик по кнопке добавляет к уже имеющимся статьям еще 5 статей,
    реализовано по типу пагинации только в другом виде */
    btnMoreWorks.onclick = () => {

        let xhr = new XMLHttpRequest();

        /* Если в адресной строке есть id статьи с которой пользователь вернулся по кнопке (вернутся назад)
        то вычисляю по этому id какой сейчас номер страницы, каждые 5 статей в разделе выполненные работы
        считается как одна страница, тоесть если на странице например 15 статей то это уже 3 страницы */
        if (!isNaN(articleId) && idCheck === false){

            if (articleId % articlesLimit === 0){
                pageNumber = parseInt(articleId / articlesLimit);
            } else{
                pageNumber = parseInt(articleId / articlesLimit + 1);
            }

            idCheck = true;

            xhr.open('GET', `/src/get-works-for-ajax.php?page=${pageNumber}`);

        } else{
            xhr.open('GET', `/src/get-works-for-ajax.php?page=${++pageNumber}`);
        }

        xhr.onreadystatechange = function(){
            if(xhr.status === 200 && xhr.readyState === 4){

                let works = JSON.parse(xhr.responseText);

                if (works !== null){
                    let articles = document.querySelector('.articles');
                    articles.insertAdjacentHTML("beforeend", works);
                } else{
                    document.querySelector('.no-works-message').style.display = 'block';
                }
            }
        }

        xhr.send();
    };
})();

