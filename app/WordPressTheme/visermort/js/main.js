var application = (function (){   
      var init = function(){    //начальная инициализация
        setEvents();
      };//init
  
         //устанвка отклика на события
      var setEvents = function (){
          jQuery('.social-item.menu-button').on('click',showTopMainMenu);//кнопка - открывается главное меню мобильной версии
          jQuery(window).on('resize',windowResize);//при изменениии размера экрана,

      };

        var showTopMainMenu = function (e){
            e.preventDefault();
            var menu = jQuery('.nav.topmenu'),
                visible = menu.is(":visible");
            if (visible) {
                menu.stop(true,true).fadeOut(500);
            }else {
                menu.stop(true,true).fadeIn(500);
            }
        };

        var windowResize = function (e){
            var menuButton = jQuery('.social-item.menu-button'),
                menu = jQuery('.nav.topmenu');
            if (!menuButton.is(":visible")) {
                menu.stop(true,true).fadeOut(500);
            }
        };


return {
	init:init
}

}());  //var application = (function () при проходе сразу запустится

jQuery(document).ready(function(){
		application.init();
});

