$(document).ready(() => {

    const GUI = {
        $arrowLeft: $('.arrow-left'),
        $arrowRight: $('.arrow-right'),
        $carouselImages: $('.carousel-images > img')
    };

    let indexImage = 0;
    const firstImage = 0;
    const numberImages = GUI.$carouselImages.length;

    /* Так как все картинки в карусели изначально с атрибутом hidden,
    у первой картинки убираю атрибут чтобы отобразилась в карусели */
    GUI.$carouselImages[0].hidden = false;

    // Обработчик события нажатия на стрелку вправо
    GUI.$arrowRight.click(() => {
        if(indexImage !== numberImages - 1){
            GUI.$carouselImages[indexImage].hidden = true;
            GUI.$carouselImages[++indexImage].hidden = false;
        }
    });

    // Обработчик события нажатия на стрелку влево
    GUI.$arrowLeft.click(() => {
        if(indexImage !== firstImage){
            GUI.$carouselImages[indexImage].hidden = true;
            GUI.$carouselImages[--indexImage].hidden = false;
        }
    });
});