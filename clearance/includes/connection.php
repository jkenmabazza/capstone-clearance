	<?php
		$con=new mysqli("localhost","root","","db_clearance");
		// Check connection
		if (mysqli_connect_errno())
		{
			header('Location: database-error');
			exit;
		}
    ?>