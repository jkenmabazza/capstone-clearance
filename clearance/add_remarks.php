<?php 
	//TITLE OF PAGE
	$title = "Add Sanction";

	//INCLUDE head.php
	include 'includes/head.php';
?>
<style>
	.error {
		color:#c30000;
		font-size:70%;
		font-weight:bold;
	}
	.cb {
		display:none;
	}
</style>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
	
	<?php include 'includes/nav.php' ?>
  
  <!-- end -->
  
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
			<?php 
				$id = isset($_GET['id']) ? $_GET['id'] : '';
				$sql_student = mysqli_query($con, "SELECT * FROM `tbl_students` WHERE `salt` = '$id' ");
				$row = mysqli_fetch_array($sql_student, MYSQLI_BOTH);

				$for_officer = $row['officer'];
				$ss = $row['id'];
				
				echo "<a href='remarks?id=".$id."'>Student Sanction(s)</a>";
			?>
        </li>
        <li class="breadcrumb-item active">Add Sanction</li>
      </ol>
      <div class="row">
		<div class="col-md-9">
		  <div class="card-header">Add Sanction(s)</div>
		  <div class="card-body">
			<?php
				// define variables and set to empty values
				$item_name = $quantity = "";
				if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['save']) == "Send")){
							
							$wew = test_input($_POST["wew"]);
							
							$studid = test_input($_POST["studid"]);
							$studid = mysqli_real_escape_string($con, $_POST["studid"]);
							
							$event_id = test_input($_POST["event_id"]);
							$event_id = mysqli_real_escape_string($con, $_POST["event_id"]);
								
							$sanction = test_input($_POST["sanction"]);
							$sanction = mysqli_real_escape_string($con, $_POST["sanction"]);
							
							$sanction_type = test_input($_POST["sanction_type"]);
							$sanction_type = mysqli_real_escape_string($con, $_POST["sanction_type"]);
							
							$sanction_date = test_input($_POST["sanction_date"]);
							$sanction_date = mysqli_real_escape_string($con, $_POST["sanction_date"]);
							
							$ampm = test_input($_POST["ampm"]);
							$ampm = mysqli_real_escape_string($con, $_POST["ampm"]);
							
							if (isset($_POST['req']) || isset($_POST['due_date'])) {
								$req = $_POST['req'];		
								$req = implode(', ', $req);	
								$due_date = test_input($_POST["due_date"]);
								$due_date = mysqli_real_escape_string($con, $_POST["due_date"]);
							}
							else {
								$req = "";
								$due_date = "";
							}
							$date = date("Y-m-d");
							$time = date("h:i:sa");
							$salt = sha1($date.$time);
							
							$officer = test_input($_POST["officer"]);
							
							//CHECK IF STUDENT SANCTION EXIST
							$sql_event= "SELECT * FROM tbl_sanctionlink WHERE sanction_id ='$sanction' AND sanction_date = '$sanction_date'";
							$result1 = mysqli_query($con, $sql_event);
							$count = mysqli_num_rows($result1);
							
							//GET QTY
							$sql_sanc = mysqli_query($con, "SELECT * FROM `tbl_sanction` WHERE `sanction_id` = '$sanction' ");
							$row = mysqli_fetch_array($sql_sanc, MYSQLI_BOTH);
							$qty = $row['quantity'];

						if ($count >= 1){
							echo "<div class='alert alert-danger'>Sorry, Sanction already exists.</div>";
						}
						else {
								// INSERT DATA
								$sql_insert = ("INSERT INTO tbl_requirements (requirements, due_date, student_id, status) 
											                   VALUES ('$req', '$due_date', '$studid', 'N')");
															   
								$sql_insert1 = ("INSERT INTO tbl_sanctionlink (student_id, event_id, sanction_id, sanction_type, sanction_date, ampm, school_year, sem, qty, salt) 
											                   VALUES ('$studid', '$event_id', '$sanction', '$sanction_type', '$sanction_date', '$ampm', '$current_school_year', '$current_sem', '$qty', '$salt')");
								
								$log_name = "Insert Remarks ".$studid;
								$sql_insert_log = ("INSERT INTO tbl_logs (log_name, username, fullname, date, time) 
									                VALUES ('$log_name','$uname','$user_flname', '$current_date', '$current_time')");
							
							if($officer == "Y") {	
								if (mysqli_query($con, $sql_insert1) && mysqli_query($con, $sql_insert_log) && mysqli_query($con, $sql_insert) ) {
		
										echo "<div class='alert alert-success'>Successfully added!</div>";
										echo "<script>setTimeout(\"location.href = 'remarks?id=".$wew."'\",1000);</script>";
									
										$item_name = $quantity = "";
								} else {
									echo "Error: " . $sql_insert . "<br>" . mysqli_error($con);
								}
							}
							else {
								if (mysqli_query($con, $sql_insert1) && mysqli_query($con, $sql_insert_log) ) {
		
										echo "<div class='alert alert-success'>Successfully added!</div>";
										echo "<script>setTimeout(\"location.href = 'remarks?id=".$wew."'\",1000);</script>";
									
										$item_name = $quantity = "";
								} else {
									echo "Error: " . $sql_insert . "<br>" . mysqli_error($con);
								}
							}
							
						}
				}
			?>
			<form name="frmUploadFile" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" enctype="multipart/form-data" onsubmit="return checkForm(this);" autocomplete="off">
				<input type="hidden" name="wew" value="<?php echo $id;?>">
				<input type="hidden" name="studid" value="<?php echo $ss;?>">
				<input type="hidden" name="officer" value="<?php echo $for_officer;?>">
				  <div class="form-group">
					<div class="form-row">
					  <div class="col-md-6">
						<label for="event_id">Event <span class="error">*</span></label>
						<select class="form-control" name="event_id" required>
							<?php
								echo "<option value='' selected>-- select event --</option>";
								$sql9="SELECT * FROM tbl_event";
								$result9 = $con->query($sql9);
								if ($result9->num_rows > 0) {
									while($row9 = $result9->fetch_assoc()) {
										echo  "<option value='".$row9['event_id']."'>".$row9['event_name']."</option>";
									}
								}
							?>
						</select>
					  </div>
					  <div class="col-md-6">
						<label for="sanction_date">Sanction Date</label>
						<input class="form-control" type="date" name="sanction_date">
					  </div>
					</div>
				  </div>	
				  <div class="form-group">
					<div class="form-row">
					   <div class="col-md-6">
						<label for="item_name">Sanction Type <span class="error">*</span></label>
						<select class="form-control" name="sanction_type" required>
							<option value=''>-- select type --</option>
							<option>Absent</option>
							<option>Late</option>
						</select>
					  </div>
					  <div class="col-md-6">
						<label for="ampm">AM/PM </label>
						<select class="form-control" name="ampm" >
							<option>AM</option>
							<option>PM</option>
						</select>
					  </div>
					</div>
				  </div>
			
				<div class="form-group">
					<div class="form-row">
					  <div class="col-md-6">
						<label for="sanction">Select Sanction <span class="error">*</span></label>
						<select class="form-control" name="sanction" required>
							<?php
								echo "<option value='' selected>-- select sanction --</option>";
								if ($for_officer == "Y"){
									$sql10="SELECT * FROM tbl_sanction WHERE for_officer = 'Y'";
								}
								else {
									$sql10="SELECT * FROM tbl_sanction";
								}
								$result10 = $con->query($sql10);
								if ($result10->num_rows > 0) {
									while($row10 = $result10->fetch_assoc()) {
										echo  "<option value='".$row10['sanction_id']."'>".$row10['item_name']."</option>";
									}
								}
							?>
						</select>		
					  </div>
					</div>
				</div>
				
				<?php if($for_officer == "Y") {?>
				<div class="form-group">
					<div class="form-row">
					  <div class="col-md-6">
						<label for="req">Requirements <span class="error"> for student officer only.  </span> </label>
						<br/>
						<input type="checkbox" value="Annual Reports" name="req[]"> Annual Report <br/>
						<input type="checkbox" value="Evaluation" name="req[]"> Evaluation <br/>
						<input type="checkbox" value="Minutes" name="req[]"> Minutes <br/>
					  </div>
					  <div class="col-md-6">
						<label for="due_date">Due Date </label>
						<br/>
						<input class="form-control" type="date" name="due_date" required>
					  </div>
					</div>
				</div>
				<?php } ?>
				
				<input type="submit" class="btn btn-primary btn-block"  name="save" value="Save">  
			</form>
		  </div>
		</div>
		<div class="col-lg-3">
			<div class="card-header">Guide</div>
			<div class="card-body">
				<ol class="small alert alert-info">
					
					
				</ol>
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
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
	<script src="js/form.js"></script>
  </div>
</body>

</html>