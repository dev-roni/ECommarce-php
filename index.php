<?php
include_once 'site_component/head.php';
include_once 'site_component/navbar.php';
include_once 'site_component/sidebar.php';
require_once('db_connection.php');
?>



<!-- Product Listings -->
<div class=" content container mt-5 pt-5" id="content">
	<div class="row">

		<?php

		$sql = "SELECT * FROM product";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				?>
				<div class="col-md-3 mb-4">
					<div class="card product-card">
						<img class="product-image" src="Assets\image\<?php echo $row['image_url']; ?>" alt="<?php echo htmlspecialchars($row['product_name']); ?>">
						<div class="card-body">
							<h5 class="card-title"><?php echo htmlspecialchars($row['product_name']); ?></h5>
							<p class="card-text"><?php echo $row['price']; ?> Tk/-</p>
							<a href="add_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Add to Cart</a>
						</div>
					</div>
				</div>
				<?php
			}
		} else {
			echo "<p>No products found.</p>";
		}
		?>




	</div>
</div>
<?php
include_once 'site_component/footer.php';
?>