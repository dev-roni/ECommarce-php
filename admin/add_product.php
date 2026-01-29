<?php
include_once '../admin_component/head.php';
include_once '../admin_component/navbar.php';
include_once '../admin_component/sidebar.php';
include_once '../db_connection.php';
include_once '../functions.php';


if(isset($_POST['submit'])){
    $sub_category = $_POST['sub_category'];
    $parent_category = $_POST['parent_category'];
    $product = $_POST['product'];
    $description = $_POST['description'];

    // Image upload handling
    if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['size'] > 0){
        $target_dir = "../Assets/image/";
		$imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
		$newFileName = time() . '.' . $imageFileType;
		$target_file = $target_dir . $newFileName;

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check === false) {
            $error = "File is not an image.";
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1000000) {
            $error = "Sorry, your file is too large.";
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }

    } else {
        $error = "Please upload the product image.";
    }

    if(empty($parent_category)){
        $error = 'Please select The category<br>';
    } else if(empty($sub_category)){
        $error = 'Please select The sub category<br>';
    } else if(empty($product) || !preg_match("/^[a-zA-Z ]*$/", $product) || strlen($product) > 20){
        $error = 'Please Enter The Product Name<br>';
    } else {
        $sql = "INSERT INTO product (cetegory, sub_cetegory, product_name, image_url, description) VALUES ('$parent_category', '$sub_category', '$product', '$newFileName', '$description')"; 
        if(mysqli_query($conn, $sql)){
			
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $image = basename($_FILES["fileToUpload"]["name"]);
            } else {
                $error = "Sorry, there was an error uploading your file.";
            }
			
            echo "Product added successfully";
        } else {
            $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

$sql = "SELECT * FROM cetegory";
$result = mysqli_query($conn, $sql); 
$cetegories = mysqli_fetch_all($result, MYSQLI_ASSOC);


$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql); 
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!-- Rest of the HTML code -->


<!-- Content -->
<div class="content mt-5 " id="content">
    <h2>Add Products</h2>
	
	
    <!-- Add Product Form -->
    <div class="card mb-4">
        <div class="card-header">Add New Product</div>
        <div class="card-body">
            <form id="productForm" method="POST" action="" enctype="multipart/form-data">
                <div class="row g-3 mb-5">
                    <div class="col-md-4">
                        <?php if (!empty($error)){ ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
								echo $error;?>
                            </div>
                        <?php }else { ?>
                            <label for="parent_category" class="form-label">Category</label>
                        <?php } ?>
                        <select id="parent_category" name="parent_category" class="form-control">
                            <option value="" selected>Category</option>
                            <?php foreach ($cetegories as $cat){ ?>
                                <option value="<?php echo htmlspecialchars($cat['id']); ?>"><?php echo htmlspecialchars($cat['cetegory_name']); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="sub_category" class="form-label">Sub Category</label>
                        <select id="sub_category" name="sub_category" class="form-control">
                            <option value="" selected>Sub Category</option>
                        </select>
                    </div>
                </div>
				<div class="row g-3 mb-5">
					<div class="col-md-3">
						<label for="productName" class="form-label">Add Product Name</label>
						<input type="text" name="product" class="form-control" id="productName" placeholder="Enter product name" required>
					</div>
					<div class="col-md-3">
						<label for="fileToUpload" class="form-label">Select image to upload:</label>
						<input type="file" name="fileToUpload" class="form-control" id="fileToUpload" required>
					</div>
					<div class="col-md-3">
						<label for="desc" class="form-label">Description</label>
						<input type="text" name="description" class="form-control" id="desc" placeholder="Enter description" required>
					</div>
				</div>
                <button type="submit" name="submit" class="btn btn-primary mt-3">Add Product</button>
            </form>
        </div>
    </div>

    <!-- Product List -->
    <h3>Product List</h3>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>image</th>
                <th>Category</th>
                <th>Sub Category</th>
            </tr>
        </thead>
		  <?php if (!empty($products)): ?>
			<tbody id="productList">
			<?php foreach ($products as $product): ?>
             <?php
			 echo "
			 <tr>
             	<td>".$product['id']."</td>
				<td>". get_item_name($product['id'],$conn)."</td>
				<td><img src='". get_item_image($product['id'],$conn)."' alt='Girl in a jacket' width='50' height='60'></td>
				<td>". get_cetegory_name($product['id'],$conn)."</td>
				<td>". get_sub_cetegory_name($product['id'],$conn)."</td>
            </tr>
			";
			endforeach; ?>
        </tbody>
		<?php else: ?>
            <p>No product found.</p>
        <?php endif; ?>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#parent_category').on('change', function(){
            var categoryID = $(this).val();
            if(categoryID){
                $.ajax({
                    type: 'POST',
                    url: 'get_sub_categories.php',
                    data: { category_id: categoryID },
                    success: function(html){
                        $('#sub_category').html(html);
                    }
                }); 
            }else{
                $('#sub_category').html('<option value="">Select Category first</option>'); 
            }
        });
    });
</script>
<?php
include_once '../admin_component/footer.php';
?>
