<?php
	require("../adminAuth.php");
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
				xmlhttp.open("GET","searchAjax.php?q="+str,true);
				xmlhttp.send();
			}
			
			function copy(e){
				var x = document.getElementById("tt");
				x.value=e.innerHTML;
				showResult(e.innerHTML);
			}
			
			function getSearchResult(){
				var x = document.getElementById("tt").value;
				
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				} else {  // code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function() {
					if (this.readyState==4 && this.status==200) {
						document.getElementById("tableContainer").innerHTML=this.responseText;
						document.getElementById("tableContainer").style.border="1px solid #A5ACB2";
					}
				}
				xmlhttp.open("GET","searchResult.php?q="+x,true);
				xmlhttp.send();
			}
			
			function deletePortfolio(e){
				var x = "-"+e.id;
				x = document.getElementById(x).innerHTML;
				
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				} else {  // code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function() {
					if (this.readyState==4 && this.status==200) {
						document.getElementById("tableContainer").innerHTML=this.responseText;
						document.getElementById("tableContainer").style.border="1px solid #A5ACB2";
					}
				}
				xmlhttp.open("GET","delete.php?q="+x,true);
				xmlhttp.send();
				alert("Successful deletion");
				window.location.replace("deletePortfolio.php");
			}
		</script>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" id="centered">
        <a class="navbar-brand" id="logo" href="#">FR<br>Portfolio</a>


        <ul class="navbar-nav" style="margin-left: 800px">
            <li class="nav-item">
                <a class="nav-link">Welcome Admin!</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../sign_out.php">Sign out</a>
            </li>
        </ul>
    </nav>


    <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:200px;">
        <a href="../" class="w3-bar-item w3-button">System Statistics</a>
        <button class="w3-button w3-block w3-left-align" onclick="myAccFunc()">
  Portfolio <i class="fa fa-caret-down"></i>
  </button>
        <div id="demoAcc" class="w3-hide w3-white w3-card">
            <a href="../addPortfolio.html" class="w3-bar-item w3-button">Add Portfolio</a>
            <a href="../updatePortfolio.php" class="w3-bar-item w3-button">Update Portfolio</a>
            <a href="../portfolioAction/deletePortfolio.php" class="w3-bar-item w3-button">Delete Portfolio</a>
            <a href="../portfolioAction/" class="w3-bar-item w3-button">Approve Portfolio Request</a>
        </div>
        <a href="../notification/" class="w3-bar-item w3-button">Send Notification</a>
    </div>
    
	<div class="search-container">
		<form style="width: 250px; padding-left: 100px">
			<div class="form-group" style="display: inline">
				<input id="tt" type="text" onkeyup="showResult(this.value)" placeholder="Enter faculty first name..." size="80">
				<button type="button" class="btn btn-primary" onclick="getSearchResult()" style="margin-left: 430%">Search</button>
				<div id="livesearch" class="widthy" style="padding-right: 635px; margin-top: -25%"></div>
			</div>
		</form>
	</div>
	<div class="container" id="tableContainer" style="margin-left:200px"></div>	
</body>

</html>