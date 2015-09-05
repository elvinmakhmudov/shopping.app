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

                child[self.triggerOn](function (e) {
                    e.stopPropagation();
                })

                if (self.done) {
                    self.done.call(this);
                }
            });
        }
    };

    var hoverModule = {
        init: function (data) {
            this.container = data.container;
            this.subMenu = data.subMenu;
            this.speed = data.speed;
            this.triggerOn = data.triggerOn;
            this.doEffect();
        },
        doEffect: function () {
            var self = this;
            this.container[self.triggerOn](function (e) {
                e.preventDefault();
                $(this).children(self.subMenu).stop(true).animate({
                    left: "100%",
                    opacity: 1
                }, self.speed);
            }, function (e) {
                $(this).children(self.subMenu).stop(true).animate({
                    left: "0%",
                    opacity: 0
                }, self.speed);
            });
        }
    };


        //module.init({
        //    container: $('.parent'),
        //    subMenu: 'ul',
        //    effect: 'slideToggle',
        //    speed: 400,
        //    toggleClass: 'active',
        //    triggerOn: 'click',
        //    done: function () {
        //        //toggle caret class
        //        $(this).find('>a>.caret-right').toggleClass('caret-right-down')
        //    }
        //});


    (function () {
        var bigScreenAdopted = false;
        $(window).resize(function () {
            if ($(this).width() >= 1280) {
                if (!bigScreenAdopted) {
                    $('.parent3').unbind('click');
                    // call supersize method
                    hoverModule.init({
                        container: $('.parent3'),
                        subMenu: '.subcategory3',
                        speed: 300,
                        triggerOn: 'hover'
                    });
                    bigScreenAdopted = true;
                }
            } else {
                if (bigScreenAdopted) {
                    $('.parent3').unbind('mouseenter mouseleave');
                    module.init({
                        container: $('.parent3'),
                        subMenu: '.subcategory2',
                        effect: 'slideToggle',
                        speed: 400,
                        toggleClass: 'active',
                        triggerOn: 'click',
                        done: function () {
                            //toggle caret class
                            console.log(1);
                            $(this).find('>a>.caret-right').toggleClass('caret-right-down')
                        }
                    });
                    bigScreenAdopted = false;
                }
            }
        });
    }());


    $(window).resize();

    $.material.init();

})(jQuery);