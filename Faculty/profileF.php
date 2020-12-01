
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
            <a class="nav-link" href="stat.php" >View Statistics</a>
        </li>

    </ul>
</nav>


<?php
$fName = $_GET['q'];

require('../dbConnect.php');

$query = "select * from `SUser` where FName='$fName'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);


?>
<div class="jumbotron jumbotron-fluid" id="jumbotron">
    <div class="container" id="centered">
        <?php
        echo "<h1><b>$row[0] $row[1]</b></h1>";
        ?>
        <h1><b>Portfolio</b></h1>
    </div>

</div>


<div class="container" style="margin-right: 200px">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
        </li>
        <li class="nav-item">
            <a href="" data-target="#publications" data-toggle="tab" class="nav-link">Publications</a>
        </li>
    </ul>
    <div class="tab-content p-b-3">
        <div class="tab-pane active" id="profile">
            <div class="row">
                <div class="col-md-6">
                    <div class="col-lg-4 pull-lg-8 text-xs-center">
                        <?php

                        echo '<img src="' . $row['Photo'] . '" class="rounded-circle" width="250">';

                        ?>
                    </div>
                </div>
                <div class="col-md-10">
                    <p>
                        <?php
                        echo "<h2><b>$row[0] $row[1]</b></h2>";

                        ?>
                    </p>

                    <h4><b>Bio:</b></h4>
                    <p>
                        <?php
                        $bio = $row['Bio'];
                        echo "<p> $bio </p>";
                        ?>
                    </p>
                    <br>
                    <h4><b>Academic Information:</b></h4>
                    <p>
                        <?php

                        $dep = $row['Department'];
                        $deg = $row['Educatoin'];
                        $expYears = $row['ExperienceYears'];
                        echo "<p> Department: $dep</p>";
                        echo "<p> Degree: $deg</p>";
                        echo "<p> Experience Years: $expYears</p>";

                        ?>
                    </p>

                    <br>

                    <h4><b>Area of Expertise:</b></h4>
                    <p>
                        <?php
                        $expArea = $row['Expertise'];
                        echo "<p>$expArea</p>";

                        ?>
                    </p>
                </div>

                <div class="col-md-6">
                    <h4><b>Contact Information:</b></h4>
                    <p>
                        <?php
                        $email = $row['Email'];
                        $phone = $row['PhoneNo'];
                        $office = $row['OfficeLocation'];
                        echo "<p>Email: $email</p>";
                        echo "<p>Phone Number: $phone</p>";
                        echo "<p>Office Location: $office</p>";

                        ?>
                    </p>
                    <hr>
                    <p>
                        <?php
                        $website = $row['Website'];
                        echo "Personal website: <a class='nav-link' href='$website' >$website</a>";

                        ?>
                    </p>
                </div>
            </div>
            <!--/row-->
        </div>
        <div class="tab-pane" id="publications">
            <?php
            $idQuery = "SELECT `ID` FROM `SUser` WHERE FName='$fName'";
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
        </div>
    </div>
</div>
<hr>

<p></p>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>