<?php 
	//TITLE OF PAGE
	$title = "Home";

	//INCLUDE head.php
	include 'includes/head.php';
?>

<body onload="notifyMe()" class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
	
	<?php include 'includes/nav.php' ?>
  
  <!-- end -->
	
	<div class="content-wrapper">
		<div class="container-fluid">
	
		  <!-- Example DataTables Card-->
		  <div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-table"></i> List of Officer : Requirements</div>
				<div class="card-body">
					<form action="#" method="get">
						<div class="row">
							<div class="col-lg-8">
							
							</div>
							<div class="col-lg-4">
								<div class="input-group">
									<!-- eto yung pang search -->
									<input class="form-control" id="system-search" name="q" placeholder="Search student..." required>
									<span class="input-group-btn">
										<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
									</span>
								</div>
							</div>
						</div>
					</form>
					<div class="table-responsive" style="margin-top:10px;">
						<table class="table table-list-search table-bordered table-condensed custab small">
							<thead>
								<tr>
									<th>#</th>
									<th>Student ID & Name</th>
									<th>Course - Year</th>
									<th>Requirements</th>
									<th>Due Date</th>
									<th>Status</th>
									<th colspan=2>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									//DELETE
									if(isset ($_GET['del'])) {
										$iddd = $_GET['del'];
										$stat = "Y";
										mysqli_query($con, "UPDATE tbl_requirements SET status='$stat' WHERE id='$iddd'");
										echo "<script>setTimeout(\"location.href = 'view_officer';\",1);</script>";
									}
									$x = 1;
									
									//SHOW STUDENT
									$sql="SELECT * FROM tbl_requirements ORDER BY timestamp asc";
									$result = $con->query($sql);
									if ($result->num_rows > 0) {
									  // output data of each row
									  while($row = $result->fetch_assoc()) {
										$id = $row['id'];
										$requirements = $row['requirements'];
										$due_date = $row['due_date'];
										$status = $row['status'];
										
										$cd = date("Y-m-d", strtotime($current_date));
										$dateTimestamp1 = strtotime($due_date);
										$dateTimestamp2 = strtotime($cd);									
										 
										//GET STUDENT
										$sql_stud = mysqli_query($con, "SELECT * FROM tbl_students WHERE id= '$id' AND archive = '0' AND remove_status = '' ");
										$stud_row = mysqli_fetch_array($sql_stud, MYSQLI_BOTH);
			
										$fullname = $stud_row['lastname'].", ".$stud_row['firstname']." ".$stud_row['middlename'];
										$fullname = strtoupper($fullname);
			
										echo  " <tr>
												<td>".$x++."</td>
												<td>".$stud_row['student_id']." : ".$fullname."</td>
												<td>".$stud_row['course']." - ".$stud_row['year']."</td>
												<td>".$requirements."</td>
												";
										if ($dateTimestamp1 < $dateTimestamp2) {
											echo "<td class='alert-danger'>".$due_date."</td>";
										}
										else {
											echo "<td class='alert-success'>".$due_date."</td>";
										}
										if ($status == "Y")		{
											echo "<td><span class='btn btn-success btn-sm'><i class='fa fa-fw fa-check'></i></span></td>";
										}
										else {
											echo "<td><span class='btn btn-success btn-sm'><i class='fa fa-fw fa-ban'></i></span></td>";
										}
										
											?>
												<td><a onclick="return confirm('Is this student complied?')" href="view_officer?del=<?php echo $id; ?>" class="btn btn-danger btn-sm"> approved</a></td>
											<?php
										echo "	</tr>";	
										  
									  }
									}
									else {
									  echo "<div class='alert alert-warning'>No data available!</div>";
									}
									// Free result set
									mysqli_free_result($result);
								  ?>
							</tbody>
						</table>		
						<div class="card-footer small text-muted">
							<?php 
								//LAST UPDATE OF THE TABLE
								$sqla = "SELECT * FROM tbl_students ORDER BY id DESC LIMIT 1";
								$result = mysqli_query($con, $sqla);
								$row = mysqli_fetch_assoc($result);
								echo "Last update was " . date("F d, Y", strtotime($row['timestamp']));
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


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
<script type="text/javascript">
	$(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');

    //something is entered in search form
    $('#system-search').keyup( function() {
       var that = this;
        // affect all table rows on in systems table
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {
        
            //Lower text for case insensitive
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();
            if(inputText != '')
            {
                $('.search-query-sf').remove();
                tableBody.prepend('<tr class="search-query-sf"><td colspan="9"><strong>Searching for: "'
                    + $(that).val()
                    + '"</strong></td></tr>');
            }
            else
            {
                $('.search-query-sf').remove();
            }

            if( rowText.indexOf( inputText ) == -1 )
            {
                //hide rows
                tableRowsClass.eq(i).hide();
                
            }
            else
            {
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();
            }
        });
        //all tr elements are hidden
        if(tableRowsClass.children(':visible').length == 1)
        {
            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="9">No entries found.</td></tr>');
        }
    });

});
</script>

