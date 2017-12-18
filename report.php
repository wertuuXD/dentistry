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
$totalp = $student[0] + $student[1];
 ?>


<center>

<div class="col-lg-8">
  <canvas id="pie-chart" width="800" height="450"></canvas>
  <script>

  new Chart(document.getElementById("pie-chart"), {
      type: 'pie',
      data: {
        labels: ["Staff", "Student",],
        datasets: [{
          label: "Number",
          backgroundColor: ["#3e95cd", "#8e5ea2",],
          data: [<?php echo $totals;?>,<?php echo $totalp;?>]
        }]
      },
      options: {
        title: {
          display: true,
          text: 'Number of staff and student'
        }
      }
  });

  </script>

</div>


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
          data: [<?php echo $staff[0];?>,<?php echo $student[0];?>]
        }, {
          label: "Female",
          backgroundColor: "#8e5ea2",
          data: [<?php echo $staff[1];?>,<?php echo $student[1];?>]
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
$month = array("01" , "02" , "03" , "04" , "05" , "06" , "07" , "08" , "09" , "10" , "11" , "12");
$details = array("PEMERIKSAAN" , "CABUTAN" , "TAMPALAN" , "PENSKALERAN" , "PERUBATAN MULUT" , "OHI" , "LAIN-LAIN");

$data = [12][7];

include('connect2.php');
for ($i = 0;$i<12;$i++){

  for ($o = 0;$o<7;$o++){

    $sql = "select count(*) from treatment_details where details_notes = '$details[$o]' and details_date LIKE '%%%%-$month[$i]-%%' ";

    //echo $sql;
    $result5 = mysqli_query ($conn,$sql);
    if (!$result5) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
    $row5 = mysqli_fetch_array($result5);
    $data[$i][$o] = $row5[0];
  }


}

 ?>



<script>

new Chart(document.getElementById("bar-chart-grouped2"), {
    type: 'bar',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      datasets: [
        {
          label: "PEMERIKSAAN",
          backgroundColor: "#3e95cd",
          data: [<?php echo $data[0][0];?>,<?php echo $data[1][0];?>,<?php echo $data[2][0];?>,<?php echo $data[3][0];?>,<?php echo $data[4][0];?>,<?php echo $data[5][0];?>,<?php echo $data[6][0];?>,<?php echo $data[7][0];?>,<?php echo $data[8][0];?>,<?php echo $data[9][0];?>,<?php echo $data[10][0];?>,<?php echo $data[11][0];?>]
        }, {
          label: "CABUTAN",
          backgroundColor: "#8e5ea2",
          data: [<?php echo $data[0][0];?>,<?php echo $data[1][1];?>,<?php echo $data[2][0];?>,<?php echo $data[3][0];?>,<?php echo $data[4][0];?>,<?php echo $data[5][0];?>,<?php echo $data[6][0];?>,<?php echo $data[7][0];?>,<?php echo $data[8][0];?>,<?php echo $data[9][0];?>,<?php echo $data[10][0];?>,<?php echo $data[11][0];?>]
        }, {
          label: "TAMPALAN",
          backgroundColor: "#8e5ea2",
          data: [408,547,675,734]
        }, {
          label: "PENSKALERAN",
          backgroundColor: "#8e5ea2",
          data: [408,547,675,734]
        }, {
          label: "PERUBATAN MULUT",
          backgroundColor: "#8e5ea2",
          data: [408,547,675,734]
        }, {
          label: "OHI",
          backgroundColor: "#8e5ea2",
          data: [408,547,675,734]
        }, {
          label: "LAIN-LAIN",
          backgroundColor: "#8e5ea2",
          data: [408,547,675,734]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Population growth (millions)'
      }
    }
});



</script>

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
