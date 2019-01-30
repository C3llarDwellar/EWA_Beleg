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
    <link rel="stylesheet" href="daten/main-container-padding.css">
    <!--jquery integration-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

    <!--custom javascript-->

    <title>Bookstore of Group G12</title>
</head>
<body>

<?php
include "php/databaseOperations.php";
include "php/htmlGeneration.php";

$result = databaseConnect("localhost", "G12", "ru37w", "g12");

$isbn = [];
$title = [];
$author = [];
$publisher = [];
$price = [];
$stock = [];
$summary = [];
$weight = [];

while ($row = $result->fetch_assoc()) {
    array_push($isbn, $row["Produktcode"]);
    array_push($title, $row["Produkttitel"]);
    array_push($author, $row["Autorname"]);
    array_push($publisher, $row["Verlagsname"]);
    array_push($price, $row["PreisNetto"]);
    array_push($stock, $row["Lagerbestand"]);
    array_push($summary, $row["Kurzinhalt"]);
    array_push($weight, $row["Gewicht"]);
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
                    <a class="nav-link" href="#">Administration</a>
                </li>

                <li class="nav-item">
                    <form>
                        <input type="text" name="search" placeholder="Search..">
                    </form>
                </li>
            </ul>

            <!-- right elements -->
            <ul class="navbar-nav ml-auto">
                <!-- login button -->
                <li class="nav-item">
                    <button type="button" class="btn btn-light" id="btnSignUp" data-toggle="modal"
                            data-target="#signUpModal">Sign Up
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!--dialog form for sign up-->
<div class="modal fade" role="dialog" id="signUpModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sign Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- actual form for signing up -->
                <form id="signUpForm">
                    <!-- first name -->
                    <div class="form-group">
                        <label for="signUpFormFName">First Name</label>
                        <input type="text" class="form-control" id="signUpFormFName" minlength="2" required>
                    </div>
                    <!-- last name -->
                    <div class="form-group">
                        <label for="signUpFormLName">Last Name</label>
                        <input type="text" class="form-control" id="signUpFormLName" minlength="2" required>
                    </div>
                    <!-- e-mail -->
                    <!-- the html5 email check seems to be simply setting the input type to "email" -->
                    <div class="form-group">
                        <label for="signUpFormEMail">Email address</label>
                        <input type="email" class="form-control" id="signUpFormEMail" placeholder="name@example.com"
                               required>
                    </div>
                    <!-- customer url -->
                    <div class="form-group">
                        <label for="signUpFormURL">Customer URL</label>
                        <input type="url" class="form-control" id="signUpFormURL" placeholder="http:\\www.example.com"
                               required>
                    </div>
                    <!-- age -->
                    <div class="form-group">
                        <label for="signUpFormAge">Age</label>
                        <input type="number" class="form-control" id="signUpFormAge" min="5" max="100" required>
                    </div>
                    <!-- range for recommended suggestions -->
                    <div class="form-group">
                        <label for="signUpFormRange"><span id="signUpFormRangeValue"></span>% of recommended products
                            will be similar to your interests</label>
                        <input type="range" class="form-control-range" id="signUpFormRange" min="0" max="100" step="10">
                    </div>
                    <!-- text area with spell checking -->
                    <!-- this is implemented differently from browser to browser -->
                    <!-- firefox and opera offer spell checking on right-click -->
                    <!-- edge, safari and chrome do it as you type -->
                    <div class="form-group">
                        <label for="signUpFormTextarea">Customer Request</label>
                        <textarea class="form-control" id="signUpFormTextarea" rows="5" spellcheck="true"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="signUpFormSubmit">Submit</button>
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
        </div>
    </div>
</div>


<!--main-->
<main class="container">
    <div class="row">
        <div class="col-9 text-justify" id="article">
            <h3>Main content section</h3>

            <?php
            $html = buildArticleCards($title, $author);
            echo $html;
            ?>

        </div>
        <div class="col-3" id="aside">
            <h3>News section</h3>
            <!--lorem ipsum placeholder-->
            <span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.

Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.

Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.

Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.

Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.

At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.

Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus.

Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.

Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.

Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.

Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.

Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.</span>
        </div>
    </div>
</main>


<!--footer-->
<!--"fixed-bottom" can be added-->
<footer class="footer bg-light">
    <div class="container text-muted text-center">
        <div class="row">
            <div class="col-4">
                <a href="daten/contact.html">Imprint</a>
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
    let product;            //product whose card is clicked and which calls the modal

    $(document).ready(function () {
        $('#signUpFormRangeValue').text($('#signUpFormRange').val());

        //on-click function that handles every click on any of the generated cards
        main.on('click', 'div.card', function () {
            product = $(this).data('product');
            $('#productDetailModal').modal('show');

            //TODO: pass clicked card value to php (product)
            //TODO: call php-function that builds the modal

            <?php
            $html = buildArticleModalContent();
            ?>
        });

        $('#productDetailModal').on('show.bs.modal', function() {
            let modal = $(this);
            modal.find('.modal-title').text(product);
            modal.find('.modal-body').empty();
            modal.find('.modal-body').append(<?php
                    //TODO: echo dat shit here to fill the modal
                ?>);
        })
    });

    // update slider value on slider change
    $('#signUpFormRange').change(function () {
        $('#signUpFormRangeValue').text($('#signUpFormRange').val());
    });
</script>

</body>
</html>