$(document).ready(() => {

    const GUI = {
        $modalWindow: $('#modal'),
        $btnSubmit: $('input[name="btnSubmit"]'),
        $form: $('#form')
    };

    //Обработчик на кнопку Заказать звонок
    $('#btn-call-order').click(() => {
        GUI.$modalWindow.attr({style: "display: flex"});
    });

    //Обработчик на иконку закрытия модального окна
    $('#close-icon').click(() => {
        GUI.$modalWindow.attr({style: "display: none"});
    });

    /*
    Обработчик на кнопку отправить, отправляет введенные
    пользователем данные на сервер через ajax запрос
     */
    GUI.$btnSubmit.click(() => {

        let name = $('input[name="name"]').val();
        let phoneNumber = $('input[name="phone-number"]').val();

        $.get(`/src/test.php?name=${name}&phone=${phoneNumber}`);

        GUI.$form.empty();
        GUI.$form.append(`<img src="/public/images/smile.png" alt="Улыбка" 
                               style="margin-bottom: 10px; width: 100px">
                          <span class="message">Спасибо за заявку ${name}!</span>
                          <button id="button-close">Закрыть</button>`);


        //Обработчик на кнопку закрыть которая появляется после отработки ajax запроса
        $('#button-close').on('click', () => {
            GUI.$modalWindow.attr({style: "display: none"});
        });
    });

});