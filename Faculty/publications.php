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
            <a class="nav-link" href="stat_F.html" >View Statistics</a>
        </li>

    </ul>
</nav>
<div class="jumbotron jumbotron-fluid" id="jumbotron">
    <div class="container" id="centered">
        <h1><b>My Publications</b></h1>
    </div>
</div>

<?php
require('../dbConnect.php');

$email = $_SESSION['Email'];

$idQuery = "SELECT `ID` FROM `SUser` WHERE Email='$email'";
$idResult = mysqli_query($link, $idQuery);

$row = mysqli_fetch_array($idResult);
$facID = $row['ID'];

$query = "SELECT `PublicationID` FROM `PublicationFacultyLink` WHERE FacultyID = '$facID'";
$result = mysqli_query($link, $query);

echo '<div style="margin: 30px">';
echo '<table class="table table-hover table-responsive">
								<thead>
									<tr>
									    <th valign="middle">Publication Type</th>
										<th valign="middle">Title</th>
										<th valign="middle">Author</th>
										<th valign="middle">Abstract</th>
										<th valign="middle">Publisher</th>
										<th valign="middle">Pages</th>
										<th valign="middle">Month</th>
										<th valign="middle">Year</th>
									</tr>
								</thead>
								<tbody>';

while($row = mysqli_fetch_array($result)) {

    $pubID = $row['PublicationID'];

    $query = "SELECT * FROM Publication WHERE PublicationID = '$pubID'";


    if ($result2 = mysqli_query($link, $query)) {

        if (mysqli_num_rows($result2) > 0) {
            // output data of each row

            $count = 1;
            while ($row = mysqli_fetch_array($result2)) {
                echo '<tr><td valign="middle">' . $row["PublicationType"] .
                    '</td><td valign="middle">' . $row["Title"] . '</td><td valign="middle">' . $row["Author"] .
                    '</td><td valign="middle">' . $row["Abstract"] .
                    '</td><td valign="middle">' . $row["Publisher"] .
                    '</td><td valign="middle">' . $row["Pages"] .
                    '</td><td valign="middle">' . $row["Month"] .
                    '</td><td valign="middle">' . $row["Year"] .
                    '</td>';
            }

        }
        mysqli_free_result($result2);
    }
}
echo "</tbody></table>";
echo '</div>';
mysqli_close($link);
?>

<a href="addPub.php" class="btn btn-primary" role="button" style="margin-left: 89%">Add new publication</a>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>