<?php
require('facultyAuth.php');


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
    
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <script src="script/Charts.js"></script>
    <script src="script/signIn.js"></script>

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

        function copy(e){
            var x = document.getElementById("tt");
            x.value=e.innerHTML;
            showResult(e.innerHTML);
        }
    </script>

</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" id="centered">
        <a class="navbar-brand" id="logo" href="faculty.php">FR<br>Portfolio</a>
        

        
        
        <!--<script src="script/signIn.js" type="application/javascript"></script>-->
        
        <ul class="navbar-nav" >
           <li class="nav-item" >
                <a class="nav-link" href="faculty.php" >Home</a>
            </li>
            <li class="nav-item dropdown" style="margin-right: 50em">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    My Portfolio
                  </a>
                <div class="dropdown-menu" >
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="publications.php">Publications</a>
                </div>
            </li>
            <li class="nav-item" >
                <a class="nav-link" href="sign_out.php" >Sign Out</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="stat.php" >View Statistics</a>
            </li>
            
        </ul>
    </nav>
    <div class="jumbotron jumbotron-fluid" id="jumbotron">
        <div class="container" id="centered">
            <h1><b>Welcome To</b></h1>
            <h1><b>Faculty Research Portfolio</b></h1>
        </div>
    </div>


    <form  method="POST" action="search-result.php" id="centered" style="padding-top: 50px">
        <div class="form-group" >
            <input type="text" id="tt" onkeyup="showResult(this.value)" name="searchBar"  placeholder="Enter keywords, or faculty name" size="80">
            <select name="droplist" id="searchBy">
                <option value=1>Publication</option>
                <option value=2>Faculty</option>
            </select>
            <button type="submit" class="btn btn-primary" >Search</button>
        </div>
        <div id="livesearch" class="widthy" ></div>
    </form>
    
    

   

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>