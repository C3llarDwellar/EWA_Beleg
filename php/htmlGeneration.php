<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 2019-01-30
 * Time: 01:15
 */

function buildArticleCards ($title, $author) {

    $htmlString = "";

    for ($i = 0; $i < sizeof($title); $i++) {
        if ($i % 4 == 0 || $i == 0) {
            $htmlString .= "<div class='row'>";
        }

        $htmlString .= "
            <div class='col-3 d-flex align-items-stretch'>
                <div class='card w-100 h-100' data-product='". $title[$i] ."'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $title[$i] . "</h5>
                        <h6 class='card-subtitle'>" . $author[$i] . "</h6>
                    </div>
                </div>
            </div>";

        if ($i % 4 == 3 || $i == sizeof($title) - 1) {
            $htmlString .= "</div>";
        }
    }

    return $htmlString;
}

//TODO: build the function below to filter data and generate the correct modal

function buildArticleModalContent ($title, $author) {

    $htmlString = "";

    return $htmlString;
}

?>