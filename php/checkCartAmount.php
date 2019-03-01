<?php

session_start();

if (isset($_POST['uid']) && isset($_POST['productId'])) {
    $sessionId = $_POST['uid'];
    $productId = $_POST['productId'];

    if ($_SESSION['uid'] == $sessionId) {
        if (!isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] = 0;
            die("0");
        } else {
            die("".$_SESSION['cart'][$productId]);
            //die("this");
        }
    } else die("Wrong session id");
} else die("parameters not passed.");