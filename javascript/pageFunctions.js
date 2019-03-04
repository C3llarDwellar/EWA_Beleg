$(document).ready(function () {
    let loginSubmit = $('#logInButton');

    createLoginButton();
    if (sessionStorage.getItem('uid') !== null) {
        createLogoutButton();
    }

    checkCartAmount(sessionStorage['uid']);

    loginSubmit.on('click', function () {
        logIn();
    });

    $('#cartButton').on('click', function() {
        fillCartModal();
    });

    admin();

    let biggerFontButton = $('#fontPlus');
    let normalFontButton = $('#fontNormal');
    let smallerFontButton = $('#fontMinus');

    biggerFontButton.on('click', function () {
        $('nav').css("font-size", "150%");
        $('footer').css("font-size", "150%");
        $('main').css("font-size", "150%");
        $('.modal').css("font-size", "150%");
    });

    normalFontButton.click(function () {
        $('nav').css("font-size", "100%");
        $('footer').css("font-size", "100%");
        $('main').css("font-size", "100%");
        $('.modal').css("font-size", "100%");
    });

    smallerFontButton.click(function () {
        $('nav').css("font-size", "50%");
        $('footer').css("font-size", "50%");
        $('main').css("font-size", "50%");
        $('.modal').css("font-size", "50%");
    })
});