	<?php
		//SESSION START
		session_start();
		  
		$uname = $_SESSION['username'];
		$password = $_SESSION['password'];
		
		if (!isset($_SESSION['username'])) {
			header('Location: index');
		}
				
		//DATABASE CONNECT
		include 'includes/connection.php';
		
		//GET USER DATA
		$user_result = mysqli_query($con, "SELECT * FROM `tblusers` WHERE username = '$uname' AND password = '$password' ");
		$user_row = mysqli_fetch_array($user_result, MYSQLI_BOTH);
		$user_id = $user_row['user_id'];
		$user_fname = $user_row['firstname'];
		$user_lname = $user_row['lastname'];
		$user_email = $user_row['email'];
		$user_utype = $user_row['user_type'];
		$user_contact = $user_row['contactno'];
		$user_avatar = $user_row['avatar'];
		$user_flname = $user_fname." ".$user_lname;
		
		//GET SCHOOL YEAR AND SEMESTER
		$semyear_result = mysqli_query($con, "SELECT * FROM `tbl_semyear`");
		$semyear_row = mysqli_fetch_array($semyear_result, MYSQLI_BOTH);
		$current_school_year = $semyear_row['school_year'];
		$current_sem = $semyear_row['sem'];
		
		//COUNT STUDENTS
		$sqlb = "SELECT * FROM tbl_students";
		$result = mysqli_query($con, $sqlb);
		$num_rows = mysqli_num_rows($result);
		
		
		//SET TIME AND DATE
		date_default_timezone_set('Asia/Taipei');
		$current_date = date('F d, Y');
		$current_time = date('h:i:s A');
		
		
		//FUNCTION TO AVOID SQL INJECTION
		function test_input($data) {
			 $data = trim($data);
			 $data = stripslashes($data);
			 $data = htmlspecialchars($data);
			 return $data;
		}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $title;?> : Clearance Management System</title>
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon"  />
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/style.css" rel="stylesheet">
</head>
