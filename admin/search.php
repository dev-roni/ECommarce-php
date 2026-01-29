<?php

include_once '../db_connection.php';

if (isset($_POST['query'])) {
    $search = $conn->real_escape_string($_POST['query']);
	$subCategory = isset($_POST['subCategory']) ? $_POST['subCategory'] : '';
    $query = "SELECT product_name FROM product WHERE sub_cetegory = '$subCategory' AND product_name LIKE '%$search%' LIMIT 5";

    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo '<ul class="list-unstyled">';
        while ($row = $result->fetch_assoc()) {
            echo '<li>' . $row['product_name'] . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No matches found</p>';
    }
}

$conn->close();
?>
