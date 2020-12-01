<?php
// session_start(); //Start the Session
// require('dbConnect.php');

// if (isset($_SESSION['Email'])){
    // if ($_SESSION['Flag'] == 0) {
        // header('Location: admin');
    // }else if ($_SESSION['Flag'] == 1) {
        // header('Location: faculty.html');
    // }
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FR Portfolio</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <script src="script/Charts.js"></script>
    <script src="script/signIn.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.card {
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			max-width: 300px;
			margin: auto;
			text-align: center;
			font-family: arial;
		}

		.title {
			color: grey;
			font-size: 18px;
		}

		button {
			border: none;
			outline: 0;
			display: inline-block;
			padding: 8px;
			color: white;
			background-color: #000;
			text-align: center;
			cursor: pointer;
			width: 100%;
			font-size: 18px;
		}

		a {
			text-decoration: none;
			font-size: 22px;
			color: black;
		}

		button:hover, a:hover {
			opacity: 0.7;
		}
	</style>
	<script>
		function showResult(str) {
				if (str.length==0) { 
					document.getElementById("livesearch").innerHTML="";
					document.getElementById("livesearch").style.border="0px";
					return;
				}
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				} else {  // code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function() {
					if (this.readyState==4 && this.status==200) {
						document.getElementById("livesearch").innerHTML=this.responseText;
						document.getElementById("livesearch").style.border="1px solid #A5ACB2";
					}
				}
				var by = document.getElementById("searchBy").value;
				if(by == 1){
					xmlhttp.open("GET","publicSearchByPublication.php?q="+str,true);
					xmlhttp.send();
				} else if(by == 2){
					xmlhttp.open("GET","publicSearchByFaculty.php?q="+str,true);
					xmlhttp.send();
				}
			}
			
			function profile(str) {
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				} else {  // code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				// xmlhttp.onreadystatechange=function() {
					// if (this.readyState==4 && this.status==200) {
						// document.getElementById("livesearch").innerHTML=this.responseText;
						// document.getElementById("livesearch").style.border="1px solid #A5ACB2";
					// }
				// }
				xmlhttp.open("GET","profile.php?q="+str,true);
				xmlhttp.send();			
			}
			
			function copy(e){
				var x = document.getElementById("tt");
				x.value=e.innerHTML;
				showResult(e.innerHTML);
			}
			
			function portfolio(e){
				var idVal = e.id;
				var name = document.getElementById("name"+idVal).innerHTML;
				// var name ="a a";
				var fname = name.indexOf(" ");
				fname = name.slice(0,fname);
				// var fname = "Ali";
			//	profile(fname);
				window.location.replace("profile.php?q="+fname);
			}
	</script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" id="centered">
        <a class="navbar-brand" id="logo" href="#">FR<br>Portfolio</a>
        <form class="form-inline" id="signInForm" action="sign_in.php" method="post">
            <div class="input-group">
               
                <input type="email" name="Email" class="form-control" id="input" placeholder="Email" required>
                
                <input type="password" name="Pswrd" class="form-control" id="input" placeholder="Password" required>
                
                <div class="form-check" id="grey">
                    <label class="form-check-label">
                      <input class="form-check-input"  type="checkbox" > Remember me
                    </label>
                </div>
                
                <input type="submit" class="btn btn-outline-primary" id="input" value="Sign In">

            </div>

        </form>
        
        <!--<script src="script/signIn.js" type="application/javascript"></script>-->
        
        <ul class="navbar-nav" >
            <li class="nav-item" >
                <a class="nav-link" href="Registration.php" >Sign Up</a>
            </li>
            <li class="nav-item" >
                <a class="nav-link" href="stat.html" >View Statistics</a>
            </li>
        </ul>
    </nav>
    <div class="jumbotron jumbotron-fluid" id="jumbotron">
		<form  method="POST" action="search-result.php" id="centered" style="padding-top: 50px">
			<input type="text" id="tt" onkeyup="showResult(this.value)" name="searchBar"  placeholder="Enter keywords, or faculty name" size="80">
			<select name="droplist" id="searchBy">
				<option value=1>Publication</option>
				<option value=2>Faculty</option>
			</select>
			<button type="submit" class="btn btn-primary" style="width:80px">Search</button>
        </div>
			<div id="livesearch" class="widthy" ></div> <!--style="padding-right: 635px; margin-top: -25%"-->
		</form>
        <div class="container" id="centered">
			<br>
            <h1><b>Search result:</b></h1>
        </div>
    </div>

    
    
    
    <div class="container" id="centered" style="padding-top: 100px">
		<?php
			require("dbConnect.php");
			
			$str = '';
			if($_POST["droplist"] == 1){ //Search by Publication
				$sql = 'SELECT * FROM `Publication` WHERE `Title` LIKE "%'.$_POST["searchBar"].'%"';
				if($result = mysqli_query($link,$sql)){
					while($row = mysqli_fetch_array($result)) {
						$str = $str.'<div class="card">
										<div class="card-body">
											<h4 class="card-title"><b>'.$row["Title"].'</b></h4>
											<p class="card-text">'.$row["Abstract"].'</p>
											<p class="card-text">Year: '.$row["Year"].' Type: '.$row["PublicationType"].'</p>
											<p class="card-text">Author: '.$row["Author"].'</p>
										</div>
									</div><br>';
					}
				} else{
					echo "Error: query did not execute";
				}
			} 
			else{
				$sql = 'SELECT * FROM SUser WHERE FName LIKE "%'.$_POST["searchBar"].'%"';
				if($result = mysqli_query($link,$sql)){
					$count = 0;
					while($row = mysqli_fetch_array($result)) {
						$count = $count+1;
						$str = $str.'<div class="card">
						<img src="'.$row[12].'" alt="'.$row["FName"].'" style="width:100%">
										<h1 id="name'.$count.'">'.$row["FName"].' '.$row["LName"].'</h1>
										<p class="title">'.$row["Educatoin"].', '.$row["Department"].'</p>
										<p><button onclick="portfolio(this)" id="'.$count.'">Portfolio</button></p>
									</div>';
					}
				} else{
					echo "Error: query did not execute";
				}
			}
			
			if($str == ""){
				echo "No results found";
			} else{
				echo $str;
			}
		?>
    </div>

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

    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>