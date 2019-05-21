<?php 
	//TITLE OF PAGE
	$title = "Edit Event";

	//INCLUDE head.php
	include 'includes/head.php';
?>

<body>
	<?php
		//GET EVENT DATA FROM TABLE
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		$sql_sanc = mysqli_query($con, "SELECT * FROM `tbl_sanctionlink` WHERE `salt` = '$id' ");
		$row = mysqli_fetch_array($sql_sanc, MYSQLI_BOTH);
		$event_name = $row['event_name'];
		

		/* UPDATE EVENT DATA
		//$sql_update = "UPDATE tbl_event SET event_name='$event_name', start_date='$start_date', end_date='$end_date', venue='$venue' WHERE salt='$eventid'";						
										
		$log_name = "Update event ".$event_name;
		$sql_insert_log = ("INSERT INTO tbl_logs (log_name, username, fullname, date, time) 
							VALUES ('$log_name','$uname','$user_flname', '$current_date', '$current_time')");
								
		if (mysqli_query($con, $sql_update) && mysqli_query($con, $sql_insert_log) ) {
				echo "<div class='alert alert-success'>Event successfully updated!</div>";
				echo "<script>setTimeout(\"location.href = 'events?id=".$eventid."';\",1800);</script>";
		} else {
			echo "Error: " . $sql_update . "<br>" . mysqli_error($con);
		}
		*/
				
		
	?>
</body>
</html>