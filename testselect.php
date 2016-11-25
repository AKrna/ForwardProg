<?php
require_once './php/arraystore.php';
require_once './php/db_connect.php';

$sid = 6;
$selectFLstmt =  "Select * From StudentFLSkills Where sid = ".$sid;
$result = mysqli_query($db,$selectFLstmt);
$FLvalues = array();
while($row = mysqli_fetch_assoc($result)) 
{$FLvalues[] = $row['flskill'];}

echo '<select multiple name=FLskills[]>';

$i = 0;
foreach ($flskills as $key => $nameval) 
{
    $i++;
    echo '<option value="fs'.$i.'"';
    foreach ($FLvalues as $key => $val) 
    {
        if("fs".$i == $val)
        {
            echo ' selected ';
        }
    }
    echo '>'.$nameval.'</option>';
}



?>