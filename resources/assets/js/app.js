(function ($) {
    //$('.menu-item').hover(function (e) {
    //    $(this).children('.sub-menu').stop().fadeIn(200);
    //}, function () {
    //    $(this).children('.sub-menu').stop().fadeOut(200);
    //});

var module = {
    init: function (data) {
        this.container = data.container;
        this.effect = data.effect;
        this.speed = data.speed || 200;
        this.toggleClass = data.toggleClass;
        this.subMenu = data.subMenu;
        this.doEffect();
    },
    doEffect: function () {
        var self = this;
            // this.container.on('click', function (e) {
            //     var inner = this;
            //     //toggle class 'active'
            //     $(this).children().first().toggleClass(self.toggleClass);

            //     //find the submenu class and toggle the given effect
            //     $(this).children('.sub-menu').stop()[self.effect](self.speed);

            //     var fn = function (e) {
            //         $(inner).children().first().toggleClass(self.toggleClass);
            //         $(inner).children().last().stop()[self.effect](self.speed);
            //         $(inner).removeEventListener('mouseout', fn);
            //     }
                // $(this).on('mouseout', fn);
            //     e.preventDefault();
            // });
        this.container.hover(function (e) {
            $(this).children().first().toggleclass(self.toggleclass);
            $(this).children().last().stop()[self.effect](this.speed);
        }, function () {
            $(this).children().first().toggleclass(self.toggleclass);
            $(this).children().last().stop()[self.effect](this.speed);
        });
    }
}

module.init({
    container: $('.menu-item'),
    subMenu: $('.sub-menu'),
    effect: 'slideToggle',
    speed: 200,
    toggleClass: 'active'
});

})(jQuery)