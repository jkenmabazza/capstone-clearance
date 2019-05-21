<?php 
	//TITLE OF PAGE
	$title = "Monitor Sanction";

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
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="sanctions">Sanction</a>
        </li>
        <li class="breadcrumb-item active">Monitor Sanction</li>
      </ol>

	  <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
        <i class="fa fa-table"></i> Monitor Sanction </div>
        <div class="card-body">
				<?php
					$id = isset($_GET['id']) ? $_GET['id'] : '';
				?>
				<hr/>
				<?php 
					if (isset($_POST["schoolyear"])) {
						$sy = $_POST["schoolyear"]; 
					}else{  
						$sy = $current_school_year;
					}
					
					$semester = $current_sem;
				?>
				<form action="#" method="get">
					<div class="row">
						<div class="col-lg-8">
		
						</div>
						<div class="col-lg-4">
							<div class="input-group">
								<!-- eto yung pang search -->
								<input class="form-control" id="system-search" name="q" placeholder="Search..." required>
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
								<th>Year</th>
								<th>Student ID & Name</th>
								<th>Event</th>
								<th>Event Date</th>
								<th>Absent/Late</th>
								<th>Sanction</th>
								<th>Quantity</th>
								<th>Sanction Date</th>
							</tr>
						</thead>
						<tbody>
							<?php

								$sql="SELECT * FROM tbl_sanctionlink ORDER BY school_year, timestamp asc";
								$result = $con->query($sql);
								$x = 1;
								if ($result->num_rows > 0) {
								  // output data of each row
								  while($row = $result->fetch_assoc()) {
									$student_id = $row['student_id'];
									$event_id = $row['event_id'];
									$sanction_id = $row['sanction_id'];
									$sanction_date = date("F d, Y", strtotime($row['sanction_date']));
									$sanction_type = $row['sanction_type'];
									$C1 = $row['C1'];
									$C2 = $row['C2'];
									$C3 = $row['C3'];
									
									//GET STUDENT
									$sql_stud = mysqli_query($con, "SELECT * FROM `tbl_students` WHERE `id` = '$student_id' ");
									$stud_row = mysqli_fetch_array($sql_stud, MYSQLI_BOTH);
									$fullname = $stud_row['lastname'].", ".$stud_row['firstname']." ".$stud_row['middlename'];
									$sysem = $stud_row['school_year']." - ".$stud_row['sem']." SEMESTER";
									
			

									//GET EVENT
									$sql_event = mysqli_query($con, "SELECT * FROM `tbl_event` WHERE `event_id` = '$event_id' ");
									$event_row = mysqli_fetch_array($sql_event, MYSQLI_BOTH);
									$event_name = $event_row['event_name'];
									$start_date = date("M d, Y", strtotime($event_row['start_date']));
									$end_date =  date("M d, Y", strtotime($event_row['end_date']));

									echo "<tr>
									  <td>".$x++."</td>
									  <td>".$sysem."</td>
									  <td>".$fullname."</td>
									  <td>".$event_name."</td>
									  <td>".$start_date." - ".$end_date."</td>
									  <td>".$sanction_type."</td>";
									echo "<td>";
									$arr = explode(',',$sanction_id); 
									foreach($arr as $i) { 
										//GET SANCTION
										$sql_sanction = mysqli_query($con, "SELECT * FROM `tbl_sanction` WHERE `sanction_id` = '$i' ");
										$sanction_row = mysqli_fetch_array($sql_sanction, MYSQLI_BOTH);
										$item_name = $sanction_row['item_name']; 
										$quantity = $sanction_row['quantity'];
										echo($item_name.'<br>');
									}
									echo "</td>";
									  
									echo "
									  <td>".$quantity."</td>
									  <td>".$sanction_date."</td>";

									/// --------------- ///
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

