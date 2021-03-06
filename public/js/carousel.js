(function (){

    let GUI = {
        arrowLeft: document.querySelector('.arrow-left'),
        arrowRight: document.querySelector('.arrow-right'),
        carouselImages: document.querySelectorAll('.carousel-images > img')
    };

    let indexImage = 0;
    const firstImage = 0;
    const numberImages = GUI.carouselImages.length;

    //Так как все картинки в карусели изначально с атрибутом hidden,
    //у первой картинки убираю атрибут чтобы отобразилась в карусели
    GUI.carouselImages[0].removeAttribute('hidden');

    // Обработчик события нажатия на стрелку вправо
    GUI.arrowRight.onclick = () => {
        if(indexImage !== numberImages - 1){
            GUI.carouselImages[indexImage].setAttribute('hidden', true);
            GUI.carouselImages[++indexImage].removeAttribute('hidden');
        }
    };

    // Обработчик события нажатия на стрелку влево
    GUI.arrowLeft.onclick = () => {
        if(indexImage !== firstImage){
            GUI.carouselImages[indexImage].setAttribute('hidden', true);
            GUI.carouselImages[--indexImage].removeAttribute('hidden');
        }
    };

})();