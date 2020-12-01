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
        <h1><b>My Profile</b></h1>
    </div>
</div>

<div class="container">
    <div class="row m-y-2">
        <div class="col-lg-4 pull-lg-8 text-xs-center">
            <?php

            require('../dbConnect.php');

            $email = $_SESSION['Email'];

            $query = "select * from `SUser` where Email='$email'";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_array($result);
                echo '<img src="' . $row['Photo'] . '" class="rounded-circle" width="250">';
            }
            ?>
        </div>
        <div class="col-lg-8 push-lg-4">
            <div class="tab-content p-b-3">
                <div class="tab-pane active" id="profile">
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                <?php

                                $email = $_SESSION['Email'];

                                $query = "select * from `SUser` where Email='$email'";
                                $result = mysqli_query($link, $query);
                                if (mysqli_num_rows($result) == 1) {

                                    $row = mysqli_fetch_row($result);
                                    echo "<h2><b>$row[0] $row[1]</b></h2>";
                                }
                                ?>
                            </p>

                            <h4><b>Bio:</b></h4>
                            <p>
                                <?php

                                $email = $_SESSION['Email'];

                                $query = "select * from `SUser` where Email='$email'";
                                $result = mysqli_query($link, $query);
                                if (mysqli_num_rows($result) == 1) {

                                    $row = mysqli_fetch_array($result);
                                    $bio = $row['Bio'];
                                    echo "<p> $bio </p>";
                                }
                                ?>
                            </p>
                            <br>
                            <h4><b>Academic Information:</b></h4>
                            <p>
                                <?php

                                $email = $_SESSION['Email'];

                                $query = "select * from `SUser` where Email='$email'";
                                $result = mysqli_query($link, $query);
                                if (mysqli_num_rows($result) == 1) {

                                    $row = mysqli_fetch_array($result);
                                    $dep = $row['Department'];
                                    $deg = $row['Educatoin'];
                                    $expYears = $row['ExperienceYears'];
                                    echo "<p> Department: $dep</p>";
                                    echo "<p> Degree: $deg</p>";
                                    echo "<p> Experience Years: $expYears</p>";
                                }
                                ?>
                            </p>

                            <br>

                            <h4><b>Area of Expertise:</b></h4>
                            <p>
                                <?php

                                $email = $_SESSION['Email'];

                                $query = "select * from `SUser` where Email='$email'";
                                $result = mysqli_query($link, $query);
                                if (mysqli_num_rows($result) == 1) {

                                    $row = mysqli_fetch_array($result);
                                    $expArea = $row['Expertise'];
                                    echo "<p>$expArea</p>";
                                }
                                ?>
                            </p>
                        </div>

                        <div class="col-md-6">
                            <h4><b>Contact Information:</b></h4>
                            <p>
                                <?php

                                $email = $_SESSION['Email'];

                                $query = "select * from `SUser` where Email='$email'";
                                $result = mysqli_query($link, $query);
                                if (mysqli_num_rows($result) == 1) {

                                    $row = mysqli_fetch_array($result);
                                    $phone = $row['PhoneNo'];
                                    $office = $row['OfficeLocation'];
                                    echo "<p>Email: $email</p>";
                                    echo "<p>Phone Number: $phone</p>";
                                    echo "<p>Office Location: $office</p>";
                                }
                                ?>
                            </p>
                            <hr>
                            <p>
                                <?php

                                $email = $_SESSION['Email'];

                                $query = "select * from `SUser` where Email='$email'";
                                $result = mysqli_query($link, $query);
                                if (mysqli_num_rows($result) == 1) {

                                    $row = mysqli_fetch_array($result);
                                    $website = $row['Website'];
                                    echo "Personal website: <a class='nav-link' href='$website' >$website</a>";
                                }
                                ?>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <h4 class="m-t-2"><span class="fa fa-clock-o ion-clock pull-xs-right"></span> Recent Publications</h4>
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
								<tbody>';

                            while($row = mysqli_fetch_array($result)) {

                                $pubID = $row['PublicationID'];

                                $query = "SELECT * FROM Publication WHERE PublicationID = '$pubID'";


                                if ($result2 = mysqli_query($link, $query)) {

                                    if (mysqli_num_rows($result2) > 0) {
                                        // output data of each row

                                        $count = 1;
                                        while ($row = mysqli_fetch_array($result2)) {
                                            echo '<tr><td>' . $row["Title"] . '</td></tr> <tr>';
                                        }

                                    }
                                    mysqli_free_result($result2);
                                }
                            }
                            echo "</tbody></table>";
                            mysqli_close($link);
                            ?>
                        </div>
                    </div>
                    <!--/row-->
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<a href="editProfile.php" class="btn btn-primary" role="button" style="margin-left: 90%">Edit Profile</a>

<p></p>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>