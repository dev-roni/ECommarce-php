<?php
session_start();
require_once('db_connection.php');

if (isset($_GET["id"])) {
    $id = $conn->real_escape_string($_GET["id"]);
    $sql = "SELECT * FROM product WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 
        if (!isset($_SESSION['cart_product_list'])) {
            $_SESSION['cart_product_list'] = [];
        }
        $_SESSION['cart_product_list'][] = $row;
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>
