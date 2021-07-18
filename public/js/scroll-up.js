$(document).ready(() => {

   $btnToTop = $('.btn-to-top');
   $flex = false;

   //Обработчик на кнопку вверх, плавно прокручивает страницу вверх
   $btnToTop.click(() => {
      $('html, body').animate({scrollTop: 0}, 500);
   });

   //Обработчик на появление и пропадание кнопки вверх
   $(window).scroll(() => {
      if ($(this).scrollTop() > 400){

         /* Чтобы картинка мельком не появлялась при загрузке страницы задаю
         видимость ей после прокрутки в 400px */
         if(!$flex){
            $btnToTop.css('display', 'flex');
            $flex = true;
         }

         $btnToTop.fadeIn();
      } else {
         $btnToTop.fadeOut();
      }
   });
});