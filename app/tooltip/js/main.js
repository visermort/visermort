/**
 * Created by Spartak on 27.02.2016.
 */
var tooltip = require('./modules/tooltip.js');

$(document).ready(function() {

        $('.form-login').show();
        $(document).on('click',function() {
            $('.tooltip').hide();
        });

        if($('.popup').length) {
            Popup.init();
        };
        $('.form-register').on('submit', function(e) {
            e.preventDefault();
            //$('.register-input').tooltip({  //для массива элементов вызываем метод
            //    position: 'left',
            //    content: 'Нужно ввести данные'
//        });
            form = $(this);
            if (validateThis(form)) {
                //console.log('Валидация прошла');
                postFormData(form,function(data){
                    var popup = data.status ? '#success' : '#error';
                    $(popup).bPopup();//вариант с bPopup
                    //  Popup.open(popup);//свой вариант для своего варианта нужна нормальная вёрстка
                });
            } else {
                console.log('Валидация не прошла!!!');
            }

        });
});//ready

var Popup = function () {
    var popups = $('.popup');

    function _close() {
        popups.hide();
    }
    return {
        init: function(){
            $('.popup').on('click',function(e){
                e.preventDefault();
                _close();
            });
        },
        open: function (id){
            var regPopup = popups.filter(id);
            _close();
            regPopup.fadeIn(300);
        }

    }

}();

function postFormData(form,successFunction) {//отправка сообщения через айакс
    var host = form.attr('action'),
        reqFields = form.find('[name]'),
        dataObj = {};

    if (!host) {
        console.log('Не заполнен атрибут Action!');
    }
    reqFields.each(function(){
        var $this = $(this),
            value=$this.val(),
            name=$this.attr('name');
        dataObj[name]=value;
    });
   // console.log(dataObj);
    $.post(host,dataObj,successFunction);
}


function validateThis(form) {
    var validationMethod = {
        text : function ($this) {
            var notEmptyField = !!$this.val();
            if (notEmptyField) {
                $this.removeClass('error');
            } else {
                $this.tooltip({
                    content : 'Заполните поле',
                    position: 'left'
                });
                $this.addClass('error');
            }
        },
        email : function ($this) {
            var regExp =/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/,
                isMail = regExp.test($this.val());
            if (isMail) {
                $this.removeClass('error');
            } else {
                $this.tooltip({
                    content: 'Неправильный email',
                    position: 'right'
                });
                $this.addClass('error');
            }
        }
    }
    form.find('.validate').each(function(){
        var $that = $(this),
            type =$that.data('validation');

        validationMethod[type]($that);
    });
    //console.log(form.find('.error'));
    return !(form.find('.error').length);
}






