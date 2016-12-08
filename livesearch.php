<?php
require_once './php/db_connect.php';

$name = ucfirst($_REQUEST["q"]);

$nameMatchQuery = "SELECT * FROM StudentPersonalInformation WHERE LastName REGEXP '^".$name."'";
$result = mysqli_query($db,$nameMatchQuery);

$hint ="";

while($row = mysqli_fetch_assoc($result))
{
 $hint = $hint . '<fieldset>
            <form method="POST" action="justprofile.php" target="blank" style="float: right">
                <input  hidden name="sid" value="'.$row["sid"].'">
                <input type="submit" name="view_profile" value="View Profile">
            </form>
            <label> <span style="font-weight: bold">Last name:</span> '.$row['LastName']. '</label>
            <label><span style="font-weight: bold">First Name:</span> '.$row['FirstName']. '</label>
            <br/>
            <form method="POST" action="justinternship.php" target="blank" style="float: right">
                <input hidden name="sid" value="'.$row["sid"].'">
                <input type="submit" name="view_internships" value="View Internships/Jobs">
            </form>
            <label><span style="font-weight: bold">Z Number:</span> '.$row['Znumber'].'</label>
            <label><span style="font-weight: bold">Email Address:</span> '.$row['EmailAddress1'].'</label>
            </fieldset>';
    
}

$nameMatchQuery = "SELECT * FROM StudentDummy WHERE lname REGEXP '^".$name."'";
$result = mysqli_query($db,$nameMatchQuery);

while($row = mysqli_fetch_assoc($result))
{
 $hint = $hint . '<fieldset>
            <form method="POST" action="stprofile.php" style="float: right">
                <p hidden name="'.$row["sid"].'"></p>
                <input type="submit" name="view_profile" value="View Profile">
            </form>
            <label> <span style="font-weight: bold">Last name:</span> '.$row['lname']. '</label>
            <label><span style="font-weight: bold">First Name:</span> '.$row['fname']. '</label>
            <br/>
            <form method="POST" action="stinternship.php" style="float: right">
                <p hidden name="STDENT ID FROM DB"></p>
                <input type="submit" name="view_internships" value="View Internships/Jobs">
            </form>
            <label><span style="font-weight: bold">Z Number:</span> '.$row['znum'].'</label>
            </fieldset>';
    
}

echo $hint === "" ? "no matching last names" : $hint;    




/*
$xmlDoc=new DOMDocument();
$xmlDoc->load("links.xml");
$x=$xmlDoc->getElementsByTagName('link');
//get the q parameter from URL
$q=$_GET["q"];
//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('title');
    $z=$x->item($i)->getElementsByTagName('url');
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint="<a href='" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } else {
          $hint=$hint . "<br /><a href='" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}
// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}
//output the response
echo $response;
?>
 *
 */