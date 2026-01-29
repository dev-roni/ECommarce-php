<?php 
include_once '../admin_component/head.php';
include_once '../admin_component/navbar.php';
include_once '../admin_component/sidebar.php';
?>

    <div class="content mt-5 " id="content">
        <h2>User Data</h2>
        
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>buy product</th>
                    <th>cenceled product</th>
					<th>prouduct in cart</th>
                    <th>searched product</th>
                </tr>
            </thead>
            <tbody>
				<tr>
					<td></td>
					<td>boss</td>
					<td>01111</td>
					<td>bhanubil</td>
					<td>chana,motor</td>
					<td>chips</td>
					<td>chanachur</td>
					<td>biscuit</td>
				</tr>
                
            </tbody>
        </table>
		
<?php
include_once '../admin_component/footer.php';
?>