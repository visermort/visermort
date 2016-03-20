var application = (function (){   
      var init = function(){    //начальная инициализация
        setEvents();
      };//init
  
         //устанвка отклика на события
      var setEvents = function (){
           $('.form-message').on('submit',submitFormMessage); //нажатие submit - форме сообщение
           $('.form-add-project').on('submit',submitFormAddPorject);// submit - форма добавления проекта
           $('.form-register').on('submit',doRegister); //нажатие submit - форма логин
           $('.form-message').on('reset',clearValidate); //нажатие reset - на форме сообщение
           $('.validate').on('keyup',checkElementTyped); //нажатие на клавишу - проверка заполнения полей ввода
       //    $('.g-recaptcha').on('click',inputCaptchaErrorOff);//нажатие на капчу - выключаем тултип
           $('.login-area').on('click',doLogin);           //переход на форму логин
           $('.page-add-link').on('click',doAddProgect);//нажатие - добавление проекта
           $('.page-add-project__close-button').on('click',cancelOtherForm);//нажате формы закрытия окна добавления проекта
           $('.form-add-project__image-file').on('change',inputFileChange);//изменение input type="file"  добавления проекта
           $(document).on('keydown',handleKeyDown);//отслеживание нажатии клавиши - в нашем слчае отслеживаем Escape для закрытия модальных окон
            $('.social-item.menu-button').on('click',showTopMainMenu);//кнопка - открывается главное меню мобильной версии
          $(window).on('resize',windowResize);//при изменениии размера экрана,

      };

     //нажатие клавиши на форме
      var handleKeyDown = function(event) {
          var keyCode = event.keyCode;
          if (keyCode===27) {
          cancelOtherForm();
          } //если escape то закрываем форму логин
      };


        //показ выполнения операций с сервером
        var showResult = function(res) {
    //        console.log(res);
            popup.show(res);
        };

        //регистрация      
      var doRegister = function(form) {
         // alert("Регистрация");
          form.preventDefault();  //отменяем стандартные отработки
          // console.log('начало регистрации');
          if (!validateForm($(this),false)) { //если не все поля заполнены, то предупреждение и выход (красных полей и тултипов не нужно)
              alert ("Не заполнены все обязательные поля!");
              return false;
          }//форма заполнена - пошли дальше
          var content = $(this).serialize();
   //       console.log(content);
          sendAjax("php/register.php",content,
             function(ans){
              //    console.log("Данные на сервер отправлены!");
                //  console.log(ans);
                  showResult(ans);
            },function(ans){
               //   console.log("Ошибка при передаче данных на сервер!");
                //  console.log(ans);
                  showResult(ans);
            });
         cancelOtherForm();
      };

        //при выборе файла добавления проекта
      var inputFileChange = function () {
          var str = 'C:\\fakepath\\', 
              val = $(this).val(),
              label = $(this).siblings('.add-project-image'),
              index = val.indexOf(str);         
          if (index>=0){val = val.substr(index+str.length);}
          label[0].innerText = val;  
          showError(label,false);//снимаем рамку и тултип   
      };
        //показ красной рамки и  тултипа
        //elem - передаём поле ввода и показать/скрыть, внутри ищём <div> с тултипом делаем видимым/невидимым
      var showError = function(elem,show){ 
         if (elem[0].name=='image') {elem = elem.siblings('.add-project-image');} //если инпут выбора файла, то нужен не сам элемент, соседний
         if(show){                                          
          elem.addClass('error');
          elem.siblings('.tooltip').show();
          }else{ 
           elem.removeClass('error'); 
           elem.siblings('.tooltip').hide();
         }
      };

        //очистка всех ошибок на форме сообщений
      var clearValidate = function(){
        var inputs = $('.send-message__input');   
         $.each(inputs,function(index){
              showError($(inputs[index]),false);
         });
      };

        //функция валидации универсальная  show - если thue, то ошибку показать красным и тултипами иначе просто валидация
      var validateForm = function(form,show){
         var inputs = form.find('.validate'),
             res = true;
        // console.log("Начало валидации")     
        // console.log(form);     
        // console.log(form.serialize()) ;     
        $.each(inputs,function(index, val){
            var content = $(val).val().trim();
            // console.log(content);
            if(content.length === 0){
              if (show) {showError($(this),true);}
              res = false;
              } else {
              if (show) {showError($(this),false);}
             }
           });  
        // console.log("Конец валидации")     
        return res;
      };

       // нажатие submit на форме отправки сообщения
      var submitFormMessage = function(e){
      	e.preventDefault();  //отменяем стандартные отработки
        //получена ли рекапча, тоже будем проверять для этого ответ рекапчи перепишем в поле кода
         var response = grecaptcha.getResponse();
         $(this).find('.input-captcha')[0].value = response;

        if (validateForm($(this),true)){
          //валидация прошла  - отправляем письмо
          //if(checkCaptcha($(this))) {
           sendMail($(this));//};
        }else{
          //alert('Ошибка валидации');
        }
      	};

       //нажатие submit на форме добавленмя проекта
       var submitFormAddPorject = function (form){
          form.preventDefault();  //отменяем стандартные отработки
          if (validateForm($(this),true)){
              var formData = new FormData($('form')[1]);
              console.log('Начинаем отправку');
                  console.log(formData);
              $.ajax({
                  type: "POST",
                  processData: false,
                  contentType: false,
                  url: "php/addproject.php",
                  data: formData
              }).done(function(ans){
                 if (ans.stat) {//успех
                      location.reload();//перезагрузить страницу, и увидим, что данные отправлены
                 } else {
                     showResult(ans);
                 }
              }).fail(function(ans){
                  showResult(ans);
              });
              } else{  return false;}
       };

       //ввод текста в поле ввода
         var checkElementTyped = function(e){
      	 	 var element = e.target,
      	 	   content = element.value.trim();
   //          console.log(element+'  '+$(this));
      	 	 if (content.length > 0) {
      	// 	 	$(this).removeClass('error');
            showError($(this),false);
     	 	 }
      	 };

         //   //при клике на капчу находим инпут ввода капчи, уничтожаем его текст и запустм проверку
         //var inputCaptchaErrorOff = function() {
         //    console.log('клик на капчу')
         //    var input=$(document).find('.input-captcha');
         //    input[0].value = '';
         //    showError(input[0],false);
         //}

          //отпрaвка данных на сервер через Ajax
        var sendAjax = function (url,data,onDone,onFail) {
            $.ajax({url:url,type:"POST",dataType: "json",data:data
            }).done(onDone).fail(onFail);
        };

          //отправка почты
         var sendMail = function(form){
            var content = form.serialize();
          //  console.log(content);
            sendAjax("php/sendmessage.php",content,
             function(ans){
               //   console.log("Связь с сервером установлена!");
               //   console.log(ans);
                  showResult(ans);
            },function(ans){
               //   console.log("Ошибка связи с сервером!");
               //   console.log(ans);
                  showResult(ans);
            });
          };//sendmail

        //форма логин
      	 var doLogin = function(e){
         e.preventDefault();  //отменяем стандартные отработки
         $('.wrapper').hide();
     //    $('.footer').hide();
         $('.form-login').show();
       	 };

        //форма логин и добавление проекта- закрытие
         var cancelOtherForm = function(){
         $('.wrapper').show();
       //  $('.footer').show();
         $('.form-login').hide();
         $('.page-add-project').hide();
      };

        //формо добавление проекта
        var doAddProgect = function(e){
        e.preventDefault();  //отменяем стандартные отработки
        $('.wrapper').hide();
        $('.page-add-project').show();
        };//doAddProgect

        var showTopMainMenu = function (e){
            e.preventDefault();
            var menu = $('.nav.topmenu'),
                visible = menu.is(":visible");
            if (visible) {
                menu.stop(true,true).fadeOut(500);
            }else {
                menu.stop(true,true).fadeIn(500);
            }
        };

        var windowResize = function (e){
            var menuButton = $('.social-item.menu-button'),
                menu = $('.nav.topmenu');
            if (!menuButton.is(":visible")) {
                menu.stop(true,true).fadeOut(500);
            }
        };


return {
	init:init
}

}());  //var application = (function () при проходе сразу запустится

$(document).ready(function(){
		application.init();
});

var popup = function () {

    showPopup = function(res) {
        var popup = $('.popup'),
            popupMess = $('.popup__text'),
            popupText = '',
            fadeTime=600,
            charWidth = 10;
  //      console.log(res);
  //      console.log(popup);
        if (res.stat) {
            popup.removeClass('popuperror');
            popupText = res.text || 'Success';
        }else {
            popup.addClass('popuperror');
            console.log(res);
            popupText = res.text || 'Error';
        }
        popupMess.text(popupText);
        popup.width(popupText.length * charWidth + 20);
      //  popup.fadeTo(fadeTime,1 );

            function popupHide() {
                popup.width(0);
       //         popup.fadeTo( fadeTime, 0);
            }
        setTimeout(popupHide, 3000);

    };


    return {
        show: showPopup
    }
}();