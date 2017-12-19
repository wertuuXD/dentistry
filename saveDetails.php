<?php
  include ('connect.php');
    $id = $_POST['id'];
    $nme = $_POST['name'];
	  $mat = $_POST['matric'];
	  $fac = $_POST['facDept'];
	  $fon = $_POST['phone'];
	  $adrs = $_POST['address'];



$sql = "UPDATE patient_info SET  name='".$nme."',matric_staffno='".$mat."' , fac_dept='" .$fac."' , phoneno='" .$fon."' , address='" .$adrs."' WHERE patient_id= '".$id."'";
$result = mysqli_query($conn,$sql) or die ("Error running MySQL query!");



include ('listReg.php');
echo '<script type="text/javascript">';
echo 'alert("Data Has Been Updated");';
echo 'window.location.href = "listReg.php";';
echo '</script>';


 ?>
