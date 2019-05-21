<?php 
	//TITLE OF PAGE
	$title = "Student Remarks";

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
          <a href="home">Home</a>
        </li>
        <li class="breadcrumb-item active">Student Remark(s)</li>
      </ol>

	  <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
        <i class="fa fa-table"></i> Student Remarks </div>
        <div class="card-body">
				<?php
					$id = isset($_GET['id']) ? $_GET['id'] : '';
					$sql_student = mysqli_query($con, "SELECT * FROM `tbl_students` WHERE `salt` = '$id' ");
					$row = mysqli_fetch_array($sql_student, MYSQLI_BOTH);
					$ss = $row['id'];
					$student_id = $row['student_id'];
					$fullname = $row['lastname'].", ".$row['firstname']." ".$row['middlename'];
					$officer = $row['officer'];
					if ($officer == "Y") {
						echo "<h3 style='color:#28a745;'>".$student_id." - ".strtoupper($fullname)."</h3>";
					}
					else {
						echo "<h3>".$student_id." - ".strtoupper($fullname)."</h3>";
					}
				?>
				<hr/>
				<?php 
					if(isset($_POST['schoolyear']) && isset($_POST['sem']) ){
						$sy = $_POST["schoolyear"]; 
						$sem = $_POST["sem"]; 
					}
					else {
						$sy = $current_school_year;
						$sem = $current_sem;
					}
				?>
				<form  method="post" action="" role="form" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-2">
							<select class="form-control" name="schoolyear">
								<option><?php echo $current_school_year; ?></option>
								<option>2018-2019</option>
								<option>2019-2020</option>
								<option>2020-2021</option>
								<option>2021-2022</option>
								<option>2022-2023</option>
								<option>2023-2024</option>
							</select>
						</div>
						<div class="col-lg-2">
							<select class="form-control" name="sem">
								<option><?php echo $current_sem; ?></option>
								<option value='1ST'>1ST</option>
								<option value='2ND'>2ND</option>
								<option value='SUMMER'>SUMMER</option>
							</select>
						</div>
						<div class="col-lg-2">
							<button type="submit" class="btn btn-success btn-block"><i class="fa fa-search"></i> search</button>
						</div>
				</form>
						<div class="col-lg-6">
						<?php 
							echo "<a href='add_remarks?id=".$id."' title='add remarks' class='btn btn-success'><i class='fa fa-plus'></i> add sanction </a>&nbsp";  
							//if($officer == "Y" || $officer == "y") {
								//echo "<a href='add_requirements?id=".$id."' title='edit' class='btn btn-success'><i class='fa fa-plus'></i> add requirements </a>&nbsp";
							//}
							echo "<a href='print_rlist?id=".$id."' title='print list of sanction' class='btn btn-success'><i class='fa fa-print'></i> print sanction </a>"; 
							
							
						?>
						</div>

					</div>
					<hr/>
					<div class="row">
						<div class="col-lg-8">
						</div>
						<div class="col-lg-4">
							<div class="input-group">
								<!-- eto yung pang search -->
								<input class="form-control" id="system-search" name="q" placeholder="Search..."  >
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</div>
					</div>
				
				<div class="table-responsive" style="margin-top:10px;">
					<table  class="table table-list-search table-bordered table-condensed custab small">
						<thead>
							<tr>
								<th>Event</th>
								<th>Event Date</th>
								<th>Absent/Late</th>
								<th>Sanction</th>
								<th>Quantity</th>
								<th>Date of Absent/Late</th>
								<th>Compliance <br/><i>(Faculty)</i></th>
								<th>Compliance <br/><i>(Student Governor)</i></th>
								<th>Compliance <br/><i>(Dean)</i></th>
								<th>Approve</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql="SELECT * FROM tbl_sanctionlink WHERE student_id = '$ss' AND school_year = '$sy' ORDER BY timestamp asc";
								$result = $con->query($sql);
								$S = 1;
								if ($result->num_rows > 0) {
								  // output data of each row
								  while($row = $result->fetch_assoc()) {
									$event_id = $row['event_id'];
									$sanction_id = $row['sanction_id'];
									$sanction_date = date("F d, Y", strtotime($row['sanction_date']));
									$sanction_type = $row['sanction_type'];
									$C1 = $row['C1'];
									$C2 = $row['C2'];
									$C3 = $row['C3'];

									//GET EVENT
									$sql_event = mysqli_query($con, "SELECT * FROM `tbl_event` WHERE `event_id` = '$event_id' ");
									$event_row = mysqli_fetch_array($sql_event, MYSQLI_BOTH);
									$event_name = $event_row['event_name'];
									$start_date = date("M d, Y", strtotime($event_row['start_date']));
									$end_date =  date("M d, Y", strtotime($event_row['end_date']));
									
									echo "<tr>
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

										if ($C1 == "Y") {
											echo "<td><span class='btn btn-success btn-sm'><i class='fa fa-fw fa-check'></i></span></td>";
										}
										else {
											echo "<td><span class='btn btn-danger btn-sm'><i class='fa fa-fw fa-ban'></i></span></td>";
										}
										if($officer != "Y") {
											if ($C2 == "Y") {
												echo "<td><span class='btn btn-success btn-sm'><i class='fa fa-fw fa-check'></i></span></td>";
											}
											else {
												echo "<td><span class='btn btn-danger btn-sm'><i class='fa fa-fw fa-ban'></i></span></td>";
											}
										}
										else {
											echo "<td><b>-</b></td>";
										}
										if ($C3 == "Y") {
											echo "<td><span class='btn btn-success btn-sm'><i class='fa fa-fw fa-check'></i></span></td>";
										}
										else {
											echo "<td><span class='btn btn-danger btn-sm'><i class='fa fa-fw fa-ban'></i></span></td>";
										}
										if($user_utype == "1") {
											echo "<td><a href='approved_c1?id=".$row['salt']."' title='approve sanction' class='btn btn-success btn-sm'><i class='fa fa-fw fa-check'></i> APPROVE</a></td>";
										}
										if($user_utype == "2") {
											echo "<td><a href='approved_c2?id=".$row['salt']."' title='approve sanction' class='btn btn-success btn-sm'><i class='fa fa-fw fa-check'></i> APPROVE</a></td>";
										}
										if($user_utype == "3") {
											echo "<td><a href='approved_c3?id=".$row['salt']."' title='approve sanction' class='btn btn-success btn-sm'><i class='fa fa-fw fa-check'></i> APPROVE</a></td>";
										}
									/// --------------- ///
								  }
								}
								else {
								  $S = 0;
								  echo "<div class='alert alert-info'><h3><b>NO SANCTION FOR THIS STUDENT! VERY GOOD!</b></h3></div>";
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
				//CHECK IF NON-COMPLIANT
				//$sql= "SELECT COUNT (C1) AS C1 FROM tbl_sanctionlink WHERE student_id ='$ss'";
				$sql1 = " SELECT COUNT(*) c FROM tbl_sanctionlink WHERE `student_id` = '$ss' AND C1 = 'N' AND school_year = '$current_school_year';";
				$result1 = mysqli_query($con,$sql1);
				$row1=mysqli_fetch_assoc($result1);
				 $c1 = $row1['c'];
				
				$sql2 = " SELECT COUNT(*) c FROM tbl_sanctionlink WHERE `student_id` = '$ss' AND C2 = 'N' AND school_year = '$current_school_year';";
				$result2 = mysqli_query($con,$sql2);
				$row2 = mysqli_fetch_assoc($result2);
				 $c2 = $row2['c'];
				
				$sql3 = " SELECT COUNT(*) c FROM tbl_sanctionlink WHERE `student_id` = '$ss' AND C3 = 'N' AND school_year = '$current_school_year';";
				$result3 = mysqli_query($con,$sql3);
				$row3 = mysqli_fetch_assoc($result3);
				 $c3 = $row3['c'];
				if ($officer != "Y") {
					if ($c1 <= 0 && $c2 <= 0 && $c3 <= 0 && $S != 0) {
						echo "<span><a  href='print_clearance?id=".$id."' class='btn btn-success btn-block'><i class='fa fa-print'></i> print clearance </a></span>";
					}
					else if ($S == 0) {
						echo "<span><a  href='print_clearance?id=".$id."' class='btn btn-success btn-block'><i class='fa fa-print'></i> print clearance </a></span>";
					}
					else {
						echo "<div class='alert alert-danger text-center'>Please comply first before printing clearance!</div>";
					}
				}
				else {
					if ($c1 <= 0  && $c3 <= 0 && $S != 0) {
						echo "<span><a  href='print_clearance?id=".$id."' class='btn btn-success btn-block'><i class='fa fa-print'></i> print clearance </a></span>";
					}
					else if ($S == 0) {
						echo "<span><a  href='print_clearance?id=".$id."' class='btn btn-success btn-block'><i class='fa fa-print'></i> print clearance </a></span>";
					}
					else {
						echo "<div class='alert alert-danger text-center'>Please comply first before printing clearance!</div>";
					}
					
				}
				
				
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

