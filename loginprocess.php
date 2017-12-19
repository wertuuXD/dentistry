<?php
include ('connect.php');

if (isset($_POST['login']))
{
     

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = md5($password);

    $sql = "SELECT * FROM `user` WHERE username = '".$username."' and password = '".$hashed_password."' ";
    $query = mysqli_query($conn,$sql) ;
    $result = mysqli_fetch_assoc($query) ;
    
    if ($result)
    {
        session_start();
        $_SESSION['username'] = $_POST['username'];
        if($result['level'] == "registrar")
        {
            header("Location:appointmentListReg.php?error=0"); 
        }
        else if ($result['level'] == "dentist") 
        {
            header("Location:appointmentListDen.php?error=0");
        }
        else if ($result['level'] == "admin")
        {
            header("Location:admin.php?error=0");
        }
        else
        {
           header("Location:login.php?error=2");
        }
        
    }
    else
    {
       header("Location:login.php?error=1");
        
    }
     
}
    
?>