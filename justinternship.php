<?php
session_start();
require_once './php/db_connect.php';



if(isset($_POST["sid"]))
{
    
    $sid =  $_POST["sid"];
    $_SESSION["sid"] =  $sid;
    $selectIntstmt =  "Select * From StudentInternship Where sid= ".$sid;
    $result = mysqli_query($db,$selectIntstmt);
    $inttabid = array();
    $inttabname = array();
    while($row = mysqli_fetch_assoc($result)) {$inttabid[] = $row['iid'];$inttablname[] = $row["inttitle"];}

echo'

<!DOCTYPE html> 
<html>
	<head>
		<title>Student Home Page</title>	
		<link rel="stylesheet" type="text/css" href="./css/prototype.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.multiselect.css">
		<link rel="stylesheet" type="text/css" href="css/prism.css">
		<link rel="stylesheet" type="text/css" href="css/chosen.css">
		<link href="font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
	</head>
	<body>

<div>
				<h1>Reporting an Internship or Job</h1>
                                <ul class="tabs">
                                <li><a href="javascript:void(0)" class="innertabLink" onclick="openInnerPage(event,\'New\')"id="innerdefaultOpen">NEW</a></li>';
foreach($inttabid as $key => $val)
{
    echo    '<li><a href="javascript:void(0)" class="innertabLink" onclick="openInnerPage(event,\''.$val.'\')">'.$inttablname[$key].'</a></li>';
}
echo    '
			</ul>
                        <div id="New" class="innercontent">                                
                        <form action="./php/studentInternship.php" method="post">
                                    <fieldset>
                                        <legend>Information</legend>
                                        <div style="float: left;">
                                        <p><label> Internship Title*: </label><br>
                                            <input type="text" name="internshipTitle"></p>
                                        <p><label>Organization:</label><br>
                                            <input type="text" name="Organizationi"></p>
                                        <p><label> Department*: </label><br>
                                            <input type="text" name="departmenti"></p>
                                        <p><label> Start Date*:</label>
                                            <input type="date" name="startDatei" >
                                            <br>
                                            <label> End Date*: </label>
                                            <input type="date" name="endDatei" >
                                        
                                        </p>
                                        <p><label> Salary*:</label> <br>
                                                <input type="text" name="salaryi"></label>
					</p>
                                        <p>
                                         <label>
                                             Salary Type*:<br>
                                        <select name="salaryType">
                                            <option value="blanki">-------</option>
					    <option value="hourlyi">Hourly</option>
					    <option value="unpaidi">Unpaid</option>
					    <option value="stipendi">Stipend</option>
					    <option value="otheri">Other</option>
                                        </select>
                                         </label>
                                    </p>
                                        </div>
                                        <div style="float: right;">
                                        <dl>
                                    <dt><label> Type Of Employment*:</label></dt>
                                    <dd>
                                        <label><input type="radio" name="ii1" value="in" checked="checked" /> Internship</label> 
                                        <label><input type="radio" name="ii1" value="ft" />Full Time</label>
                                        <label><input type="radio" name="ii1" value="pt" checked="checked" /> Part Time</label> 
                                        <label><input type="radio" name="ii1" value="ct" />Contract <label>
                                    </dd>
                                        </dl>
                                            <p><label> Estimated Hours Per Week*: </label><br>
                                                <input type="text" name="hrsPerWeeki"></p>
                                            <p><label> Additional Compensation*: </label><br/>
						<input type="text" name="additionalCompensationi"></p>
                                            <dl>
                                    <dt><label> Have You Worked Here Previously?*:</label></dt>
                                    <dd>
                                        <label><input type="radio" name="ii2" value="y" checked="checked" /> Yes</label> 
                                        <label><input type="radio" name="ii2" value="n" /> No</label>
                                    </dd>
                                        </dl>
                                             <dl>
                                        <dt><label>How Does This Position Further Your Professional/Career Goals?*:</label></dt>
                                        <dd>
                                            <textarea rows="4" cols="75" name="goals"></textarea>
                                        </dd>
                                        </dl>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Work Information</legend>
                                        <div style="float: left;">
                                            <p><label>Supervisor Name:</label><br>
                                                <input type="text" name="supervisorName"></p>
                                            <p><label>Supervisor Title*:</label><br>
                                                <input type="text" name="supervisorTitle"></p>
                                            <p><label>Address 1*:</label><br>
                                                <input type="text" name="address01"></p>
                                            <p><label>Address 2:</label><br>
                                                <input type="text" name="address02"></p>
                                            <p><label>City*:
                                                    <input type="text" name="cityw"></label>
                                                <label>State*:
                                                    <select name="state"><option value="" >--</option>
                                    <option value="sw1">International</option>        
                                    <option value="sw2">AL</option>
                                    <option value="sw3">AK</option>
                                    <option value="sw4">AZ</option>
                                    <option value="sw5">AR</option>
                                    <option value="sw6">CA</option>
                                    <option value="sw7">CO</option>
                                    <option value="sw8">CT</option>
                                    <option value="sw9">DE</option>
                                    <option value="sw10">FL</option>
                                    <option value="sw11">GA</option>
                                    <option value="sw12">HI</option>
                                    <option value="sw13">ID</option>
                                    <option value="sw14">IL</option>
                                    <option value="sw15">IN</option>
                                    <option value="sw16">IA</option>
                                    <option value="sw17">KS</option>
                                    <option value="sw18">KY</option>
                                    <option value="sw19">LA</option>
                                    <option value="sw20">ME</option>
                                    <option value="sw21">MD</option>
                                    <option value="sw22">MA</option>
                                    <option value="sw23">MI</option>
                                    <option value="sw24">MN</option>
                                    <option value="sw25">MS</option>
                                    <option value="sw26">MO</option>
                                    <option value="sw27">MT</option>
                                    <option value="sw28">NE</option>
                                    <option value="sw29">NV</option>
                                    <option value="sw30">NH</option>
                                    <option value="sw31">NJ</option>
                                    <option value="sw32">NM</option>
                                    <option value="sw33">NY</option>
                                    <option value="sw34">NC</option>
                                    <option value="sw35">ND</option>
                                    <option value="sw36">OH</option>
                                    <option value="sw37">OK</option>
                                    <option value="sw38">OR</option>
                                    <option value="sw39">PA</option>
                                    <option value="sw40">RI</option>
                                    <option value="sw41">SC</option>
                                    <option value="sw42">SD</option>
                                    <option value="sw43">TN</option>
                                    <option value="sw44">TX</option>
                                    <option value="sw45">UT</option>
                                    <option value="sw46">VT</option>
                                    <option value="sw47">VA</option>
                                    <option value="sw48">WA</option>
                                    <option value="sw49">WV</option>
                                    <option value="sw50">WI</option>
                                    <option value="sw51">WY</option>
                                        </select></label>
                                                <label>Zip Code*:
                                                    <input type="text" name="zcode"></label></p>
                                        </div>
                                        <div style="float: left;">
                                            <p><label>Supervisor Email*:</label><br>
                                                <input type="text" name="semail"></p>
                                            <p><label>Supervisor Phone Number*:</label><br>
                                                <input type="text" name="sphone"></p>
                                            <p><label>Fax:</label><br>
                                                <input type="text" name="sfax"></p>
                                        </div>
                                    </fieldset>
                                     
                                    <input type="button" value="Delete" name="delete"/>
                                    <input type="submit" value="Submit" />    
                        </form></div>';

foreach($inttabid as $key => $val)
{
    $selectIntstmt = "Select * From StudentInternship Where iid =".$val;
    $result = mysqli_query($db,$selectIntstmt);
    $row = mysqli_fetch_assoc($result);
    echo '<div id="'.$val.'" class="innercontent"><form action="./php/studentInternship.php" method="post">
                                    <input hidden name="iid" value="'.$val.'">
                                    <fieldset>
                                        <legend>Information</legend>
                                        <div style="float: left;">
                                        <p><label> Internship Title*: </label><br>
                                            <input type="text" name="internshipTitle" value="'.$row["inttitle"].'" ></p>
                                        <p><label>Organization:</label><br>
                                            <input type="text" name="Organizationi" value="'.$row["Org"].'"></p>
                                        <p><label> Department*: </label><br>
                                            <input type="text" name="departmenti" value="'.$row["dep"].'" ></p>
                                        <p><label> Start Date*:</label>
                                            <input type="date" name="startDatei"  value="'.$row["startdate"].'" >
                                            <br>
                                            <label> End Date*: </label>
                                            <input type="date" name="endDatei"  value="'.$row["enddate"].'" >
                                        
                                        </p>
                                        <p><label> Salary*:</label> <br>
                                                <input type="text" name="salaryi"  value="'.$row["salary"].'" ></label>
					</p>
                                        <p>
                                         <label>
                                             Salary Type*:<br>
                                        <select name="salaryType">
                                            <option  '.(($row["salarytype"]== "" )? "selected" :"").' value="blanki">-------</option>
					    <option  '.(($row["salarytype"]== "hourlyi" )? "selected" :"").' value="hourlyi">Hourly</option>
					    <option  '.(($row["salarytype"]== "unpaidi" )? "selected" :"").' value="unpaidi">Unpaid</option>
					    <option  '.(($row["salarytype"]== "stipendi" )? "selected" :"").' value="stipendi">Stipend</option>
					    <option  '.(($row["salarytype"]== "otheri" )? "selected" :"").' value="otheri">Other</option>
                                        </select>
                                         </label>
                                    </p>
                                        </div>
                                        <div style="float: right;">
                                        <dl>
                                    <dt><label> Type Of Employment*:</label></dt>
                                    <dd>
                                        <label><input type="radio" name="ii1" value="in" '.(($row["emptype"]== "in" )? "checked" :"").' > Internship</label> 
                                        <label><input type="radio" name="ii1" value="ft"  '.(($row["emptype"]== "ft" )? "checked" :"").'  >Full Time</label>
                                        <label><input type="radio" name="ii1" value="pt" '.(($row["emptype"]== "pt" )? "checked" :"").' > Part Time</label> 
                                        <label><input type="radio" name="ii1" value="ct"  '.(($row["emptype"]== "ct" )? "checked" :"").' >Contract <label>
                                    </dd>
                                        </dl>
                                            <p><label> Estimated Hours Per Week*: </label><br>
                                                <input type="text" name="hrsPerWeeki" value="'.$row["esthrs"].'" ></p>
                                            <p><label> Additional Compensation*: </label><br/>
						<input type="text" name="additionalCompensationi" value="'.$row["addcopt"].'" ></p>
                                            <dl>
                                    <dt><label> Have You Worked Here Previously?*:</label></dt>
                                    <dd>
                                        <label><input type="radio" name="ii2" value="y"  '.(($row["prevwork"]== "y" )? "checked" :"").' > Yes</label> 
                                        <label><input type="radio" name="ii2" value="n"  '.(($row["prevwork"]== "n" )? "checked" :"").' > No</label>
                                    </dd>
                                        </dl>
                                             <dl>
                                        <dt><label>How Does This Position Further Your Professional/Career Goals?*:</label></dt>
                                        <dd>
                                            <textarea rows="4" cols="75" name="goals" >'.$row["furthgoals"].'</textarea>
                                        </dd>
                                        </dl>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Work Information</legend>
                                        <div style="float: left;">
                                            <p><label>Supervisor Name:</label><br>
                                                <input type="text" name="supervisorName"  value="'.$row["supervisorname"].'" ></p>
                                            <p><label>Supervisor Title*:</label><br>
                                                <input type="text" name="supervisorTitle" value="'.$row["supervisortitle"].'" ></p>
                                            <p><label>Address 1*:</label><br>
                                                <input type="text" name="address01"  value="'.$row["address1"].'" ></p>
                                            <p><label>Address 2:</label><br>
                                                <input type="text" name="address02"  value="'.$row["address2"].'" ></p>
                                            <p><label>City*:
                                                    <input type="text" name="cityw"  value="'.$row["city"].'" ></label>
                                                <label>State*:
                                                    <select name="state"><option value="s0" >--</option>
                                    <option  '.(($row["state"]== "sw1" )? "selected" :"").' value="sw1">International</option>        
                                    <option  '.(($row["state"]== "sw2" )? "selected" :"").' value="sw2">AL</option>
                                    <option  '.(($row["state"]== "sw3" )? "selected" :"").' value="sw3">AK</option>
                                    <option  '.(($row["state"]== "sw4" )? "selected" :"").' value="sw4">AZ</option>
                                    <option  '.(($row["state"]== "sw5" )? "selected" :"").' value="sw5">AR</option>
                                    <option  '.(($row["state"]== "sw6" )? "selected" :"").' value="sw6">CA</option>
                                    <option  '.(($row["state"]== "sw7" )? "selected" :"").' value="sw7">CO</option>
                                    <option  '.(($row["state"]== "sw8" )? "selected" :"").' value="sw8">CT</option>
                                    <option  '.(($row["state"]== "sw9" )? "selected" :"").' value="sw9">DE</option>
                                    <option  '.(($row["state"]== "sw10" )? "selected" :"").' value="sw10">FL</option>
                                    <option  '.(($row["state"]== "sw11" )? "selected" :"").' value="sw11">GA</option>
                                    <option  '.(($row["state"]== "sw12" )? "selected" :"").' value="sw12">HI</option>
                                    <option  '.(($row["state"]== "sw13" )? "selected" :"").' value="sw13">ID</option>
                                    <option  '.(($row["state"]== "sw14" )? "selected" :"").' value="sw14">IL</option>
                                    <option  '.(($row["state"]== "sw15" )? "selected" :"").' value="sw15">IN</option>
                                    <option  '.(($row["state"]== "sw16" )? "selected" :"").' value="sw16">IA</option>
                                    <option  '.(($row["state"]== "sw17" )? "selected" :"").' value="sw17">KS</option>
                                    <option  '.(($row["state"]== "sw18" )? "selected" :"").' value="sw18">KY</option>
                                    <option  '.(($row["state"]== "sw19" )? "selected" :"").' value="sw19">LA</option>
                                    <option  '.(($row["state"]== "sw20" )? "selected" :"").' value="sw20">ME</option>
                                    <option  '.(($row["state"]== "sw21" )? "selected" :"").' value="sw21">MD</option>
                                    <option  '.(($row["state"]== "sw22" )? "selected" :"").' value="sw22">MA</option>
                                    <option  '.(($row["state"]== "sw23" )? "selected" :"").' value="sw23">MI</option>
                                    <option  '.(($row["state"]== "sw24" )? "selected" :"").' value="sw24">MN</option>
                                    <option  '.(($row["state"]== "sw25" )? "selected" :"").' value="sw25">MS</option>
                                    <option  '.(($row["state"]== "sw26" )? "selected" :"").' value="sw26">MO</option>
                                    <option  '.(($row["state"]== "sw27" )? "selected" :"").' value="sw27">MT</option>
                                    <option  '.(($row["state"]== "sw28" )? "selected" :"").' value="sw28">NE</option>
                                    <option  '.(($row["state"]== "sw29" )? "selected" :"").' value="sw29">NV</option>
                                    <option  '.(($row["state"]== "sw30" )? "selected" :"").' value="sw30">NH</option>
                                    <option  '.(($row["state"]== "sw31" )? "selected" :"").' value="sw31">NJ</option>
                                    <option  '.(($row["state"]== "sw32" )? "selected" :"").' value="sw32">NM</option>
                                    <option  '.(($row["state"]== "sw33" )? "selected" :"").' value="sw33">NY</option>
                                    <option  '.(($row["state"]== "sw34" )? "selected" :"").' value="sw34">NC</option>
                                    <option  '.(($row["state"]== "sw35" )? "selected" :"").' value="sw35">ND</option>
                                    <option  '.(($row["state"]== "sw36" )? "selected" :"").' value="sw36">OH</option>
                                    <option  '.(($row["state"]== "sw37" )? "selected" :"").' value="sw37">OK</option>
                                    <option  '.(($row["state"]== "sw38" )? "selected" :"").' value="sw38">OR</option>
                                    <option  '.(($row["state"]== "sw39" )? "selected" :"").' value="sw39">PA</option>
                                    <option  '.(($row["state"]== "sw40" )? "selected" :"").' value="sw40">RI</option>
                                    <option  '.(($row["state"]== "sw41" )? "selected" :"").' value="sw41">SC</option>
                                    <option  '.(($row["state"]== "sw42" )? "selected" :"").' value="sw42">SD</option>
                                    <option  '.(($row["state"]== "sw43" )? "selected" :"").' value="sw43">TN</option>
                                    <option  '.(($row["state"]== "sw44" )? "selected" :"").' value="sw44">TX</option>
                                    <option  '.(($row["state"]== "sw45" )? "selected" :"").' value="sw45">UT</option>
                                    <option  '.(($row["state"]== "sw46" )? "selected" :"").' value="sw46">VT</option>
                                    <option  '.(($row["state"]== "sw47" )? "selected" :"").' value="sw47">VA</option>
                                    <option  '.(($row["state"]== "sw48" )? "selected" :"").' value="sw48">WA</option>
                                    <option  '.(($row["state"]== "sw49" )? "selected" :"").' value="sw49">WV</option>
                                    <option  '.(($row["state"]== "sw50" )? "selected" :"").' value="sw50">WI</option>
                                    <option  '.(($row["state"]== "sw51" )? "selected" :"").' value="sw51">WY</option>
                                        </select></label>
                                                <label>Zip Code*:
                                                    <input type="text" name="zcode"  value="'.$row["zip"].'" ></label></p>
                                        </div>
                                        <div style="float: left;">
                                            <p><label>Supervisor Email*:</label><br>
                                                <input type="text" name="semail" value="'.$row["supervisoremail"].'" ></p>
                                            <p><label>Supervisor Phone Number*:</label><br>
                                                <input type="text" name="sphone" value="'.$row["supervisorphone"].'" ></p>
                                            <p><label>Fax:</label><br>
                                                <input type="text" name="sfax" value="'.$row["supervisorfax"].'" ></p>
                                        </div>
                                    </fieldset>
                                     
                                    <input type="submit" value="Delete" name="button">
                                    <input type="submit" value="Submit" name=""button">    
                        </form>
        


</div>';
}
                  
echo'  </div>	
 
		</div>
		
	<script type="text/javascript" src="./js/jquery-1.11.2.js"></script>
	<script type="text/javascript" src="./js/prototype.js"></script>
	<script type="text/javascript" src="./js/jquery.multiselect.js"></script>
	<script type="text/javascript" src="./js/jquery-ui.js"></script>
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
	<script src="./js/chosen.jquery.js" type="text/javascript"></script>
	<script src="./js/prism.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
    

';
}
else 
{
    echo '<a href=login.html>Please Login</a>';    
}
