<?php
include_once '../admin_component/head.php';
include_once '../admin_component/navbar.php';
include_once '../admin_component/sidebar.php';
?>

<div class="content mt-5 " id="content">
<!-- Content -->
<div class="row">
        <div class="col-md-6 mb-6">
          <div class="card bg-success text-white">
            <div class="card-body">
              <h5 class="card-title">Total reports</h5>
              <p class="card-text"></p> 
            </div>
          </div>
        </div>
      <table class="table table-striped">
		<thead>
			<tr>
			  <th scope="col">SR</th>
			  <th scope="col">Reporter.Name</th>
			  <th scope="col">Number or Email</th>
			  <th scope="col">Date</th>
			  <th scope="col">Description</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>01</td>
				<td>boss</td>
				<td>s@gmail.com</td>
				<td>01.03.2013</td>
				<td>service bala nai</td>
			</tr>
		</tbody>
	  </table>
</div>

<?php
include_once '../admin_component/footer.php';
?>
