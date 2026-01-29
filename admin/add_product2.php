<?php
include_once '../admin_component/head.php';
include_once '../admin_component/navbar.php';
include_once '../admin_component/sidebar.php';
include_once '../db_connection.php';

	if(isset($_POST['submit'])){
		$sub_cetegory = $_POST['sub_cetegory'];
		$parent_category = $_POST['parent_category'];
		$product=$POST['product'];
		$price=$POST['price'];
		$image=$POST['fileToUpload'];
		$description=$POST['description'];
		
		
		
		if(empty($parent_category)){
			$error = 'Please select The cetegory<br>';
		}
		else if(empty($sub_cetegory)){
			$error = 'Please select The sub_cetegory<br>';
		}
		else if(empty($product) or !preg_match("/^[a-zA-Z ]*$/", $product) or strlen($product) > 20){
			$error = 'Please Enter The Product Name<br>';
		}
		else if(empty($price)){
			$error = 'Please Enter The Product Price<br>';
		}
		else if(empty($image)){
			$error = 'Please Upload The Product Image<br>';
		}
		 else{
			$sql = "INSERT INTO sub_cetegory(cetegory_id, sub_cetegory_name) VALUES ('$cetegory_id','$sub_cetegory')"; 
			$result = mysqli_query($conn, $sql); 
			$success= "Sub Cetegory Create successful";
		}
	}
	
	$sql = "SELECT * FROM cetegory";
	$result = mysqli_query($conn, $sql); 
	$cetegories = mysqli_fetch_all($result, MYSQLI_ASSOC);	
	

?>
	
<!-- Content -->
<div class="content mt-5 " id="content">
    <h2>Add Products</h2>
    <!-- Add Product Form -->
    <div class="card mb-4">
        <div class="card-header">Add New Product</div>
        <div class="card-body">
            <form id="productForm" method="POST" action="">
				<div class="row g-3 mb-5">
					<div class="col-md-4">
					    <?php if (!empty($error)){ ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php }else { ?>
							<label for="parent_category" class="form-label">Cetegory</label>
						<?php } ?>
							<select id="parent_category" name="parent_category" >
								<option value="" selected>Cetegory</option>
								<?php foreach ($cetegories as $cat){ ?>
									<option value="<?php echo htmlspecialchars($cat['id']); ?>"><?php echo htmlspecialchars($cat['cetegory_name']); ?></option>
								<?php } ?>
							</select>
                    </div>
					<div class="col-md-4">
						<?php foreach ($cetegories as $category){ ?>
						<?php if (!empty($error)){ ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php }else{ ?>
                        <label for="parent_category" class="form-label">Sub Cetegory</label>
						<?php } ?>
                        <select id="parent_category" name="parent_category" >
                            <option value="" selected>Sub Cetegory</option>
                            <?php 	
								$category_id = $category['id']; 
								$sql = "SELECT * FROM sub_cetegory WHERE cetegory_id='$category_id'";
								$result = mysqli_query($conn, $sql); 
								$sub_cetegories = mysqli_fetch_all($result, MYSQLI_ASSOC);
								foreach ($sub_cetegories as $sub){ ?>
                                <option value="<?php echo htmlspecialchars($sub['id']); ?>"><?php echo htmlspecialchars($sub['sub_cetegory_name']); ?></option>
								<?php 
								}
						}

								?>
                        </select>
                    </div>

				</div>
				<div class="row g-3">
                    <div class="col-md-3">
                        <label for="productName" class="form-label">Add Product Name</label>
                        <input type="text" name="product" class="form-control" id="productName" placeholder="Enter product name" required>
                    </div>
                    <div class="col-md-3">
                        <label for="productPrice" class="form-label">Price (Tk)</label>
                        <input type="number" name="price" class="form-control" id="productPrice" placeholder="Enter price" required>
                    </div>
					<div class="col-md-3">
                       <form action="" method="post" enctype="multipart/form-data">
							Select image to upload:
							<input type="file" name="fileToUpload" id="fileToUpload">
							<input type="submit" value="Upload Image" name="submit">
						</form>
						<?php
							if(isset($_POST["submit"])) {
							
							$Filename= $_FILES['fileToUpload']['name'];
							$Type = $_FILES['fileToUpload']['type'];
							$Size = $_FILES['fileToUpload']['size'];
							$Tempname = $_FILES['fileToUpload']['tmp_name'];
							$Error  = $_FILES['fileToUpload']['error'];
							$target="uploads/" . basename ($Filename);
							
							
							if($Size ==0){
								echo 'please select a image';
							}
							
							else if($Type != "image/jpg" && $Type != "image/png" && $Type != "image/jpeg" && $Type != "image/gif" ) {
								echo "দুঃখিত , শুধুমাত্র JPG, JPEG, PNG & GIF ফাইল আপলোড দিতে পারবেন";
							}
							
							else if($Size>=1000000){
								echo 'দয়া করে এক এমবির নিচে ছবি আপলোড করুন';
							}
							
							else if (file_exists($target)) {
								echo "আপনার ফাইলটি ইতোমধ্যেই জমা আছে";
							}
							
							else{
								if (move_uploaded_file($Tempname, $target )) {
									echo "  আপনার ফাইল -' ". basename( $Filename). " '- আপলোড হয়েছে";
								} 
								else {
									echo "দুঃখিত ফাইলটি সঠিকভাবে আপলোড হয়নি";
								}
							 }
						}
						?>
					</div>
					<div class="col-md-3">
                        <label for="desc" class="form-label">Description</label>
                        <input type="text" name="description" class="form-control" id="desc" placeholder="description" required>
                    </div>

                </div>
                <button type="submit" name=="submit" class="btn btn-primary mt-3">Add Product</button>
            </form>
        </div>
    </div>

    <!-- Product List -->
    <h3>Product List</h3>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price (Tk)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="productList">
            <!-- Dynamic Rows will be inserted here -->
			 <tr>
                <td>#</th>
                <td>Image</th>
                <td>alu</th>
                <td>40 /-</th>
                <td>Actions</th>
            </tr>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
        $('#parent_category').on('change', function(){
            var categoryID = $(this).val();
            if(categoryID){
                $.ajax({
                    type: 'POST',
                    url: 'get_sub_categories.php',
                    data: 'category_id='+categoryID,
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
