function logIn() {
    let username = $('#logInFormUser').val();
    let password = $('#logInFormPassword').val();

    let passHash = md5(password);
    let resultDiv = $('#logInFormResult');
    $.ajax({
        url:'php/logIn.php',
        type: 'POST',
        data: {user: username, password: passHash},
        success: function (data) {
            resultDiv.empty();

            if (data) {
                resultDiv.append("Success");
            } else {
                resultDiv.append("Username or Password incorrect.")
            }
        }
    })
}