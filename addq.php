<?php
  include ('connect.php');
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date("Y-m-d");
    $pid = $_POST['pid'];
    $time = $_POST['atime'];
    $number = $_POST['qq'];

$sql = "INSERT INTO queue VALUES ( '' , '$date' , '$time' , '$number' , '$pid') ";
$result = mysqli_query($conn,$sql) or die ("Error running MySQL query!");



echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Patient has been assigned for queue!')
        window.location.href='appointmentListReg.php'
        </SCRIPT>");








 ?>
