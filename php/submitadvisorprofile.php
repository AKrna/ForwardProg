<?php
session_start();
require_once './db_connect.php';

$check_query = "SELECT * FROM AdvisorContact WHERE aid = '".$_SESSION["aid"]."' ";
$result = mysqli_query($db,$check_query);
$numrows = mysqli_num_rows($result);
if($numrows > 0 )
{
    $delete_query = "Delete FROM AdvisorContact Where aid='".$_SESSION["aid"]."'";
    $result = mysqli_query($db,$delete_query);
}
$aid = $_SESSION["aid"];
$name = $_POST["advisorName"];
$email = $_POST["advEmail"];
$offhr = $_POST["officeHrs"];
$offloc = $_POST["offLocation"];

$insert_query =  "INSERT INTO AdvisorContact(aid, name, email, offhrs, offloc) VALUES( '$aid', '$name', '$email', '$offhr', '$offloc')";
$result = mysqli_query($db,$insert_query);





















