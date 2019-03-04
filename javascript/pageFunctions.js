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
});