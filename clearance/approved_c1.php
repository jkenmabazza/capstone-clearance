<?php 
	//INCLUDE head.php
	include 'includes/head.php';
?>

<body>
	<?php
		//GET EVENT DATA FROM TABLE
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		echo $C1 = "Y";
		
		$sql1 = mysqli_query($con, "SELECT * FROM `tbl_sanctionlink` WHERE `salt` = '$id' ");
		$row1 = mysqli_fetch_array($sql1, MYSQLI_BOTH);
		echo $studid = $row1['student_id'];
		
		$sql2 = mysqli_query($con, "SELECT * FROM `tbl_students` WHERE `id` = '$studid' ");
		$row2 = mysqli_fetch_array($sql2, MYSQLI_BOTH);
		echo $zzz = $row2['salt'];
		
		
		//UPDATE EVENT DATA
		$sql_update = "UPDATE tbl_sanctionlink SET C1='$C1' WHERE salt='$id'";						
										
		$log_name = "Update sanction";
		$sql_insert_log = ("INSERT INTO tbl_logs (log_name, username, fullname, date, time) 
							VALUES ('$log_name','$uname','$user_flname', '$current_date', '$current_time')");
								
		if (mysqli_query($con, $sql_update) && mysqli_query($con, $sql_insert_log) ) {
				//header('Location: home?id=".$id."');
				echo "<script>setTimeout(\"location.href = 'remarks?id=".$zzz."';\",1);</script>";
				exit;
		} else {
			echo "Error: " . $sql_update . "<br>" . mysqli_error($con);
		}

	?>
</body>
</html>