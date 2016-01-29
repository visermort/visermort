var application = (function (){   
      var setEvents = function(){    //отслеживаем события
           $('.button-submit').on('click',checkElementsEmpty); //нажатие submit
           $('.send-message__input').on('keyup',checkElementTyped);
           $('.login-area').on('click',doLogin);

      };
     
      var checkElementsEmpty = function(e){
      	e.preventDefault();  //отменяем стандартные отработки
      	var form = $(this),
        inputs = document.getElementsByClassName('send-message__input');        
      	 $.each(inputs,function(index, val){
      	 		var content = $(val).val().trim();
      	 		if(content.length === 0){
      	 			console.log($(this).name);
      	 			$(this).addClass('error');
      	 		} else {$(this).removeClass('error');}
      	});
      };


         var checkElementTyped = function(e){
      	 	 var element=e.target;
      	 	   content = element.value;//.trim();
      	 	 if (content.length > 0) {
      	 	 	$(this).removeClass('error');
      	 	 };
      	 };

      	 var doLogin = function(){
      	 	alert('login');
      	 };




return {
	init:setEvents
}

}());  //при проходе сразу запустится

$(document).ready(function(){
		application.init();
});


