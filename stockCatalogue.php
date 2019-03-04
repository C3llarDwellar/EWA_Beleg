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
    <link rel="stylesheet" href="resources/css/main-container-padding.css">
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

    <!-- encryption -->
    <script src="javascript/md5.js"></script>

    <!-- cart -->
    <script src="javascript/cartInteraction.js"></script>

    <!-- overall functionality -->
    <script src="javascript/pageFunctions.js"></script>

    <!-- Google API -->
    <script src="javascript/googleBooks.js"></script>

    <title>Stock Catalogue</title>
</head>
<body>


<!-- navbar header -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <!-- brand -->
        <a class="navbar-brand">Bookstore</a>

        <!-- toggle button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">

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

                <!-- administration -->
                <li id="adminArea" class="nav-item">

                </li>
            </ul>

            <!-- right elements -->
            <ul class="navbar-nav ml-auto">
                <!-- cart -->
                <li class="nav-item">
                    <button type="button" class="btn btn-light" id="cartButton" data-toggle="modal" data-target="#cartModal">
                    </button>
                </li>

                <!-- login button -->
                <li class="nav-item" id="logInLi">
                </li>

                <!-- registration button -->
                <li class="nav-item">
                    <a href="signUp.html">
                        <button type="button" class="btn btn-light" id="btnSignUp">
                            Sign Up
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--dialog form for logging in-->
<div class="modal fade" role="dialog" id="logInModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Log In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- actual form for logging in -->
                <form id="logInForm" action="javascript:logIn();">
                    <!-- username -->
                    <div class="form-group">
                        <label for="logInFormUser">Username</label>
                        <input type="text" name="user" class="form-control" id="logInFormUser" minlength="2" required>
                    </div>
                    <!-- password -->
                    <div class="form-group">
                        <label for="logInFormPassword">Password</label>
                        <input type="password" name="password" class="form-control" id="logInFormPassword" minlength="2" required>
                    </div>

                    <input type="submit" value="Log In">
                </form>

                <div class="row" id="logInFormResult"></div>
            </div>
        </div>
    </div>
</div>

<!-- Cart Modal -->
<div class="modal fade" role="dialog" id="cartModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Shopping Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="cartContent"></div>
            </div>
        </div>
    </div>
</div>

<div class="container top-container">
    <div class="row">
        <div class="col-xl-8 col-lg-4 col-md-12">
            <h3>Current Stock</h3>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12">
            <button type="button" class="btn btn-outline-secondary btn-block" id="btnDetails">Toggle Details</button>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12">
            <button type="button" class="btn btn-outline-secondary btn-block" id="btnLayout">Change Layout</button>
        </div>
    </div>
</div>

<main class="container bottom-container">

</main>


<!--footer-->
<!--"fixed-bottom" can be added-->
<footer class="footer bg-light fixed-bottom">
    <div class="container text-muted text-center">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <a href="contact.html">Imprint</a>
            </div>
            <div class="col-lg-4 col-sm-12">
                <span>E-Mail:
                    <a href="mailto:someone@example.com">totalEchte@adresse.de</a>
                </span>
            </div>
            <div class="col-lg-4 col-sm-12">
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
    let buttonLayout = $('#btnLayout');
    let buttonInfo = $('#btnDetails');
    let infoToggle = 0;
    let layout = "rows";

    $(document).ready(function () {
        $.ajax({
            url: 'php/htmlGeneration.php',
            type: 'GET',
            data: {
                action: 'stockInit',
                parameter1: infoToggle,
                parameter2: layout
            },
            success: function (data) {
                htmlString = data;
                main.append(htmlString);
            }
        });

        buttonInfo.click(function () {
            if (infoToggle === 0) {
                infoToggle = 1;
            } else {
                infoToggle = 0;
            }

            $.ajax({
                url: 'php/htmlGeneration.php',
                type: 'GET',
                data: {
                    action: 'stockInit',
                    parameter1: infoToggle,
                    parameter2: layout
                },
                success: function (data) {
                    htmlString = data;
                    main.empty();
                    main.append(htmlString);
                }
            });
        });

        buttonLayout.click(function () {
            if (layout === "rows"){
                layout = "grid";
            } else {
                layout = "rows";
            }

            $.ajax({
                url: 'php/htmlGeneration.php',
                type: 'GET',
                data: {
                    action: 'stockInit',
                    parameter1: infoToggle,
                    parameter2: layout
                },
                success: function (data) {
                    htmlString = data;
                    main.empty();
                    main.append(htmlString);
                }
            });
        });
    });
</script>

</body>
</html>