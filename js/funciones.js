posicionarMenu();
$(window).scroll(function() {
    posicionarMenu();
});
function posicionarMenu() {
    var altura_del_menu = $('.navbar-expand-lg').outerHeight(true);
    if ($(window).scrollTop() >= altura_del_header) {
        $('.navbar-expand-lg').addClass('fixed');
    } else {
        $('.navbar-expand-lg').removeClass('fixed');
    }
}