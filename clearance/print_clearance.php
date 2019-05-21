<?php 
	//TITLE OF PAGE
	$title = "Print Sanction List";

	//INCLUDE head.php
	include 'includes/head.php';
?>

<body onload="window.print()">
	<br/>
    <div class="container-fluid" style="font-size:90%;">
		<div class="col-lg-12">
		<?php
			$id = isset($_GET['id']) ? $_GET['id'] : '';
			$sql_student = mysqli_query($con, "SELECT * FROM `tbl_students` WHERE `salt` = '$id' ");
			$row = mysqli_fetch_array($sql_student, MYSQLI_BOTH);
			$ss = $row['id'];
			$student_id = $row['student_id'];
			$course = $row['course'];
			$year = $row['year'];
			$fullname = $row['lastname'].", ".$row['firstname']." ".$row['middlename'];
			echo "
				<center><img src='img/spuplogo.png' width='30px;'>St. Paul University Philippines<br/><small>Tuguegarao City, Cagayan 3500</small></center>
				<center><hr/><b>Student Clearance</b><br/><small>".$current_school_year." - ".$current_sem." SEMESTER</small><br/></center>
				<div class='row'>
					<div class='col-lg-12'>STUDENT ID: <b>".$student_id."</b></div>
				</div>
			
				<div class='row'>
					<div class='col-lg-12'>NAME: <b>".$fullname."</b> <span class='pull-right'>COURSE & YEAR: <b>".$course." - ".$year."</b></span></div>
				</div>
				<br/>
				
				<div class='row text-center'>
					<div class='col-lg-12'>
					<center>	
						<table  cellspacing='2'>
						 <tr>
							<td>School Dean: </td>
							<td><b>CLEARED</b></td>
							<td width='200'></td>
							<td>Laboratory(if applicable):</td>
							<td></td>
						 </tr>
						  <tr>
						  <td>DSA:</td>
							<td></td>
							<td></td>
							<td>Foods Lab:</td>
							<td></td>
							
						 </tr>
						  <tr>
						  <td>Guidance:</td>
							<td></td>
							<td></td>
							<td>Computer:</td>
							<td></td>
							
						 </tr>
						  <tr>
						  <td>Library:</td>
							<td></td>
							<td></td>
							<td>Engineering:</td>
							<td></td>
							
						 </tr>
						  <tr>
							<td>Boutique:</td>
							<td></td>
							<td></td>
							<td>College Science Lab:</td>
							<td></td>
						 </tr>
						  <tr>
							<td>Christian Formation:</td>
							<td></td>
							<td></td>
							<td>University Registrar:</td>
							<td></td>
						 </tr>
						  <tr>
							<td>Clinic:</td>
							<td></td>
							<td></td>
							<td>BAO:</td>
							<td></td>
						 </tr>
						  <tr>
							<td>Alumni:</td>
							<td></td>
							<td></td>
							<td>OR No.: </td>
							<td></td>
						 </tr>
						 <tr>
							<td>Research:</td>
							<td></td>
							<td></td>
							<td>PSG-SITE: </td>
							<td><b>CLEARED</b></td>
						 </tr>
						</table>
					</center>
						<br/>
						<span style='text-decoration: underline'>DEAN NAME </span><br/>
						<i>SITE, School Dean</i>
					</div>
				</div>
			";
		?>
		</div>
    </div>
</body>

</html>

