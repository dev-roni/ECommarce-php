<?php
include_once 'site_component/head.php';
include_once 'site_component/navbar.php';
include_once 'site_component/sidebar.php';

$total_price1 = 0;
$total_products1=0;

if (isset($_SESSION['cart_product_list']) && count($_SESSION['cart_product_list']) > 0) {
            foreach ($_SESSION['cart_product_list'] as $index => $row) {
                $total_price1 += $row['price'];
				$total_products1++;
            }
        }

?>
<div class="mt-3 container">
        <h5>Total Products in Cart: <strong><?php echo $total_products1; ?></strong></h5>
        <h5>Total Price: <strong><?php echo number_format($total_price1, 2); ?></strong> Tk</h5>
</div>

<div class='container';>
<form id="cartForm">
    <ul class="list-group">
        <?php
        if (isset($_SESSION['cart_product_list']) && count($_SESSION['cart_product_list']) > 0) {
            foreach ($_SESSION['cart_product_list'] as $index => $row) {
                ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <input type="checkbox" class="form-check-input me-2 product-checkbox" 
                               data-price="<?php echo $row['price']; ?>" 
                               data-index="<?php echo $index; ?>">
                        <img src="Assets/image/<?php echo htmlspecialchars($row['image_url']); ?>" 
                             alt="<?php echo htmlspecialchars($row['product_name']); ?>" 
                             width="60" height="60" class="me-3 rounded">
                        <div>
                            <strong><?php echo htmlspecialchars($row['product_name']); ?></strong><br>
                            <small><?php echo $row['price']; ?> Tk</small>
                        </div>
                    </div>
                    <a href="remove_cart.php?index=<?php echo $index; ?>" class="btn btn-sm btn-danger">Remove</a>
                </li>
                <?php
            }
        } else {
            echo "<li class='list-group-item'>No products in cart.</li>";
        }
        ?>
    </ul>

    <!-- Summary Section -->
    <div class="mt-3">
        <h5>Selected Products: <span id="totalProducts">0</span></h5>
        <h5>Total Price: <span id="totalPrice">0</span> Tk</h5>
		<button type="button" onclick="redirectUser()">order now</button>
    </div>
</form>

<?php
    $redirect_url = isset($_SESSION["Login_Status"]) ? 'confirm_order.php' : 'registration.php';
?>
<script>
    function redirectUser() {
        window.location.href = "<?php echo $redirect_url; ?>";
    }
</script>

<script>
    const checkboxes = document.querySelectorAll('.product-checkbox');
    const totalPriceElem = document.getElementById('totalPrice');
    const totalProductsElem = document.getElementById('totalProducts');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            let total = 0;
            let count = 0;

            checkboxes.forEach(cb => {
                if (cb.checked) {
                    total += parseFloat(cb.getAttribute('data-price'));
                    count++;
                }
            });

            totalPriceElem.textContent = total.toFixed(2);
            totalProductsElem.textContent = count;
        });
    });
</script>
<?php
include_once 'site_component/footer.php';
?>