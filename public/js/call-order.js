$(document).ready(() => {

    const GUI = {
        $modalWindow: $('#modal'),
        $btnSubmit: $('input[name="btnSubmit"]'),
        $form: $('#form'),
        $name: $('input[name="name"]'),
        $phoneNumber: $('input[name="phone-number"]'),
        $errorMessage: $('.error-message')
    };

    //Обработчик на кнопку Заказать звонок
    $('#btn-call-order').click(() => {
        GUI.$modalWindow.css('display', 'flex');
    });

    //Обработчик на иконку закрытия модального окна
    $('#close-icon').click(() => {
        GUI.$modalWindow.css('display', 'none');
    });

    /*
    Обработчик на кнопку отправить, отправляет введенные
    пользователем данные на сервер через ajax запрос
     */
    GUI.$btnSubmit.click(() => {

        let name = GUI.$name.val();
        let phoneNumber = GUI.$phoneNumber.val();

        if(name === '' || phoneNumber === ''){
            $('.message').css('margin-bottom', '10px');
            GUI.$errorMessage.css('display', 'inline');
        } else{

            //Отправка ajax запроса на сервер
            $.get(`/src/message-to-telegram.php?name=${name}&phone=${phoneNumber}`);

            GUI.$form.empty();
            GUI.$form.append(`<img src="/public/images/smile.png" alt="Улыбка" 
                               style="margin-bottom: 10px; width: 100px">
                          <span class="message">Спасибо за заявку ${name}!</span>
                          <button id="button-close">Закрыть</button>`);


            //Обработчик на кнопку закрыть которая появляется после отработки ajax запроса
            $('#button-close').on('click', () => {
                GUI.$modalWindow.css('display', 'none');
            });
        }
    });

});