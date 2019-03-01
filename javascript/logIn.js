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
            } else {
                resultDiv.append("Username or Password incorrect.");
                returnValue = "failure";
            }
        }
    });
    checkCartAmount();
    return returnValue;
}

function logOut() {
    sessionStorage.removeItem('uid');
    createLoginButton();
    checkCartAmount();
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
            checkCartAmount();
        }
    });
}