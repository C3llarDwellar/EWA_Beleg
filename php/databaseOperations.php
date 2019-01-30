<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 2019-01-30
 * Time: 00:57
 */

$host = "localhost";
$username = "G12";
$password = "ru37w";
$dbname = "g12";



function databaseConnect ($host, $username, $password, $dbname){
    $query = "SELECT * FROM buecher";

    $mysqli = new mysqli($host, $username, $password, $dbname);
    $statement = $mysqli->prepare($query);
    $statement->execute();

    $result = $statement->get_result();

    return $result;
}

?>