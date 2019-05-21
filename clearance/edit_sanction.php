<?php 
	//TITLE OF PAGE
	$title = "Edit Sanction";

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
        <li class="breadcrumb-item active">Event Sanction</li>
      </ol>
      <div class="row">
		<div class="col-md-9">
		  <div class="card-header">Event Sanction</div>
		  <div class="card-body">
			<?php
				//GET SANCTION DATA FROM TABLE
					$id = isset($_GET['id']) ? $_GET['id'] : '';
					$sql_sanction = mysqli_query($con, "SELECT * FROM `tbl_sanction` WHERE `salt` = '$id' ");
					$row = mysqli_fetch_array($sql_sanction, MYSQLI_BOTH);
					$item_name = $row['item_name'];
					$quantity = $row['quantity'];
					$for_officer = $row['for_officer'];

				if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['save']) == "Send")){
							
							$sancid = test_input($_POST["sancid"]);
							
							$item_name = test_input($_POST["item_name"]);
							$item_name = mysqli_real_escape_string($con, $_POST["item_name"]);
							
							$quantity = test_input($_POST["quantity"]);
							$quantity = mysqli_real_escape_string($con, $_POST["quantity"]);
							
							$for_officer = test_input($_POST["for_officer"]);
							$for_officer = mysqli_real_escape_string($con, $_POST["for_officer"]);
														
							$date = date("Y-m-d");
							$time = date("h:i:sa");
							$salt = sha1($date.$time);

						
							// UPDATE DATA
							$sql_update = "UPDATE tbl_sanction SET item_name='$item_name', quantity='$quantity', for_officer='$for_officer'  WHERE salt='$sancid'";		

							$log_name = "Update sanction ".$item_name;
							$sql_insert_log = ("INSERT INTO tbl_logs (log_name, username, fullname, date, time) 
												VALUES ('$log_name','$uname','$user_flname', '$current_date', '$current_time')");
													
							if (mysqli_query($con, $sql_update) && mysqli_query($con, $sql_insert_log) ) {
									echo "<div class='alert alert-success'>Sanction successfully updated!</div>";
									echo "<script>setTimeout(\"location.href = 'sanctions?id=".$sancid."';\",1800);</script>";
							} else {
								echo "Error: " . $sql_update . "<br>" . mysqli_error($con);
							}
						
				}
			?>
			<form name="frmUploadFile" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" enctype="multipart/form-data" onsubmit="return checkForm(this);" autocomplete="off">
			  <input type="hidden" name="sancid" value="<?php echo $id; ?>">
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<label for="event_id">Event Name <span class="error">*</span></label>
					<select class="form-control" name="event_id" required>
						<?php
							$sql10="SELECT * FROM tbl_event WHERE event_id = '$event_id'";
							$result10 = $con->query($sql10);
							if ($result10->num_rows > 0) {
								while($row10 = $result10->fetch_assoc()) {
									echo  "<option value='".$row10['event_id']."'>".$row10['event_name']."</option>";
								}
							}
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
				</div>
			  </div>	
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
						<?php 
							if($for_officer == "Y") {
								echo"<option value='".$for_officer."'>YES</option>"; 
							}
							else {
									echo"<option value='".$for_officer."'>NO</option>"; 
							}
						?>
						<option value='N'>NO</option>
						<option value='Y'>YES</option>
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