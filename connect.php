<?php

$conn=mysqli_connect("localhost", "root", "", "dental");
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: ". mysqli_connect_error();
}
$mysqli = new mysqli("localhost", "root", "", "dental");
$mysqli->set_charset("utf8");
?>