<?php
session_start();

if (isset($_GET['index']) && isset($_SESSION['cart_product_list'][$_GET['index']])) {
    unset($_SESSION['cart_product_list'][$_GET['index']]);
    // reindex array
    $_SESSION['cart_product_list'] = array_values($_SESSION['cart_product_list']);
}

header("Location: cart_product.php"); // কার্ট পেজের নাম দিন
exit();
?>
