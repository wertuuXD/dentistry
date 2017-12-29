<?php
include ('connect.php');

if (isset($_POST['login']))
{
     

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = md5($password);


    $stmt = $mysqli->prepare("SELECT * FROM `user` WHERE username = ? and password = ? ");
    $stmt->bind_param("ss", $username,$hashed_password);
    $stmt->execute();
    $result = $stmt->get_result() ;
    $row = $result->fetch_assoc();

    
    if ($result)
    {
        session_start();
        $_SESSION['username'] = $_POST['username'];
        if($row['level'] == "registrar")
        {
            header("Location:appointmentListReg.php?error=0"); 
        }
        else if ($row['level'] == "dentist") 
        {
            header("Location:appointmentListDen.php?error=0");
        }
        else if ($row['level'] == "admin")
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