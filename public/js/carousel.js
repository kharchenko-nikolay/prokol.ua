(function (){

    let arrowLeft = document.querySelector('.arrow-left');
    let arrowRight = document.querySelector('.arrow-right');
    let carousel = document.querySelectorAll('.carousel > img');
    let indexImage = 0;
    let numberImages = carousel.length;

    // Обработчик события нажатия на стрелку вправо
    arrowRight.onclick = function (){
        if(indexImage !== numberImages - 1){
            carousel[indexImage].setAttribute('hidden', true);
            carousel[++indexImage].removeAttribute('hidden');
        }
    };

    // Обработчик события нажатия на стрелку влево
    arrowLeft.onclick = function (){
        if(indexImage !== 0){
            carousel[indexImage].setAttribute('hidden', true);
            carousel[--indexImage].removeAttribute('hidden');
        }
    };

})();