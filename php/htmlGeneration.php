<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 2019-01-30
 * Time: 01:15
 */

include "databaseOperations.php";

$result = databaseConnect("localhost", "G12", "ru37w", "g12");

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

//generates html if the modal is called
if (isset($_GET['articleId'])) {
    $articleId = $_GET['articleId'];
    $htmlString = "";

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

//generated html when the document is ready
if (isset($_GET['trigger'])){
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
?>