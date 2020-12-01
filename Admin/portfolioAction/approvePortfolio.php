<?php
	session_start();
	if(isset($_SESSION['Email'])){
		// $servername = "localhost";
		// $username = "root";
		// $password = "";
		// $dbname = "test1";
		//Create connection
		// $conn = mysqli_connect($servername, $username, $password, $dbname);
		//Check connection
		// $error = mysqli_connect_error();
		// if ($error != null) {
			// $output = "<p>Unable to connect to the database</p>" . $error ;
			// exit($output);
		// }
		require("../../dbConnect.php");
		$sql = 'SELECT Flag FROM SUser WHERE Email="'.$_SESSION['Email'].'"';

		$result = mysqli_query($link, $sql);	
		while($row = mysqli_fetch_array($result)) {
			if($row["Flag"] != 0){
				header("Location: http://localhost/Abdullah/index.html");
				die();
			}
		}
		//mysqli_free_result($result);
		mysqli_close($link);
	} else{
		header("Location: http://localhost/Abdullah/index.html");
		die();
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>FR Portfolio</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
        <script src="script/Charts.js"></script>

		<script>
			function myAccFunc() {
				var x = document.getElementById("demoAcc");
				if (x.className.indexOf("w3-show") == -1) {
					x.className += " w3-show";
					x.previousElementSibling.className += " w3-blue-grey";
				} else {
					x.className = x.className.replace(" w3-show", "");
					x.previousElementSibling.className =
                    x.previousElementSibling.className.replace(" w3-blue-grey", "");
				}
			}
	
			function myDropFunc() {
				var x = document.getElementById("demoDrop");
				if (x.className.indexOf("w3-show") == -1) {
					x.className += " w3-show";
					x.previousElementSibling.className += " w3-blue-grey";
				} else {
					x.className = x.className.replace(" w3-show", "");
					x.previousElementSibling.className =
                    x.previousElementSibling.className.replace(" w3-blue-grey", "");
				}
			}
			
			function manipulatePortfolio(e){
				var id = e.id;
				id = id.substring(1);
				var elem = document.getElementById(id).innerHTML;
				
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				} else {  // code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				// xmlhttp.onreadystatechange=function() {
					// if (this.readyState==4 && this.status==200) {
						// document.getElementById("tableContainer").innerHTML=this.responseText;
						// document.getElementById("tableContainer").style.border="1px solid #A5ACB2";
					// }
				// }
				
				
				if(e.id == "+"+id){
					xmlhttp.open("GET","acceptRegistration.php?q="+elem,true);
					xmlhttp.send();
				
				}else if(e.id == "-"+id){
					xmlhttp.open("GET","rejectRegistration.php?q="+elem,true);
					xmlhttp.send();
				}
				alert("Successful Operation");
				window.location.replace("http://localhost/approvePortfolio.php");
			}
		</script>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" id="centered">
        <a class="navbar-brand" id="logo" href="http://local.ccse.kfupm.edu.sa/~st201436120/RayansCCSEServer/index.php">FR<br>Portfolio</a>


        <ul class="navbar-nav" style="margin-left: 800px">
            <li class="nav-item">
                <a class="nav-link">Welcome Admin!</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://local.ccse.kfupm.edu.sa/~st201436120/RayansCCSEServer/sign_out.php">Sign out</a>
            </li>
        </ul>
    </nav>


    <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:200px;">
        <a href="http://local.ccse.kfupm.edu.sa/~st201436120/RayansCCSEServer/stat.html" class="w3-bar-item w3-button">System Statistics</a>
        <button class="w3-button w3-block w3-left-align" onclick="myAccFunc()">
  Portfolio <i class="fa fa-caret-down"></i>
  </button>
        <div id="demoAcc" class="w3-hide w3-white w3-card">
            <a href="http://local.ccse.kfupm.edu.sa/~st201436120/RayansCCSEServer/Admin/addPortfolio.html" class="w3-bar-item w3-button">Add Portfolio</a>
            <a href="../updatePortfolio.php" class="w3-bar-item w3-button">Update Portfolio</a>
            <a href="http://local.ccse.kfupm.edu.sa/~st201436120/RayansCCSEServer/Admin/portfolioaction/deletePortfolio.php" class="w3-bar-item w3-button">Delete Portfolio</a>
            <a href="http://local.ccse.kfupm.edu.sa/~st201436120/RayansCCSEServer/Admin/portfolioaction/approvePortfolio.php" class="w3-bar-item w3-button">Approve Portfolio Request</a>
        </div>
        <a href="#" class="w3-bar-item w3-button">Send Notification</a>
    </div>

    <div class="container" id="tableContainer" style="margin-left:200px">
		<h2>List of pending users:</h2>            
			<?php
				// $servername = "localhost";
				// $username = "root";
				// $password = "";
				// $dbname = "test1";

				//Create connection
				// $conn = mysqli_connect($servername, $username, $password, $dbname);
				//Check connection
				// $error = mysqli_connect_error();
				// if ($error != null) {
					// $output = "<p>Unable to connect to the database</p>" . $error ;
					// exit($output);
				// } 
				require 'dbConnect.php';
				$sql = 'SELECT ID, FNAME, LNAME, Email, regREASON FROM SUser WHERE Flag=2';
				if($result = mysqli_query($link, $sql)){
					if (mysqli_num_rows($result) > 0) {
						// output data of each row
						echo '<table class="table table-hover table-responsive">
								<thead>
									<tr>
										<th valign="middle">ID</th>
										<th valign="middle">First name</th>
										<th valign="middle">Last name</th>
										<th valign="middle">Email</th>
										<th valign="middle">Registration Reason</th>
										<th valign="middle">Reject/Approve</th>
									</tr>
								</thead>
								<tbody>';
						$count = 1;
						while($row = mysqli_fetch_array($result)) {
							echo '<tr> <td id="' . $count . '" valign="middle">' . $row["ID"] . '</td><td valign="middle">' . $row["FNAME"] .
							'</td><td valign="middle">' . $row["LNAME"] . '</td><td valign="middle">' . $row["LNAME"] .
							'</td><td valign="middle">' . $row["regREASON"] .
							'</td><td valign="middle"><input onclick="manipulatePortfolio(this)" id="-' . $count .
							'" type="image" src="reject.png" /><div class="divider"></div><input onclick="manipulatePortfolio(this)" id="+' . $count .
							'" type="image" src="ok.png" /></td></tr>';
						}
						echo "</tbody></table>";
					} else {
						echo "No pending users";
					}
					mysqli_free_result($result);
				} else{
					echo "ERROR: Could not execute $sql. " . mysqli_error($link);
				}
				mysqli_close($link);
			?>
	</div>
</body>
</html>
