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
          <a href="sanctions">Sanction(s)</a>
        </li>
        <li class="breadcrumb-item active">Add Sanction</li>
      </ol>
      <div class="row">
		<div class="col-md-9">
		  <div class="card-header">Add Sanction</div>
		  <div class="card-body">
			<?php
				// define variables and set to empty values
				$item_name = $quantity = "";
				if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['save']) == "Send")){
							
					$item_name = test_input($_POST["item_name"]);
					$item_name = mysqli_real_escape_string($con, $_POST["item_name"]);
					
					$quantity = test_input($_POST["quantity"]);
					$quantity = mysqli_real_escape_string($con, $_POST["quantity"]);
					
					$for_officer = test_input($_POST["for_officer"]);
					$for_officer = mysqli_real_escape_string($con, $_POST["for_officer"]);
												
					$date = date("Y-m-d");
					$time = date("h:i:sa");
					$salt = sha1($date.$time);

					//CHECK IF STUDENT SANCTION EXIST
					$sql_event= "SELECT * FROM tbl_sanction WHERE item_name ='$item_name'";
					$result1 = mysqli_query($con, $sql_event);
					$count = mysqli_num_rows($result1);

					if ($count >= 1){
						echo "<div class='alert alert-danger'>Sorry, Sanction already exists.</div>";
					}
					else {
							// INSERT DATA
							$sql_insert = ("INSERT INTO tbl_sanction (item_name, quantity, for_officer, salt) 
														   VALUES ('$item_name', '$quantity', '$for_officer', '$salt')");

							$log_name = "Insert sanction ".$item_name;
							$sql_insert_log = ("INSERT INTO tbl_logs (log_name, username, fullname, date, time) 
												VALUES ('$log_name','$uname','$user_flname', '$current_date', '$current_time')");
												
						if (mysqli_query($con, $sql_insert) && mysqli_query($con, $sql_insert_log) ) {
								echo "<div class='alert alert-success'>Successfully added!</div>";
								echo "<script>setTimeout(\"location.href = 'sanctions?'\",1000);</script>";
						} else {
							echo "Error: " . $sql_insert . "<br>" . mysqli_error($con);
						}
					}
				}
			?>
			<form name="frmUploadFile" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" enctype="multipart/form-data" onsubmit="return checkForm(this);" autocomplete="off">
			  
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<label for="item_name">Item Name <span class="error">*</span></label>
					<input class="form-control" type="text" name="item_name" value="<?php echo $item_name;?>" placeholder="Please enter event name" required maxlength="100">
				  </div>
				  <div class="col-md-6">
					<label for="quantity">Quantity</label>
					<input class="form-control" type="number" name="quantity" value="<?php echo $quantity;?>" placeholder="Please enter quantity"  maxlength="11">
				  </div>
				</div>
			  </div>
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<label for="for_officer">For Officer</label>
					<select class="form-control" name="for_officer">
						<option value='N'>NO</option>
						<option value='Y'>YES</option>
					</select>
				  </div>
				</div>
			  </div>	
			
			  <input type="submit" class="btn btn-primary btn-block"  name="save" value="Save">  
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