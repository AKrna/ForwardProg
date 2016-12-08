<?php
require_once './db_connect.php';
require_once 'login.php'; // for sanitize

/*
 * fname
 * lname
 * znum
 * Internship Title
 * Organization
 * Department
 * Startdate
 * End Date
 * Salary
 * Salary type
 * Type of Emplyoment
 * Esitimated hr per week
 * Additonal Compensation
 * Internpreviously
 * Further Career goals? 
 * ********************************
 * Supervisor Name
 * Supervisor Title
 * Address1
 * Address2
 * City 
 * State
 * ZipCode
 * Supervisor Email
 * Phone Number
 * Fax
 */
$fname = sanitize($_POST["Fname"]);
$lname = sanitize($_POST["Lname"]);
$znum = sanitize($_POST["Znum"]);

$query ="insert into StudentDummy(fname, lname, znum) VALUES('".$fname."', '".$lname."', '".$znum."')";
mysqli_query($db,$query);
$result = mysqli_query($db,"SELECT LAST_INSERT_ID()");    
$temp = mysqli_fetch_row($result);
$sid = $temp[0];




/***********************************************/
$inttitle = sanitize($_POST["internshipTitle"]);
$org = sanitize($_POST["Organizationi"]);
$dep = sanitize($_POST["departmenti"]);
$startdt = sanitize($_POST["startDatei"]);
$enddt = sanitize($_POST["endDatei"]);
$salary = sanitize($_POST["salaryi"]);
$salarytype = sanitize($_POST["salaryType"]);
$employmentType = sanitize($_POST["ii1"]);
$esthr = sanitize($_POST["hrsPerWeeki"]);
$addcomp = sanitize($_POST["additionalCompensationi"]);
$prevwork = sanitize($_POST["ii2"]);
$furthgoals = $_POST["goals"];
/************************************/
$supervisorname = sanitize($_POST["supervisorName"]);
$supervisortitle = sanitize($_POST["supervisorTitle"]);
$address1 = sanitize($_POST["address01"]);
$address2 = sanitize($_POST["address02"]);
$city = sanitize($_POST["cityw"]);
$state = sanitize($_POST["state"]);
$zip = sanitize($_POST["zcode"]);
$supervisorphone = sanitize($_POST["sphone"]);
$supervisorfax = sanitize($_POST["sfax"]);



$query = "insert into StudentInternship(sid, inttitle, Org, dep, startdate, enddate, salary, salarytype, emptype, "
        . "esthrs, addcopt, prevwork, furthgoals, supervisorname, supervisortitle, address1, address2, city, state,"
        . " zip, supervisorphone, supervisorfax) VALUES('".$sid."', '$inttitle', '$org', '$dep', '$startdt', "
        . "'$enddt', '$salary', '$salarytype', '$employmentType', '$esthr', '$addcomp', '$prevwork', '$furthgoals', '$supervisorname', '$supervisortitle', "
        . "'$address1', '$address2', '$city', '$state', '$zip', '$supervisorphone', '$supervisorfax')"; 

mysqli_query($db,$query);
