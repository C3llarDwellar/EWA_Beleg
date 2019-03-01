<?php

include "databaseOperations.php";

// Are values given?
$username = $_POST['user'] or die("Username required!");
$password = $_POST['password'] or die("Password required");

if (doesUserExist($username)) {
    if (isPasswordCorrect($username, $password)) {
        die("Success");
    } else {
        die("Password incorrect");
    }
} else {
    die("Username not found");
}