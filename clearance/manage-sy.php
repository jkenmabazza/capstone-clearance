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
          <a href="home">Students</a>
        </li>
        <li class="breadcrumb-item active">School Year - Semester</li>
      </ol>
      <div class="row">
		<div class="col-md-9">
		  <div class="card-header">Manage School Year/Semester</div>
		  <div class="card-body">
			<?php
				// define variables and set to empty values
				$item_name = $quantity = "";
				if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['save']) == "Send")){
							
					$schoolyear = test_input($_POST["schoolyear"]);
					$schoolyear = mysqli_real_escape_string($con, $_POST["schoolyear"]);
					
					$sem = test_input($_POST["sem"]);
					$sem = mysqli_real_escape_string($con, $_POST["sem"]);
												
					$date = date("Y-m-d");
					$time = date("h:i:sa");
					$salt = sha1($date.$time);
					$ss = "ASDAasd12312adasEsadasda";
					// UPDATE DATA
					$sql_update = "UPDATE tbl_semyear SET school_year='$schoolyear', sem='$sem' WHERE salt='$ss'";	
					$log_name = "Update School Year and Semester into".$schoolyear." ".$sem."";
					$sql_insert_log = ("INSERT INTO tbl_logs (log_name, username, fullname, date, time) 
										VALUES ('$log_name','$uname','$user_flname', '$current_date', '$current_time')");
											
					if (mysqli_query($con, $sql_update) && mysqli_query($con, $sql_insert_log) ) {
							echo "<div class='alert alert-success'>Successfully updated!</div>";
							echo "<script>setTimeout(\"location.href = 'manage-sy';\",800);</script>";
					} else {
						echo "Error: " . $sql_update . "<br>" . mysqli_error($con);
					}
				}
			?>
			<form name="frmUploadFile" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" enctype="multipart/form-data" onsubmit="return checkForm(this);" autocomplete="off">
			  
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<label for="schoolyear">School Year </label>
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
				  <div class="col-md-6">
					<label for="sem">Semester </label>
					<select class="form-control" name="sem">
						<option><?php echo $current_sem; ?></option>
						<option value='1ST'>1st</option>
						<option value='2ND'>2nd</option>
						<option value='SUMMER'>Summer</option>
					</select>
				  </div>
				</div>
			  </div>	  
			
			  <input type="submit" class="btn btn-primary btn-block"  name="save" value="Update">  
			</form>
		  </div>
		</div>
		<div class="col-lg-3">
			<div class="card-header">Guide</div>
			<div class="card-body">
				<ol class="small alert alert-info">
					<li>Item name - field can't be empty. </li>
					
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