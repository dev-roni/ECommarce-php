<?php
require_once('db_connection.php');

    if (isset($_POST['submit'])) {
		$search_data = $_POST['query'];
		$sql = "SELECT * FROM product WHERE product_name LIKE '%$search_data%'";
			$result = mysqli_query($conn, $sql); 
			$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
			foreach ($product as $product_data) {
				echo $product_data['product_name'];
				echo '<br>';

			}
    }

?>