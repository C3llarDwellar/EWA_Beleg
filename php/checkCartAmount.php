<?php

session_start();

if (isset($_POST['uid'])) {
    $sessionId = $_POST['uid'];

    if ($_SESSION['uid'] == $sessionId) {
        if (!isset($_SESSION['cart'])) {
            die("0");
        } else {
            $cart = $_SESSION['cart'];
            $cartSize = 0;

            foreach ($cart AS $productId => $amount) {
                $cartSize = $cartSize + $amount;
            }
            die("".$cartSize);
        }
    } else die("0");
} else die("0");