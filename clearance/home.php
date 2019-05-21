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
		 <!-- FORM UPDATE SEM -->
		  <hr/>
			<?php
				if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['save']) == "Send")){
					$schoolyear = test_input($_POST["schoolyear"]);
					$schoolyear = mysqli_real_escape_string($con, $_POST["schoolyear"]);
					
					$sem = test_input($_POST["sem"]);
					$sem = mysqli_real_escape_string($con, $_POST["sem"]);
					
					$ss = "ASDAasd12312adasEsadasda";
					// UPDATE DATA
					$sql_update = "UPDATE tbl_students SET year =  year + 1, school_year='$schoolyear', sem='$sem' WHERE status='R'";	
					$sql_update2 = "UPDATE tbl_semyear SET school_year='$schoolyear', sem='$sem' WHERE salt='$ss'";	
					$sql_update3 = "UPDATE tbl_students SET school_year='$schoolyear', sem='$sem' WHERE status='I'";	
					$log_name = "Update school year and semester of regular student : ".$schoolyear." - ".$sem."";
					$sql_insert_log = ("INSERT INTO tbl_logs (log_name, username, fullname, date, time) 
										VALUES ('$log_name','$uname','$user_flname', '$current_date', '$current_time')");
											
					if (mysqli_query($con, $sql_update) && mysqli_query($con, $sql_insert_log ) && mysqli_query($con, $sql_update2 ) && mysqli_query($con, $sql_update3 ) ) {
							echo "<div class='alert alert-success'>School Year and Semester of Regular Students Successfully Updated!</div>";
							echo "<script>setTimeout(\"location.href = 'home';\",2800);</script>";
					} else {
						echo "Error: " . $sql_update . "<br>" . mysqli_error($con);
					}
				}
				
			if($user_utype == "1" || $user_utype == "3") {
			?>
			
			<form name="frmUploadFile" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" enctype="multipart/form-data" autocomplete="off">
			<div class="form-group">
				<div class="form-row">
					<div class="col-md-3">
						<select class="form-control" name="schoolyear" required>
							<option><?php echo $current_school_year; ?></option>
							<option>2018-2019</option>
							<option>2019-2020</option>
							<option>2020-2021</option>
							<option>2021-2022</option>
							<option>2022-2023</option>
							<option>2023-2024</option>
						</select>
					</div>
					<div class="col-md-3">
						<select class="form-control" name="sem">
							<option><?php echo $current_sem; ?></option>
							<option value='1ST'>1ST</option>
							<option value='2ND'>2ND</option>
							<option value='SUMMER'>SUMMER</option>
						</select>
					</div>
					<div class="col-md-3">
						 <input type="submit" class="btn btn-success btn-block"  name="save" value="Update School Year and Semester">  
					</div>
				</div>
			</div>
			</form>
			<hr/>
		  
		  <?php
		  
			}
		  ?>
		  <!-- Example DataTables Card-->
		  <div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-table"></i> Students <span><a href="add_student" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> add student </a></span></div>
				<div class="card-body">
					<form action="#" method="get">
						<div class="row">
							<div class="col-lg-8">
								<span><a href="view_officer" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> view officer </a></span>
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
						<table class="table table-list-search table-bordered table-condensed custab small" style="font-size:70%;">
							<thead>
								<tr>
									<th>#</th>
									<th>SY - Sem</th>
									<th>Student ID</th>
									<th>Student Name</th>
									<th>Course</th>
									<th>Year</th>
									<th>Section</th>
									<th>Status</th>
									<th>Show Sanction</th>
									<th colspan=2>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									//DELETE
									if(isset ($_GET['grad'])) {
										$salt = $_GET['grad'];
										$archive = "1";
										mysqli_query($con, "UPDATE tbl_students SET archive='$archive' WHERE salt='$salt'");
										echo "<script>setTimeout(\"location.href = 'home';\",100);</script>";
									}
									$x = 1;
									
									//SHOW STUDENT
									$sql="SELECT * FROM tbl_students WHERE archive = '0' AND remove_status = ''  ORDER BY lastname asc";
									$result = $con->query($sql);
									if ($result->num_rows > 0) {
									  // output data of each row
									  while($row = $result->fetch_assoc()) {
										$fullname = $row['lastname'].", ".$row['firstname']." ".$row['middlename'];
										$fullname = strtoupper($fullname);
										//IF OFFICER
										 $status = $row['officer'];
										  if($status == "Y"){
											echo "<tr style='background-color:#c0f3f1;'>";
										  }
										  else {
											echo "<tr>";  
										  }
										echo  "
										  <td>".$x++."</td>
										  <td>".$row['school_year']." - ".$row['sem']."</td>
										  <td>".$row['student_id']."</td>
										  <td>".$fullname."</td>
										  <td>".$row['course']."</td>
										  <td>".$row['year']."</td>
										  <td>".$row['section']."</td>
										  <td>".$row['status']."</td>";
										echo "<td><a href='remarks?id=".$row['salt']."' title='add remarks' class='btn btn-success btn-sm'><i class='fa fa-fw fa-folder-open'></i> show sanction</a></td>";	
										echo "<td>
												<a href='edit_student?id=".$row['salt']."' title='edit' class='btn btn-warning btn-sm'><i class='fa fa-fw fa-edit'></i></a>";
												?>
													<a onclick="return confirm('Are you sure you want to delete this student?')" href="home?grad=<?php echo $row['salt']; ?>" class="btn btn-danger btn-sm"><i class='fa fa-fw fa-trash'></i></a>
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

