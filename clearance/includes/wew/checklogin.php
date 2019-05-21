<?php  //Start the Session
session_start();
require('includes/connection.php');

//3. If the form is submitted or not.
//3.1 If the form is submittedS
if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['username']) && isset($_POST['password'])){
	//3.1.1 Assigning posted values to variables and protect it to sql injection.

	$username = $_POST['username'];
	$password = $_POST['password'];
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = SHA1($password);

	// encrypt password 
	//$encrypted_mypassword=sha1($password);

	//3.1.2 Checking the values are existing in the database or not
	$result = mysqli_query($con, "SELECT * FROM `tblusers` WHERE username = '$username' AND password = '$password' ");
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	$user_type = $row['user_type'];
	
	$query1 = "SELECT * FROM `tblusers` WHERE username='$username' AND password='$password'";
	$result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
	$count1 = mysqli_num_rows($result1);
	$uname = $username; 
	$pwrd = $password;
	
	//3.1.2 If the login credentials doesn't match, he will be shown with an error message.
	if ($count1 != 1){
		echo "<div id='clickme' class='alert alert-danger small'>Invalid username or password</div>";
	}
	else if(strlen($username) > 20) {
		echo "<div id='clickme' class='alert alert-danger small'>Username must less than 20 characters</div>";
	}
	else if(strlen($password) > 50) {
		echo "<div id='clickme' class='alert alert-danger small'>Password must less than 50 characters</div>";
	}
	else{
	//3.1.3 If the posted values are equal to the database values, then session will be created for the user
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
	}
	
	//3.1.4 if the user is logged in Greets the user with message
	if (isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		if($user_type == 'U'){
			$url="index";
			header("Location: $url");
		}
		if($user_type == 'A'){
			$url="index";
			header("Location: $url");
		}
	}
}
?>