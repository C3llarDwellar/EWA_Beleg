<?php

session_start();

if (isset($_POST['uid']) && isset($_POST['productId'])) {
    $uid = $_POST['uid'];
    $pid = $_POST['productId'];
    if ($_SESSION['uid'] == $uid) {
        if (!isset($_SESSION['cart'][$pid])){
            $_SESSION['cart'][$pid] = 1;
        } else {
            $_SESSION['cart'][$pid]++;
        }
        die(true);
    } else die("Wrong session id.");
} else die("parameters not passed.");