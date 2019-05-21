<?php 
	//TITLE OF PAGE
	$title = "Print Sanction List";

	//INCLUDE head.php
	include 'includes/head.php';
?>

<body onload="window.print()">
	
    <div class="container-fluid">
		<hr/>
		<h3>LIST OF SANCTIONS</h3>
		<?php
			$id = isset($_GET['id']) ? $_GET['id'] : '';
			$sql_student = mysqli_query($con, "SELECT * FROM `tbl_students` WHERE `salt` = '$id' ");
			$row = mysqli_fetch_array($sql_student, MYSQLI_BOTH);
			$ss = $row['id'];
			$student_id = $row['student_id'];
			$officer = $row['officer'];
			$fullname = $row['lastname'].", ".$row['firstname']." ".$row['middlename'];
			echo "<h3><b>".$student_id." - ".$fullname."</b></h3>";
		?>
		
		<hr/>
			<table border="1" class="small" style="font-size:75%;">
				<thead>
					<tr>
						<th>SY - Sem</th>
						<th>Event</th>
						<th>Event Date</th>
						<th>Absent/Late</th>
						<th>Sanction</th>
						<th>Quantity</th>
						<th>Date of Absent/Late</th>
						<th>Compliance <br/><i>(Student Governor)</i></th>
						<th>Compliance <br/><i>(Faculty)</i></th>
						<th>Compliance <br/><i>(Dean)</i></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql="SELECT * FROM tbl_sanctionlink WHERE student_id = '$ss' ORDER BY timestamp asc, school_year asc";
						$result = $con->query($sql);
						
						if ($result->num_rows > 0) {
						  // output data of each row
						  while($row = $result->fetch_assoc()) {
							$event_id = $row['event_id'];
							$sanction_id = $row['sanction_id'];
							$sanction_date = date("F d, Y", strtotime($row['sanction_date']));
							$sanction_type = $row['sanction_type'];
							$C1 = $row['C1'];
							$C2 = $row['C2'];
							$C3 = $row['C3'];
							$school_year = $row['school_year'];
							$sem = $row['sem'];

							
							//GET SANCTION
							$sql_sanction = mysqli_query($con, "SELECT * FROM `tbl_sanction` WHERE `sanction_id` = '$sanction_id' ");
							$sanction_row = mysqli_fetch_array($sql_sanction, MYSQLI_BOTH);
							$item_name = $sanction_row['item_name']; 
							$quantity = $sanction_row['quantity'];
							
							
							//GET EVENT
							$sql_event = mysqli_query($con, "SELECT * FROM `tbl_event` WHERE `event_id` = '$event_id' ");
							$event_row = mysqli_fetch_array($sql_event, MYSQLI_BOTH);
							$event_name = $event_row['event_name'];
							$start_date = date("M d, Y", strtotime($event_row['start_date']));
							$end_date =  date("M d, Y", strtotime($event_row['end_date']));
							
							echo "<tr>
							  <td>".$school_year." - ".$sem."</td>
							  <td>".$event_name."</td>
							  <td>".$start_date." - ".$end_date."</td>
							  <td>".$sanction_type."</td>";
							  echo "<td>";
									$arr = explode(',',$sanction_id); 
									foreach($arr as $i) { 
										//GET SANCTION
										$sql_sanction = mysqli_query($con, "SELECT * FROM `tbl_sanction` WHERE `sanction_id` = '$i' ");
										$sanction_row = mysqli_fetch_array($sql_sanction, MYSQLI_BOTH);
										$item_name = $sanction_row['item_name']; 
										$quantity = $sanction_row['quantity'];
										echo(' -'.$item_name.'<br>');
									}
							echo "</td>";
							echo " 
							  <td>".$quantity."</td>
							  <td>".$sanction_date."</td>";
							if ($C1 == "Y") {
								echo "<td>YES</td>";
							}
							else {
								echo "<td>NO</td>";
							}
							if($officer != "Y") {
								if ($C2 == "Y") {
									echo "<td>YES</td>";
								}
								else {
									echo "<td>NO</td>";
								}
							}
							else {
								echo "<td>-</td>";
							}
							if ($C3 == "Y") {
								echo "<td>YES</td>";
							}
							else {
								echo "<td>NO</td>";
							}
						  }
						}
						else {
						  echo "<div class='alert alert-warning'>No data available!</div>";
						}
						// Free result set
						mysqli_free_result($result);
					  ?>
				</tbody>
			</table>
			<hr/>
    </div>
</body>

</html>

