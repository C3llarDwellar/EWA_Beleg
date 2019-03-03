<?php

include 'databaseOperations.php';

session_start();

if (isset($_POST['uid'])) {
    $sessionId = $_POST['uid'];
    if ($_SESSION['uid'] == $sessionId) {
        $name = $_SESSION['userName'];
        if (isUserAdmin($name) == true) {
            echo "true";
        } else die("user not admin");
    } else die("wrong uid");
} else die("uid not set");