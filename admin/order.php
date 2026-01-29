<?php
include_once '../admin_component/head.php';
include_once '../admin_component/navbar.php';
include_once '../admin_component/sidebar.php';
?>
<!-- Content -->
<div class="content mt-5" id="content">
    <h2>Manage Orders</h2>

    <!-- Add Order Form -->
    <div class="card mb-4">
        <div class="card-header">Add New Order</div>
        <div class="card-body">
            <form id="orderForm">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="orderId" class="form-label">Order ID</label>
                        <input type="text" class="form-control" id="orderId" placeholder="Enter order ID" required>
                    </div>
                    <div class="col-md-4">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" placeholder="Enter product name" required>
                    </div>
                    <div class="col-md-4">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" placeholder="Enter quantity" required>
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col-md-4">
                        <label for="price" class="form-label">Price (Tk)</label>
                        <input type="number" class="form-control" id="price" placeholder="Enter price" required>
                    </div>
                    <div class="col-md-4">
                        <label for="status" class="form-label">Order Status</label>
                        <select class="form-control" id="status" required>
                            <option value="Pending">Pending</option>
                            <option value="Shipped">Shipped</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Add Order</button>
            </form>
        </div>
    </div>

    <!-- Order List -->
    <h3>Order List</h3>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price (Tk)</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="orderList">
            <!-- Dynamic Rows will be inserted here -->
        </tbody>
    </table>
</div>
<?php
include_once '../admin_component/footer.php';
?>
