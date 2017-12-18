<?php

	include ("connect.php");
	if(isset($_POST['SUBMIT']))
	{
    $id =$_POST['id'];
    $name =$_POST['name'];
	$dt = $_POST['date'];
	$tm = $_POST['time'];


     mysqli_query
    ($conn, "INSERT INTO appointment (patient_id,name,appointment_date,appointment_time)
    VALUES ('$id','$name','$dt','$tm')");
    echo "<script>alert('The data successfully inserted');";
     echo "window.location.href ='listReg.php';</script>";

	}

  mysqli_close($conn);
 	  ?>
