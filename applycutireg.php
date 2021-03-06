<?php
session_start();
include ('connect.php');

$sql2 = "SELECT * FROM user WHERE username = '".$_SESSION['username']."'" ;
  $query2 = mysqli_query($conn, $sql2) ;
  $result2 = mysqli_fetch_assoc($query2) ;

  $profile = "SELECT * FROM profile WHERE level = '".$result2['level']."'" ;
  $query1 = mysqli_query($conn, $profile) ;
  $result1 = mysqli_fetch_assoc($query1) ;

if(isset($_POST['apply']))
{
    $leavetype=$_POST['leavetype'];
    $fromdate=$_POST['fromdate'];  
    $todate=$_POST['todate'];
    $description=$_POST['description']; 
    $empid = $result1['empid']; 
    $status=0;
    $isread=0;
    if($fromdate > $todate)
    {
     $error=" ToDate should be greater than FromDate ";
    }

    $sql = mysqli_query($conn, "INSERT INTO tblleaves(LeaveType, ToDate, FromDate, Description, Status, IsRead, empid) VALUES ('$leavetype','$fromdate','$todate','$description','$status','$isread', '$empid') ");

    echo '<script language="javascript">';
        echo 'alert("Successfull");';
        echo 'window.location.href="applycutireg.php";';
        echo '</script>';

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Staff Management System</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="css/monthly.css">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Staff Management System</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
          <a class="nav-link" href="profilereg.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Profile</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="UTeM Dental System">
          <a class="nav-link" href="appointmentListReg.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Utem Dental System</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Mohon Cuti">
          <a class="nav-link" href="applycutireg.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Apply Leave</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Mohon Cuti">
          <a class="nav-link" href="leavehistoryreg.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Leave History</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Mohon Cuti</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Mohon Cuti</div>
        <div class="card-body">
          	<div class="table-responsive">
          		<div id="form">
                <form id="example-form" method="post" name="applycuti">
                  <div class="content">
                    <h3>Apply for Leave</h3>
                    <section>
                      <div class="input-field">
                        <select name="leavetype" autocomplete="off">
                        <option>Select leave type..</option>
                        <option value="Casual Leave">Casual Leave</option>
                        <option value="Medical Leave">Medical Leave</option>
                        </select>
                      </div>
                      <div class="input-field">
                        <label for="fromdate">From Date</label><br>
                        <input type="date" name="fromdate"> 
                      </div>
                      <div class="input-field">
                        <label for="fromdate">To Date</label><br>
                        <input type="date" name="todate"> 
                      </div>
                      <div class="input-field">
                        <label for="description">Description</label><br>
                        <textarea name="description" length="500"></textarea>
                      </div>
                      <div>
                        <button type="submit" name="apply" id="apply">Apply</button>
                      </div>
                    </section>
                  </div>
                </form>  
              </div>
        	</div>
        </div>
        <div class="card-footer small text-muted">Mohon Cuti</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="index.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/monthly.js"></script>

	

  </div>
</body>

</html>
