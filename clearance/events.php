<?php 
	//TITLE OF PAGE
	$title = "Event";

	//INCLUDE head.php
	include 'includes/head.php';
?>

<body onload="notifyMe()" class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
	
	<?php include 'includes/nav.php' ?>
  
  <!-- end -->
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

	  <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-calendar"></i> Event(s) <span><a href="add_event" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> add event </a></span></div>
        <div class="card-body">
				<form action="#" method="get">
					<div class="row">
						<div class="col-lg-8">
						</div>
						<div class="col-lg-4">
							<div class="input-group">
								<!-- eto yung pang search -->
								<input class="form-control" id="system-search" name="q" placeholder="Search event..." required>
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</div>
					</div>
				</form>
				<div class="table-responsive" style="margin-top:10px;">
					<table  class="table table-list-search table-bordered table-condensed custab small">
						<thead>
							<tr>
								<th>#</th>
								<th>Event Name</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Venue</th>
								<th colspan=2>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								//DELETE
								if(isset ($_GET['del'])) {
									$salt = $_GET['del'];
									$archive = "1";
									mysqli_query($con, "UPDATE tbl_event SET archive='$archive' WHERE salt='$salt'");
									echo "<script>setTimeout(\"location.href = 'events';\",100);</script>";
								}
							
								$sql="SELECT * FROM tbl_event WHERE archive = '0' ORDER BY event_name asc";
								$result = $con->query($sql);
								if ($result->num_rows > 0) {
								  // output data of each row
								  $x = 1;
								  while($row = $result->fetch_assoc()) {
									$event_name = strtoupper($row['event_name']);
									$sdate = date("F d, Y", strtotime($row['start_date']));
									$edate = date("F d, Y", strtotime($row['end_date']));
									$venue = strtoupper($row['venue']);
									echo "<tr>
									  <td>".$x++."</td>
									  <td>".$event_name."</td>
									  <td>".$sdate."</td>
									  <td>".$edate ."</td>
									  <td>".$venue."</td>";
									echo "<td>
											<a href='edit_event?id=".$row['salt']."' title='edit' class='btn btn-warning btn-sm'><i class='fa fa-fw fa-edit'></i></a>";
											?>
											<a onclick="return confirm('Are you sure you want to delete this event?')" href="events?del=<?php echo $row['salt']; ?>" class="btn btn-danger btn-sm"><i class='fa fa-fw fa-trash'></i></a>
										  <?php
										  echo "</td></tr>";	
									  
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
				</div>

        </div>
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

