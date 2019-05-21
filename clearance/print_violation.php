<?php 
	//TITLE OF PAGE
	$title = "Print Sanction List";

	//INCLUDE head.php
	include 'includes/head.php';
?>

<body onload="window.print()">
	<br/>
    <div class="container-fluid" style="border:1px solid #d1d1d1; padding:10px;">
		<?php
			$id = isset($_GET['id']) ? $_GET['id'] : '';
			$sql_student = mysqli_query($con, "SELECT * FROM `tbl_students` WHERE `salt` = '$id' ");
			$row = mysqli_fetch_array($sql_student, MYSQLI_BOTH);
			$ss = $row['id'];
			$student_id = $row['student_id'];
			$course = $row['course'];
			$year = $row['year'];
			$remarks = $row['remarks'];
			$fullname = $row['lastname'].", ".$row['firstname']." ".$row['middlename'];
			
			echo "
				<center><img src='img/spuplogo.png' width='60px;'><h5>St. Paul University Philippines<br/><small>Tuguegarao City, Cagayan 3500</small></h5></center>
				<center><hr/><b>OFFICE of STUDENT AFFAIRS</b><br/><small>Students' Decorum Monitoring</small><br/></center>
				<div class='row'><div class='col-lg-12'><b>SPUP OSA-18</b><br/></div></div>
				<div class='row'><div class='col-lg-3'>ID NO: <b>".$student_id."</b></div> <div class='col-lg-4'>NAME: <b>".$fullname."</b></div><div class='col-lg-3'>COURSE & YEAR: <b>".$course." - ".$year."</b></div></div><br/>
				<div class='row text-center'>
					<div class='col-lg-12'>";
			echo "
						<table class='table small' style='font-size:70%;'>
							<thead>
								<th>Violation</th>
								<th>Date</th>
								<th>Signature</th>
								<th>Action Taken by the Dean/Assoc. <br/> Dean/Program Coordinator/OSA</th>
								<th>Compliance by the <br/> Student</th>
								<th>Remarks</th>
							</thead>
							<tbody>";
								$sql="SELECT * FROM tbl_violation WHERE student_id = '$ss' ORDER BY date asc";
								$result = $con->query($sql);
								$x = 1;
								if ($result->num_rows > 0) {
								  // output data of each row
									while($row = $result->fetch_assoc()) {
										$viol_id = $row['id'];
										$d = $row['date'];
										$d =  date("M d, Y", strtotime($row['date']));
										
									echo "<tr><td>";
										$arr = explode(',',$viol_id); 
										foreach($arr as $i) { 
											//GET SANCTION
											$sql_violation = mysqli_query($con, "SELECT * FROM `tbl_violation` WHERE `id` = '$i' ");
											$violation_row = mysqli_fetch_array($sql_violation, MYSQLI_BOTH);
											$violation = $violation_row['violation']; 
											echo($x++.'. '.$violation.'</li></ol>');	
										}
										
									echo "</td>";
									echo " <td>".$d."</td>
										   <td></td>
										   <td></td>
										   <td></td>
										   <td>".$remarks."</td>
										   </tr>";
									}
								}
							echo "
							</tbody>
						</table>
					";
						
				echo "		
					</div>
				</div>
				<hr/>
					<div class='row small' style='font-size:60%;'>
							<div class='col-lg-12'>
								<b>Legend:</b><br/>
								A. Haircut/punky hair (Male) 
								B. Coloured Hair (Male/Female) 
								C. Unprescribed Undergarment (Male/Female) 
								D. Unprescribed Shoes (Male/Female) 
							</div>
							<div class='col-lg-12'>
								E. long/Short Skirt (Female) 
								F. Being noisy along corridors  
								G. Not wearing of ID Properly  
								H. Earing/Tounge Ring 
								I. Wearing of Cap inside the Campus  
							</div>
					</div>
			";
		?>
    </div>
	<br/><br/>
</body>

</html>
