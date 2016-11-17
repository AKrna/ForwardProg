<?php
require_once './db_connect.php';
?>


<?php 
if(isset($_POST["username"]) && isset($_POST["password"]))
{
    $un = sanitize($_POST["username"]);
    $pw = sanitize($_POST["password"]);
    $pwhash = hash('md5',$pw);
    $usertype = 'none';
    
    
    //checks if user is a student
    $login_query = "SELECT * FROM Student WHERE username = '$un' AND password = '$pwhash'";
    $result = mysqli_query($db,$login_query);
    $numrows = mysqli_num_rows($result);
    if($numrows == 1)
    {
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION["sid"]=$row['sid'];
        $_SESSION["name"]=$row["username"];
        header("location: ./../Studenthome.html");
        
    }
    
    //checks if user is a Advisor
    $login_query = "SELECT * FROM Advisor WHERE username = '$un' AND password = '$pwhash'";
    $result = mysqli_query($db,$login_query);
    $numrows = mysqli_num_rows($result);
    if($numrows == 1)
    {
        $usertype = 'Advisor';
    }
    
    //checks if user is a student
    $login_query = "SELECT * FROM Employer WHERE username = '$un' AND password = '$pwhash'";
    $result = mysqli_query($db,$login_query);
    $numrows = mysqli_num_rows($result);
    if($numrows == 1)
    {
        $usertype = 'Employer';
    }

}







function sanitize($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}