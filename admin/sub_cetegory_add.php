 <?php
include_once '../admin_component/head.php';
include_once '../admin_component/navbar.php';
include_once '../admin_component/sidebar.php';
include_once '../db_connection.php';

if(isset($_POST['submit'])){
		$sub_cetegory = $_POST['sub_cetegory'];
		$cetegory_id = $_POST['parent_category'];
		
		if(empty($sub_cetegory) or !preg_match("/^[a-zA-Z ]*$/", $sub_cetegory) or strlen($sub_cetegory) > 20){
			$error = 'Please Enter The sub_cetegory<br>';
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
    <div class="content mt-5" id="content">
        <div class="card mb-4">
            <div class="card-header">Add Sub Cetegory</div>
            <div class="card-body">
                <form id="categoryForm" method="POST" action="sub_cetegory_add.php">
				
					<div class="mb-3">
                        <label for="parent_category" class="form-label">Cetegory</label>
                        <select id="parent_category" name="parent_category" class="form-control">
                            <option value="" selected>Cetegory</option>
                            <?php foreach ($cetegories as $cat): ?>
                                <option value="<?php echo htmlspecialchars($cat['id']); ?>"><?php echo htmlspecialchars($cat['cetegory_name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php else: ?>
                            <label for="sub_cetegory" class="form-label">Sub Cetegory</label>
                        <?php endif; ?>
                        <input type="text" id="sub_cetegory" name="sub_cetegory" class="form-control" placeholder="Sub Category name" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Add Sub Cetegory</button>
                    <?php if (!empty($success)): ?>
                        <div class="alert alert-success mt-3" role="alert">
                            <?php echo $success; ?>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
	
	
		<div class="card mb-4">
            <div class="card-header">All Categories</div>
            <div class="card-body">
                <?php if (!empty($cetegories)): ?>
                    <ul class="list-group">
                        <?php foreach ($cetegories as $category): ?>
						
						<div class="card mb-4">
							<div class="card-header"><?php echo $category['id'].'.'. htmlspecialchars($category['cetegory_name']); ?></div>
								<div class="card-body">
									<ul class="list-group">
										<?php 
											$category_id = $category['id']; 
											$sql = "SELECT * FROM sub_cetegory WHERE cetegory_id='$category_id'";
											$result = mysqli_query($conn, $sql); 
											$sub_cetegories = mysqli_fetch_all($result, MYSQLI_ASSOC);
											foreach ($sub_cetegories as $sub){
												echo '<li class="list-group-item">';
												echo $sub['id'].'.'.$sub['sub_cetegory_name'];
												echo '</li>';
											}
										?>
									</ul>
								</div>
						</div>
						
							
							

                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No categories found.</p>
                <?php endif; ?>
            </div>
        </div>
<?php
include_once '../admin_component/footer.php';
?>