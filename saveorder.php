<?php
session_start();

include_once './config.php';
$userid = "shivam"; 
$cartdata = json_encode($_SESSION['store']);
$total = $_SESSION['total'];
$status = "Deliverd";
$query = "INSERT INTO orders(user_id,cartdata,total,status,datetime)
        VALUES ('$userid','$cartdata','$total','$status',now())";
if (mysqli_query($conn, $query)) {
    unset($_SESSION['store']);
    header("location:thankyou.html");
} else {
    echo "Something Wrong ,Please Checkout Again";
}
?>
