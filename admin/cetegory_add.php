 <?php
include_once '../admin_component/head.php';
include_once '../admin_component/navbar.php';
include_once '../admin_component/sidebar.php';
include_once '../db_connection.php';

if(isset($_POST['submit'])){
		$cetegory = $_POST['cetegory'];
		if(empty($cetegory) or !preg_match("/^[a-zA-Z ]*$/", $cetegory) or strlen($cetegory) > 20){
			$error = 'Please Enter The Cetegory<br>';
		}
		 else{
			$sql = "INSERT INTO cetegory(cetegory_name) VALUES ('$cetegory')"; 
			$result = mysqli_query($conn, $sql); 
			$success= "Cetegory Create successful";
		}
	}
	
	$sql = "SELECT * FROM cetegory ORDER BY id DESC";
	$result = mysqli_query($conn, $sql); 
	$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);	
?>
    <div class="content mt-5" id="content">
        <div class="card mb-4">
            <div class="card-header">Add New Category</div>
            <div class="card-body">
                <form id="categoryForm" method="POST" action="cetegory_add.php">
                    <div class="mb-3">
                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php else: ?>
                            <label for="cetegory" class="form-label">Cetegory</label>
                        <?php endif; ?>
                        <input type="text" id="cetegory" name="cetegory" class="form-control" placeholder="Category name" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Add cetegory</button>
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
                <?php if (!empty($categories)): ?>
                    <ul class="list-group">
                        <?php foreach ($categories as $category): ?>
						
                            <li class="list-group-item"><?php echo $category['id'].'.'. htmlspecialchars($category['cetegory_name']); ?></li>
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