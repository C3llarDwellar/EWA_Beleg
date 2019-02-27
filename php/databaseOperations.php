<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 2019-01-30
 * Time: 00:57
 */

/*
$host = "localhost";
$username = "G12";
$password = "ru37w";
$dbname = "g12";
*/

function selectAllBooks ($host, $username, $password, $dbname){
    $query = "SELECT * FROM buecher";

    $mysqli = new mysqli($host, $username, $password, $dbname);
    if ($mysqli->connect_errno) {
        die("Database Connection failed: " . $mysqli->connect_errno);
    }
    $statement = $mysqli->prepare($query);
    $statement->execute();

    $result = $statement->get_result();

    return $result;
}

function findBooks ($host, $username, $password, $dbname, $searchString) {
    $mysqli = new mysqli($host, $username, $password, $dbname);
    if ($mysqli->connect_errno) {
        die("Database Connection failed: " . $mysqli->connect_errno);
    }

    $query = "SELECT * FROM buecher WHERE Produkttitel LIKE CONCAT('%',?,'?') OR Autorname LIKE CONCAT('%',?,'%')";
    $statement = $mysqli->prepare($query);
    $statement->bind_param('ss', $searchString, $searchString);
    $statement->execute();

    $result = $statement->get_result();
    return $result;
}

function findBooksByTitle ($host, $username, $password, $dbname, $titleSearch) {
    $mysqli = new mysqli($host, $username, $password, $dbname);
    if ($mysqli->connect_errno) {
        die("Database Connection failed: " . $mysqli->connect_errno);
    }

    $query = "SELECT * FROM buecher  WHERE Produkttitel LIKE CONCAT('%',?,'%')";
    $statement = $mysqli->prepare($query);
    $statement->bind_param('s', $titleSearch);
    $statement->execute();


    $result = $statement->get_result();
    return $result;
}
?>