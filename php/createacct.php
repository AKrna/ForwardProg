<?php
require_once './db_connect.php';
?>

<?php 
if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["confPass"]))
{
    if($_POST["password"] == $_POST["confPass"])
    {
        //LOGIN STUFF
        $un= sanitize($_POST["username"]);
        $pw= sanitize($_POST["password"]);
        $pwhash = hash('md5',$pw);
        $acctType = $_POST["acctType"];
        
        $mysqlstmt = "SELECT * FROM Student, Advisor, Employer WHERE Employer.username = '$un' OR Student.username = '$un' OR Advisor.username = '$un'";
        $result = mysqli_query($db,$mysqlstmt);
        $numrows = mysqli_num_rows($result);
           echo '<script language="javascript">';
           echo 'alert("';
           echo $numrows;
           echo '")</script>'; 
        
        if($numrows == 0)
        {
           $mysqlstmt = "INSERT INTO $acctType (username, password) VALUE('$un', '$pwhash')";
           mysqli_query($db,$mysqlstmt);
           echo '<script language="javascript">';
           echo 'alert("';
           echo $mysqlstmt;
           echo '")</script>';  
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("Creation failed, Username taken, please try again");';
            echo '</script>';
        }
    }
    else
    {
       echo '<script language="javascript">';
       echo 'alert("Creation failed, passwords do not match, please try again");';
       echo '</script>';
    }
}
function sanitize($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
