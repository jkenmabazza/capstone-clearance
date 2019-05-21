					<?php
						// Escape all $_POST variables to protect against SQL injections
						 
						 if (empty($_POST['fname']) || empty($_POST['lname']) ) {
							$nameErr = "Name is required"; $x = 1;
						  } else {
							$fname = strtoupper(test_input($_POST['fname']));
							$lname = strtoupper(test_input($_POST['lname']));
							
							// check if name only contains letters and whitespace
							if (!preg_match("/^[a-zA-Z ]*$/",$fname) || !preg_match("/^[a-zA-Z ]*$/",$lname) ) {
							  $nameErr = "Only letters and white space allowed"; 
							}
						  }
						  
						  if (empty($_POST['username'])) {
							$unameErr = "Userame is required"; $x = 1;
						  } else {
							$username = test_input($_POST['username']); $x = 0;
						  }
						  
						  if (empty($_POST['pwd1']) || empty($_POST['pwd2'])) {
							$pwd1Err = "Password is required"; $x = 1;
						  } else {
							$pwd1 = test_input($_POST['pwd1']);
							$pwd2 = test_input($_POST['pwd2']); $x = 0;
						  }
						    
						  if (empty($_POST['contact_no'])) {
							$contactErr = "Please input contact no."; $x = 1;
						  } else {
							$contact_no = test_input($_POST['contact_no']); $x = 0;
						  }
						  
						  if (empty($_POST['email'])) {
							$emailErr = "Please input email address"; $x = 1;
						  } else {
							$email = test_input($_POST['email']);
							// check if e-mail address is well-formed
							if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							  $emailErr = "Invalid email format";  $x = 0;
							}
						  }
						  
						  if (empty($_POST['gender'])) {
							$genderErr = "Please select your gender"; $x = 1;
						  } else {
							$gender = test_input($_POST['gender']); $x = 0;
						  }
						  
							$user_type = test_input($_POST['user_type']);
							$userfile = "img/uploads/site.png";
							
							$date = date("Y-m-d");
							$time = date("h:i:sa");
							$salt = sha1($date.$time);
							$pwd = SHA1($_POST['pwd1']);
							
							//check if username already exist
							$sql_trackno = "SELECT username FROM tblusers WHERE username ='$username'";
							$result1 = mysqli_query($con, $sql_trackno);
							$count = mysqli_num_rows($result1);
							
							$fileName = $_FILES['userfile']['name'];
							$fileLink = $_FILES['userfile']['name'];
							$tmpName  = $_FILES['userfile']['tmp_name'];
							$fileSize = $_FILES['userfile']['size'];
							$fileType = $_FILES['userfile']['type'];
							$uploads_dir = "img/uploads/";
									
						//UPLOAD FILE
						if(($_FILES['userfile']['name'] == "") || !isset($_FILES['userfile']['name']))
						{
							$avatar = "img/uploads/site.png";
						}
						else {
							if ((($_FILES["userfile"]["type"] == "image/gif")
									|| ($_FILES["userfile"]["type"] == "image/jpeg")
									|| ($_FILES["userfile"]["type"] == "image/png"))
									&& ($_FILES["userfile"]["size"] < 1000000)) {
									move_uploaded_file($tmpName, "$uploads_dir/$fileName");
									if(!get_magic_quotes_gpc())
									{
										$avatar = $uploads_dir.addslashes($fileName);
									}
							}
						}
		
						if ($count >= 1){
							echo "<div class='alert alert-danger'>Sorry, username already exists.</div>";
						}
						else if ($x >= 1){
							echo "<div class='alert alert-danger'>Sorry something went wrong, please check your input.</div>";
						}
		
						else {
								// INSERT DATA
								$sql_insert = ("INSERT INTO tblusers (username,password,firstname,lastname,email,contactno,gender,avatar,user_type,salt)
															  VALUES ('$username','$pwd','$fname','$lname','$email','$contact_no','$gender','$avatar','$user_type','$salt')");

							if (mysqli_query($con, $sql_insert)) {
									
									echo "<div class='alert alert-success'>You are successfully registered!</div>";
									$fname = $lname = $username = $pwd1 = $pwd2 = $gender = $contact_no = $email = "";
							} else {
								echo "Error: " . $sql_insert . "<br>" . mysqli_error($con);
							}
						}
					?>