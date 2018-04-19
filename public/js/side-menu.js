
function toggleNav() {
    var sideMenu = document.getElementById('side-menu');
    var mainContent = document.getElementById('main-content');

    if(sideMenu.style.width) {
         sideMenu.style.width = null;
         mainContent.style.marginLeft = "0";
    } else {
        sideMenu.style.width = "250px";
        mainContent.style.marginLeft = "250px";
    }

}