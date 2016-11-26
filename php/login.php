<?php
session_start();
require_once './db_connect.php';
?>


<?php 
if(isset($_POST["username"]) && isset($_POST["password"]))
{
    $un = sanitize($_POST["username"]);
    $pw = sanitize($_POST["password"]);
    $pwhash = hash('md5',$pw);

    
    
    //checks if user is a student
    $login_query = "SELECT * FROM Student WHERE username = '$un' AND password = '$pwhash'";
    $result = mysqli_query($db,$login_query);
    $numrows = mysqli_num_rows($result);
    if($numrows == 1)
    {
        $row = mysqli_fetch_assoc($result);
        $sid =$row['sid'];
        $_SESSION["sid"]=$sid;
        header("location: ./../studentHome.php");
        exit;
        
    }
    
    //checks if user is a Advisor
    $login_query = "SELECT * FROM Advisor WHERE username = '$un' AND password = '$pwhash'";
    $result = mysqli_query($db,$login_query);
    $numrows = mysqli_num_rows($result);
    if($numrows == 1)
    {
        $row = mysqli_fetch_assoc($result);
        $aid =$row['aid'];
        $_SESSION["aid"]=$aid;
        header("location: ./../advisorHome.html");
        exit;
    }
    
    
    echo '<script language="javascript">';
    echo 'alert("';
    echo "Login failed. Please try again";
    echo '")</script>';
    header("Location: ./../login.html");
}







function sanitize($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}