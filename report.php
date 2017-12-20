<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UTeM Dental System</title>
    <link rel="shortcut icon" href="img/utemlogo.png">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/Chart.min.js"></script>

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
              <a class="nav-link js-scroll-trigger" href="appointmentListDen.php">Home</a>
            </li>
             <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="listDen.php">Patient List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="report.php">Report Statistic</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="logout.php" onclick="javascript:return confirm('Are you sure you want to log out?');">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<br><br><br><br><br><br>

<h3 class="text-center">Graph</h3>
    <hr class="star-primary">

 <br>


<?php
include ('connect.php');
/*
$staff = array();
$result = mysqli_query ($conn,"select count(*) , gender from patient_info where position = 'Staff' group by gender");
$i=0;
while($row = mysqli_fetch_array($result)){
  $staff[$i] = $row[0];
  $i++;
}

$student = array();
$result2 = mysqli_query ($conn,"select count(*) , gender from patient_info where position = 'Student' group by gender");
$i=0;
while($row2 = mysqli_fetch_array($result2)){
  $student[$i] = $row2[0];
  $i++;
}

$totals = $staff[0] + $staff[1];
$totalp = $student[0] + $student[1];*/


$sql = 'select * from patient_info where position = "Staff" AND gender="Female"';
$query = mysqli_query($conn, $sql);
$staff_fmale = mysqli_num_rows($query);


$sql1 = 'select * from patient_info where position = "Staff" AND gender="Male"';
$query1 = mysqli_query($conn, $sql1);
$staff_male = mysqli_num_rows($query1);


$sql2 = 'select * from patient_info where position = "Student" AND gender="Female"';
$query2 = mysqli_query($conn, $sql2);
$stud_fmale = mysqli_num_rows($query2);


$sql3 = 'select * from patient_info where position = "Student" AND gender="Male"';
$query3 = mysqli_query($conn, $sql3);
$stud_male = mysqli_num_rows($query3);

 ?>


<center>
<div style="text-align:center" class="col-lg-8">

 <canvas id="bar-chart-grouped" width="200" ></canvas>

  <script>
  new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
    data: {
      labels: ["Staff", "Student"],
      datasets: [
        {
          label: "Male",
          backgroundColor: "#3e95cd",
          data: [<?php echo $staff_male; ?>,<?php echo $stud_male; ?>]
        }, {
          label: "Female",
          backgroundColor: "#8e5ea2",
          data: [<?php echo $staff_fmale; ?>,<?php echo $stud_fmale; ?>]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Staff and Patient'
      }
    }
});

  </script>
</div>


<br><br><br>

<div style="text-align:center" class="col-lg-10">
<canvas id="bar-chart-grouped2" width="800" height="450"></canvas>
</div>

<?php

//pemeriksaan
$pemeriksaan = "SELECT * FROM `treatment_record` WHERE treatment_type='pemeriksaan' and treatment_date LIKE '%-12-%'";
$pemeriksaan1 = mysqli_query($conn, $pemeriksaan);
$p_dec= mysqli_num_rows($pemeriksaan1);

$pemeriksaan1 = "SELECT * FROM `treatment_record` WHERE treatment_type='pemeriksaan' and treatment_date LIKE '%-11-%'";
$pemeriksaan2 = mysqli_query($conn, $pemeriksaan1);
$p_nov= mysqli_num_rows($pemeriksaan2);

$pemeriksaan2 = "SELECT * FROM `treatment_record` WHERE treatment_type='pemeriksaan' and treatment_date LIKE '%-10-%'";
$pemeriksaan3 = mysqli_query($conn, $pemeriksaan2);
$p_oct= mysqli_num_rows($pemeriksaan3);

$pemeriksaan3 = "SELECT * FROM `treatment_record` WHERE treatment_type='pemeriksaan' and treatment_date LIKE '%-09-%'";
$pemeriksaan4 = mysqli_query($conn, $pemeriksaan3);
$p_sept= mysqli_num_rows($pemeriksaan4);

$pemeriksaan4 = "SELECT * FROM `treatment_record` WHERE treatment_type='pemeriksaan' and treatment_date LIKE '%-08-%'";
$pemeriksaan5 = mysqli_query($conn, $pemeriksaan4);
$p_aug= mysqli_num_rows($pemeriksaan5);

$pemeriksaan5 = "SELECT * FROM `treatment_record` WHERE treatment_type='pemeriksaan' and treatment_date LIKE '%-07-%'";
$pemeriksaan6 = mysqli_query($conn, $pemeriksaan5);
$p_july= mysqli_num_rows($pemeriksaan6);

$pemeriksaan6 = "SELECT * FROM `treatment_record` WHERE treatment_type='pemeriksaan' and treatment_date LIKE '%-06-%'";
$pemeriksaan7 = mysqli_query($conn, $pemeriksaan6);
$p_june= mysqli_num_rows($pemeriksaan7);

$pemeriksaan7 = "SELECT * FROM `treatment_record` WHERE treatment_type='pemeriksaan' and treatment_date LIKE '%-05-%'";
$pemeriksaan8 = mysqli_query($conn, $pemeriksaan7);
$p_may= mysqli_num_rows($pemeriksaan8);

$pemeriksaan8 = "SELECT * FROM `treatment_record` WHERE treatment_type='pemeriksaan' and treatment_date LIKE '%-04-%'";
$pemeriksaan9 = mysqli_query($conn, $pemeriksaan8);
$p_apr= mysqli_num_rows($pemeriksaan9);

$pemeriksaan9 = "SELECT * FROM `treatment_record` WHERE treatment_type='pemeriksaan' and treatment_date LIKE '%-03-%'";
$pemeriksaan10 = mysqli_query($conn, $pemeriksaan9);
$p_mar= mysqli_num_rows($pemeriksaan10);

$pemeriksaan10 = "SELECT * FROM `treatment_record` WHERE treatment_type='pemeriksaan' and treatment_date LIKE '%-02-%'";
$pemeriksaan11 = mysqli_query($conn, $pemeriksaan10);
$p_feb= mysqli_num_rows($pemeriksaan11);

$pemeriksaan11 = "SELECT * FROM `treatment_record` WHERE treatment_type='pemeriksaan' and treatment_date LIKE '%-01-%'";
$pemeriksaan12 = mysqli_query($conn, $pemeriksaan11);
$p_jan= mysqli_num_rows($pemeriksaan12);

//cabutan
$cabutan = "SELECT * FROM `treatment_record` WHERE treatment_type='cabutan' and treatment_date LIKE '%-12-%'";
$cabutan1 = mysqli_query($conn, $cabutan);
$c_dec= mysqli_num_rows($cabutan1);

$cabutan1 = "SELECT * FROM `treatment_record` WHERE treatment_type='cabutan' and treatment_date LIKE '%-11-%'";
$cabutan2 = mysqli_query($conn, $cabutan1);
$c_nov= mysqli_num_rows($cabutan2);

$cabutan2 = "SELECT * FROM `treatment_record` WHERE treatment_type='cabutan' and treatment_date LIKE '%-10-%'";
$cabutan3 = mysqli_query($conn, $cabutan2);
$c_oct= mysqli_num_rows($cabutan3);

$cabutan3 = "SELECT * FROM `treatment_record` WHERE treatment_type='cabutan' and treatment_date LIKE '%-09-%'";
$cabutan4 = mysqli_query($conn, $cabutan3);
$c_sept= mysqli_num_rows($cabutan4);

$cabutan4 = "SELECT * FROM `treatment_record` WHERE treatment_type='cabutan' and treatment_date LIKE '%-08-%'";
$cabutan5 = mysqli_query($conn, $cabutan4);
$c_aug= mysqli_num_rows($cabutan5);

$cabutan5 = "SELECT * FROM `treatment_record` WHERE treatment_type='cabutan' and treatment_date LIKE '%-07-%'";
$cabutan6 = mysqli_query($conn, $cabutan5);
$c_july= mysqli_num_rows($cabutan6);

$cabutan6 = "SELECT * FROM `treatment_record` WHERE treatment_type='cabutan' and treatment_date LIKE '%-06-%'";
$cabutan7 = mysqli_query($conn, $cabutan6);
$c_june= mysqli_num_rows($cabutan7);

$cabutan7 = "SELECT * FROM `treatment_record` WHERE treatment_type='cabutan' and treatment_date LIKE '%-05-%'";
$cabutan8 = mysqli_query($conn, $cabutan7);
$c_may= mysqli_num_rows($cabutan8);

$cabutan8 = "SELECT * FROM `treatment_record` WHERE treatment_type='cabutan' and treatment_date LIKE '%-04-%'";
$cabutan9 = mysqli_query($conn, $cabutan8);
$c_apr= mysqli_num_rows($cabutan9);

$cabutan9 = "SELECT * FROM `treatment_record` WHERE treatment_type='cabutan' and treatment_date LIKE '%-03-%'";
$cabutan10 = mysqli_query($conn, $cabutan9);
$c_mar= mysqli_num_rows($cabutan10);

$cabutan10 = "SELECT * FROM `treatment_record` WHERE treatment_type='cabutan' and treatment_date LIKE '%-02-%'";
$cabutan11 = mysqli_query($conn, $cabutan10);
$c_feb= mysqli_num_rows($cabutan11);

$cabutan11 = "SELECT * FROM `treatment_record` WHERE treatment_type='cabutan' and treatment_date LIKE '%-01-%'";
$cabutan12 = mysqli_query($conn, $cabutan11);
$c_jan= mysqli_num_rows($cabutan12);


//tampalan
$tampalan = "SELECT * FROM `treatment_record` WHERE treatment_type='tampalan' and treatment_date LIKE '%-12-%'";
$tampalan1 = mysqli_query($conn, $tampalan);
$t_dec= mysqli_num_rows($tampalan1);

$tampalan1 = "SELECT * FROM `treatment_record` WHERE treatment_type='tampalan' and treatment_date LIKE '%-11-%'";
$tampalan2 = mysqli_query($conn, $tampalan1);
$t_nov= mysqli_num_rows($tampalan2);

$tampalan2 = "SELECT * FROM `treatment_record` WHERE treatment_type='tampalan' and treatment_date LIKE '%-10-%'";
$tampalan3 = mysqli_query($conn, $tampalan2);
$t_oct= mysqli_num_rows($tampalan3);

$tampalan3 = "SELECT * FROM `treatment_record` WHERE treatment_type='tampalan' and treatment_date LIKE '%-09-%'";
$tampalan4 = mysqli_query($conn, $tampalan3);
$t_sept= mysqli_num_rows($tampalan4);

$tampalan4 = "SELECT * FROM `treatment_record` WHERE treatment_type='tampalan' and treatment_date LIKE '%-08-%'";
$tampalan5 = mysqli_query($conn, $tampalan4);
$t_aug= mysqli_num_rows($tampalan5);

$tampalan5 = "SELECT * FROM `treatment_record` WHERE treatment_type='tampalan' and treatment_date LIKE '%-07-%'";
$tampalan6 = mysqli_query($conn, $tampalan5);
$t_july= mysqli_num_rows($tampalan6);

$tampalan6 = "SELECT * FROM `treatment_record` WHERE treatment_type='tampalan' and treatment_date LIKE '%-06-%'";
$tampalan7 = mysqli_query($conn, $tampalan6);
$t_june= mysqli_num_rows($tampalan7);

$tampalan7 = "SELECT * FROM `treatment_record` WHERE treatment_type='tampalan' and treatment_date LIKE '%-05-%'";
$tampalan8 = mysqli_query($conn, $tampalan7);
$t_may= mysqli_num_rows($tampalan8);

$tampalan8 = "SELECT * FROM `treatment_record` WHERE treatment_type='tampalan' and treatment_date LIKE '%-04-%'";
$tampalan9 = mysqli_query($conn, $tampalan8);
$t_apr= mysqli_num_rows($tampalan9);

$tampalan9 = "SELECT * FROM `treatment_record` WHERE treatment_type='tampalan' and treatment_date LIKE '%-03-%'";
$tampalan10 = mysqli_query($conn, $tampalan9);
$t_mar= mysqli_num_rows($tampalan10);

$tampalan10 = "SELECT * FROM `treatment_record` WHERE treatment_type='tampalan' and treatment_date LIKE '%-02-%'";
$tampalan11 = mysqli_query($conn, $tampalan10);
$t_feb= mysqli_num_rows($tampalan11);

$tampalan11 = "SELECT * FROM `treatment_record` WHERE treatment_type='tampalan' and treatment_date LIKE '%-01-%'";
$tampalan12 = mysqli_query($conn, $tampalan11);
$t_jan= mysqli_num_rows($tampalan12);

//penskaleran
$penskaleran = "SELECT * FROM `treatment_record` WHERE treatment_type='penskaleran' and treatment_date LIKE '%-12-%'";
$penskaleran1 = mysqli_query($conn, $penskaleran);
$ps_dec= mysqli_num_rows($penskaleran1);

$penskaleran1 = "SELECT * FROM `treatment_record` WHERE treatment_type='penskaleran' and treatment_date LIKE '%-11-%'";
$penskaleran2 = mysqli_query($conn, $penskaleran1);
$ps_nov= mysqli_num_rows($penskaleran2);

$penskaleran2 = "SELECT * FROM `treatment_record` WHERE treatment_type='penskaleran' and treatment_date LIKE '%-10-%'";
$penskaleran3 = mysqli_query($conn, $penskaleran2);
$ps_oct= mysqli_num_rows($penskaleran3);

$penskaleran3 = "SELECT * FROM `treatment_record` WHERE treatment_type='penskaleran' and treatment_date LIKE '%-09-%'";
$penskaleran4 = mysqli_query($conn, $penskaleran3);
$ps_sept= mysqli_num_rows($penskaleran4);

$penskaleran4 = "SELECT * FROM `treatment_record` WHERE treatment_type='penskaleran' and treatment_date LIKE '%-08-%'";
$penskaleran5 = mysqli_query($conn, $penskaleran4);
$ps_aug= mysqli_num_rows($penskaleran5);

$penskaleran5 = "SELECT * FROM `treatment_record` WHERE treatment_type='penskaleran' and treatment_date LIKE '%-07-%'";
$penskaleran6 = mysqli_query($conn, $penskaleran5);
$ps_july= mysqli_num_rows($penskaleran6);

$penskaleran6 = "SELECT * FROM `treatment_record` WHERE treatment_type='penskaleran' and treatment_date LIKE '%-06-%'";
$penskaleran7 = mysqli_query($conn, $penskaleran6);
$ps_june= mysqli_num_rows($penskaleran7);

$penskaleran7 = "SELECT * FROM `treatment_record` WHERE treatment_type='penskaleran' and treatment_date LIKE '%-05-%'";
$penskaleran8 = mysqli_query($conn, $penskaleran7);
$ps_may= mysqli_num_rows($penskaleran8);

$penskaleran8 = "SELECT * FROM `treatment_record` WHERE treatment_type='penskaleran' and treatment_date LIKE '%-04-%'";
$penskaleran9 = mysqli_query($conn, $penskaleran8);
$ps_apr= mysqli_num_rows($penskaleran9);

$penskaleran9 = "SELECT * FROM `treatment_record` WHERE treatment_type='penskaleran' and treatment_date LIKE '%-03-%'";
$penskaleran10 = mysqli_query($conn, $penskaleran9);
$ps_mar= mysqli_num_rows($penskaleran10);

$penskaleran10 = "SELECT * FROM `treatment_record` WHERE treatment_type='penskaleran' and treatment_date LIKE '%-02-%'";
$penskaleran11 = mysqli_query($conn, $penskaleran10);
$ps_feb= mysqli_num_rows($penskaleran11);

$penskaleran11 = "SELECT * FROM `treatment_record` WHERE treatment_type='penskaleran' and treatment_date LIKE '%-01-%'";
$penskaleran12 = mysqli_query($conn, $penskaleran11);
$ps_jan= mysqli_num_rows($penskaleran12);

//perubatanmulut
$perubatanmulut = "SELECT * FROM `treatment_record` WHERE treatment_type='perubatanmulut' and treatment_date LIKE '%-12-%'";
$perubatanmulut1 = mysqli_query($conn, $perubatanmulut);
$pm_dec= mysqli_num_rows($perubatanmulut1);

$perubatanmulut1 = "SELECT * FROM `treatment_record` WHERE treatment_type='perubatanmulut' and treatment_date LIKE '%-11-%'";
$perubatanmulut2 = mysqli_query($conn, $perubatanmulut1);
$pm_nov= mysqli_num_rows($perubatanmulut2);

$perubatanmulut2 = "SELECT * FROM `treatment_record` WHERE treatment_type='perubatanmulut' and treatment_date LIKE '%-10-%'";
$perubatanmulut3 = mysqli_query($conn, $perubatanmulut2);
$pm_oct= mysqli_num_rows($perubatanmulut3);

$perubatanmulut3 = "SELECT * FROM `treatment_record` WHERE treatment_type='perubatanmulut' and treatment_date LIKE '%-09-%'";
$perubatanmulut4 = mysqli_query($conn, $perubatanmulut3);
$pm_sept= mysqli_num_rows($perubatanmulut4);

$perubatanmulut4 = "SELECT * FROM `treatment_record` WHERE treatment_type='perubatanmulut' and treatment_date LIKE '%-08-%'";
$perubatanmulut5 = mysqli_query($conn, $perubatanmulut4);
$pm_aug= mysqli_num_rows($perubatanmulut5);

$perubatanmulut5 = "SELECT * FROM `treatment_record` WHERE treatment_type='perubatanmulut' and treatment_date LIKE '%-07-%'";
$perubatanmulut6 = mysqli_query($conn, $perubatanmulut5);
$pm_july= mysqli_num_rows($perubatanmulut6);

$perubatanmulut6 = "SELECT * FROM `treatment_record` WHERE treatment_type='perubatanmulut' and treatment_date LIKE '%-06-%'";
$perubatanmulut7 = mysqli_query($conn, $perubatanmulut6);
$pm_june= mysqli_num_rows($perubatanmulut7);

$perubatanmulut7 = "SELECT * FROM `treatment_record` WHERE treatment_type='perubatanmulut' and treatment_date LIKE '%-05-%'";
$perubatanmulut8 = mysqli_query($conn, $perubatanmulut7);
$pm_may= mysqli_num_rows($perubatanmulut8);

$perubatanmulut8 = "SELECT * FROM `treatment_record` WHERE treatment_type='perubatanmulut' and treatment_date LIKE '%-04-%'";
$perubatanmulut9 = mysqli_query($conn, $perubatanmulut8);
$pm_apr= mysqli_num_rows($perubatanmulut9);

$perubatanmulut9 = "SELECT * FROM `treatment_record` WHERE treatment_type='perubatanmulut' and treatment_date LIKE '%-03-%'";
$perubatanmulut10 = mysqli_query($conn, $perubatanmulut9);
$pm_mar= mysqli_num_rows($perubatanmulut10);

$perubatanmulut10 = "SELECT * FROM `treatment_record` WHERE treatment_type='perubatanmulut' and treatment_date LIKE '%-02-%'";
$perubatanmulut11 = mysqli_query($conn, $perubatanmulut10);
$pm_feb= mysqli_num_rows($perubatanmulut11);

$perubatanmulut11 = "SELECT * FROM `treatment_record` WHERE treatment_type='perubatanmulut' and treatment_date LIKE '%-01-%'";
$perubatanmulut12 = mysqli_query($conn, $perubatanmulut11);
$pm_jan= mysqli_num_rows($perubatanmulut12);

//ohi
$ohi = "SELECT * FROM `treatment_record` WHERE treatment_type='ohi' and treatment_date LIKE '%-12-%'";
$ohi1 = mysqli_query($conn, $ohi);
$o_dec= mysqli_num_rows($ohi1);

$ohi1 = "SELECT * FROM `treatment_record` WHERE treatment_type='ohi' and treatment_date LIKE '%-11-%'";
$ohi2 = mysqli_query($conn, $ohi1);
$o_nov= mysqli_num_rows($ohi2);

$ohi2 = "SELECT * FROM `treatment_record` WHERE treatment_type='ohi' and treatment_date LIKE '%-10-%'";
$ohi3 = mysqli_query($conn, $ohi2);
$o_oct= mysqli_num_rows($ohi3);

$ohi3 = "SELECT * FROM `treatment_record` WHERE treatment_type='ohi' and treatment_date LIKE '%-0-%'";
$ohi4 = mysqli_query($conn, $ohi3);
$o_sept= mysqli_num_rows($ohi4);

$ohi4 = "SELECT * FROM `treatment_record` WHERE treatment_type='ohi' and treatment_date LIKE '%-08-%'";
$ohi5 = mysqli_query($conn, $ohi4);
$o_aug= mysqli_num_rows($ohi5);

$ohi5 = "SELECT * FROM `treatment_record` WHERE treatment_type='ohi' and treatment_date LIKE '%-07-%'";
$ohi6 = mysqli_query($conn, $ohi5);
$o_july= mysqli_num_rows($ohi6);

$ohi6 = "SELECT * FROM `treatment_record` WHERE treatment_type='ohi' and treatment_date LIKE '%-06-%'";
$ohi7 = mysqli_query($conn, $ohi6);
$o_june= mysqli_num_rows($ohi7);

$ohi7 = "SELECT * FROM `treatment_record` WHERE treatment_type='ohi' and treatment_date LIKE '%-05-%'";
$ohi8 = mysqli_query($conn, $ohi7);
$o_may= mysqli_num_rows($ohi8);

$ohi8 = "SELECT * FROM `treatment_record` WHERE treatment_type='ohi' and treatment_date LIKE '%-04-%'";
$ohi9 = mysqli_query($conn, $ohi8);
$o_apr= mysqli_num_rows($ohi9);

$ohi9 = "SELECT * FROM `treatment_record` WHERE treatment_type='ohi' and treatment_date LIKE '%-03-%'";
$ohi10 = mysqli_query($conn, $ohi9);
$o_mar= mysqli_num_rows($ohi10);

$ohi10 = "SELECT * FROM `treatment_record` WHERE treatment_type='ohi' and treatment_date LIKE '%-02-%'";
$ohi11 = mysqli_query($conn, $ohi10);
$o_feb= mysqli_num_rows($ohi11);

$ohi11 = "SELECT * FROM `treatment_record` WHERE treatment_type='ohi' and treatment_date LIKE '%-01-%'";
$ohi12 = mysqli_query($conn, $ohi11);
$o_jan= mysqli_num_rows($ohi12);


//others
$others = "SELECT * FROM `treatment_record` WHERE treatment_type='others' and treatment_date LIKE '%-12-%'";
$others1 = mysqli_query($conn, $others);
$l_dec= mysqli_num_rows($others1);

$others1 = "SELECT * FROM `treatment_record` WHERE treatment_type='others' and treatment_date LIKE '%-11-%'";
$others2 = mysqli_query($conn, $others1);
$l_nov= mysqli_num_rows($others2);

$others2 = "SELECT * FROM `treatment_record` WHERE treatment_type='others' and treatment_date LIKE '%-10-%'";
$others3 = mysqli_query($conn, $others2);
$l_oct= mysqli_num_rows($others3);

$others3 = "SELECT * FROM `treatment_record` WHERE treatment_type='others' and treatment_date LIKE '%-09-%'";
$others4 = mysqli_query($conn, $others3);
$l_sept= mysqli_num_rows($others4);

$others4 = "SELECT * FROM `treatment_record` WHERE treatment_type='others' and treatment_date LIKE '%-08-%'";
$others5 = mysqli_query($conn, $others4);
$l_aug= mysqli_num_rows($others5);

$others5 = "SELECT * FROM `treatment_record` WHERE treatment_type='others' and treatment_date LIKE '%-07-%'";
$others6 = mysqli_query($conn, $others5);
$l_july= mysqli_num_rows($others6);

$others6 = "SELECT * FROM `treatment_record` WHERE treatment_type='others' and treatment_date LIKE '%-06-%'";
$others7 = mysqli_query($conn, $others6);
$l_june= mysqli_num_rows($others7);

$others7 = "SELECT * FROM `treatment_record` WHERE treatment_type='others' and treatment_date LIKE '%-05-%'";
$others8 = mysqli_query($conn, $others7);
$l_may= mysqli_num_rows($others8);

$others8 = "SELECT * FROM `treatment_record` WHERE treatment_type='others' and treatment_date LIKE '%-04-%'";
$others9 = mysqli_query($conn, $others8);
$l_apr= mysqli_num_rows($others9);

$others9 = "SELECT * FROM `treatment_record` WHERE treatment_type='others' and treatment_date LIKE '%-03-%'";
$others10 = mysqli_query($conn, $others9);
$l_mar= mysqli_num_rows($others10);

$others10 = "SELECT * FROM `treatment_record` WHERE treatment_type='others' and treatment_date LIKE '%-02-%'";
$others11 = mysqli_query($conn, $others10);
$l_feb= mysqli_num_rows($others11);

$others11 = "SELECT * FROM `treatment_record` WHERE treatment_type='others' and treatment_date LIKE '%-01-%'";
$others12 = mysqli_query($conn, $others11);
$l_jan= mysqli_num_rows($others12);

?>


<script>

new Chart(document.getElementById("bar-chart-grouped2"), {
    type: 'bar',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      datasets: [
        {
          label: "PEMERIKSAAN",
          backgroundColor: "#7EE5A2",
          data: [<?php echo $p_jan; ?>,<?php echo $p_feb; ?>,<?php echo $p_mar; ?>,<?php echo $p_apr; ?>,<?php echo $p_may; ?>,<?php echo $p_june; ?>,<?php echo $p_july; ?>,<?php echo $p_aug; ?>,<?php echo $p_sept; ?>,<?php echo $p_oct; ?>,<?php echo $p_nov; ?>,<?php echo $p_dec; ?>]
        }, {
          label: "CABUTAN",
          backgroundColor: "#FF4DCD",
          data: [<?php echo $c_jan; ?>,<?php echo $c_feb; ?>,<?php echo $c_mar; ?>,<?php echo $c_apr; ?>,<?php echo $c_may; ?>,<?php echo $c_june; ?>,<?php echo $c_july; ?>,<?php echo $c_aug; ?>,<?php echo $c_sept; ?>,<?php echo $c_oct; ?>,<?php echo $c_nov; ?>,<?php echo $c_dec; ?>]
        }, {
          label: "TAMPALAN",
          backgroundColor: "#AEFF80",
          data: [<?php echo $t_jan; ?>,<?php echo $t_feb; ?>,<?php echo $t_mar; ?>,<?php echo $t_apr; ?>,<?php echo $t_may; ?>,<?php echo $t_june; ?>,<?php echo $t_july; ?>,<?php echo $t_aug; ?>,<?php echo $t_sept; ?>,<?php echo $t_oct; ?>,<?php echo $t_nov; ?>,<?php echo $t_dec; ?>]
        }, {
          label: "PENSKALERAN",
          backgroundColor: "#BFBBA7",
          data: [<?php echo $ps_jan; ?>,<?php echo $ps_feb; ?>,<?php echo $ps_mar; ?>,<?php echo $ps_apr; ?>,<?php echo $ps_may; ?>,<?php echo $ps_june; ?>,<?php echo $ps_july; ?>,<?php echo $ps_aug; ?>,<?php echo $ps_sept; ?>,<?php echo $ps_oct; ?>,<?php echo $ps_nov; ?>,<?php echo $ps_dec; ?>]
        }, {
          label: "PERUBATAN MULUT",
          backgroundColor: "#FF5681",
          data: [<?php echo $pm_jan; ?>,<?php echo $pm_feb; ?>,<?php echo $pm_mar; ?>,<?php echo $pm_apr; ?>,<?php echo $pm_may; ?>,<?php echo $pm_june; ?>,<?php echo $pm_july; ?>,<?php echo $pm_aug; ?>,<?php echo $pm_sept; ?>,<?php echo $pm_oct; ?>,<?php echo $pm_nov; ?>,<?php echo $pm_dec; ?>]
        }, {
          label: "OHI",
          backgroundColor: "#FFED69",
          data: [<?php echo $o_jan; ?>,<?php echo $o_feb; ?>,<?php echo $o_mar; ?>,<?php echo $o_apr; ?>,<?php echo $o_may; ?>,<?php echo $o_june; ?>,<?php echo $o_july; ?>,<?php echo $o_aug; ?>,<?php echo $o_sept; ?>,<?php echo $o_oct; ?>,<?php echo $o_nov; ?>,<?php echo $o_dec; ?>]
        }, {
          label: "LAIN-LAIN",
          backgroundColor: "#70C9BD",
          data: [<?php echo $l_jan; ?>,<?php echo $l_feb; ?>,<?php echo $l_mar; ?>,<?php echo $l_apr; ?>,<?php echo $l_may; ?>,<?php echo $l_june; ?>,<?php echo $l_july; ?>,<?php echo $l_aug; ?>,<?php echo $l_sept; ?>,<?php echo $l_oct; ?>,<?php echo $l_nov; ?>,<?php echo $l_dec; ?>]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Number of Treatments Against Months According to Treatment Type'
      }
    }
});



</script>

<br><br>

<div id="profile" align="center">
<a titlt="print screen" alt="print screen" onClick="window.print();" "target="_blank" style="cursor:pointer;"><img src="img/printer.png" width="50" height="50"></a>
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
