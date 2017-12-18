<?php

session_start();

if(!isset($_SESSION['username']))
{
  echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.alert('login dulu la')
  window.location.href='login.php';
  </SCRIPT>");

}
 ?>


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
              <a class="nav-link js-scroll-trigger" href="logout.php" onclick="javascript:return confirm('Are you sure you want to log out?');">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<br><br>

<?php

	include ("connect.php");
	if(isset($_POST['submit']))
	{
		$nm = $_POST['name'];
		$matr = $_POST['matric_staffno'];
		$fac = $_POST['fac_dept'];
		$ic = $_POST['ic_passno'];
		$posit = $_POST['position'];
		$gdr = $_POST['gender'];
		$ctz = $_POST['citizen'];
		$tel = $_POST['phoneno'];
		$adrs = $_POST['address'];
		$cons = $_POST['patient_consent'];
    $allergies = $_POST['allergies'];
    $asthma = $_POST['asthma'];
    $diabetes = $_POST['diabetes'];
    $hypertension = $_POST['hypertension'];
    $blood = $_POST['blooddyscrasias'];
    $heart = $_POST['heartdisease'];
    $congheart = $_POST['congenitalheart'];
    $other = $_POST['otherdisease'];
    $medtaken = $_POST['medicationtaken'];


		mysqli_query
		($conn, "INSERT INTO patient_info (name,matric_staffno,fac_dept,ic_passno,position,	gender,citizen,phoneno,address,patient_consent)
      	 VALUES ('$nm','$matr','$fac','$ic','$posit','$gdr','$ctz','$tel','$adrs','$cons')") or die ( mysqli_error($conn));


         $result2 = mysqli_query ($conn,"select max(patient_id) from patient_info");
         $row2 = mysqli_fetch_array($result2);
         $pid = $row2[0];




     mysqli_query
    ($conn, "INSERT INTO medical_history (allergies,asthma,diabetes,hypertension,blooddyscrasias,heartdisease,congenitalheart,otherdisease,medictaken,patient_id)
    VALUES ('$allergies','$asthma','$diabetes','$hypertension','$blood','$heart','$congheart','$other','$medtaken' ,'$pid')") or die  ( mysqli_error($conn));
    echo "<script>alert('The data successfully inserted');";
     echo "window.location.href = 'registerPatient.php';</script>";

	}
?>

<section id="registerPart">
  <div class="container">
    <h3 class="text-center">Patient Registration</h3>
    <hr class="star-primary">
    <div class="row">
      <div class="col-lg-8 mx-auto">

<center>
<div align="center">
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="550"  align="center" cellspacing="12px">

      <tr>
        <th colspan="2" scope="col"></th>
      </tr>

      <tr>
          <td height="20" colspan="2"><div align="left"><br><p>
        Part A: Patient Information</p>
      </div></td></tr>

      <tr>
        <td height="24"><br>
          Name :</td>
        <td height="24"><br><input required style="width:80%" type="text" name="name"></td>
       </tr>

       <tr>
        <td height="24"><br>
          Matric/Staff No :</td>
        <td height="24"><br><input required type="text" name="matric_staffno"></td>
        </tr>

        <tr>
        <td height="24"><br>
          Faculty/Department :</td>
        <td height="24"><br><input required type="text" name="fac_dept"></td>
       </tr>

       <tr>
        <td height="24"><br>
          IC/Passport No :</td>
        <td height="24"><br><input required type="text" name="ic_passno"></td>
        </tr>

       <tr>
        <td height="24"><br>
          Position :</td>
        <td height="24"><br>
         <input type="radio" name="position"  value="Staff" />Staff
       &nbsp;&nbsp;&nbsp;
            <input type="radio" name="position"  value="Student" />Student
        </td>
        </tr>

        <tr>
        <td height="24"><br>
          Gender :</td>
        <td height="24"><br>
         <input type="radio" name="gender"  value="Male" />Male
       &nbsp;&nbsp;&nbsp;
            <input type="radio" name="gender"  value="Female" />Female
        </td>
        </tr>

        <tr>
        <td height="24"><br>
          Citizen :</td>
        <td height="24"><br><input required type="text" name="citizen"></td>
        </tr>

        <tr>
        <td height="24"><br>
          Telephone No :</td>
        <td height="24"><br><input required type="text" name="phoneno"></td>
       </tr>

         <tr>
        <td height="24"><br>
          Address :</td>
        <td height="24"><br><label for="address"></label>
          <textarea required name="address" cols="40" rows="4"></textarea></td>
        </tr>

        <tr>
        <td height="24"><br>
          Treatment Consent :</td>
        <td height="24"><br>
         <input type="radio" name="patient_consent"  value="approve" />Approve
       &nbsp;&nbsp;&nbsp;
            <input type="radio" name="patient_consent"  value="decline" />Decline
        </td>
        </tr>

        <tr>
          <td height="24" colspan="2"><div align="left"><br><p>
        Part B: Patient Medical History</p>
      </div></td></tr>

      <tr>
        <td height="24"><br>
          Allergies :</td>
        <td height="24"><br>
         <input type="radio" name="allergies"  value="Yes" />Yes
       &nbsp;&nbsp;&nbsp;
            <input type="radio" name="allergies"  value="No" checked="=checked" />No
        </td>
        </tr>

          <tr>
        <td height="24"><br>
          Asthma :</td>
        <td height="24"><br>
         <input type="radio" name="asthma"  value="Yes" />Yes
       &nbsp;&nbsp;&nbsp;
            <input type="radio" name="asthma"  value="No" checked="=checked" />No
        </td>
        </tr>

          <tr>
        <td height="24"><br>
          Diabetes :</td>
        <td height="24"><br>
         <input type="radio" name="diabetes"  value="Yes" />Yes
       &nbsp;&nbsp;&nbsp;
            <input type="radio" name="diabetes"  value="No" checked="=checked" />No
        </td>
        </tr>

          <tr>
        <td height="24"><br>
          Hypertension :</td>
        <td height="24"><br>
         <input type="radio" name="hypertension"  value="Yes" />Yes
       &nbsp;&nbsp;&nbsp;
            <input type="radio" name="hypertension"  value="No" checked="=checked" />No
        </td>
        </tr>

          <tr>
        <td height="24"><br>
          Blood Dyscrasias :</td>
        <td height="24"><br>
         <input type="radio" name="blooddyscrasias"  value="Yes" />Yes
       &nbsp;&nbsp;&nbsp;
            <input type="radio" name="blooddyscrasias"  value="No" checked="=checked" />No
        </td>
        </tr>

          <tr>
        <td height="24"><br>
          Heart Disease :</td>
        <td height="24"><br>
         <input type="radio" name="heartdisease"  value="Yes" />Yes
       &nbsp;&nbsp;&nbsp;
            <input type="radio" name="heartdisease"  value="No" checked="=checked" />No
        </td>
        </tr>

          <tr>
        <td height="24"><br>
          Congenital Heart :</td>
        <td height="24"><br>
         <input type="radio" name="congenitalheart"  value="Yes" />Yes
       &nbsp;&nbsp;&nbsp;
            <input type="radio" name="congenitalheart"  value="No" checked="=checked" />No
        </td>
        </tr>

        <tr>
        <td height="24"><br>
          Other Diseases :</td>
        <td height="24"><br><input type="text" name="otherdisease"></td>
        </tr>

        <tr>
        <td height="24"><br>
          Medication Taken :</td>
        <td height="24"><br><input type="text" name="medicationtaken"></td>
        </tr>


      <tr>
        <td height="23" colspan="2"><div align="center"><br>
        &nbsp; &nbsp; &nbsp; &nbsp;

          <input type="submit" name="submit" id="submit" value="SUBMIT">
           &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
          <input type="reset" name="reset" id="reset" value="RESET">

        </div></td>
        </tr>
    </table>
    </form>
    </div>
</center>


</div>
</div>



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
