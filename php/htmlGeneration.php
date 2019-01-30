<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 2019-01-30
 * Time: 01:15
 */

function buildArticleCards ($titles, $authors) {

    $htmlString = "";

    for ($i = 0; $i < sizeof($titles); $i++) {
        if ($i % 4 == 0 || $i == 0) {
            $htmlString .= "<div class='row'>";
        }

        $htmlString .= "
            <div class='col-3 d-flex align-items-stretch'>
                <div class='card w-100 h-100'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $titles[$i] . "</h5>
                        <h6 class='card-subtitle'>" . $authors[$i] . "</h6>
                    </div>
                </div>
            </div>";

        if ($i % 4 == 3 || $i == sizeof($titles) - 1) {
            $htmlString .= "</div>";
        }
    }

    return $htmlString;
}

function buildArticleModalContent ($title, $author) {

    $htmlString = "";

    return $htmlString;
}

?>