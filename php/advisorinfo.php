<?php
session_start();
require_once './php/db_connect.php';

$sql = "Select * from AdvisorContact";
$result = mysqli_fetch_assoc($db, $query);

while($row = msqli_fetch_assoc($result)){
	echo	'<fieldset>
				<label>Name: '.$row["name"].'</label>
				<label>Email: '.$row["email"].'</label
				<label>Office Hours: '.$row["offhrs"].'</label>
				<label>Office Location: '.$row["offloc"].'</label>
			</feildset>';
}

mysqli_close($db);
?>