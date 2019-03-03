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

    <title>Bookstore of Group G12</title>
</head>
<body>

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
                    <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
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
                <li class="nav-item">
                    <a class="nav-link" href="sites/stockCatalogue.php">Administration</a>
                </li>

                <li class="nav-item">
                    <form>
                        <input id="search" type="text" class="form-control" name="search" placeholder="Search..">
                    </form>
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
                    <a href="sites/signUp.html">
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
                <form id="logInForm" method="post">
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

                    <input type="button" class="btn btn-light" id="logInButton" value="Log In">
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


<!--detail view modal for products-->
<div class="modal fade" role="dialog" id="productDetailModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!--header contains the title and the close-button in the top right-->
            <div class="modal-header">
                <h5 class="modal-title">Hello, World!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--body of the base modal is empty except for some text for debugging-->
            <!--body will be filled when the modal ist called-->
            <div class="modal-body">
                <span>Data will be here</span>
            </div>
            <div class="modal-footer">
                <span>
                    <label id="cartAmount"></label>
                    <button type="button" class="btn btn-light" id="btnAddToCart">+</button>
                    <button type="button" class="btn btn-light" id="btnRemoveFromCart">-</button>
                </span>
            </div>
        </div>
    </div>
</div>


<!--main-->
<main class="container top-container bottom-container">
    <div class="row">
        <div class="col-9 text-justify" id="article">
            <h3>Main content section</h3>
        </div>
        <div class="col-3" id="aside">
            <h3 id="news">News section</h3>
            <!--lorem ipsum placeholder-->
            <span>Als nächstes muss es möglich sein, die Bücher zu bestellen.</span>
        </div>
    </div>
</main>


<!--footer-->
<!--"fixed-bottom" can be added-->
<footer class="footer bg-light">
    <div class="container text-muted text-center">
        <div class="row">
            <div class="col-4">
                <a href="sites/contact.html">Imprint</a>
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


<!--scripting-->
<script>
    let main = $('main');   //main body element
    let id;                 //articleID of the card that was clicked
    let product;            //product whose card is clicked and which calls the modal
    let htmlString = "";    //string that is filled with dynamic html

    let search = $('#search'); //search bar
    let searchString;       //what's in the search bar

    let addToCartButton = $('#btnAddToCart');
    let removeFromCartButton = $('#btnRemoveFromCart');

    let logInLi = $('#logInLi');
    let loginSubmit = $('#logInButton');

    $(document).ready(function () {
        $.ajax({
            url: 'php/htmlGeneration.php',
            type: 'GET',
            data: {action: 'init'},
            success: function (data) {
                htmlString = data;
                $('#article').append(htmlString)
            }
        });

        createLoginButton();
        if (sessionStorage.getItem('uid') !== null) {
            createLogoutButton();
        }

        checkCartAmount(sessionStorage['uid']);

        //on-click function that handles every click on any of the generated cards
        main.on('click', 'div.card', function () {
            id = $(this).data('id');
            product = $(this).data('product');

            $.ajax({
                url: 'php/htmlGeneration.php',
                type: 'GET',
                data: {articleId: id, action: 'modal'},
                success: function (data) {
                    htmlString = data;
                    $('#productDetailModal').modal('show');
                    checkCartAmountForProduct(sessionStorage['uid'], id);
                }
            });
        });

        $('#productDetailModal').on('show.bs.modal', function () {
            let modal = $(this);
            modal.find('.modal-title').text(product);
            modal.find('.modal-body').empty();
            modal.find('.modal-body').append(htmlString);
        });

        loginSubmit.on('click', function () {
            logIn();
        });

        //reloads articles according to what is entered in the searchbar
        search.keyup(function () {
            searchString = search.val();

            $.ajax({
                url: 'php/htmlGeneration.php',
                type: 'GET',
                data: {searchRequest: searchString, action: 'search'},
                success: function (data) {
                    htmlString = data;
                    let article = $('#article');
                    article.empty();
                    article.append(htmlString);
                }
            });
        });

        addToCartButton.on('click', function () {
            let sessionId = sessionStorage['uid'];
            addToCart(sessionId, id);
            checkCartAmount(sessionId);
        });

        removeFromCartButton.on('click', function () {
            let sessionId = sessionStorage['uid'];
            removeFromCart(sessionId, id);
            checkCartAmount(sessionId);
        });

        $('#cartButton').on('click', function() {
            fillCartModal();
        })
    });
</script>

</body>
</html>