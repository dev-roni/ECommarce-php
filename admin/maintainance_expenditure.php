<?php
include_once '../admin_component/head.php';
include_once '../admin_component/navbar.php';
include_once '../admin_component/sidebar.php';
?>





<!-- Content -->
<div class="content mt-5 " id="content">
    <h2>Maintainace Expenditure</h2>
    <!-- Add Product Form -->
    <div class="card mb-4">
        <div class="card-header">Add Maintainace Cost</div>
        <div class="card-body">
            <form id="productForm">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="productName" class="form-label">Expenditure ‍Sector</label>
                        <input type="text" class="form-control" id="productName" placeholder="Enter product name" required>
                    </div>
                    <div class="col-md-4">
                        <label for="productPrice" class="form-label">Total cost</label>
                        <input type="number" class="form-control" id="productPrice" placeholder="Enter price" required>
                    </div>
                    <div class="col-md-4">
                        <label for="productImage" class="form-label">Description</label>
                        <input type="url" class="form-control" id="productImage" placeholder="Enter image URL" required>
                    </div>
					 <div class="col-md-4">
                        <label for="productImage" class="form-label">Expenditure Date</label>
                        <input type="url" class="form-control" id="productImage" placeholder="Enter image URL" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Add Maintainace cost</button>
            </form>
        </div>
    </div>

    <!-- Product List -->
    <h3>Maintainace</h3>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>id</th>
                <th>sector</th>
                <th>total cost</th>
                <th>description</th>
                <th>date</th>
            </tr>
        </thead>
        <tbody id="productList">
            <tr>
			<td></td>
			<td>electric bill</td>
			<td>500</td>
			<td>electric</td>
			<td>01.02.2016</td>
			</tr>
        </tbody>
    </table>
</div>

<?php
include_once '../admin_component/footer.php';
?>
