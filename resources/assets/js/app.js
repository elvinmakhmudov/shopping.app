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
                e.preventDefault();
                $(this).children(self.subMenu).stop(true).animate({
                    left: "0%",
                    opacity: 0
                }, self.speed);
            });
        }
    };

    (function () {
        //check if it is the first visit
        var firstVisit = true;
        //check if the menu is adopted for big screens
        var bigScreenAdopted = false;
        $(window).resize(function () {
            //for big screens
            if ($(this).width() >= 1280) {
                if (!bigScreenAdopted) {
                    $('.parent').unbind('click');
                    $('.parent>a').click(function(e) {
                        e.preventDefault();
                    });
                }
                if (firstVisit || !bigScreenAdopted) {
                    hoverModule.init({
                        container: $('.parent'),
                        subMenu: '.subcategory',
                        speed: 300,
                        triggerOn: 'hover'
                    });
                    bigScreenAdopted = true;
                    firstVisit = false;
                }
            } else {
                //for small screens
                if (bigScreenAdopted) {
                    $('.parent').unbind('mouseenter mouseleave');
                }
                if (firstVisit || bigScreenAdopted) {
                    module.init({
                        container: $('.parent'),
                        subMenu: '.subcategory-small',
                        effect: 'slideToggle',
                        speed: 400,
                        toggleClass: 'active',
                        triggerOn: 'click',
                        done: function () {
                            //toggle caret class
                            $(this).find('>a>.caret-right').toggleClass('caret-right-down')
                        }
                    });
                    bigScreenAdopted = false;
                    firstVisit = false;
                }
            }
        });
}());


$(window).resize();

$.material.init();

$('.slider').slick({
    infinite: true,
    autoplay: true,
    slidesToScroll: 1,
    autoplaySpeed: 2000,
    adaptiveHeight: true
});

})(jQuery);