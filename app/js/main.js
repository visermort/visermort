var application = (function (){   
      var setEvents = function(){    //отслеживаем события
           $('.button-submit').on('click',checkElementsEmpty); //нажатие submit - форме сообщение
           $('.send-message__input').on('keyup',checkElementTyped); //проверка заполнения полей ввода
           $('.login-area').on('click',doLogin);           //переход на форму логин
           $('.register-submit').on('click',doRegister); //нажатие submit - форма логин

          document.addEventListener('keydown',handleKeyDown);//отслеживание нажатии клавиши

      };//setEvents
     
       //нажатие клавиши на форме     
      var handleKeyDown = function(event) {
      //  console.log(event);
          var keyCode = event.keyCode;
          if (keyCode===27) {  
        //  alert('закрываеа логин')
          cancelLogin(); 
          }; //если escape то закрываем форму логин
      };
        //регистрация      
      var doRegister = function(e) {
        e.preventDefault();  //отменяем стандартные отработки
        alert('Процедура регистрации');
        cancelLogin();
      };

     // нажатие submit
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
      	 var doLogin = function(){
      //	 	alert('login');
      //	 	$('#form-register').bPopup({
     // 	 		 modalClose: true
         $('.wrapper').hide();
     //    $('.footer').hide();
         $('.form-login').show();

      	// 	});//bpopup
      	 };
        //форма логин - закрытие
         var cancelLogin = function(){
         $('.wrapper').show();
       //  $('.footer').show();
         $('.form-login').hide();
        // alert('Закрываю логин')
      };





return {
	init:setEvents
}

}());  //var application = (function () при проходе сразу запустится

$(document).ready(function(){
		application.init();
});


