<?php
session_start();
include 'connect.php' ;

$leaveid = $_GET['leave_id'] ; 

$sql2 = "SELECT * FROM tblleaves WHERE leave_id = '".$leaveid."'" ;
  $query2 = mysqli_query($conn, $sql2) ;
  $result2 = mysqli_fetch_assoc($query2) ;

  $profile = "SELECT * FROM profile WHERE empid = '".$result2['empid']."'" ;
  $query1 = mysqli_query($conn, $profile) ;
  $result1 = mysqli_fetch_assoc($query1) ;

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
  <script src="js/jquery-3.3.1.min.js"></script>
  <style>
    #actionTakenpage
    {
      display: none;
    }
  </style>
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
          <a class="nav-link" href="profileDen.php">
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
            <span class="nav-link-text">Mohon Cuti</span>
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
        <li class="breadcrumb-item active">Leave History</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        
      <div class="table-responsive">
              <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Leave Details</div>
        <div class="card-body">
            <div class="table-responsive">
              <div id="form">
                  <div class="content">
                    <h3>Leave Details</h3>
                    <section>
                      <table width="100%" class="table table-stripped table-hover table-bordered">
                      <thead>
                         <tr>
                           <th width="120">Name</th>
                           <th id="namedb"><?php echo $result1['name'] ?></th> 
                         </tr>
                         <tr>
                           <th width="120">Email</th>
                           <th id="emaildb"><?php echo $result1['email'] ?></th>
                         </tr>
                         <tr>
                           <th width="120">Phone Number</th>
                           <th id="phonedb"><?php echo $result1['phoneNo'] ?></th>
                         </tr>
                         <tr>
                           <th width="120">Leave Type</th>
                           <th id="leavedb"><?php echo $result2['LeaveType'] ?></th>
                         </tr>
                         <tr>
                           <th width="120">Employee Leave Description</th>
                           <th id="leavedescdb"><?php echo $result2['Description'] ?></th>
                         </tr>
                         <tr>
                           <th width="120">Leave Status</th>
                           <th id="statdb"><?php if ($result2['Status'] == 0)
                        {
                          echo "Still Not Approved";
                        }
                        else
                        {
                          echo "Approved";
                        } ?></th>
                         </tr>
                         <tr>
                           <th width="120">Admin Remark</th>
                           <th id="admindb"><?php if ($result2['AdminRemark'] == "") 
                           {
                            echo "Still Waiting for Approval" ;
                             
                           } else
                           {
                            echo $result2['AdminRemark'];
                           }?>
                           
                           </th>
                         </tr>
                         <tr>
                           <th width="120">Admin Action taken date</th>
                           <th id="actiondb"><?php if ($result2['AdminRemarkDate'] == "") {
                             echo "NA";
                           }
                           else {
                            echo $result2['AdminRemarkDate'];
                           } ?></th>
                         </tr>
                         <tr>
                           <th width="120">Leave Date</th>
                           <th><?php echo $result2['FromDate'] ?></th>
                         </tr>
                         <tr>
                           <th width="120">Posting Date</th>
                           <th><?php echo $result2['PostingDate'] ?></th>
                         </tr>
                      </thead>
                      
                      </table>
                      <button id="actiontaken">TAKE ACTION</button>

                      <div id="actionTakenpage">
                        <select id="action">
                          <option value="4">Choose Your Option</option>
                          <option value="1">Approved</option>
                          <option value="0">Not Approved</option>
                        </select>
                        <br>
                        <textarea id="adminremak" name="description" placeholder="Description"></textarea>
                        <br>
                        <button id="send">Submit</button>
                      </div>
                    </section>                    
                  </div>
                  <script>
                      $("#actiontaken").click(function() 
                        {
                          $("#actionTakenpage").toggle();
                        });

                      $("#send").click(function() 
                        {
                          $.ajax({
                            type: 'POST',
                            url: 'http://localhost/dentistry/updateleavedet.php',
                            data:{
                              leaveid:<?php echo $leaveid; ?>,
                              action:$("#action").val(),
                              remark:$("#adminremak").val()
                            },
                            success:function(data){
                              alert(data);
                              window.location.href = 'adminleavedetail.php?leave_id=<?php echo $leaveid; ?>';
                            }
                          });
                        });
                    </script>  
              </div>
          </div>
        </div>
        <div class="card-footer small text-muted">Mohon Cuti</div>
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
            <a class="btn btn-primary" href="login.php">Logout</a>
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
