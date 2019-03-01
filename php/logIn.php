<?php

include "databaseOperations.php";

// Are values given?
$username = $_POST['user'] or die("Username required!");
$password = $_POST['password'] or die("Password required");

if (doesUserExist($username)) {
    if (isPasswordCorrect($username, $password)) {
        $uid = md5(uniqid(rand()));
        session_start();
        $_SESSION['uid'] = $uid;
        $_SESSION['cart'] = [];
        die($uid);
    } else {
        die("password incorrect");
    }
} else {
    die("unknown user");
}