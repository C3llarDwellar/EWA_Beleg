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
$config = parse_ini_file('../resources/configuration/app.ini');

function connectToDatabase() {
    global $config;
    $mysqli = new mysqli($config['host'], $config['username'], $config['password'], $config['dbname']);
    if ($mysqli->connect_errno) {
        die("Database Connection failed: " . $mysqli->connect_errno);
    }
    return $mysqli;
}

// Books
function selectAllBooks (){
    $query = "SELECT * FROM buecher";

    $mysqli = connectToDatabase();
    $statement = $mysqli->prepare($query);
    $statement->execute();

    $result = $statement->get_result();

    return $result;
}

function findBooks ($searchString) {
    $mysqli = connectToDatabase();

    $query = "SELECT * FROM buecher WHERE Produkttitel LIKE CONCAT('%',?,'%') OR Autorname LIKE CONCAT('%',?,'%')";
    $statement = $mysqli->prepare($query);
    $statement->bind_param('ss', $searchString, $searchString);
    $statement->execute();

    $result = $statement->get_result();
    return $result;
}

function findBooksByTitle ($titleSearch) {
    $mysqli = connectToDatabase();

    $query = "SELECT * FROM buecher  WHERE Produkttitel LIKE CONCAT('%',?,'%')";
    $statement = $mysqli->prepare($query);
    $statement->bind_param('s', $titleSearch);
    $statement->execute();


    $result = $statement->get_result();
    return $result;
}

function getBookById ($id) {
    $mysqli = connectToDatabase();

    $query = "SELECT * FROM buecher WHERE ProduktID = ?";
    $statement = $mysqli->prepare($query);
    $statement->bind_param('i', $id);
    $statement->execute();

    return $statement->get_result();
}

// Users
function saveUser($name, $pw, $gender, $adress) {
    $mysqli = connectToDatabase();

    $query = "INSERT INTO user (Username, Userpwmd5, UserAnrede, UserAdresse) VALUES (?, ?, ?, ?)";
    $statement = $mysqli->prepare($query);
    $statement->bind_param('ssss', $name, $pw, $gender, $adress);
    $statement->execute();

    return $statement->get_result();
}

function doesUserExist($name) {
    $mysqli = connectToDatabase();

    $query = "SELECT * FROM user WHERE Username LIKE ?";
    $statement = $mysqli->prepare($query);
    $statement->bind_param('s', $name);
    $statement->execute();

    $result = $statement->get_result();
    if (!$result) {
        die("There was a problem with the Query");
    } else {
        if (mysqli_num_rows($result) > 0) {
            return true;
        }
        else {
            return false;
        }
    }
}

function isPasswordCorrect($name, $pass) {
    $mysqli = connectToDatabase();

    $query = "SELECT Userpwmd5 FROM user WHERE Username LIKE ?";
    $statement = $mysqli->prepare($query);
    $statement->bind_param('s', $name);
    $statement->execute();
    $result = $statement->get_result();

    while ($row = $result->fetch_assoc()) {
        if ($row['Userpwmd5'] == $pass) {
            return true;
        }
    }
    return false;
}

function findUserByName($name) {
    $mysqli = connectToDatabase();

    $query = "SELECT * FROM user WHERE Username LIKE ?";
    $statement = $mysqli->prepare($query);
    $statement->bind_param('s', $name);
    $statement->execute();

    return $statement->get_result();
}
?>