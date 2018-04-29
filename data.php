<?php
include ("connect.php");
if(isset( $_REQUEST['cardNumber']))
{
	$cardNumber = $_REQUEST['cardNumber'] ; 
	$stmt = $mysqli->prepare("SELECT * FROM patient_info WHERE id=?");
	$stmt->bind_param("i", $cardNumber);
	$stmt->execute();
	$result=$stmt->get_result();
	$row = $result->fetch_assoc() ; 

	echo json_encode($row);


}



?>