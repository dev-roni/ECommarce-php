 <?php
include_once '../admin_component/head.php';
include_once '../admin_component/navbar.php';
include_once '../admin_component/sidebar.php';
include_once '../db_connection.php';
include_once '../functions.php';
?>
<div class="content mt-5 " id="content">
	<h3>Remaining Product Quantity</h3>
	<table class="table table-bordered table-striped">
		<thead class="table-dark">
			<tr>
				<th>Id</th>
				<th>User Name</th>
				<th>Total amount</th>
				<th>date</th>
			</tr>
		</thead>
			<tbody id="productList">
			 <tr>
				<td>1</td>
				<td>boss</td>
				<td>10000500 TK/-</td>
				<td>10-10-24</td>
			</tr>
		</tbody>
	</table>
</div>
<?php
include_once '../admin_component/footer.php';
?>
		