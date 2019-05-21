<?php 
	//TITLE OF PAGE
	$title = "Add Event";

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
          <a href="events">Events</a>
        </li>
        <li class="breadcrumb-item active">Add Event</li>
      </ol>
      <div class="row">
		<div class="col-md-9">
		  <div class="card-header">Add Event</div>
		  <div class="card-body">
			<?php
				// define variables and set to empty values
				$event_name = $venue = "";
				if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['save']) == "Send")){
							
							$event_name = test_input($_POST["event_name"]);
							$event_name = mysqli_real_escape_string($con, $_POST["event_name"]);
							
							$start_date = test_input($_POST["start_date"]);
							$start_date = mysqli_real_escape_string($con, $_POST["start_date"]);

							$end_date = test_input($_POST["end_date"]);
							$end_date = mysqli_real_escape_string($con, $_POST["end_date"]);
							
							$venue = test_input($_POST["venue"]);
							$venue	= mysqli_real_escape_string($con, $_POST["venue"]);
														
							$date = date("Y-m-d");
							$time = date("h:i:sa");
							$salt = sha1($date.$time);

							
							//CHECK IF STUDENT EVENT EXIST
							$sql_event= "SELECT * FROM tbl_event WHERE event_name ='$event_name' AND start_date = '$start_date'";
							$result1 = mysqli_query($con, $sql_event);
							$count = mysqli_num_rows($result1);

						if ($count >= 1){
							echo "<div class='alert alert-danger'>Sorry, Event already exists.</div>";
						}
						else {
								// INSERT DATA
								$sql_insert = ("INSERT INTO tbl_event (event_name, start_date, end_date, venue, salt) 
											                   VALUES ('$event_name', '$start_date', '$end_date', '$venue', '$salt')");

								$log_name = "Insert event ".$event_name;
								$sql_insert_log = ("INSERT INTO tbl_logs (log_name, username, fullname, date, time) 
									                VALUES ('$log_name','$uname','$user_flname', '$current_date', '$current_time')");
													
							if (mysqli_query($con, $sql_insert) && mysqli_query($con, $sql_insert_log) ) {
									echo "<div class='alert alert-success'>Successfully added!</div>";
									echo "<script>setTimeout(\"location.href = 'events?'\",1000);</script>";
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
					<label for="event_name">Event Name <span class="error">*</span></label>
					<input class="form-control" type="text" name="event_name" value="<?php echo $event_name;?>" placeholder="Please enter event name" required maxlength="100">
				  </div>
				  <div class="col-md-6">
					<label for="venue">Venue</label>
					<input class="form-control" type="text" name="venue" value="<?php echo $venue;?>" placeholder="Please enter venue"  maxlength="100">
				  </div>
				</div>
			  </div>
			  
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<label for="start_date">Start Date <span class="error">*</span></label>
					<input class="form-control" type="date" name="start_date" value="<?php echo $start_date;?>" required>
				  </div>
				  <div class="col-md-6">
					<label for="end_date">End Date </label>
					<input class="form-control" type="date" name="end_date" value="<?php echo $end_date;?>" >
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
					<li>Event name - Event name field can't be empty. </li>
					
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