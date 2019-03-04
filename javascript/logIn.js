function logIn() {
    let username = $('#logInFormUser').val();
    let password = $('#logInFormPassword').val();

    let passHash = md5(password);
    let resultDiv = $('#logInFormResult');

    let loginModal = $('#logInModal');
    let returnValue;
    $.ajax({
        url:'php/logIn.php',
        type: 'POST',
        data: {user: username, password: passHash},
        success: function (data) {
            resultDiv.empty();

            if (data !== "unknown user" && data !== "password incorrect") {
                sessionStorage.setItem('uid', data);
                returnValue = "success";
                loginModal.modal('hide');
                console.log("login successful");
                createLogoutButton();
                admin();
            } else {
                resultDiv.append("Username or Password incorrect.");
                returnValue = "failure";
            }
        }
    });
    checkCartAmount(sessionStorage['uid']);
    return returnValue;
}

function logOut() {
    sessionStorage.removeItem('uid');
    createLoginButton();
    checkCartAmount(sessionStorage['uid']);
    $('#adminArea').empty();
}

function createLoginButton() {
    $.ajax({
        url: 'php/htmlGeneration.php',
        type: 'GET',
        data: {action: 'logIn'},
        success: function (data) {
            logInLi.empty();
            logInLi.append(data);
        }
    });
}

function createLogoutButton() {
    $.ajax({
        url: 'php/htmlGeneration.php',
        type: 'GET',
        data: {action: 'logOut'},
        success: function (data) {
            logInLi.empty();
            logInLi.append(data);
            checkCartAmount(sessionStorage['uid']);
        }
    });
}

function isUserAdmin() {
    console.log("isUserAdmin() called");
    let sessionId = sessionStorage.getItem('uid');
    let returnVal = 0;
    $.ajax({
        url: 'php/checkUserAdmin.php',
        type: 'POST',
        data: {uid: sessionId},
        success: function (data) {
            console.log(data);
            if (data === "true") {
                console.log("user is admin");
                returnVal = 1;
            }
        }
    });
    return returnVal;
}

function admin() {
    console.log("admin() called");

    let sessionId = sessionStorage.getItem('uid');
    let returnVal = 0;
    $.ajax({
        url: 'php/checkUserAdmin.php',
        type: 'POST',
        data: {uid: sessionId},
        success: function (data) {
            console.log(data);
            if (data === "true") {
                console.log("user is admin");
                $.ajax({
                    url: 'php/htmlGeneration.php',
                    type: 'GET',
                    data: {action: 'admin'},
                    success: function (data) {
                        let adminArea = $('#adminArea');
                        adminArea.empty();
                        adminArea.append(data);
                    }
                });
            }
        }
    });

    /**
    if (isUserAdmin() === 1) {
        console.log("received true");
        $.ajax({
            url: 'php/htmlGeneration.php',
            type: 'GET',
            data: {action: 'admin'},
            success: function (data) {
                $('#adminArea').append(data);
            }
        });
    }
     */
}