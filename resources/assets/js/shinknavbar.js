window.onscroll = function () {
    var navbarUnderTop = document.getElementById('navbar-under-top');
    if(navbarUnderTop != null) {
        if(document.body.scrollTop  > 50 || document.documentElement.scrollTop > 50) {
            navbarUnderTop.classList.add('shink_navbar');
        } else if (document.body.scrollTop  <= 50 || document.documentElement.scrollTop <= 50) {
            navbarUnderTop.classList.remove('shink_navbar');
        }
    }
};