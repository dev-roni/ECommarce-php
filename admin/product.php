<?php
// ডাটাবেস কনেকশন সেটআপ
$servername = "localhost";
$username = "root";  // আপনার ডাটাবেস ইউজার
$password = "";      // আপনার ডাটাবেস পাসওয়ার্ড
$dbname = "shop";    // ডাটাবেসের নাম

// ডাটাবেস কনেকশন তৈরি
$conn = new mysqli($servername, $username, $password, $dbname);

// কনেকশন চেক করা
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// পণ্য তালিকা ফেচ করা
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

?>

<?php
include_once '../admin_component/head.php';
include_once '../admin_component/navbar.php';
include_once '../admin_component/navigation.php';
include_once '../admin_component/sidebar.php';
?>

<!-- Content -->
<div class="content mt-5" id="content">
    <h2>Product List</h2>

    <!-- Product List Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price (Tk)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // যদি পণ্য থাকে, তাহলে ডেটা লুপ করে দেখাও
            if ($result->num_rows > 0) {
                // প্রতিটি পণ্যের তথ্যের জন্য লুপ
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td><img src='" . $row['image_url'] . "' alt='Product Image' width='100'></td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>
                            <a href='edit_product.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a>
                            <a href='delete_product.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No products found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include_once '../admin_component/footer.php';
?>

<?php
// কনেকশন বন্ধ করা
$conn->close();
?>