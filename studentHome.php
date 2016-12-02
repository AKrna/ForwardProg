<?php
session_start();
require_once './php/db_connect.php';
require_once './php/arraystore.php';
if(isset($_SESSION["sid"]))
{
    $sid = $_SESSION["sid"];
    $selectPIstmt = "Select * From StudentPersonalInformation Where sid = ".$sid;
    $selectDstmt =  "Select * From StudentDemographics Where sid = ".$sid;
    $selectFLstmt =  "Select * From StudentFLSkills Where sid = ".$sid;
    $selectJLstmt =  "Select * From StudentJobLocation Where sid = ".$sid;
    $selectTEstmt =  "Select * From StudentTechExperience Where sid = ".$sid;
    $selectASstmt =  "Select * From StudentAdditionalSkills Where sid = ".$sid;
    $selectAIstmt =  "Select * From StudentAdditionaInfo Where sid = ".$sid;
    $selectJTstmt =  "Select * From StudentJobTarget Where sid = ".$sid;
    $result = mysqli_query($db,$selectPIstmt);
    $PIarr = mysqli_fetch_assoc($result);
    $result = mysqli_query($db,$selectDstmt);
    $Darr = mysqli_fetch_assoc($result);
    $result = mysqli_query($db,$selectAIstmt);
    $AIarr = mysqli_fetch_assoc($result);
    $result = mysqli_query($db,$selectFLstmt);
    $FLvalues = array();
    while($row = mysqli_fetch_assoc($result)) {$FLvalues[] = $row['flskill'];}
    $result = mysqli_query($db,$selectJLstmt);
    $JLvalues = array();
    while($row = mysqli_fetch_assoc($result)) {$JLvalues[] = $row['jlid'];}
    $result = mysqli_query($db,$selectTEstmt);
    $TEvalues = array();
    while($row = mysqli_fetch_assoc($result)) {$TEvalues[] = $row['techid'];}
    $result = mysqli_query($db,$selectASstmt);
    $ASvalues = array();
    while($row = mysqli_fetch_assoc($result)) {$ASvalues[] = $row['asid'];}
    $result = mysqli_query($db,$selectJTstmt);
    $JTvalues = array();
    while($row = mysqli_fetch_assoc($result)) {$JTvalues[] = $row['jtid'];}
    
    
    echo '
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
		<div class="sidebar">
			<a class="button btn-block" href="#">View Advisors</a>
			<a class="button btn-block" href="./php/logout.php">Log Out</a>
		</div>
		<div class="container">
			<ul class="tabs">
				<li><a href="javascript:void(0)" class="tabLink" onclick="openPage(event,\'EditInformation\')" id="defaultOpen">Student Profile</a></li>
				<li><a href="javascript:void(0)" class="tabLink" onclick="openPage(event,\'ReportInternship\')">View/Report Internship/Job</a></li>
		
			</ul>
		
			
			<div id="EditInformation" class="content">
				<h2>Welcome to your Account Information</h2>
				<p>This section allows you to make sure we have your information correct! Please make sure the following data is concurrent.</p>
				<center><h2>Student Profile</h2></center>
                        <form action="php/submitprofile.php" method="post">
                            <fieldset>
                                <legend>Personal Information</legend>
                                <fieldset>
                                <div style="float:left;">
                                    <p>
                                    <label>
                                        First Name *:
                                        <input type="text" name="fname" value="'.$PIarr["FirstName"].'" required>
                                    </label>
                                    <label>
                                        Middle Initial:
                                        <input type="text" name="minitial" value ="'.$PIarr["MiddleInitial"].'">
                                    </label>
                                    <label>
                                        Last Name *:
                                        <input type="text" name="lname" value="'.$PIarr["LastName"].'" required>
                                    </label>
                                    </p>
                                    <p>
                                    <label>
                                       Address 1 *:  
                                        <input type="text" name="address1" value="'.$PIarr["Address1"].'" required>
                                    </label>
                                    <label>
                                       Address 2 (optional): 
                                        <input type="text" name="address2" value="'.$PIarr["Address2"].'">
                                    </label>
                                    </p>
                                    <p>
                                    <label>
                                        City *:
                                        <input type="text" name="city" value="'.$PIarr["City"].'" required>
                                    </label>
                                    <label>
                                        State *:
                                        <select name="state" required class="chosen-select2"><option value="" >--</option>
                                    <option '.(($PIarr["State"]== "s1" )? "selected" :"").' value="s1">International</option>        
                                    <option '.(($PIarr["State"]== "s2" )? "selected" :"").' value="s2">AL</option>
                                    <option '.(($PIarr["State"]== "s3" )? "selected" :"").' value="s3">AK</option>
                                    <option '.(($PIarr["State"]== "s4" )? "selected" :"").' value="s4">AZ</option>
                                    <option '.(($PIarr["State"]== "s5" )? "selected" :"").' value="s5">AR</option>
                                    <option '.(($PIarr["State"]== "s6" )? "selected" :"").' value="s6">CA</option>
                                    <option '.(($PIarr["State"]== "s7" )? "selected" :"").' value="s7">CO</option>
                                    <option '.(($PIarr["State"]== "s8" )? "selected" :"").' value="s8">CT</option>
                                    <option '.(($PIarr["State"]== "s9" )? "selected" :"").' value="s9">DE</option>
                                    <option '.(($PIarr["State"]== "s10" )? "selected" :"").' value="s10">FL</option>
                                    <option '.(($PIarr["State"]== "s11" )? "selected" :"").' value="s11">GA</option>
                                    <option '.(($PIarr["State"]== "s12" )? "selected" :"").' value="s12">HI</option>
                                    <option '.(($PIarr["State"]== "s13" )? "selected" :"").' value="s13">ID</option>
                                    <option '.(($PIarr["State"]== "s14" )? "selected" :"").' value="s14">IL</option>
                                    <option '.(($PIarr["State"]== "s15" )? "selected" :"").' value="s15">IN</option>
                                    <option '.(($PIarr["State"]== "s16" )? "selected" :"").' value="s16">IA</option>
                                    <option '.(($PIarr["State"]== "s17" )? "selected" :"").' value="s17">KS</option>
                                    <option '.(($PIarr["State"]== "s18" )? "selected" :"").' value="s18">KY</option>
                                    <option '.(($PIarr["State"]== "s19" )? "selected" :"").' value="s19">LA</option>
                                    <option '.(($PIarr["State"]== "s20" )? "selected" :"").' value="s20">ME</option>
                                    <option '.(($PIarr["State"]== "s21" )? "selected" :"").' value="s21">MD</option>
                                    <option '.(($PIarr["State"]== "s22" )? "selected" :"").' value="s22">MA</option>
                                    <option '.(($PIarr["State"]== "s23" )? "selected" :"").' value="s23">MI</option>
                                    <option '.(($PIarr["State"]== "s24" )? "selected" :"").' value="s24">MN</option>
                                    <option '.(($PIarr["State"]== "s25" )? "selected" :"").' value="s25">MS</option>
                                    <option '.(($PIarr["State"]== "s26" )? "selected" :"").' value="s26">MO</option>
                                    <option '.(($PIarr["State"]== "s27" )? "selected" :"").' value="s27">MT</option>
                                    <option '.(($PIarr["State"]== "s28" )? "selected" :"").' value="s28">NE</option>
                                    <option '.(($PIarr["State"]== "s29" )? "selected" :"").' value="s29">NV</option>
                                    <option '.(($PIarr["State"]== "s30" )? "selected" :"").' value="s30">NH</option>
                                    <option '.(($PIarr["State"]== "s31" )? "selected" :"").' value="s31">NJ</option>
                                    <option '.(($PIarr["State"]== "s32" )? "selected" :"").' value="s32">NM</option>
                                    <option '.(($PIarr["State"]== "s33" )? "selected" :"").' value="s33">NY</option>
                                    <option '.(($PIarr["State"]== "s34" )? "selected" :"").' value="s34">NC</option>
                                    <option '.(($PIarr["State"]== "s35" )? "selected" :"").' value="s35">ND</option>
                                    <option '.(($PIarr["State"]== "s36" )? "selected" :"").' value="s36">OH</option>
                                    <option '.(($PIarr["State"]== "s37" )? "selected" :"").' value="s37">OK</option>
                                    <option '.(($PIarr["State"]== "s38" )? "selected" :"").' value="s38">OR</option>
                                    <option '.(($PIarr["State"]== "s39" )? "selected" :"").' value="s39">PA</option>
                                    <option '.(($PIarr["State"]== "s40" )? "selected" :"").' value="s40">RI</option>
                                    <option '.(($PIarr["State"]== "s41" )? "selected" :"").' value="s41">SC</option>
                                    <option '.(($PIarr["State"]== "s42" )? "selected" :"").' value="s42">SD</option>
                                    <option '.(($PIarr["State"]== "s43" )? "selected" :"").' value="s43">TN</option>
                                    <option '.(($PIarr["State"]== "s44" )? "selected" :"").' value="s44">TX</option>
                                    <option '.(($PIarr["State"]== "s45" )? "selected" :"").' value="s45">UT</option>
                                    <option '.(($PIarr["State"]== "s46" )? "selected" :"").' value="s46">VT</option>
                                    <option '.(($PIarr["State"]== "s47" )? "selected" :"").' value="s47">VA</option>
                                    <option '.(($PIarr["State"]== "s48" )? "selected" :"").' value="s48">WA</option>
                                    <option '.(($PIarr["State"]== "s49" )? "selected" :"").' value="s49">WV</option>
                                    <option '.(($PIarr["State"]== "s50" )? "selected" :"").' value="s50">WI</option>
                                    <option '.(($PIarr["State"]== "s51" )? "selected" :"").' value="s51">WY</option>
                                        </select>
                                    </label>
                                    <label>
                                        Country:
                                        <input type="text" name="country" value="'.$PIarr["Country"].'" >
                                    </label>
                                    </p>
                                </div>
                                <div style="float:left;">
                                <p>
                                    <label>
                                        Phone Number *:<input type="text" name="phonenum" value="'.$PIarr["PhoneNumber"].'" required>
                                    </label>
                                    <label>
                                        Cell Number:
                                        <input type="text" name="cellnum" value="'.$PIarr["CellNumber"].'" >
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        Cell Carrier:
                                        <input type="text" name="carrier" value="'.$PIarr["CellCarrier"].'" >
                                    </label>
                                    <label>
                                        Cell Carrier Domain:
                                        <input type="text" name="carrierdom" value="'.$PIarr["CellDomain"].'" >
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        Email Address 1 *: 
                                        <input type="text" name="email" value="'.$PIarr["EmailAddress1"].'" required >
                                    </label>
                                <label>
                                    Email Address 2 (optional): 
                                    <input type="text" name="email2" value="'.$PIarr["EmailAddress2"].'" >
                                </label>
                                </p>
                                </div>
                                </fieldset>
                                <dl>
                                    <dt><label>Allow Text Messages From Career Service Offices?</label></dt>
                                    <dd>
                                        <label><input type="radio" name="pq1" value="y" '.(($PIarr["TextsfromCSO"]== "y" )? "checked" :"").'> Yes</label> 
                                        <label><input type="radio" name="pq1" value="n" '.(($PIarr["TextsfromCSO"]== "n" )? "checked" :"").'> No</label>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt><label>Allow Text Messages From Job Agents?</label></dt>
                                    <dd>
                                        <label><input type="radio" name="pq2" value="y" '.(($PIarr["TextsfromJA"]== "y" )? "checked" :"").'> Yes</label> 
                                        <label><input type="radio" name="pq2" value="n" '.(($PIarr["TextsfromJA"]== "n" )? "checked" :"").'> No</label>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt><label>Allow Text Messages For Event Reminders?</label></dt>
                                    <dd>
                                        <label><input type="radio" name="pq3" value="y" '.(($PIarr["TextsforER"]== "y" )? "checked" :"").'> Yes</label> 
                                        <label><input type="radio" name="pq3" value="n" '.(($PIarr["TextsforER"]== "n" )? "checked" :"").'> No</label>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt><label>Subscribe To Emails? *</label></dt>
                                    <dd>
                                        <label><input type="radio" name="pq4" value="y" '.(($PIarr["SubscribeToEmail"]== "y" )? "checked" :"").'> Yes</label> 
                                        <label><input type="radio" name="pq4" value="n" '.(($PIarr["SubscribeToEmail"]== "n" )? "checked" :"").'> No</label>
                                    </dd>
                                </dl>
                            </fieldset>
                            
                            <fieldset>
                                <legend>Demographic Information</legend>
                                <div style="float:left;">
                                <label>
                                        Class Standing:
                                        <input type="text" name="cstanding" value="'.$Darr["ClassStanding"].'" >
                                </label>
                                <dl>
                                    <dt><label>Seeking Coop/Internship For Credit?</label></dt>
                                    <dd>
                                        <label><input type="radio" name="dq1" value="y"  '.(($Darr["SeekingforCredit"]== "y" )? "checked" :"").' > Yes</label> 
                                        <label><input type="radio" name="dq1" value="n"  '.(($Darr["SeekingforCredit"]== "n" )? "checked" :"").' > No</label>
                                    </dd>
                                </dl>
                                <label>
                                        Graduation Month *:
                                        <select name="gmonth" required class="chosen-select2"><option value="" >---</option>
                                    <option '.(($Darr["GradMonth"]== "gm1" )? "selected" :"").' value="gm1">MAY</option>
                                    <option '.(($Darr["GradMonth"]== "gm2" )? "selected" :"").' value="gm2">AUG</option>
                                    <option '.(($Darr["GradMonth"]== "gm3" )? "selected" :"").' value="gm3">DEC</option>
                                        </select>
                                </label>
                                /
                                <label>
                                    Graduation Year *:
                                        <select name="gyear" class="chosen-select2" required><option value="" >----</option>
                                    <option '.(($Darr["GradYear"]== "gy1" )? "selected" :"").' value="gy1">1970</option>
                                    <option '.(($Darr["GradYear"]== "gy2" )? "selected" :"").' value="gy2">1971</option>
                                    <option '.(($Darr["GradYear"]== "gy3" )? "selected" :"").' value="gy3">1972</option>
                                    <option '.(($Darr["GradYear"]== "gy4" )? "selected" :"").' value="gy4">1972</option>
                                    <option '.(($Darr["GradYear"]== "gy5" )? "selected" :"").' value="gy5">1973</option>
                                    <option '.(($Darr["GradYear"]== "gy6" )? "selected" :"").' value="gy6">1974</option>
                                    <option '.(($Darr["GradYear"]== "gy7" )? "selected" :"").' value="gy7">1975</option>
                                    <option '.(($Darr["GradYear"]== "gy8" )? "selected" :"").' value="gy8">1976</option>
                                    <option '.(($Darr["GradYear"]== "gy9" )? "selected" :"").' value="gy9">1977</option>
                                    <option '.(($Darr["GradYear"]== "gy10" )? "selected" :"").' value="gy10">1978</option>
                                    <option '.(($Darr["GradYear"]== "gy11" )? "selected" :"").' value="gy11">1979</option>
                                    <option '.(($Darr["GradYear"]== "gy12" )? "selected" :"").' value="gy12">1980</option>
                                    <option '.(($Darr["GradYear"]== "gy13" )? "selected" :"").' value="gy13">1981</option>
                                    <option '.(($Darr["GradYear"]== "gy14" )? "selected" :"").' value="gy14">1982</option>
                                    <option '.(($Darr["GradYear"]== "gy15" )? "selected" :"").' value="gy15">1983</option>
                                    <option '.(($Darr["GradYear"]== "gy16" )? "selected" :"").' value="gy16">1984</option>
                                    <option '.(($Darr["GradYear"]== "gy17" )? "selected" :"").' value="gy17">1985</option>
                                    <option '.(($Darr["GradYear"]== "gy18" )? "selected" :"").' value="gy18">1986</option>
                                    <option '.(($Darr["GradYear"]== "gy19" )? "selected" :"").' value="gy19">1987</option>
                                    <option '.(($Darr["GradYear"]== "gy20" )? "selected" :"").' value="gy20">1988</option>
                                    <option '.(($Darr["GradYear"]== "gy21" )? "selected" :"").' value="gy21">1989</option>
                                    <option '.(($Darr["GradYear"]== "gy22" )? "selected" :"").' value="gy22">1990</option>
                                    <option '.(($Darr["GradYear"]== "gy23" )? "selected" :"").' value="gy23">1991</option>
                                    <option '.(($Darr["GradYear"]== "gy24" )? "selected" :"").' value="gy24">1992</option>
                                    <option '.(($Darr["GradYear"]== "gy25" )? "selected" :"").' value="gy25">1993</option>
                                    <option '.(($Darr["GradYear"]== "gy26" )? "selected" :"").' value="gy26">1994</option>
                                    <option '.(($Darr["GradYear"]== "gy27" )? "selected" :"").' value="gy27">1995</option>
                                    <option '.(($Darr["GradYear"]== "gy28" )? "selected" :"").' value="gy28">1996</option>
                                    <option '.(($Darr["GradYear"]== "gy29" )? "selected" :"").' value="gy29">1997</option>
                                    <option '.(($Darr["GradYear"]== "gy30" )? "selected" :"").' value="gy30">1998</option>
                                    <option '.(($Darr["GradYear"]== "gy31" )? "selected" :"").' value="gy31">1999</option>
                                    <option '.(($Darr["GradYear"]== "gy32" )? "selected" :"").' value="gy32">2000</option>
                                    <option '.(($Darr["GradYear"]== "gy33" )? "selected" :"").' value="gy33">2001</option>
                                    <option '.(($Darr["GradYear"]== "gy34" )? "selected" :"").' value="gy34">2002</option>
                                    <option '.(($Darr["GradYear"]== "gy35" )? "selected" :"").' value="gy35">2003</option>
                                    <option '.(($Darr["GradYear"]== "gy36" )? "selected" :"").' value="gy36">2004</option>
                                    <option '.(($Darr["GradYear"]== "gy37" )? "selected" :"").' value="gy37">2005</option>
                                    <option '.(($Darr["GradYear"]== "gy38" )? "selected" :"").' value="gy38">2006</option>
                                    <option '.(($Darr["GradYear"]== "gy39" )? "selected" :"").' value="gy39">2007</option>
                                    <option '.(($Darr["GradYear"]== "gy40" )? "selected" :"").' value="gy40">2008</option>
                                    <option '.(($Darr["GradYear"]== "gy41" )? "selected" :"").' value="gy41">2009</option>
                                    <option '.(($Darr["GradYear"]== "gy42" )? "selected" :"").' value="gy42">2010</option>
                                    <option '.(($Darr["GradYear"]== "gy43" )? "selected" :"").' value="gy43">2011</option>
                                    <option '.(($Darr["GradYear"]== "gy44" )? "selected" :"").' value="gy44">2012</option>
                                    <option '.(($Darr["GradYear"]== "gy45" )? "selected" :"").' value="gy45">2013</option>
                                    <option '.(($Darr["GradYear"]== "gy46" )? "selected" :"").' value="gy46">2014</option>
                                    <option '.(($Darr["GradYear"]== "gy47" )? "selected" :"").' value="gy47">2015</option>
                                    <option '.(($Darr["GradYear"]== "gy48" )? "selected" :"").' value="gy48">2016</option>
                                    <option '.(($Darr["GradYear"]== "gy49" )? "selected" :"").' value="gy49">2017</option>
                                    <option '.(($Darr["GradYear"]== "gy50" )? "selected" :"").' value="gy50">2018</option>
                                    <option '.(($Darr["GradYear"]== "gy51" )? "selected" :"").' value="gy51">2019</option>
                                    <option '.(($Darr["GradYear"]== "gy52" )? "selected" :"").' value="gy52">2020</option>
                                        </select>
                                </label>
                                <p>
                                <label>
                                        Overall GPA *:
                                        <input type="text" name="overallgpa" value="'.$Darr["OverallGPA"].'" required>
                                </label>
                                <label>
                                        Major GPA *:
                                        <input type="text" name="majorgpa" value="'.$Darr["MajorGPA"].'" required>
                                </label>
                                </p>
                                <p>
                                <label>
                                        Credit Hours Completed:
                                        <input type="text" name="chours" value="'.$Darr["CreditHoursCompleted"].'">
                                </label>
                                </p>
                                
                                <p>
                                    <label>
                                    Degree *:
                                        <select name="degree" required class="chosen-select2"><option value="" >---------</option>
                                    <option '.(($Darr["Degree"]== "d1" )? "selected" :"").' value="d1">Bachalors Degree</option>
                                    <option '.(($Darr["Degree"]== "d2" )? "selected" :"").' value="d2">Non Degree</option>
                                    <option '.(($Darr["Degree"]== "d3" )? "selected" :"").' value="d3">Masters Degree</option>
                                    <option '.(($Darr["Degree"]== "d4" )? "selected" :"").' value="d4">Doctorate</option>
                                        </select>
                                </label>
                                    <label>
                                        Major:
                                        <input type="text" name="major" value="'.$Darr["Major"].'">
                                    </label>
                                </p>
                                <p>
                                     <label>
                                    Campus:
                                        <select name="campus" required class="chosen-select2"><option value="" >---------</option>
                                    <option '.(($Darr["Campus"]== "c1" )? "selected" :"").' value="c1">Boca Raton Campus</option>
                                    <option '.(($Darr["Campus"]== "c2" )? "selected" :"").' value="c2">Davie Campus</option>
                                    <option '.(($Darr["Campus"]== "c3" )? "selected" :"").' value="c3">Fort Lauderdale-Downtown Campus</option>
                                    <option '.(($Darr["Campus"]== "c4" )? "selected" :"").' value="c4">John D. MacArthur Campus</option>
                                    <option '.(($Darr["Campus"]== "c5" )? "selected" :"").' value="c5">Sea Tech Campus</option>
                                        </select>
                                </label>
                                </p>
                                </div>
                                <div style="float:right;">
                                    <p>
                                        <dl>
                                        <dt><label>Achievements:</label></dt>
                                        <dd>
                                            <textarea rows="4" cols="75" name="achievements" >'.$Darr["Achievements"].'</textarea>
                                        </dd>
                                        </dl>
                                    </p>
                                    <p>
                                        <label>
                                    Citizenship Status *:
                                        <select name="cstatus" required class="chosen-select2"><option value="" >---------</option>
                                    <option '.(($Darr["CitizenshipStatus"]== "cs1" )? "selected" :"").' value="cs1">*N/A</option>
                                    <option '.(($Darr["CitizenshipStatus"]== "cs2" )? "selected" :"").' value="cs2">Other</option>
                                    <option '.(($Darr["CitizenshipStatus"]== "cs3" )? "selected" :"").' value="cs3">U.S. Citizen</option>
                                    <option '.(($Darr["CitizenshipStatus"]== "cs4" )? "selected" :"").' value="cs4">Permanent Resident</option>
                                    <option '.(($Darr["CitizenshipStatus"]== "cs5" )? "selected" :"").' value="cs5">Non US - Not Qualified to Work</option>
                                    <option '.(($Darr["CitizenshipStatus"]== "cs6" )? "selected" :"").' value="cs6">Non US - Qualified to Work</option>
                                        </select>
                                        </label>
                                        <label>
                                    Visa Status:
                                        <select name="vstatus" required class="chosen-select2"><option value="" >---------</option>
                                    <option '.(($Darr["Visastatus"]== "vs1" )? "selected" :"").' value="vs1">Other</option>
                                    <option '.(($Darr["Visastatus"]== "vs2" )? "selected" :"").' value="vs2">*N/A</option>
                                    <option '.(($Darr["Visastatus"]== "vs3" )? "selected" :"").' value="vs3">Canadian Work Authorization</option>
                                    <option '.(($Darr["Visastatus"]== "vs4" )? "selected" :"").' value="vs4">Employment (H-1) Visa</option>
                                    <option '.(($Darr["Visastatus"]== "vs5" )? "selected" :"").' value="vs5">F-2 Visa</option>
                                    <option '.(($Darr["Visastatus"]== "vs6" )? "selected" :"").' value="vs6">H-2 Visa</option>
                                    <option '.(($Darr["Visastatus"]== "vs7" )? "selected" :"").' value="vs7">H-4 Visa</option>
                                    <option '.(($Darr["Visastatus"]== "vs8" )? "selected" :"").' value="vs8">J-1 Visa (Exchange Program)</option>
                                    <option '.(($Darr["Visastatus"]== "vs9" )? "selected" :"").' value="vs9">J-2 Visa</option>
                                    <option '.(($Darr["Visastatus"]== "vs10" )? "selected" :"").' value="vs10">L-1 Visa</option>
                                    <option '.(($Darr["Visastatus"]== "vs11" )? "selected" :"").' value="vs11">L-2 Visa</option>
                                    <option '.(($Darr["Visastatus"]== "vs12" )? "selected" :"").' value="vs12">H-2 Visa</option>
                                    <option '.(($Darr["Visastatus"]== "vs13" )? "selected" :"").' value="vs13">H-2 Visa</option>
                                    <option '.(($Darr["Visastatus"]== "vs14" )? "selected" :"").' value="vs14">Permanent Resident</option>
                                    <option '.(($Darr["Visastatus"]== "vs15" )? "selected" :"").' value="vs15">Student (F-1) Visa</option>
                                        </select>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                    Ethnicity *:
                                        <select name="ethnicity" required class="chosen-select2"><option value="" >---------</option>
                                    <option '.(($Darr["Ethnicity"]== "e1" )? "selected" :"").' value="e1">African American/Black</option>
                                    <option '.(($Darr["Ethnicity"]== "e2" )? "selected" :"").' value="e2">Asian or Pacific Islander</option>
                                    <option '.(($Darr["Ethnicity"]== "e3" )? "selected" :"").' value="e3">Caucasian, Non-Hispanic</option>
                                    <option '.(($Darr["Ethnicity"]== "e4" )? "selected" :"").' value="e4">Do Not Wish To Provide</option>
                                    <option '.(($Darr["Ethnicity"]== "e5" )? "selected" :"").' value="e5">Hispanic/Latino</option>
                                    <option '.(($Darr["Ethnicity"]== "e6" )? "selected" :"").' value="e6">Multi Cultural</option>
                                    <option '.(($Darr["Ethnicity"]== "e7" )? "selected" :"").' value="e7">Native American or Alaskan Native</option>
                                    <option '.(($Darr["Ethnicity"]== "e8" )? "selected" :"").' value="e8">Other</option>
                                        </select>
                                        </label>
                                        <label>
                                    Gender *:
                                        <select name="gender" required class="chosen-select2"><option value="" >---------</option>
                                    <option '.(($Darr["Gender"]== "g1" )? "selected" :"").' value="g1">Do Not Wish To Provide</option>
                                    <option '.(($Darr["Gender"]== "g2" )? "selected" :"").' value="g2">Female</option>
                                    <option '.(($Darr["Gender"]== "g3" )? "selected" :"").' value="g3">Male</option>
                                        </select>
                                        </label>
                                    </p>
                                    <p>
                                         <label>
                                    Disabled Status *:
                                        <select name="dstatus" required class="chosen-select2"><option value="" >---------</option>
                                    <option '.(($Darr["DisabledStatus"]== "ds1" )? "selected" :"").' value="ds1">Do Not Wish To Provide</option>
                                    <option '.(($Darr["DisabledStatus"]== "ds2" )? "selected" :"").' value="ds2">No</option>
                                    <option '.(($Darr["DisabledStatus"]== "ds3" )? "selected" :"").' value="ds3">Yes</option>
                                        </select>
                                        </label>
                                         <label>
                                    Veteran Status *:
                                        <select name="vetstatus" required class="chosen-select2"><option value="" >---------</option>
                                    <option '.(($Darr["VeteranStatus"]== "vets1" )? "selected" :"").' value="vets1">No</option>
                                    <option '.(($Darr["VeteranStatus"]== "vets2" )? "selected" :"").' value="vets2">Yes</option>
                                        </select>
                                        </label>
                                    </p>
                                </div>
                            </fieldset>
                            
                            <fieldset>
                                <legend>Job Related Skills/Information</legend>
                                <div style="float:left;">
                                    <p>
                                        <label>
                                    Foreign Language Skills:
                                    <select class="chosen-select" name="FLskills[]" multiple >';
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
echo'           </select>
                </label>
            </p>
            <p>
                <label>
            Job Location:
            <select name="jobloc[]" class="chosen-select" multiple>';
    $i = 0;
    foreach ($jobloc as $key => $nameval) 
    {
        $i++;
        echo '<option value="j'.$i.'"';
        foreach ($JLvalues as $key => $val) 
        {
            if("j".$i == $val)
            {
                echo ' selected ';
            }
        }
        echo '>'.$nameval.'</option>';
    }    
echo'                                   </select>
                                        </label>
                                    </p>
                                </div>
                                <div style="float:right;">
                                    <p>
                                        <label>
                                    Technical/Computer Experience:
                                        <select name="techexp[]" class="chosen-select" multiple>';
    $i = 0;
    foreach ($techexp as $key => $nameval) 
    {
        $i++;
        echo '<option value="t'.$i.'"';
        foreach ($TEvalues as $key => $val) 
        {
            if("t".$i == $val)
            {
                echo ' selected ';
            }
        }
        echo '>'.$nameval.'</option>';
    } 
echo'                                   </select>
                                        </label>
                                    </p>
                                    
                                    <p>
                                       <label>
                                    Additional Skills:
                                    <select name="adskill[]" multiple class="chosen-select">';
    $i = 0;
    foreach ($adskill as $key => $nameval) 
    {
        $i++;
        echo '<option value="as'.$i.'"';
        foreach ($ASvalues as $key => $val) 
        {
            if("as".$i == $val)
            {
                echo ' selected ';
            }
        }
        echo '>'.$nameval.'</option>';
    } 
echo'                                   </select>
                                        </label> 
                                    </p>
                                </div>
                            </fieldset>
                            
                            <fieldset>
                                <legend>Additional Information</legend>
                                <div style="float:left;">
                                    <p>
                                        <label>
                                        Career Objectives:
                                        <input type="text" name="cobj" value="'.$AIarr["CareerObjective"].'">
                                        </label>
                                    </p>
                                    <dl>
                                        <dt><label>Allow Employers To View My Resume/Profile?</label></dt>
                                        <dd>
                                            <label><input type="radio" name="ai1" value="y"  '.(($AIarr["EmployerViewResume"]== "y" )? "checked" :"").'> Yes</label> 
                                            <label><input type="radio" name="ai1" value="n"  '.(($AIarr["EmployerViewResume"]== "n" )? "checked" :"").'> No</label>
                                        </dd>
                                    </dl>
                                    <dl>
                                    <dt><label>Gradleaders Recruiting Inclusion Opt Out</label></dt>
                                    <dd>
                                        <label><input type="radio" name="ai2" value="y" '.(($AIarr["GradLeaderRecruitingOptOut"]== "y" )? "checked" :"").'> Yes</label> 
                                        <label><input type="radio" name="ai2" value="n" '.(($AIarr["GradLeaderRecruitingOptOut"]== "n" )? "checked" :"").'> No</label>
                                    </dd>
                                </dl>
                                <label>
                                </div>
                                <div style="float:right;">
                                    <p>
                                         <label>
                                    Job Target *:
                                    <select name="jobtarget[]" class="chosen-select" multiple required>';
    $i = 0;
    foreach ($jobtarget as $key => $nameval) 
    {
        $i++;
        echo '<option value="jt'.$i.'"';
        foreach ($JTvalues as $key => $val) 
        {
            if("jt".$i == $val)
            {
                echo ' selected ';
            }
        }
        echo '>'.$nameval.'</option>';
    } 

echo'                                        </select>
                                         </label>
                                    </p>
                                </div>
                            </fieldset>
                            
                            <fieldset>
                                <legend>Controller Information</legend>
                                <div style="float:left;">
                                    <p>
                                        <label>
                                        Z Number *:
                                        <input type="text" name="znum" value="'.$PIarr["Znumber"].' required>
                                        </label>
                                    </p>
                                </div>
                            </fieldset>
                            
                            <input type="button" value="Save" />
                            <input type="submit" value="Submit" />      
                        </form>
			</div>

 
			
			</div>
		<div id="ReportInternship" class="content">
				<h1>Reporting an Internship or Job</h1>
                                <form>
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
                                            
                                            <label> End Date*: </label>
                                            <input type="date" name="endDatei" >
                                        
                                        </p>
                                        <p><label> Salary*:</label> <br>
                                                <input type="text" name="salaryi"></label>
					</p>
                                        <p>
                                         <label>
                                             Salary Type*:<br>
                                        <select>
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
                                    <dt><label> Have You Interned Here Previously?*:</label></dt>
                                    <dd>
                                        <label><input type="radio" name="ii2" value="y" checked="checked" /> Yes</label> 
                                        <label><input type="radio" name="ii2" value="n" /> No</label>
                                    </dd>
                                        </dl>
                                             <dl>
                                        <dt><label>How Does This Position Further Your Professional/Career Goals?*:</label></dt>
                                        <dd>
                                            <textarea rows="4" cols="75"></textarea>
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
                                                    <select><option value="s0" >--</option>
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
                                            <p><label>Phone Number*:</label><br>
                                                <input type="text" name="sphone"></p>
                                            <p><label>Fax:</label><br>
                                                <input type="text" name="sfax"></p>
                                        </div>
                                    </fieldset>
                                     
                                    <input type="button" value="Save" />
                                    <input type="submit" value="Submit" />    
                        </form>
                        </div>	
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
?>
    
    
    
  
