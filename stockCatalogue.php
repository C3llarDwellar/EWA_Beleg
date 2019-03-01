<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- bootstrap integration -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="resources/scripts/css/main-container-padding.css">
    <!--jquery integration-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

    <!-- login -->
    <script src="javascript/logIn.js"></script>
    <script src="resources/scripts/js/md5.min.js"></script>

    <title>Stock Catalogue</title>
</head>
<body>


<?php

if ($_SERVER['PHP_AUTH_USER'] !== 'admin' && $_SERVER['PHP_AUTH_PW'] !== '123456') {
    header('WWW-Authenticate: Basic realm="Admin Page"');
    header('HTTP/1.0 401 Unauthorized');
    echo "There was an error";
    exit;
}
?>


<!--navbar header-->
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <div class="container">
        <!-- brand -->
        <a class="navbar-brand">Bookstore</a>

        <!-- toggle button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">

            <!-- left elements -->
            <ul class="navbar-nav mr-auto">
                <!-- home-button -->
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>

                <!-- dropdown-menu -->
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenu" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Future Tasks</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
                            <a class="dropdown-item" href="#">A future task</a>
                            <a class="dropdown-item" href="#">Another task</a>
                            <a class="dropdown-item" href="#">Yet one more task</a>
                        </div>
                    </div>
                </li>
            </ul>

            <!-- right elements -->
            <ul class="navbar-nav ml-auto">
                <!-- login button -->
                <li class="nav-item">
                    <!-- login button -->
                <li class="nav-item">
                    <button type="button" class="btn btn-light" id="btnLogIn" data-toggle="modal" data-target="#logInModal">
                        Log in
                    </button>
                </li>

                <!-- registration button -->
                <li class="nav-item">
                    <a href="signUp.html">
                        <button type="button" class="btn btn-light" id="btnSignUp">
                            Sign Up
                        </button>
                    </a>
                </li>
                </li>
            </ul>
        </div>
    </div>
</nav>


<main class="container">
    <h3>Current Stock</h3>
    <div class="row">
        <div class="col-9">
            <span>Title</span>
        </div>
        <div class="col-1">
            <span>Stock</span>
        </div>
        <div class="col-1">
            <span>Price</span>
        </div>
        <div class="col-1">
            <span>Total</span>
        </div>
    </div>
</main>


<!--footer-->
<!--"fixed-bottom" can be added-->
<footer class="footer bg-light">
    <div class="container text-muted text-center">
        <div class="row">
            <div class="col-4">
                <a href="contact.html">Imprint</a>
            </div>
            <div class="col-4">
                <span>E-Mail:
                    <a href="mailto:someone@example.com">totalEchte@adresse.de</a>
                </span>
            </div>
            <div class="col-4">
                <span>&copy; Copyright:
                    <a href="https://www.htw-dresden.de/startseite.html">HTW Dresden</a>
                </span>
            </div>
        </div>
    </div>
</footer>

<script>
    let htmlString = "";
    let main = $('main');

    $(document).ready(function () {
        $.ajax({
            url: 'php/htmlGeneration.php',
            type: 'GET',
            data: {action: 'stockInit'},
            success: function (data) {
                htmlString = data;
                main.append(htmlString);
            }
        });
    });
</script>

</body>
</html>