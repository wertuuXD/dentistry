<?php

	include ("connect.php");
	if(isset($_POST['login']))
	{
    $username = $_POST['username'] ;
    $password = $_POST['password'] ;
    $level = $_POST['level'] ;

    $query = mysqli_query($conn, "INSERT INTO user (username,password,level) VALUES ('$username','$password','$level')") or die(mysqli_error($conn)) ;

	    if($query)
	    { 
	     echo "<script>alert('The data successfully inserted');";
	     echo "window.location.href = 'login.php';</script>";
		}
		else
		{
			echo "tak boleh insert";
		}
	}
?>