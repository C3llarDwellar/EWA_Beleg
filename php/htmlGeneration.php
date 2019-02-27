<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 2019-01-30
 * Time: 01:15
 */

include "databaseOperations.php";

// TODO: Properties file
$config = parse_ini_file("EWA_Beleg/resources/configuration/app.ini");
/*
$result = selectAllBooks("localhost", "G12", "ru37w", "g12");


$id = [];
$isbn = [];
$title = [];
$author = [];
$publisher = [];
$price = [];
$stock = [];
$summary = [];
$weight = [];

while ($row = $result->fetch_assoc()) {
    array_push($id, $row["ProduktID"]);
    array_push($isbn, $row["Produktcode"]);
    array_push($title, $row["Produkttitel"]);
    array_push($author, $row["Autorname"]);
    array_push($publisher, $row["Verlagsname"]);
    array_push($price, $row["PreisNetto"]);
    array_push($stock, $row["Lagerbestand"]);
    array_push($summary, $row["Kurzinhalt"]);
    array_push($weight, $row["Gewicht"]);
}
*/


if (isset($_GET['action']) && !empty($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'search' : searchRequest();break;
        case 'modal' : generateModal();break;
        case 'init' : generateCards();break;
        case 'stockInit' : stockInitialize();break;
    }
}

//generates html if the modal is called
function generateModal() {
    if (isset($_GET['articleId'])) {
        global $config;

        $articleId = $_GET['articleId'];
        $htmlString = "";

        $book = getBookById($config['host'], $config['username'], $config['password'], $config['dbname'], $articleId);

        while ($row = $book->fetch_assoc()) {
            array_push($id, $row[$config['id']]);
            array_push($isbn, $row[$config['isbn']]);
            array_push($title, $row[$config['title']]);
            array_push($author, $row[$config['author']]);
            array_push($publisher, $row[$config['publisher']]);
            array_push($price, $row[$config['price']]);
            array_push($stock, $row[$config['stock']]);
            array_push($summary, $row[$config['summary']]);
            array_push($weight, $row[$config['weight']]);
        }

        for ($i = 0; $i < sizeof($id); $i++) {
            if ($id[$i] == $articleId) {
                $htmlString .= "<span>ISBN: " . $isbn[$i] . "</span></br>
                            <span>Author: " . $author[$i] . "</span></br>
                            <span>Publisher: " . $publisher[$i] . "</span></br>
                            <span>Price: " . $price[$i] . "€</span></br>
                            <span>Stock: " . $stock[$i] . "</span></br>
                            <span>Summary: " . $summary[$i] . "</span></br>
                            <span>Weight: " . $weight[$i] . "g</span>";
            }
        }

        echo $htmlString;
    }
}

//generated html when the document is ready
function generateCards() {
    global $config;
    $allBooks = selectAllBooks($config['host'], $config['username'], $config['password'], $config['dbname']);

    $id = [];
    $title = [];
    $author = [];

    while ($row = $allBooks->fetch_assoc()) {
        array_push($id, $row[$config['id']]);
        array_push($title, $row[$config['title']]);
        array_push($author, $row[$config['author']]);
    }

    $htmlString = "";

    for ($i = 0; $i < sizeof($id); $i++) {
        if ($i % 4 == 0 || $i == 0) {
            $htmlString .= "<div class='row'>";
        }

        $htmlString .= "
            <div class='col-3 d-flex align-items-stretch'>
                <div class='card w-100 h-100' data-id='" . $id[$i] . "' data-product='" . $title[$i] . "'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $title[$i] . "</h5>
                        <h6 class='card-subtitle'>" . $author[$i] . "</h6>
                    </div>
                </div>
            </div>";

        if ($i % 4 == 3 || $i == sizeof($id) - 1) {
            $htmlString .= "</div>";
        }
    }

    echo $htmlString;
}

function searchRequest() {
    if (isset($_GET['searchRequest']) && $_GET['searchRequest'] != ""){
        // search input as lowercase for case insensitivity
        $search =strtolower($_GET['searchRequest']);

        global $config;
        $searchResult = findBooks($config['host'], $config['username'], $config['password'], $config['dbname'], $search);

        $id = [];
        $title = [];
        $author = [];

        while ($row = $searchResult->fetch_assoc()) {
            array_push($id, $row[$config['id']]);
            array_push($title, $row[$config['title']]);
            array_push($author, $row[$config['author']]);
        }

        $htmlString="";
        $cards = [];

        for ($i = 0; $i < sizeof($id); $i++) {
            // convert all to lowercase for case insensitivity
            $lowerTitle = strtolower($title[$i]);
            $lowerAuthor = strtolower($author[$i]);

            if (strpos($lowerTitle, $search) !== false || strpos($lowerAuthor, $search) !== false) {

                $cardString = "
            <div class='col-3'>
                <div class='card w-100 h-100' data-id='" . $id[$i] . "' data-product='" . $title[$i] . "'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $title[$i] . "</h5>
                        <h6 class='card-subtitle'>" . $author[$i] . "</h6>
                    </div>
                </div>
            </div>";

                array_push($cards, $cardString);
            }
        }

        for ($i = 0; $i < sizeof($cards); $i++) {
            if ($i % 4 == 0 || $i == 0) {
                $htmlString .= "<div class='row'>";
            }

            $htmlString .= $cards[$i];

            if ($i % 4 == 3 || $i == sizeof($cards) - 1) {
                $htmlString .= "</div>";
            }
        }

        echo $htmlString;
    } else {
        generateCards();
    }
}

function stockInitialize() {
    $htmlString = "";

    global $config;
    $allBooks = selectAllBooks($config['host'], $config['username'], $config['password'], $config['dbname']);

    $id = [];
    $title = [];
    $price = [];
    $stock = [];

    while ($row = $allBooks->fetch_assoc()) {
        array_push($id, $row[$config['id']]);
        array_push($title, $row[$config['title']]);
        array_push($price, $row[$config['price']]);
        array_push($stock, $row[$config['stock']]);
    }

    for ($i = 0; $i < sizeof($id); $i++) {
        $htmlString .= "<div class='row'>";
        if ($stock[$i] < 10) {
            $htmlString .= "<div class='card w-100 border-danger'>
                <div class='card-body'>
                    <div class='row'>
                        <div class='col-9'>
                            <span>" . $title[$i] . "</span>
                        </div>
                        <div class='col-1'>
                            <span>" . $stock[$i] . "</span>
                        </div>
                        <div class='col-1'>
                            <span>" . $price[$i] . "€</span>                        
                        </div>
                        <div class='col-1'>
                            <span>" . $stock[$i] * $price[$i] . "€</span>                        
                        </div>
                    </div>
                </div>
            </div>";
        } else {
            $htmlString .= "<div class='card w-100'>
                <div class='card-body'>
                    <div class='row'>
                        <div class='col-9'>
                            <span>" . $title[$i] . "</span>
                        </div>
                        <div class='col-1'>
                            <span>" . $stock[$i] . "</span>
                        </div>
                        <div class='col-1'>
                            <span>" . $price[$i] . "€</span>                        
                        </div>
                        <div class='col-1'>
                            <span>" . $stock[$i] * $price[$i] . "€</span>                        
                        </div>
                    </div>
                </div>
            </div>";
        }
        $htmlString .= "</div>";
    }
    echo $htmlString;
}
?>