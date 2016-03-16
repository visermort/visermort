/**
 * Created by Spartak on 28.02.2016.
 */
$.fn.tooltip = function(options) { //в массив всех методов добавили свой метод tooltip

    var TooltipsModule = (function() {
        options ={
            position : options.position ||'left',
            content : options.content || 'I am tooltip'
        }; //или то что передали, или по умолчанию -

        var generateMarkup = function(options) {  //создание кода
            var markup = '<div class="tooltip tooltip_' + options.position + '">    \
                                        <div class="tooltip_inner"> '+ options.content +' </div> \
                                              </div>   ';
            return markup;
        };

        var positionIt = function(element, currentTooltip, position) {  //позиционирование

            var ElementPosition = function (elem){
                this.width = elem.outerWidth(true);//ширина элемента с маргинами, паддинами, бордером
                this.height = elem.outerHeight(true);
                this.topEdge = elem.offset().top;
                this.bottomEdge = this.topEdge + this.height;
                this.leftEdge = elem.offset().left;
                this.rightEdge = this.leftEdge + this.width;
            };
            var TooltipPosition = function(tooltip) {
                var elem = new ElementPosition(element);  //снова вызывается , как в стоке 52, ч
                this.height = tooltip.outerHeight(true);
                this.width = tooltip.outerWidth(true);
                this.leftCentered = (elem.width / 2) - (this.width /2);
                this.topCentered = (elem.height / 2) - (this.height /2);

            };
            var tooltipPosition ={};
            var elementPosition = new ElementPosition (element);  //получаем координаты элемента - объект (смотрим, потом ещё раз будет вызыватся в стоке 44
            var tooltipPos = new TooltipPosition(currentTooltip);  //получаем координаты характеристики тултипа
            switch (position) {                                     //создаём позиции тултипа
                case 'right' :
                    tooltipPosition = {
                        left: elementPosition.rightEdge,
                        top: elementPosition.topEdge + tooltipPos.topCentered
                    };
                    break;
                case 'bottom' :
                    tooltipPosition = {
                        left: elementPosition.leftEdge + tooltipPos.leftCentered,
                        top: elementPosition.bottomEdge
                    };
                    break;
                case 'top' :
                    tooltipPosition = {
                        left: elementPosition.leftEdge + tooltipPos.leftCentered,
                        top: elementPosition.topEdge - tooltipPos.height
                    };
                    break;
                case 'left' :
                    tooltipPosition = {
                        left: elementPosition.leftEdge - tooltipPos.width,
                        top: elementPosition.topEdge + tooltipPos.topCentered
                    };
                    break;
            }
            currentTooltip                                                  //для тултипа задаём свойства
                .offset(tooltipPosition)
                .css('opacity','1')
                .show()

        };//positionIt


        return {
            init: function ($this){
                var markup = generateMarkup(options);  //создаём сам html код
                var body = $('body');
                $('body').append(markup);               //вставляем его на страницу
                positionIt($this,body.find('.tooltip').last(),options.position);  //позиционируем его

            }
        }

    })();//tooltipsmodule
    $(this).each(function(){  //для каждого элемента массива вызываем публичный метод объекта TooltipModule передаём элемент
        return TooltipsModule.init($(this));
    });

};
