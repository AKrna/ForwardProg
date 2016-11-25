<?php
session_start();
require_once './php/db_connect.php';
if(isset($_SESSION["sid"]))
{
    $sid = $_SESSION["sid"];
    $selectPIstmt = "Select * From StudentPersonalInformation Where sid = ".$sid;
    $selectDstmt =  "Select * From StudentDemographics Where sid = ".$sid;
    $result = mysqli_query($db,$selectPIstmt);
    $PIarr = mysqli_fetch_assoc($result);
    $result2 = mysqli_query($db,$selectDstmt);
    $Darr = mysqli_fetch_assoc($result2);
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
			<a class="button btn-block" href="#">View Classified</a>
			<a class="button btn-block" href="./php/logout.php">Log Out</a>
		</div>
		<div class="container">
			<ul class="tabs">
				<li><a href="javascript:void(0)" class="tabLink" onclick="openPage(event,\'Home\')" id="defaultOpen">Home</a></li>
				<li><a href="javascript:void(0)" class="tabLink" onclick="openPage(event,\'EditInformation\')">Edit Information</a></li>
				<li><a href="javascript:void(0)" class="tabLink" onclick="openPage(event,\'ReportInternship/Job\')">Report Internship/Job</a></li>
				<li><a href="javascript:void(0)" class="tabLink" onclick="openPage(event,\'ViewListedInternshipsJobs\')">View Listed Internships/Jobs</a></li>
			</ul>
		
			<div id="Home" class="content">
				<h2>Welcome to your Career Link!!!</h2>
				<p>This section is for logging in with student rights, faculty rights, or no log in at all.</p>
			</div>
			
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
                                    <select class="chosen-select" name="FLskills[]" multiple >
                                            <option value="fs1">Afrikaans</option>
                                            <option value="fs2">Albanian</option>
                                            <option value="fs3">American Sign</option>
                                            <option value="fs4">American Sign Language</option>
                                            <option value="fs5">Arabic</option>
                                            <option value="fs6">Armenian</option>
                                            <option value="fs7">Assyrian</option>
                                            <option value="fs8">Azebaijani</option>
                                            <option value="fs9">Belarussian</option>
                                            <option value="fs10">Bengali</option>
                                            <option value="fs11">Bilingual</option>
                                            <option value="fs12">Bosnian</option>
                                            <option value="fs13">Bulgarian</option>
                                            <option value="fs14">Cambodian</option>
                                            <option value="fs15">Cantonese</option>
                                            <option value="fs16">Catalan</option>
                                            <option value="fs17">Chinese</option>
                                            <option value="fs18">Chinese - Cantonese</option>
                                            <option value="fs19">Chinese - Mandarin</option>
                                            <option value="fs20">Creole</option>
                                            <option value="fs21">Croatian</option>
                                            <option value="fs22">Czech</option>
                                            <option value="fs23">Danish</option>
                                            <option value="fs24">Dutch</option>
                                            <option value="fs25">English</option>
                                            <option value="fs26">English as a second language</option>
                                            <option value="fs27">Estonian</option>
                                            <option value="fs28">Farsi</option>
                                            <option value="fs29">Filipino</option>
                                            <option value="fs30">Finnish</option>
                                            <option value="fs31">Flemish</option>
                                            <option value="fs32">French</option>
                                            <option value="fs33">Gaelic</option>
                                            <option value="fs34">German</option>
                                            <option value="fs35">Greek</option>
                                            <option value="fs36">Guarni</option>
                                            <option value="fs37">Gujarati</option>
                                            <option value="fs38">Haitian</option>
                                            <option value="fs39">Hakka</option>
                                            <option value="fs40">Hebrew</option>
                                            <option value="fs41">Hindi</option>
                                            <option value="fs42">Hmong</option>
                                            <option value="fs43">Hungarian</option>
                                            <option value="fs44">Icelandic</option>
                                            <option value="fs45">Indonesian</option>
                                            <option value="fs46">Italian</option>
                                            <option value="fs47">Japanese</option>
                                            <option value="fs48">Kannada</option>
                                            <option value="fs49">Khmer</option>
                                            <option value="fs50">Korean</option>
                                            <option value="fs51">Kurdish</option>
                                            <option value="fs52">Lakota</option>
                                            <option value="fs53">Laotian</option>
                                            <option value="fs54">Latin</option>
                                            <option value="fs55">Latvian</option>
                                            <option value="fs56">Lingala</option>
                                            <option value="fs57">Lithuanian</option>
                                            <option value="fs58">Luganda</option>
                                            <option value="fs59">Macedonian</option>
                                            <option value="fs60">Malay</option>
                                            <option value="fs61">Malayalam</option>
                                            <option value="fs62">Mandarin</option>
                                            <option value="fs63">Maori</option>
                                            <option value="fs64">Marathi</option>
                                            <option value="fs65">Mongolian</option>
                                            <option value="fs66">Native American</option>
                                            <option value="fs67">Nepalese</option>
                                            <option value="fs68">Norwegian</option>
                                            <option value="fs69">Other</option>
                                            <option value="fs70">Persian</option>
                                            <option value="fs71">Polish</option>
                                            <option value="fs72">Portugese</option>
                                            <option value="fs73">Punjabi</option>
                                            <option value="fs74">Romanian</option>
                                            <option value="fs75">Russian</option>
                                            <option value="fs76">Samoan</option>
                                            <option value="fs77">Sanskrit</option>
                                            <option value="fs78">Serbian</option>
                                            <option value="fs79">Sihhalese</option>
                                            <option value="fs80">Sindi</option>
                                            <option value="fs81">Sinhala</option>
                                            <option value="fs82">Slavic</option>
                                            <option value="fs83">Slovak</option>
                                            <option value="fs84">Spanish</option>
                                            <option value="fs85">Swahili/Kiswahili</option>
                                            <option value="fs86">Swedish</option>
                                            <option value="fs87">Tagalog</option>
                                            <option value="fs88">Taiwanese</option>
                                            <option value="fs89">Tamil</option>
                                            <option value="fs90">Telugu</option>
                                            <option value="fs91">Thai</option>
                                            <option value="fs92">Tibetan</option>
                                            <option value="fs93">Turkish</option>
                                            <option value="fs94">Ukrainian</option>
                                            <option value="fs95">Urdu</option>
                                            <option value="fs96">Uzbek</option>
                                            <option value="fs97">Vietnamese</option>
                                            <option value="fs98">Welsh</option>
                                            <option value="fs99">Wolof</option>
                                            <option value="fs100">Yiddish</option>
                                            <option value="fs101">Yoruba</option>
                                            <option value="fs102">Zulu</option>
                                        </select>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                    Job Location:
                                        <select name="jobloc[]" class="chosen-select" multiple>
                                    <option value="j1">All South Florida</option>
                                    <option value="j2">Broward County</option>
                                    <option value="j3">Indian River County</option>
                                    <option value="j4">Martin County</option>
                                    <option value="j5">Miami-Dade County</option>
                                    <option value="j6">Midwest U.S.</option>
                                    <option value="j7">Northeast U.S.</option>
                                    <option value="j8">Northwest U.S.</option>
                                    <option value="j9">Other Florida</option>
                                    <option value="j10">Palm Beach County</option>
                                    <option value="j11">Southeast U.S.</option>
                                    <option value="j12">Southwest U.S.</option>
                                        </select>
                                        </label>
                                    </p>
                                </div>
                                <div style="float:right;">
                                    <p>
                                        <label>
                                    Technical/Computer Experience:
                                        <select name="techexp[]" class="chosen-select" multiple>
                                    <option value="t1">Access</option>
                                    <option value="t2">Analysis</option>
                                    <option value="t3">C# Programming</option>
                                    <option value="t4">C++ Programming</option>
                                    <option value="t5">Client/Server</option>
                                    <option value="t6">Database</option>
                                    <option value="t7">Database - dBase</option>
                                    <option value="t8">Database - FoxPro</option>
                                    <option value="t9">Database - Informix</option>
                                    <option value="t10">Database - MS Access</option>
                                    <option value="t11">Database - Oracle</option>
                                    <option value="t12">Database - Paradox</option>
                                    <option value="t13">Database - SQL Server</option>
                                    <option value="t14">Database - Sybase</option>
                                    <option value="t15">Design - 3 - Tier Architecture</option>
                                    <option value="t16">Design - Advance Web Design</option>
                                    <option value="t17">Design - Data modeling</option>
                                    <option value="t18">Design - Engineering Design</option>
                                    <option value="t19">Design - Flash</option>
                                    <option value="t20">Design - Graphic Design</option>
                                    <option value="t21">Design - Interface Design</option>
                                    <option value="t22">Design - MATLAB</option>
                                    <option value="t23">Design - OOA/OOD/OOP</option>
                                    <option value="t24">Design - Other - Design</option>
                                    <option value="t25">Design - SPICE</option>
                                    <option value="t26">Design - VHDL</option>
                                    <option value="t27">Design - Web Design</option>
                                    <option value="t28">General Skills - ASPA</option>
                                    <option value="t29">General Skills - Audio/Video</option>
                                    <option value="t30">General Skills - Authoring System Software</option>
                                    <option value="t31">General Skills - B - Tree</option>
                                    <option value="t32">General Skills - BAAN</option>
                                    <option value="t33">General Skills - Backup/Restore Utilities</option>
                                    <option value="t34">General Skills - Computer Graphics</option>
                                    <option value="t35">General Skills - Computer Operations</option>
                                    <option value="t36">General Skills - Configuration Management</option>
                                    <option value="t37">General Skills - Data Mining/Warehousing</option>
                                    <option value="t38">General Skills - Database Administration</option>
                                    <option value="t39">General Skills - Encryption Standards</option>
                                    <option value="t40">General Skills - ERP</option>
                                    <option value="t41">General Skills - FTP</option>
                                    <option value="t42">General Skills - Hardware</option>
                                    <option value="t43">General Skills - Help Desk/Tech Support</option>
                                    <option value="t44">General Skills - Internet</option>
                                    <option value="t45">General Skills - Mainframes</option>
                                    <option value="t46">General Skills - MCSE</option>
                                    <option value="t47">General Skills - Minicomputers</option>
                                    <option value="t48">General Skills - Numerical Skills</option>
                                    <option value="t49">General Skills - Office Applications</option>
                                    <option value="t50">General Skills - Other</option>
                                    <option value="t51">General Skills - Presentation Programs - Other</option>
                                    <option value="t52">General Skills - Pro Engineer</option>
                                    <option value="t53">General Skills - Programming</option>
                                    <option value="t54">General Skills - Project Management</option>
                                    <option value="t55">General Skills - Quality Assurance</option>
                                    <option value="t56">General Skills - Relational Database Mgmt</option>
                                    <option value="t57">General Skills - Robotics</option>
                                    <option value="t58">General Skills - SAP</option>
                                    <option value="t59">General Skills - Spreadsheets</option>
                                    <option value="t60">General Skills - Statistics</option>
                                    <option value="t61">General Skills - Technical Writing</option>
                                    <option value="t62">General Skills - Troubleshooting</option>
                                    <option value="t63">General Skills - VLSI</option>
                                    <option value="t64">General Skills - Word Processing</option>
                                    <option value="t65">HTML</option>
                                    <option value="t66">JAVA</option>
                                    <option value="t67">Language/Tools - .NET</option>
                                    <option value="t68">Language/Tools - 4GL</option>
                                    <option value="t69">Language/Tools - Assembler</option>
                                    <option value="t70">Language/Tools - BASIC</option>
                                    <option value="t71">Language/Tools - C</option>
                                    <option value="t72">Language/Tools - C++</option>
                                    <option value="t73">Language/Tools - CACTI</option>
                                    <option value="t74">Language/Tools - CGI</option>
                                    <option value="t75">Language/Tools - CICS</option>
                                    <option value="t76">Language/Tools - COBOL</option>
                                    <option value="t77">Language/Tools - COM</option>
                                    <option value="t78">Language/Tools - Communications</option>
                                    <option value="t79">Language/Tools - CORBA</option>
                                    <option value="t80">Language/Tools - FORTRAN</option>
                                    <option value="t81">Language/Tools - Fourth Dimension</option>
                                    <option value="t82">Language/Tools - HTML</option>
                                    <option value="t83">Language/Tools - HTML Editors</option>
                                    <option value="t84">Language/Tools - ISQL</option>
                                    <option value="t85">Language/Tools - Java</option>
                                    <option value="t86">Language/Tools - JavaScript</option>
                                    <option value="t87">Language/Tools - JCL</option>
                                    <option value="t88">Language/Tools - Macromedia</option>
                                    <option value="t89">Language/Tools - Macromedia ColdFusion</option>
                                    <option value="t90">Language/Tools - MFC/ATL/WinAPI</option>
                                    <option value="t91">Language/Tools - Pascal</option>
                                    <option value="t92">Language/Tools - Perl</option>
                                    <option value="t93">Language/Tools - PowerBuilder</option>
                                    <option value="t94">Language/Tools - RealTime/Drvs/Embed Systm</option>
                                    <option value="t95">Language/Tools - RPG</option>
                                    <option value="t96">Language/Tools - Shell Scripting</option>
                                    <option value="t97">Language/Tools - SimpleScaler</option>
                                    <option value="t98">Language/Tools - SQL</option>
                                    <option value="t99">Language/Tools - Verilog</option>
                                    <option value="t100">Language/Tools - Visual Basics</option>
                                    <option value="t101">Language/Tools - XML</option>
                                    <option value="t102">Network Administration - A+ Certification</option>
                                    <option value="t103">Network Administration - Accounting/Payroll Sfwre</option>
                                    <option value="t104">Network Administration - AIX Operating System</option>
                                    <option value="t105">Network Administration - Analysis/Rpting/Model dev</option>
                                    <option value="t106">Network Administration - Apple Mac OS</option>
                                    <option value="t107">Network Administration - AS/400</option>
                                    <option value="t108">Network Administration - AT&T StarLAN</option>
                                    <option value="t109">Network Administration - Cisco</option>
                                    <option value="t110">Network Administration - DOS</option>
                                    <option value="t111">Network Administration - Firewalls</option>
                                    <option value="t112">Network Administration - LAN.WAN Administration</option>
                                    <option value="t113">Network Administration - Network Management</option>
                                    <option value="t114">Network Administration - Novell Network</option>
                                    <option value="t115">Network Administration - Other</option>
                                    <option value="t116">Network Administration - Pathworks</option>
                                    <option value="t117">Network Administration - TCP/IP</option>
                                    <option value="t118">Networking</option>
                                    <option value="t119">Operating Systems - AIX Operating Systems</option>
                                    <option value="t120">Operating Systems - Apple Mac OS</option>
                                    <option value="t121">Operating Systems - AS/400</option>
                                    <option value="t122">Operating Systems - DOS</option>
                                    <option value="t123">Operating Systems - Linux</option>
                                    <option value="t124">Operating Systems - Macintosh</option>
                                    <option value="t125">Operating Systems - MVS</option>
                                    <option value="t126">Operating Systems - Other</option>
                                    <option value="t127">Operating Systems - Sun/Solaris</option>
                                    <option value="t128">Operating Systems - Unix</option>
                                    <option value="t129">Operating Systems - VAX</option>
                                    <option value="t130">Operating Systems - VMS</option>
                                    <option value="t131">Operating Systems - Windows 95/98/NT/2000/XP</option>
                                    <option value="t132">Operating Systems - X/Windows</option>
                                    <option value="t133">Oracle</option>
                                    <option value="t134">PC</option>
                                    <option value="t135">Software Packages - 3D CAD</option>
                                    <option value="t136">Software Packages - A+ Certification</option>
                                    <option value="t137">Software Packages - ACT</option>
                                    <option value="t138">Software Packages - Adobe Acrobat</option>
                                    <option value="t139">Software Packages - Adobe Acrobat Reader</option>
                                    <option value="t140">Software Packages - Adobe FrameMaker</option>
                                    <option value="t141">Software Packages - Adobe Illustrator</option>
                                    <option value="t142">Software Packages - Adobe Indesign</option>
                                    <option value="t143">Software Packages - Adobe Macromedia DreamWeaver</option>
                                    <option value="t144">Software Packages - Adobe PageMaker</option>
                                    <option value="t145">Software Packages - Adobe PageMill</option>
                                    <option value="t146">Software Packages - Adobe PhotoShop</option>
                                    <option value="t147">Software Packages - ACRVIEW</option>
                                    <option value="t148">Software Packages - AT&T StarLAN</option>
                                    <option value="t149">Software Packages - AutoCAD</option>
                                    <option value="t150">Software Packages - Avid</option>
                                    <option value="t151">Software Packages - Bloomberg</option>
                                    <option value="t152">Software Packages - CAD</option>
                                    <option value="t153">Software Packages - CAD/CAM</option>
                                    <option value="t154">Software Packages - Cadence Design Suite</option>
                                    <option value="t155">Software Packages - CAM</option>
                                    <option value="t156">Software Packages - CASE</option>
                                    <option value="t157">Software Packages - Cisco</option>
                                    <option value="t158">Software Packages - Clarion</option>
                                    <option value="t159">Software Packages - Claris Works</option>
                                    <option value="t160">Software Packages - Corel Office</option>
                                    <option value="t161">Software Packages - Crystal Reports</option>
                                    <option value="t162">Software Packages - Desktop Publishing</option>
                                    <option value="t163">Software Packages - Director</option>
                                    <option value="t164">Software Packages - Drawing Programs</option>
                                    <option value="t165">Software Packages - Eudora</option>
                                    <option value="t166">Software Packages - FileMarker Pro</option>
                                    <option value="t167">Software Packages - Final Draft</option>
                                    <option value="t168">Software Packages - Firewalls</option>
                                    <option value="t169">Software Packages - Geographical Info Systems</option>
                                    <option value="t170">Software Packages - GoLive</option>
                                    <option value="t171">Software Packages - GroupWork</option>
                                    <option value="t172">Software Packages - Harvard Graphics</option>
                                    <option value="t173">Software Packages - Internet Applications</option>
                                    <option value="t174">Software Packages - LAN/WAN Administration</option>
                                    <option value="t175">Software Packages - Lexis/Nexis</option>
                                    <option value="t176">Software Packages - Lindo</option>
                                    <option value="t177">Software Packages - LOGSIM</option>
                                    <option value="t178">Software Packages - Lotus 1-2-3</option>
                                    <option value="t179">Software Packages - Lotus cc:Mail</option>
                                    <option value="t180">Software Packages - Lotus Notes</option>
                                    <option value="t181">Software Packages - Lotus SmartSuite</option>
                                    <option value="t182">Software Packages - Macromedia DreamWeaver</option>
                                    <option value="t183">Software Packages - Maple</option>
                                    <option value="t184">Software Packages - Mathcad</option>
                                    <option value="t185">Software Packages - Mathematica</option>
                                    <option value="t186">Software Packages - MovieMagic</option>
                                    <option value="t187">Software Packages - MS Excel</option>
                                    <option value="t188">Software Packages - MS FrontPage</option>
                                    <option value="t189">Software Packages - MS Internet Explorer</option>
                                    <option value="t190">Software Packages - MS Multimedia</option>
                                    <option value="t191">Software Packages - MS Netscape Navigator</option>
                                    <option value="t192">Software Packages - MS Office</option>
                                    <option value="t193">Software Packages - MS OutLook</option>
                                    <option value="t194">Software Packages - MS PowerPoint</option>
                                    <option value="t195">Software Packages - MS Word</option>
                                    <option value="t196">Software Packages - NewsEdit</option>
                                    <option value="t197">Software Packages - Novell Netware</option>
                                    <option value="t198">Software Packages - NUD*IST</option>
                                    <option value="t199">Software Packages - Other - Software Packages</option>
                                    <option value="t200">Software Packages - Pagemaker</option>
                                    <option value="t201">Software Packages - Pathworks</option>
                                    <option value="t202">Software Packages - Peachtree</option>
                                    <option value="t203">Software Packages - Pro - Quest</option>
                                    <option value="t204">Software Packages - ProTools
                                    <option value="t205">Software Packages - Quark</option>
                                    <option value="t206">Software Packages - Quattro Pro</option>
                                    <option value="t207">Software Packages - Quick Books</option>
                                    <option value="t208">Software Packages - Quicken</option>
                                    <option value="t209">Software Packages - SAS</option>
                                    <option value="t210">Software Packages - SAULT</option>
                                    <option value="t211">Software Packages - SPSS</option>
                                    <option value="t212">Software Packages - VISIO</option>
                                    <option value="t213">Software Packages - WordPerfect</option>
                                    <option value="t214">SQL Programming</option>
                                    <option value="t215">Systems Support</option>
                                    <option value="t216">Telecommunications</option>
                                    <option value="t217">Web Design</option>
                                        </select>
                                        </label>
                                    </p>
                                    
                                    <p>
                                       <label>
                                    Additional Skills:
                                        <select name="adskill[]" multiple class="chosen-select">
                                    <option value="as1">Accounting/Bookkeeping</option>
                                    <option value="as2">Analytical Problem Solving</option>
                                    <option value="as3">Arbitrating/Meditating/Resolving Conflicts</option>
                                    <option value="as4">Assessing Priorities/Time Management</option>
                                    <option value="as5">Athletics Coaching</option>
                                    <option value="as6">Communication</option>
                                    <option value="as7">Counseling/Advising</option>
                                    <option value="as8">Cross Cultural Competence</option>
                                    <option value="as9">Customer Service</option>
                                    <option value="as10">Data Interpretation</option>
                                    <option value="as11">Decision Making</option>
                                    <option value="as12">Dependable</option>
                                    <option value="as13">Editing</option>
                                    <option value="as14">Enterprising</option>
                                    <option value="as15">Establishing Procedures/Rules</option>
                                    <option value="as16">Event/Program Planning</option>
                                    <option value="as17">Inventive</option>
                                    <option value="as18">Maintaining Systems</option>
                                    <option value="as19">Managing Crisis</option>
                                    <option value="as20">Managing People</option>
                                    <option value="as21">Media Skills (Video & Film)</option>
                                    <option value="as22">Mentoring/Motivating Others</option>
                                    <option value="as23">Negotiating</option>
                                    <option value="as24">Organized</option>
                                    <option value="as25">Performing Arts</option>
                                    <option value="as26">Promoting/Marketing/Selling</option>
                                    <option value="as27">Public Speaking</option>
                                    <option value="as28">Quantitative Skills/Working with Numbers</option>
                                    <option value="as29">Research/Investigating</option>
                                    <option value="as30">Self-starting/Taking initiative</option>
                                    <option value="as31">Strategizing</option>
                                    <option value="as32">Synthesizing Information</option>
                                    <option value="as33">Teaching/Training</option>
                                    <option value="as34">Working in Teams</option>
                                    <option value="as35">Working Independently</option>
                                    <option value="as36">Working Under Pressure/Meeting Deadlines</option>
                                    <option value="as37">Working with Theories</option>
                                    <option value="as38">Writing</option>
                                        </select>
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
                                        <input type="text" name="cobj" />
                                        </label>
                                    </p>
                                    <dl>
                                        <dt><label>Allow Employers To View My Resume/Profile?</label></dt>
                                        <dd>
                                            <label><input type="radio" name="ai1" value="y" checked="checked" /> Yes</label> 
                                            <label><input type="radio" name="ai1" value="n" /> No</label>
                                        </dd>
                                    </dl>
                                    <dl>
                                    <dt><label>Gradleaders Recruiting Inclusion Opt Out</label></dt>
                                    <dd>
                                        <label><input type="radio" name="ai2" value="y" checked="checked" /> Yes</label> 
                                        <label><input type="radio" name="ai2" value="n" /> No</label>
                                    </dd>
                                </dl>
                                <label>
                                </div>
                                <div style="float:right;">
                                    <p>
                                         <label>
                                    Job Target *:
                                    <select name="jobtarget[]" class="chosen-select" multiple required>
                                    <option value="jt1">Accounting</option>
                                    <option value="jt2">Agriculture, Food & Natural Resources</option>
                                    <option value="jt3">Architecture & Construction</option>
                                    <option value="jt4">Arts, A/V Technology & Communications</option>
                                    <option value="jt5">Business Management & Administration</option>
                                    <option value="jt6">Education & Training</option>
                                    <option value="jt7">Finance</option>
                                    <option value="jt8">Government & Public Administration</option>
                                    <option value="jt9">Health Sciences</option>
                                    <option value="jt10">Hospitality, Sports Teams/ Venues and Tourism</option>
                                    <option value="jt11">Housing & Urban Development</option>
                                    <option value="jt12">Human Service</option>
                                    <option value="jt13">Law,Public Safety,Corrections & Security</option>
                                    <option value="jt14">Manufacturing</option>
                                    <option value="jt15">Marketing</option>
                                    <option value="jt16">Science,Technology,Engineering & Mathematics</option>
                                    <option value="jt17">Transportation, Distribution & Logistics</option>
                                        </select>
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
                                        <input type="text" name="znum" required>
                                        </label>
                                    </p>
                                </div>
                            </fieldset>
                            
                            <input type="button" value="Save" />
                            <input type="submit" value="Submit" />      
                        </form>
			</div>
			
			<div id="ReportInternship/Job" class="content">
				<h1>Reporting an Internship or Job</h1>
				<fieldset><legend>Internship Information</legend>
				<div id="RIContentLeft">
					
				</div>
				</fieldset>
				<!--<select id="reportSelect">
					<option value="internship">Internship</option>
					<option value="job">Job</option>
				</select>
				<div id="reportinginternship">
					<div id="RIContentLeft">
					<div class="interndataform">
						<label for="internshipTitle"><span class="required">*</span>Internship Title: </label><br>
						<input type="text" name="internshipTitle">
					</div>
					<div class="interndataform">
						<label for="department"><span class="required">*</span>Department: </label><br>
						<input type="text" name="department">				
					</div>
					<div class="interndataform">
						<label for="startDate"><span class="required">*</span>Start Date: </label><br/>
						<input type="text" name="startDate">
					</div>
					<div class="interndataform">
						<label for="endDate"><span class="required">*</span>End Date: </label><br/>
						<input type="text" name="endDate">
					</div>
					<div class="interndataform">
						<label for="salary"><span class="required">*</span>Salary: </label><br/>
						<input type="text" name="salary">
					</div>
					<div class="interndataform">
						<label for="salaryType"><span class="required">*</span>Salary Type: </label><br/>
						<select name="salaryType" id="salaryTypeSelect">
							<option value="blank">Hourly</option>
							<option value="hourly">Hourly</option>
							<option value="unpaid">Unpaid</option>
							<option value="stipend">Stipend</option>
							<option value="other">Other</option>
						</select>
					</div>
				</div>
					<div id="RIContentRight">
					<div class="interndataform">
						<label for="PartOrFullTime"><span class="required">*</span>Part time or Full time: </label><br>
						<select name="partOrFullTime" id="partOrFullTime">
							<option value="blank"></option>
							<option value="PartTime">Part Time</option>
							<option value="FullTime">Full Time</option>
						</select>
					</div>
					<div class="interndataform">
						<label for="hrsPerWeek"><span class="required">*</span>Estimated Hours per Week: </label><br>
						<input type="text" name="hrsPerWeek">				
					</div>
					<div class="interndataform">
						<label for="additionalCompensation"><span class="required">*</span>Additional Compensation: </label><br/>
						<input type="text" name="additionalCompensation">
					</div>
					<div class="interndataform">
						<label for="workedHereBefore"><span class="required">*</span>Have you interned here previously?: </label><br/>
						<select name="workedHereBefore" id="workedHereBefore">
							<option value="blank"></option>
							<option value="yes">Yes</option>
							<option value="no">No</option>
						</select>
					</div>
				</div>
			</div>-->
			</div>
			
			<div id="ViewListedInternshipsJobs" class="content">
			<h2>This is what is available to you:</h2>
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
    
    
    
  
