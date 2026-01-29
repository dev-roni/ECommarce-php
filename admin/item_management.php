 <?php
include_once '../admin_component/head.php';
include_once '../admin_component/navbar.php';
include_once '../admin_component/sidebar.php';
include_once '../db_connection.php';
include_once '../functions.php';
?>

<?php
$sql = "SELECT * FROM cetegory";
$result = mysqli_query($conn, $sql); 
$cetegories = mysqli_fetch_all($result, MYSQLI_ASSOC);


$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql); 
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
    <div class="content mt-5 " id="content">
        <h1>Item Management</h1>
		<div class="card mb-4">
			<div class="card-header">Select Your Product And Category</div>
			<div class="card-body">
		        <div class="row g-3 mb-4">
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <label for="sub_category" class="form-label">Sub Category</label>
                        <select id="sub_category" name="sub_category"  class="form-control">
                            <option value="" selected>Sub Category</option>
                        </select>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-6">    
						<label for="search" class="form-label">Select Product</label>
						<input type="text" id="search" autocomplete="off" class="form-control" placeholder="Type a name...">
						<div id="suggestion-box"></div>
					</div>
					<div class="col-md-6">
						<label for="itemInput" class="form-label">Enter number of add items:</label>
						<input type="number" class="form-control" id="itemInput" placeholder="Enter number of items">
					</div>
					<button type="submit" class="btn btn-primary mt-4">Add Items</button>
				</div>
			</div>
		</div>
		<h3>Remaining Product Quantity</h3>
		<table class="table table-bordered table-striped">
			<thead class="table-dark">
				<tr>
					<th>Product Name</th>
					<th>Available</th>
					<th>image</th>
					<th>Category</th>
					<th>Sub Category</th>
				</tr>
			</thead>
				<tbody id="productList">
				 <tr>
					<td>potato</td>
					<td>10 pc</td>
					<td></td>
					<td>khhaddo</td>
					<td>chips</td>
				</tr>
			</tbody>
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
<script>
    $(document).ready(function() {
        $('#search, #sub_category').on('input', function() {
            var query = $('#search').val();
            var subCategory = $('#sub_category').val();
            if (query !== '') {
                $.ajax({
                    url: 'search.php',
                    method: 'POST',
                    data: { 
                        query: query,
                        subCategory: subCategory
                    },
                    success: function(data) {
                        $('#suggestion-box').fadeIn();
                        $('#suggestion-box').html(data);
                    }
                });
            } else {
                $('#suggestion-box').fadeOut();
                $('#suggestion-box').html('');
            }
        });

        $(document).on('click', 'li', function() {
            $('#search').val($(this).text());
            $('#suggestion-box').fadeOut();
        });
    });
</script>

<?php
include_once '../admin_component/footer.php';
?>