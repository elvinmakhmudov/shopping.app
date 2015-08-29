(function ($) {
    var module = {
       init: function (data) {
           this.container = data.container;
           this.effect = data.effect;
           this.speed = data.speed || 200;
           this.toggleClass = data.toggleClass;
           this.subMenu = data.subMenu;
           this.when = data.when;
           this.done = data.done;
           this.doEffect();
       },
       doEffect: function () {
           var self = this;
           this.container[self.when](function (e) {
                var child;
                e.preventDefault();

                child = $(this).children(self.subMenu);

                child[self.effect](self.speed);

                child[self.when](function(e) {
                    e.stopPropagation();
                })
           });
       }
    }

    module.init({
       container: $('.parent'),
       subMenu: 'ul',
       effect: 'slideToggle',
       speed: 400,
       toggleClass: 'active',
       when: 'click'
    });

    $.material.init();

    $('.parent').children('ul').hide();
})(jQuery)