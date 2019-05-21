<?php 
	//TITLE OF PAGE
	$title = "Add Student";

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
          <a href="home">Home</a>
        </li>
        <li class="breadcrumb-item active">Student</li>
      </ol>
      <div class="row">
		<div class="col-md-9">
		  <div class="card-header">Add Student</div>
		  <div class="card-body">
			<?php
				// define variables and set to empty values
				$student_id = $firstname = $middlename = $lastname = $section = $contact = $email = $officer = "";
				if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['save']) == "Send")){
							
							$student_id = test_input($_POST["student_id"]);
							$student_id = mysqli_real_escape_string($con, $_POST["student_id"]);

							$firstname = test_input($_POST["firstname"]);
							$firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
							
							$middlename = test_input($_POST["middlename"]);
							$middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
							
							$lastname = test_input($_POST["lastname"]);
							$lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
							
							$course	= test_input($_POST["course"]);
							$course = mysqli_real_escape_string($con, $_POST["course"]);
							
							$year = test_input($_POST["year"]);
							$year = mysqli_real_escape_string($con, $_POST["year"]);
							
							$section = test_input($_POST["section"]);
							$section = mysqli_real_escape_string($con, $_POST["section"]);
							
							$email = test_input($_POST["email"]);
							$email = mysqli_real_escape_string($con, $_POST["email"]);
							
							$contact = test_input($_POST["contact"]);
							$contact = mysqli_real_escape_string($con, $_POST["contact"]);
			
							$officer = test_input($_POST["officer"]);
							
							$gender = test_input($_POST["gender"]);
							$gender = mysqli_real_escape_string($con, $_POST["gender"]);
							
							$status = test_input($_POST["status"]);
							$status = mysqli_real_escape_string($con, $_POST["status"]);
							
							$sem = test_input($_POST["sem"]);
							$sem = mysqli_real_escape_string($con, $_POST["sem"]);
							
							$school_year = test_input($_POST["school_year"]);
							$school_year = mysqli_real_escape_string($con, $_POST["school_year"]);
							
							$date = date("Y-m-d");
							$time = date("h:i:sa");
							$salt = sha1($date.$time);

							
							//CHECK IF STUDENT ALREADY EXIST
							$sql_student= "SELECT * FROM tbl_students WHERE student_id ='$student_id'";
							$result1 = mysqli_query($con, $sql_student);
							$count = mysqli_num_rows($result1);

						if ($count >= 1){
							echo "<div class='alert alert-danger'>Sorry, Student already exists.</div>";
						}
						else {
								// INSERT DATA
								$sql_insert = ("INSERT INTO tbl_students (student_id, firstname, middlename, lastname, course, year, section, email, contact, officer, gender, status, school_year, sem, salt) 
											                   VALUES ('$student_id', '$firstname', '$middlename', '$lastname', '$course', '$year', '$section', '$email', '$contact', '$officer', '$gender', '$status', '$school_year', '$sem', '$salt')");

								$log_name = "Insert student ".$student_id;
								$sql_insert_log = ("INSERT INTO tbl_logs (log_name, username, fullname, date, time) 
									                VALUES ('$log_name','$uname','$user_flname', '$current_date', '$current_time')");
													
							if (mysqli_query($con, $sql_insert) && mysqli_query($con, $sql_insert_log) ) {
									echo "<div class='alert alert-success'>Successfully added!</div>";
									echo "<script>setTimeout(\"location.href = 'home?'\",1000);</script>";
									$doc_number= $doc_name = $description = $person_to = "";
							} else {
								echo "Error: " . $sql_insert . "<br>" . mysqli_error($con);
							}
						}
				}
			?>
			<form name="frmUploadFile" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" enctype="multipart/form-data"  autocomplete="off">
			  <input type="hidden" name="school_year" value="<?php echo $current_school_year; ?>" />
			  <div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<label for="section">Course <span class="error"> *</span></label>
						<select name="course" id="course" onchange="this.form.submit();" class="form-control" required>
						<?php 
							$course = $_POST['course'];
							if(isset($_POST['course']) != "") {
								echo "
										<option>".$course."</option>
										<option>BLIS</option>
										<option>BSIT</option>
										<option>BSCE</option>
										<option>BSCOE</option>
										<option>BSENSE</option>
										<option>BSGE</option>
										";
							}
							else {
								echo "	<option value=''>-- select course --</option>
										<option>BLIS</option>
										<option>BSIT</option>
										<option>BSCE</option>
										<option>BSCOE</option>
										<option>BSENSE</option>
										<option>BSGE</option>
										";
							}
						?>
						</select>
						<script type="text/javascript">
							$("#course").val("<?php echo $_POST['course'];?>");
						</script>
					</div>
					<div class="col-md-3">
						<label for="year">Year <span class="error"> *</span></label>
						<select name="year" class="form-control" required>
							<?php 
								
								if ($course == "BSCE" || $course == "BSCOE" || $course == "BSENSE" || $course == "BSGE") {
									echo "
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									";
								}
								else {
									echo "
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									";
								}
							?>
							<input type="hidden" name="ccc" value="<?php echo $course; ?>">
						</select>
					</div>
					<div class="col-md-3">
						<label for="section">Section <span class="error"> </span></label>
						<input class="form-control" type="text" value="<?php echo $section; ?>" name="section">
					</div>
				</div>
			  </div>
			  <hr/>
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-4">
					<label for="student_id">Student ID <span class="error">* </span></label>
					<input class="form-control"  type="text" aria-describedby="student_id" placeholder="Enter Student ID"  name="student_id" value="<?php echo $student_id;?>" maxlength="20" required autofocus>
				  </div>
				</div>
			  </div>
			  
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-4">
					<label for="firstname">First Name <span class="error">*</span></label>
					<input class="form-control" type="text" name="firstname" value="<?php echo $firstname;?>" placeholder="Please enter first name" required maxlength="50">
				  </div>
				  <div class="col-md-4">
					<label for="middlename">Middle Name </label>
					<input class="form-control" type="text" name="middlename" value="<?php echo $middlename;?>" placeholder="Please enter middle name"  maxlength="50">
				  </div>
				  <div class="col-md-4">
					<label for="lastname">Last Name <span class="error">*</span></label>
					<input class="form-control" type="text" name="lastname" value="<?php echo $lastname;?>" placeholder="Please enter last name" required maxlength="50">
				  </div>
				</div>
			  </div>
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<label for="email">Email </label>
					<input class="form-control" type="text" name="email" value="<?php echo $email;?>" placeholder="Please enter email address" maxlength="50">
				  </div>
				  <div class="col-md-6">
					<label for="contact">Contact</label>
					<input class="form-control" type="text" name="contact" value="<?php echo $contact;?>" placeholder="Please enter contact number"  maxlength="20">
				  </div>
				</div>
			  </div>
			  
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<label for="officer">Officer </label>
					<select class="form-control" name="officer" id="officer">
						<option value='N'>NO</option>
						<option value='Y'>YES</option>
						
					</select>
				  </div>
				  <div class="col-md-6">
					<label for="gender">Gender </label>
					<select class="form-control" name="gender">
						<option value=''>-- select gender --</option>
						<option value='M'>MALE</option>
						<option value='F'>FEMALE</option>
					</select>
				  </div>
				</div>
			  </div>
			  
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<label for="status">Status </label>
					<select class="form-control" name="status" id="status">
						<option value='R' selected>REGULAR</option>
						<option value='I'>IRREGULAR</option>
					</select>
				  </div>
				  <div class="col-md-6">
					<label for="sem">Semester </label>
					<select class="form-control" name="sem">
						<option><?php echo $current_sem; ?></option>
						<option value='1ST'>1ST</option>
						<option value='2ND'>2ND</option>
						<option value='SUMMER'>Summer</option>
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
					<li>Student ID - unique number of student which is mandatory. </li>
					
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