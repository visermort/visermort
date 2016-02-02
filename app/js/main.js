var application = (function (){   
      var setEvents = function(){    //отслеживаем события
           $('.button-submit').on('click',checkElementsEmpty); //нажатие submit - форме сообщение
           $('.send-message__input').on('keyup',checkElementTyped); //проверка заполнения полей ввода
           $('.login-area').on('click',doLogin);           //переход на форму логин
           $('.register-submit').on('click',doRegister); //нажатие submit - форма логин
           $('.page-add-link').on('click',doAddProgect);//нажатие - добавление проекта
           $('.page-add-project__close-button').on('click',cancelOtherForm);//нажате формы закрытия окна добавления проекта

         document.addEventListener('keydown',handleKeyDown);//отслеживание нажатии клавиши

      };//setEvents
     
       //нажатие клавиши на форме     
      var handleKeyDown = function(event) {
          var keyCode = event.keyCode;
          if (keyCode===27) {  
          cancelOtherForm(); 
          }; //если escape то закрываем форму логин
      };
        //регистрация      
      var doRegister = function(e) {
        e.preventDefault();  //отменяем стандартные отработки
        alert('Процедура регистрации');
        cancelLogin();
      };

     // нажатие submit на форме отправки сообщения
      var checkElementsEmpty = function(e){
      	e.preventDefault();  //отменяем стандартные отработки
      	var form = $(this),
        inputs = document.getElementsByClassName('send-message__input');        
      	 $.each(inputs,function(index, val){
      	 		var content = $(val).val().trim();
      	 		if(content.length === 0){
      	 		//	console.log($(this).name);
      	 			$(this).addClass('error');
      	 		} else {$(this).removeClass('error');}
      	 $('.error').qtip({
      	 	conent: {text: 'Введите данные'}
      	 });	
      	 showTips();
      	});
      };

       //ввод текста в поле ввода
         var checkElementTyped = function(e){
      	 	 var element=e.target;
      	 	   content = element.value.trim();
   //          console.log(element+'  '+$(this));
      	 	 if (content.length > 0) {
      	 	 	$(this).removeClass('error');
     	 	 };
      	 };


      	 var showTips = function() {
      	 $('.error').qtip({
      	 	position : {
      	 		my: 'right middle',
      	 		at: 'left middle'	
      	 		// tooltip: 'rightMiddle',
				// viewport: $(window)
				// }      //corner	 	
        	 	}, //position
      	 	 corner: { 
       	 		target: 'right center'
       	 	     },
			style: {
      	 		classes: 'qtip-customclass',
      	 		tip: {corner: 'right center'}
      	 	}

      	 });
      	 };
        
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




return {
	init:setEvents
}

}());  //var application = (function () при проходе сразу запустится

$(document).ready(function(){
		application.init();
});

// //Катин код
//     $('#project-file').change(function() {   //input
//         var t = $(this).val();
//         if (t.indexOf('C:\\fakepath\\') + 1) {
//             t = t.substr(12) };
//         var e = $(this).siblings('.project-upload-input'); //label
//         e.html(t);
//     });
