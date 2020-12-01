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


if (isset($_POST['submit'])) {



    $pubType = $_POST['PubType'];
    $title = mysqli_real_escape_string($link, $_POST['Title']);
    $author = mysqli_real_escape_string($link, $_POST['Author']);
    $abstract = mysqli_real_escape_string($link, $_POST['Abstract']);
    $year = $_POST['Year'];
    $month = $_POST['Month'];
    $publisher = mysqli_real_escape_string($link, $_POST['Publisher']);
    $pages = $_POST['Pages'];
    $keywords = mysqli_real_escape_string($link, $_POST['Keywords']);
    $dep = $_POST['Department'];
    $addDate = date("Y-m-d");

    $query = "INSERT INTO `Publication`(`PublicationID`, `PublicationType`, `Department`, `Title`, `Abstract`, `Author`, `Keywords`, `Month`, `Year`, `Publisher`, `Pages`, `DateAddedToDB`) VALUES (null, '$pubType','$dep','$title','$abstract','$author','$keywords','$month', '$year', '$publisher', '$pages', '$addDate')";

    if(mysqli_query($link, $query)) {
        $query = "SELECT `PublicationID` FROM `Publication` WHERE Title='$title'";
        $result = mysqli_query($link, $query);

        $row = mysqli_fetch_array($result);

        $pubID = $row['PublicationID'];

        $idQuery = "SELECT `ID` FROM `SUser` WHERE Email='$email'";
        $idResult = mysqli_query($link, $idQuery);

        $row = mysqli_fetch_array($idResult);
        $facID = $row['ID'];


        $query = "INSERT INTO `PublicationFacultyLink`(`FacultyID`, `PublicationID`) VALUES ('$facID', '$pubID')";

        if(mysqli_query($link, $query)) {
            echo '<div class="alert alert-success"><strong>Success!</strong> The publication has been added </div>';
        }

    }else {
        echo mysqli_error($link);
    }


}
?>


<div class="container py-3" style="align-content: center;">
    <div class="row" >
        <div class="mx-auto col-sm-6" >
            <div class="card" style="width: 800px">
                <div class="card-header">
                    <h4 class="mb-0">Publication Information</h4>
                </div>
                <div class="card-body">
                    <form class="form" role="form" autocomplete="off" method="post" enctype="multipart/form-data" action="addPub.php">


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Publication Type:</label>
                            <select class="form-control" style="width: 70%; margin-left: 20px" name="PubType" required>
                                <option></option>
                                <option>Journal Publication</option>
                                <option>Conference Publication</option>
                                <option>Book</option>
                                <option>Book Chapter</option>
                                <option>Technical Report</option>
                                <option>Ph.D. Dissertation</option>
                                <option>MS Thesis</option>
                                <option>Other Publications</option>
                            </select>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Title</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" placeholder="" name="Title" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Author</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" placeholder="" name="Author" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Abstract</label>
                            <div class="col-lg-9">
                                <textarea class="form-control" rows="5" name="Abstract" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Year</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="number"  name="Year" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Month</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="number"  name="Month" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Department</label>
                            <select class="form-control" style="width: 70%; margin-left: 20px" name="Department" required>
                                <option></option>
                                <option>ICS</option>
                                <option>SWE</option>
                                <option>COE</option>
                                <option>ISE</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Publisher</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" placeholder="" name="Publisher" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Pages</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="number" placeholder="" name="Pages" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Keywords</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" placeholder="" name="Keywords" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <a href="publications.php" class="btn btn-danger" role="button" style="margin-left: 72%">Cancel</a>
                                <input type="submit" class="btn btn-primary" name="submit" value="Save">
                            </div>
                        </div>





                        </div>
                    </form>
                </div>
            </div>
            <!-- /form user info -->
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>