(function ($) {
    var module = {
     init: function (data) {
         this.container = data.container;
         this.effect = data.effect;
         this.speed = data.speed || 200;
         this.toggleClass = data.toggleClass;
         this.subMenu = data.subMenu;
         this.triggerOn = data.triggerOn;
         this.done = data.done;
         this.doEffect();
     },
     doEffect: function () {
         var self = this;
         this.container[self.triggerOn](function (e) {
            var child;
            e.preventDefault();

            child = $(this).children(self.subMenu);

            child.stop(true)[self.effect](self.speed);

            child[self.triggerOn](function(e) {
                e.stopPropagation();
            })

            if ( self.done ) {
                self.done.call(this);
            }
        });
     }
 }

 module.init({
     container: $('.parent'), 
     subMenu: 'ul',
     effect: 'slideToggle',
     speed: 400,
     toggleClass: 'active',
     triggerOn: 'click',
     done: function() {
                //toggle caret class 
                $(this).find('>a>.caret-right').toggleClass('caret-right-down')
            }
        });

 $.material.init();

 $('.parent3').hover(function(e) {
     // e.stopPropagation();
     $(this).children('.subcategory3').animate({
        left: "100%"
    }, 300);
 }, function(e) {
     // e.stopPropagation();
     $(this).children('.subcategory3').animate({
        left: "0%"
    }, 100 );      
 });


})(jQuery)