<?php
            
session_start();
include ('connect.php');

if (isset($_POST['login']))
{
    $username = ($_POST['username']);

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '".$username."' and password = '".$password."' ";
    $query = mysqli_query($conn,$sql) ;
    $result = mysqli_fetch_assoc($query) or die(mysqli_error($conn)) ;

    if ($result)
    {
    $_SESSION['username'] = $_POST['username'];
    if($result['level'] == "registrar")
    {
        header("Location:appointmentListReg.php"); 
    }
    elseif ($result['level'] == "dentist") 
    {
        header("Location:appointmentListDen.php");
    }
    echo "<script>alert('Sorry wrong username or password')
    location.href='login.php'
    </script>";
    }
    else
    {
    echo "<script>alert('Please input your username and password')
        location.href='login.php'
    </script>";

    }
}  


// if (!result)
// {
//     echo "<script>alert('Please input your username and password')
//         location.href='index.php'
//     </script>";
// }
// else
// {
//     $_SESSION['username'] = $_POST['username'] ;
//     if($result['level'] == "registrar")
//     {
//         header("Location:register.php") ; 
//     }
//     elseif ($result['level'] == "dentist") {
//         header("Location:patientListDen.php");
//     }
//     echo "<script>alert('Sorry wrong username or password')
//     location.href='index.php'
//     </script>";