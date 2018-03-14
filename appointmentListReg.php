<!DOCTYPE html>
<html lang="en">
<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit;
}
 ?>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UTeM Dental System</title>
    <link rel="shortcut icon" href="img/utemlogo.png">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">

  </head>


  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">UTeM Dental System</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="appointmentListReg.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="registerPatient.php">Register Patient</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="listReg.php">Patient List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="logout.php" onclick="javascript:return confirm('Are you sure you want to log out?');">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<br><br><br><br><br><br>

<h3 class="text-center">Patient-In-Queue</h3>
    <hr class="star-primary">

 <br>

 <center>
 <div class="box">
 <table width="78%" class="table table-stripped table-hover table-bordered">

   <?php
   include ('connect.php');
   date_default_timezone_set("Asia/Kuala_Lumpur");
   $date = date("Y-m-d");
   $page = $_SERVER['PHP_SELF'];
   $sec = "20";
   header("Refresh: $sec; url=$page");


  $stmt = $mysqli->prepare("SELECT * FROM queue q, patient_info p WHERE p.patient_id = q.patient_id and queue_date = ? ORDER BY queue_number ASC");
  $stmt->bind_param("s", $date);
  $stmt->execute();
  $result=$stmt->get_result();
  //fetching result would go here, but will be covered later
  //$stmt->close();



     // $result = mysqli_query ($conn,"select * from queue q , patient_info p where p.patient_id = q.patient_id and queue_date = '$date' ORDER BY queue_number ASC") or die
     // ("Error running MySQL query");

     echo "<tr><th>Queue Number</th>";
     echo "<th>Date</th>";
     echo "<th>Time</th>";
     echo "<th>Patient Name</th>";

     while($row = $result->fetch_assoc())
     {

       echo "<tr>";
       echo "<td>".$row['queue_number']."</td>";
       echo "<td>".$row['queue_date']."</td>";
       echo "<td>".$row['queue_time']."</td>";
       echo "<td>".$row['name']."</td>";
     ?>
   <?php
   echo "</tr>";
   }
   echo "</table>";


 //Freeing all memory associated with it
 //mysqli_free_result($stmt);
 //Closes apecified connection
 mysqli_close($conn);
 ?>
 </table>
 </div>
 </center>

 <br>

<center>
  <h3>Patient Appointment List</h3>
<br>
      <form id="search3" name="search3" action="searchAppointmentReg.php" method="post">
      <input type="text" name="valueToSearch" placeholder="Patient Name">&nbsp;&nbsp;
      <input type="submit" name="search" value="Search"><br>

</form>
</center>

<br><br>
<center>

<div class="box">
<table width="78%" class="table table-stripped table-hover table-bordered">

  <?php
  include ('connect.php');
  $result = mysqli_query ($conn,"SELECT * FROM patient_info join appointment on patient_info.patient_id = appointment.patient_id") or die
  ("Error running MySQL query");

  echo "<tr><th>Appointment Date</th>";
  echo "<th>Appointment Time</th>";
  echo "<th>Patient Name</th>";
  echo "<th>IC/Passport No</th>";
  echo "<th>Phone No</th>";

  while($row = mysqli_fetch_assoc($result))
  {

    echo "<tr>";
    echo "<td>".$row['appointment_date']."</td>";
    echo "<td>".$row['appointment_time']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['ic_passno']."</td>";
    echo "<td>".$row['phoneno']."</td>";
  ?>
<?php
echo "</tr>";
}
echo "</table>";

//Freeing all memory associated with it
mysqli_free_result($result);
//Closes apecified connection
mysqli_close($conn);
?>
</table>
</div>
</center>





    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top d-lg-none">
      <a class="btn btn-primary js-scroll-trigger" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

  </body>

</html>
