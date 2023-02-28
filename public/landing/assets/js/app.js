

// navigation scroll
window.addEventListener('scroll', function() {
    if (window.scrollY > 100) {
        $('#nav').addClass('scroll-color');
        $('.point_nav').addClass('point_tbl_nav');
    } else {
        $('#nav').removeClass('scroll-color');
        $('.point_nav').removeClass('point_tbl_nav');
    }
    // console.log(window);
});
