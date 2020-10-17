<?php
session_start();

if (isset($_GET["del"])) {
    $i = $_GET["del"];
    foreach ($_SESSION['store'] as $element => $data) {
        if ($data['id'] == $i) {
            unset($_SESSION['store'][$element]);
        }

    }
}
    header('location:cart.php');