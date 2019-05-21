<?php 
	session_start();
	// Check, if username session is NOT set then this page will jump to login page
	$uname = $_SESSION['username'];
	//CONNECTION OF THE DATABASE
	include 'includes/connection.php';
	
	$title = "Inbox";
?>

<!DOCTYPE html>
<html lang="en">

<?php
	//INCLUDE head.php
	include 'includes/head.php';
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
	
	<?php include 'includes/nav.php' ?>
  
  <!-- end -->
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index">Menu</a>
        </li>
        <li class="breadcrumb-item active">Inbox</li>
      </ol>
	  
	        <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Inbox</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Tracking #</th>
                  <th>Document</th>
                  <th>Author</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Tracking #</th>
                  <th>Document</th>
                  <th>Author</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
					$sql="SELECT * FROM doc_sent ORDER BY date";
					$result = $con->query($sql);
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo  "<tr>
							  <td>".$row['track_no']."</td>
							  <td>".$row['doc_name']."</td>
							  <td>".$row['author']."</td>
							  <td>".$row['date']." - ".$row['time']."</td>
							  <td>".$row['status']."</td>
							  <td class='text-center'><a href='open-file?id=".$row['salt']."' title='open' class='btn btn-primary btn-sm'><i class='fa fa-fw fa-envelope-open'></i></a> <a href='delete-file?id=".$row['salt']."' title='delete'  class='btn btn-danger btn-sm'><i class='fa fa-fw fa-trash'></i></a></td>
							</tr>";
						}
					}
					 else {
						echo "<div class='alert alert-warning'>0 results</div>";
					}
					// Free result set
					mysqli_free_result($result);
				?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">
			<?php 
				//LAST UPDATE OF THE TABLE
				$sqla = "SELECT * FROM documents ORDER BY id DESC LIMIT 1";
				$result = mysqli_query($con, $sqla);
				$row = mysqli_fetch_assoc($result);
				echo "Last update was " . date("F d, Y", strtotime($row['date']));
			?>

		</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
	<!-- FOOTER -->
		
		<?php include 'includes/footer.php'; ?>
	
	<!--END OF FOOTER -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
	
    <!-- Logout Modal-->
		<?php include 'includes/logout_btn.php'; ?>
		
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
