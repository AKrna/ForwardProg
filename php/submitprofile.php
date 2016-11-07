<?php
require_once './db_connect.php';
require_once './login.php'; /// for sanitize function
?>

<?php
session_start();
$_SESSION["sid"] = 1;
$sid = sanitize($_SESSION["sid"]);
$znum = sanitize($_POST["znum"]);
$fname = sanitize($_POST["fname"]);
$minitial = sanitize($_POST["minitial"]);
$lname = sanitize($_POST["lname"]);
$address1 = sanitize($_POST["address1"]);
$address2 = sanitize($_POST["address2"]);
$city = sanitize($_POST["city"]);
$state = sanitize($_POST["state"]);
$country = sanitize($_POST["country"]);
$phonenum = sanitize($_POST["phonenum"]);
$cellnum  = sanitize($_POST["cellnum"]);
$carrier = sanitize($_POST["carrier"]);
$carrierdom = sanitize($_POST["carrierdom"]);
$email = sanitize($_POST["email"]);
$email2 = sanitize($_POST["email2"]);
$pq1 = sanitize($_POST["pq1"]);
$pq2 = sanitize($_POST["pq2"]);
$pq3 = sanitize($_POST["pq3"]);
$pq4 = $_POST["pq4"];


$mysqlSPI = "INSERT INTO StudentPersonalInformation"
        . "(sid, Znumber, FirstName, MiddleInitial, LastName, Address1, Address2, "
        . "City, State, Country, PhoneNumber, CellNumber, CellCarrier, CellDomain, "
        . "EmailAddress1, EmailAddress2, TextsfromCSO, TextsfromJA, TextsforER, SubscribeToEmail)"
        . "VALUE('$sid', '$znum', '$fname', '$minitial', '$lname', '$address1', '$address2',"
        . " '$city' , '$state', '$country', '$phonenum', '$cellnum', '$carrier', '$carrierdom', "
        . "'$email', '$email2', '$pq1', '$pq2', '$pq3', '$pq4')";
mysqli_query($db,$mysqlSPI);

/********************************/

$cstanding = sanitize($_POST["cstanding"]);
$dq1 = sanitize($_POST["dq1"]);
$gmonth = sanitize($_POST["gmonth"]);
$gyear = sanitize($_POST["gyear"]);
$overallgpa = sanitize($_POST["overallgpa"]);
$majorgpa = sanitize($_POST["majorgpa"]);
$chours = sanitize($_POST["chours"]);
$degree = sanitize($_POST["degree"]);
$major = sanitize($_POST["major"]);
$campus = sanitize($_POST["campus"]);
$achievements = $_POST["achievements"];
$cstatus = sanitize($_POST["cstatus"]);
$vstatus = sanitize($_POST["vstatus"]);
$ethnicity = sanitize($_POST["ethnicity"]);
$gender = sanitize($_POST["gender"]);
$dstatus = sanitize($_POST["dstatus"]);
$vetstatus = sanitize($_POST["vetstatus"]);

$mysqlSD = " INSERT INTO StudentDemographics(sid, ClassStanding, SeekingforCredit, "
        . "GradMonth, GradYear, OverallGPA, MajorGPA, CreditHoursCompleted, Degree, Major, Campus, "
        . "Achievements, CitizenshipStatus, Visastatus, Ethnicity, Gender, DisabledStatus, VeteranStatus)"
        . "VALUE('$sid','$cstanding','$dq1','$gmonth','$gyear','$overallgpa','$majorgpa',"
        . "'$chours','$degree','$major','$campus','$achievements','$cstatus','$vstatus',"
        . "'$ethnicity','$gender','$dstatus','$vetstatus')";
mysqli_query($db,$mysqlSD);
echo '<body> ' . $mysqlSD . '</body>' ;

/******************************/

$cobj = sanitize($_POST["cobj"]);
$ai1 = sanitize($_POST["ai1"]);
$ai2 = sanitize($_POST["ai2"]);

/******************************/

//Foreign Language Skills

/******************************/

//tech experience

/******************************/

//job location

/******************************/

//addtionalskills

/******************************/

//job target



/*submit to 4 separate tables 
 * 1)  personal information
 *      10)Znumber: znum
 *      1a)first name: fname
 *      1b)middle initial: minitial
 *      1c)last name: lname
 *      1d)Address1: address1
 *      1e)Address2: address2
 *      1f)City:city
 *      1g)State: state
 *      1h)country:country
 *      1i)Phone number: phonenum
 *      1j)cell number: cellnum
 *      1k)cell carrier: carrier
 *      1l)cell carrier domain: carrierdom
 *      1m)Email Address1: email
 *      1n)Email Address2: email2
 *      1o)Allow Text Messages From Career Service Offices?: y/n
 *      1p)Allow Text Messages From Job Agents?: y/n
 *      1q)Allow Text Messages For Event Reminders?: y/n
 *      1r)Subscribe To Emails?: y/n
 * 2)  demographics
 *      2a)Class Standing: cstanding
 *      2b)Seeking coop/intership for credit?: y/n
 *      2c) Grad Month: gmonth
 *      2d) Graduation Year: gyear
 *      2f) Overall GPA: overallgpa
 *      2g) Major GPA: majorgpa
 *      2h) Credit Hours Completed: chours
 *      2j) Degree: degree
 *      2k) Major: major
 *      2l) Campus: campus
 *      2m) Achievements: achievements
 *      2n) Citizenship Status: cstatus
 *      2o) Visa status: vstatus
 *      2p) Ethnicity: ethnicitiy
 *      2q) Gender: gender
 *      2r) Disabled Status: dstatus
 *      2s) Veteran Status: vetstatus
 * 3a) foreign language skills
 *      - own table
 *          | Sid | flskills | skill name |
 * 3b) tech experience
 *      - own table
 *          | Sid | techexp | exp name |
 * 3c) job location
 *      - own table
 *          | Sid | jobloc | loc name |
 * 3d) additional skills
 *      - own table 
 *          | Sid | adskill | skill name |
 * 4) additonal information
 *      4a) Carrer Objectives: cobj
 *      4b) Allow Employers To View My Resume/Profile?: y/n
 *      4c) Gradleaders Recruiting Inclusion Opt Out: y/n
 * 5) Job Target
 *      -own table
 *          | Sid | jobtarget | target name |        
 */

?>

