<?php 
   require('../adminAuth.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>FR Portfolio</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/w3.css">

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
				xmlhttp.open("GET","ajax.php?q="+str,true);
				xmlhttp.send();
			}
			
			function copy(e){
				var x = document.getElementById("tt");
				x.value=e.innerHTML;
				//showResult(e.innerHTML);
				document.getElementById("livesearch").innerHTML = "";
			}
		</script>


</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" id="centered">
        <a class="navbar-brand" id="logo" href="../../">FR<br>Portfolio</a>
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

    <div class="container" style="padding-top: 100px; padding-left: 180px;">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form class="form-horizontal" method="post" name="notificationForm" action="test.php">
                        <fieldset style="padding-left: 200px;">
                            <legend class="text-center header"><b>Send Notification</b></legend>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input name="FName" id="tt" type="text" onkeyup="showResult(this.value)" placeholder="Name" class="form-control">
									<div id="livesearch" class="widthy" class="z-index: 1;"></div>
                                </div>

                            </div>

                            <div class="form-group">
                                <h5 style="margin-left: 2%">or</h5>
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input name="Allusers" type="checkbox" value="Allusers"> All users
                                </div>
                            </div>


                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <input name="Title" type="text" placeholder="Notification Title" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="Content" placeholder="Enter your massage here." rows="7"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                </div>
                            </div>
                            <p id="success" style="position: relative; right: 100px"></p>
                        </fieldset>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

</body>

</html>
