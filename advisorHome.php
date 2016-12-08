<?php
session_start();
require_once './php/db_connect.php';
if(isset($_SESSION["aid"])) {
    $selectPIstmt = "SELECT * FROM StudentPersonalInformation WHERE 1";
    $result = mysqli_query($db,$selectPIstmt);
     
    echo'
<html>
	<head>
		<title>mainPage</title>	
            <link rel="stylesheet" type="textcss" href="./test.css">
		<link rel="stylesheet" type="text/css" href="./css/prototype.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.multiselect.css">
		<link rel="stylesheet" type="text/css" href="css/prism.css">
		<link rel="stylesheet" type="text/css" href="css/chosen.css">
		<link href="font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="sidebar">
			<a class="button btn-block" href="#">Log Out</a>
		</div>
		<div class="container">
			<ul class="tabs">
				<li><a href="javascript:void(0)" class="tabLink" onclick="openPage(event,\'AdvisorProfile\')" id="defaultOpen">Advisor Profile</a></li>
				<li><a href="javascript:void(0)" class="tabLink" onclick="openPage(event,\'ViewStudents\')">View Students</a></li>
			</ul>
            			<!--<div id="Home" class="content">
				<h2>Advisiors Home Page</h2>
				<p>This section is for displaying information to the advisors about different students internships and such.</p>
			</div>-->
			
			<div id="AdvisorProfile" class="content">
				<div id="advisorInfo">
					<p>Please sure the folowing information is correct so students can have access to the correct info!</p>
					<h2>Advisor Contact Info: </h2>
					<form action="php/submitadvisorprofile.php" method="post">
						<fieldset>
							<div class="advisorContactInfo">
								<p>
									<label>
										Full Name *: <input type="text" name="advisorName" required><br>
									</label>
								</p>
								<p>
									<label>
										Email *: <input type="text" name="advEmail" required><br>
									</label>
								</p>
								<p>
									<label>
										Office Hours *: <input type="text" name="officeHrs" required><br>
									</label>
								</p>
								<p>
									<label>
										Office Location *: <input type="text" name="offLocation" required>
									</label>
								</p>
								<input type="button" value="Save" />
								<input type="submit" value="Submit" />
							</div>
						</fieldset>
					</form>
				</div>
			</div>
			
			
			<div id="ViewStudents" class="content">
			<h2>Search through our records to find who you are looking for:</h2>
			<form>
                Search: <input id="searchbar" type="text" size="30" onkeyup="showResult(this.value)"> <input type="submit" value="search">
            </form>
            <div id="student_info">';
        //$i = 0;
        while ($row = mysqli_fetch_array($result) ) {
            //i++;
            echo '<fieldset>
            <form method="POST" action="justprofile.php" target="blank" style="float: right">
                <input hidden name="sid" value="'.$row["sid"].'"></p>
                <input type="submit" name="view_profile" value="View Profile">
            </form>
            <label> <span style="font-weight: bold">Last name:</span> '.$row['LastName']. '</label>
            <label><span style="font-weight: bold">First Name:</span> '.$row['FirstName']. '</label>
            <br/>
            <form method="POST" action="stinternship.php" style="float: right">
                <p hidden name="STDENT ID FROM DB"></p>
                <input type="submit" name="view_internships" value="View Internships/Jobs">
            </form>
            <label><span style="font-weight: bold">Z Number:</span> '.$row['Znumber'].'</label>
            <label><span style="font-weight: bold">Email Address:</span> '.$row['EmailAddress1'].'</label>
            </fieldset>';
        }
echo            '</div></div>
		
	<script type="text/javascript" src="./js/jquery-1.11.2.js"></script>
	<script type="text/javascript" src="./js/prototype.js"></script>
	<script type="text/javascript" src="./js/jquery.multiselect.js"></script>
	<script type="text/javascript" src="./js/jquery-ui.js"></script>
        <script type="text/javascript" src="./search.js"></script>
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
	<script src="./js/chosen.jquery.js" type="text/javascript"></script>
	<script src="./js/prism.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>';
    

    
/*    <!--echo '
    <!DOCTYPE html>
    <html>
        <head>
            <title>View Students</title>
            <link rel="stylesheet" href="test.css" type="text/css">
        </head>
        <body>
            <div class="search">
            <form>
                Search: <input type="text" size="30" onkeyup="showResult(this.value)">
            </form>
        </div>
            <div class="student_info">'.
        //$i = 0;
        foreach ($PIvalues as $key => $val ) {
            //i++;
            echo '<label> Last name: '.$PIvalue['LastName']. '</label>
            <label>First Name: '.$PIvalue['FirstName']. '</label>
            <label>Middle Initial'.$PIvalue['MiddleInitial'].'</label>
            <br/>
            <label>Z Number: '.$PIvalue['Znumber'].'</label>
            <label>Email Address: '.$PIvalue['EmailAddress1'].'</label>';
        }//table name, key = colmn k => ifdentifier
        foreach ($Dvalues as $key => $val) {
            echo '<br/><label>GPA: '.$Dvalue['GPA'].'</label>
            <label>Major: '.$Dvalue['Major'].'</label>
            <label>Class Standing: '.$Dvalues['ClassStanding'].'</label>'
        }.
            '</div>';
}
    -->
    
    <!--echo '
                <label>
                    Last Name: ';
                    if($result -> num_rows > 0) {
                        while($row = $PIarr) {
                            echo $row["LastName"];
                        }
                    }
    echo '                    
                </label>
                <label>
                    First Name: ';
                    if($result -> num_rows > 0) {
                        while($row = $PIarr) {
                            echo $row["FirstName"];
                        }
                    }
    echo '
                </label>
                <label>
                    Middle Initial: ';
                    if($result -> num_rows > 0) {
                        while($row = $PIarr) {
                            echo $row["MiddleInitial"];
                        }
                    }
    echo ' 
                </label>
                <br/>
                <label>
                    Z Number: ';
                    if($result -> num_rows > 0) {
                        while($row = $PIarr) {
                            echo $row["Znumber"];
                        }
                    }
    echo '
                </label>
                <label>
                    Email: ';
                    if($result -> num_rows > 0) {
                        while($row = $PIarr) {
                            echo $row["EmailAddress1"];
                        }
                    }
    echo '
                </label>
                <br/>
                <label>
                    GPA: ';
                    if($reslt -> num_rows > 0) {
                        while($row = $Darr) {
                            echo $row["OverallGPA"]
                        }
                    }
    echo '
                <label>
                    Major: ';
                    if($reslt -> num_rows > 0) {
                        while($row = $Darr) {
                            echo $row["Major"]
                        }
                    }
    echo '
                <label>
                    Class Standing: '
                    if($reslt -> num_rows > 0) {
                        while($row = $Darr) {
                            echo $row["ClassStanding"]
                        }
                    }
    echo '
                </label>
            </div>
        </body>
    </html>-->
 * 
 */
   }
   