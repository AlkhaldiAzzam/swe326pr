<?php
 session_start(); //Start the Session
 require('dbConnect.php');

 if (isset($_SESSION['Email'])){
     if ($_SESSION['Flag'] == 0) {
         header('Location: Admin');
     }else if ($_SESSION['Flag'] == 1) {
         header('Location: Faculty/faculty.php');
     }
 }

 $numOfArticlesSQL = "SELECT PublicationType, COUNT(*) 
                        FROM Publication
                        GROUP BY PublicationType";
    $numOfArticles = mysqli_query($link, $numOfArticlesSQL);
    $row = mysqli_fetch_array($numOfArticles);
    $Article = $row[1];
    $row = mysqli_fetch_array($numOfArticles);
    $Book = $row[1];
    $row = mysqli_fetch_array($numOfArticles);
    $BookChapter = $row[1];
    $row = mysqli_fetch_array($numOfArticles);
    $Conference = $row[1];
    $row = mysqli_fetch_array($numOfArticles);
    $MasterThesis = $row[1];
    $row = mysqli_fetch_array($numOfArticles);
    $Other = $row[1];
    $row = mysqli_fetch_array($numOfArticles);
    $PHDThesis = $row[1];
    $row = mysqli_fetch_array($numOfArticles);
    $Report = $row[1];
//    echo $Article;
    
    $regUsersSQL = "SELECT year(dateRegistered) AS year, month(dateRegistered) AS month, COUNT(*)
                    FROM SUser
                    GROUP BY year DESC, month DESC";
    $numOfUsers = mysqli_query($link, $regUsersSQL);
    $row = mysqli_fetch_array($numOfUsers);
    $year1 = $row[0];
    $month1 = $row[1];
    $month1Users = $row[2];
    $row = mysqli_fetch_array($numOfUsers);
    $year2 = $row[0];
    $month2 = $row[1];
    $month2Users = $row[2];
    $row = mysqli_fetch_array($numOfUsers);
    $year3 = $row[0];
    $month3 = $row[1];
    $month3Users = $row[2];
    $row = mysqli_fetch_array($numOfUsers);
    $year4 = $row[0];
    $month4 = $row[1];
    $month4Users = $row[2];
    $row = mysqli_fetch_array($numOfUsers);
    $year5 = $row[0];
    $month5 = $row[1];
    $month5Users = $row[2];
    $row = mysqli_fetch_array($numOfUsers);
    $year6 = $row[0];
    $month6 = $row[1];
    $month6Users = $row[2];


    $pubPerMonthSQL = "SELECT year(DateAddedToDB) AS pubYear, month(DateAddedToDB) AS pubMonth, COUNT(*)
                    FROM Publication
                    GROUP BY pubYear DESC, pubMonth DESC";
    $pubPerMonth = mysqli_query($link, $pubPerMonthSQL);
    $row = mysqli_fetch_array($pubPerMonth);
    $pubYear1 = $row[0];
    $pubMonth1 = $row[1];
    $month1Pub = $row[2];
    $row = mysqli_fetch_array($pubPerMonth);
    $pubYear2 = $row[0];
    $pubMonth2 = $row[1];
    $month2Pub = $row[2];
    $row = mysqli_fetch_array($pubPerMonth);
    $pubYear3 = $row[0];
    $pubMonth3 = $row[1];
    $month3Pub = $row[2];
    $row = mysqli_fetch_array($pubPerMonth);
    $pubYear4 = $row[0];
    $pubMonth4 = $row[1];
    $month4Pub = $row[2];
    $row = mysqli_fetch_array($pubPerMonth);
    $pubYear5 = $row[0];
    $pubMonth5 = $row[1];
    $month5Pub = $row[2];
    $row = mysqli_fetch_array($pubPerMonth);
    $pubYear6 = $row[0];
    $pubMonth6 = $row[1];
    $month6Pub = $row[2];

    
    $pubPerDepSQL = "SELECT Department, COUNT(*)
                    FROM Publication
                    GROUP BY Department";
    $pubPerDep = mysqli_query($link, $pubPerDepSQL);
    $row = mysqli_fetch_array($pubPerDep);
    $dep1 = $row[0];
    $numOfPub1 = $row[1];
    $row = mysqli_fetch_array($pubPerDep);
    $dep2 = $row[0];
    $numOfPub2 = $row[1];
    $row = mysqli_fetch_array($pubPerDep);
    $dep3 = $row[0];
    $numOfPub3 = $row[1];
    $row = mysqli_fetch_array($pubPerDep);
    $dep4 = $row[0];
    $numOfPub4 = $row[1];
    

    
//    echo "Hello";

    echo "<script>
    function numOfPub() {
    var ctx = document.getElementById('numOfPublication').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Article', 'Book', 'Book Chapter', 'Conference', 'Master Thesis', 'Other', 'PHD Thesis', 'Report'],
            datasets: [{
                label: 'Click to hide',
                data: ['$Article', '$Book', '$BookChapter', '$Conference', '$MasterThesis', '$Other', '$PHDThesis', '$Report'],
                backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(226, 255, 102, 0.2)',
                                'rgba(102, 255, 249, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(226, 255, 102, 1)',
                                'rgba(102, 255, 249, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                borderWidth: 1
                        }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                            }]
            }
        }
    });

}

function numOfUsers() {
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['$year6/$month6', '$year5/$month5', '$year4/$month4', '$year3/$month3', '$year2/$month2', '$year1/$month1'],
            datasets: [{
                label: 'Click to hide',
                data: [$month6Users, $month5Users, $month4Users, $month3Users, $month2Users, $month1Users],
                backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                borderWidth: 1
                        }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                            }]
            }
        }
    });

}

function numOfPubPerMonth() {
    var ctx = document.getElementById('myChart3').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['$pubYear6/$pubMonth6', '$pubYear5/$pubMonth5', '$pubYear4/$pubMonth4', '$pubYear3/$pubMonth3', '$pubYear2/$pubMonth2', '$pubYear1/$pubMonth1'],
            datasets: [{
                label: '# of Publications per month',
                data: [$month6Pub, $month5Pub, $month4Pub, $month3Pub, $month2Pub, $month1Pub],
                backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                borderWidth: 1
                        }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                            }]
            }
        }
    });

}

function numOfPubPerDepartment() {
    var ctx = document.getElementById('myChart4').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['$dep1', '$dep2', '$dep3', '$dep4'],
            datasets: [{
                label: '# of Publications per week',
                data: [$numOfPub1, $numOfPub2, $numOfPub3, $numOfPub4],
                backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)'
                            ],
                borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)'
                            ],
                borderWidth: 1
                        }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                            }]
            }
        }
    });

}
</script>";

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
        <a class="navbar-brand" id="logo" href="">FR<br>Portfolio</a>
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
    
    <div class="container" id="centered" style="padding-top: 100px">

       <div class="row">
        <div class="col" id="chart">
          <h5><b>Number of Publication Per Month</b></h5>
            <canvas id="myChart3" width="400" height="400"></canvas>
            <script>
                numOfPubPerMonth();
                
            </script>
           
        </div>
        <div class="col" id="chart">
           <h5><b>Number of New Users Per Month</b></h5>
            <canvas id="myChart" width="400" height="400"></canvas>
            <script>
               numOfUsers();

            </script>
        </div>
        </div>
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