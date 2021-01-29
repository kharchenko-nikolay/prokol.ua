(function (){

    let GUI = {
        arrowLeft: document.querySelector('.arrow-left'),
        arrowRight: document.querySelector('.arrow-right'),
        carousel: document.querySelectorAll('.carousel > img')
    };

    let indexImage = 0;
    const firstImage = 0;
    const numberImages = GUI.carousel.length;

    // Обработчик события нажатия на стрелку вправо
    GUI.arrowRight.onclick = () => {
        if(indexImage !== numberImages - 1){
            GUI.carousel[indexImage].setAttribute('hidden', true);
            GUI.carousel[++indexImage].removeAttribute('hidden');
        }
    };

    // Обработчик события нажатия на стрелку влево
    GUI.arrowLeft.onclick = () => {
        if(indexImage !== firstImage){
            GUI.carousel[indexImage].setAttribute('hidden', true);
            GUI.carousel[--indexImage].removeAttribute('hidden');
        }
    };

})();