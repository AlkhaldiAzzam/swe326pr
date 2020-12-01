<?php 
    require('../adminAuth.php');
    
    require("../../dbConnect.php");
    $FName = $_SESSION["FName"];
    

    if (isset($_POST['submit2'])) {

        

        if (isset($_POST['FName']) && !empty($_POST['FName'])){
            $fName = mysqli_real_escape_string($link, $_POST['FName']);
            $query = "update `SUser` set `FName`='".$fName."' WHERE FName='$FName'";
            mysqli_query($link, $query);

            if(mysqli_affected_rows($link) > 0) {
                $_SESSION["FName"] = $fName;
                echo '<div class="alert alert-success"><strong>Success!</strong> The first name has been changed </div>';
            }

        }

        if (isset($_POST['LName']) && !empty($_POST['LName'])){
            $lLame = mysqli_real_escape_string($link, $_POST['LName']);
            $query = "update `SUser` set `LName`='".$lLame."' WHERE FName='$FName'";
            mysqli_query($link, $query);
            if(mysqli_affected_rows($link) > 0) {
                echo '<div class="alert alert-success"><strong>Success!</strong> The last name has been changed </div>';
            }

        }

        if (isset($_POST['Email']) && !empty($_POST['Email'])){
            $neweEmail = mysqli_real_escape_string($link, $_POST['Email']);
            $query = "update `SUser` set `Email`='".$neweEmail."' WHERE FName='$FName'";
            mysqli_query($link, $query);
            if(mysqli_affected_rows($link) > 0) {
                echo '<div class="alert alert-success"><strong>Success!</strong> The email has been changed </div>';
            }

        }

        if (isset($_POST['PhoneNo']) && !empty($_POST['PhoneNo'])){

            $phoneNo = mysqli_real_escape_string($link, $_POST['PhoneNo']);
            $query = "update `SUser` set `PhoneNo`='".$phoneNo."' WHERE FName='$FName'";
            mysqli_query($link, $query);
            if(mysqli_affected_rows($link) > 0) {
                echo '<div class="alert alert-success"><strong>Success!</strong> The phone number has been changed </div>';
            }

        }

        if (isset($_POST['OfficeLocation']) && !empty($_POST['OfficeLocation'])){
            $officeLocation = mysqli_real_escape_string($link, $_POST['OfficeLocation']);
            $query = "update `SUser` set `OfficeLocation`='".$officeLocation."' WHERE FName='$FName'";
            mysqli_query($link, $query);
            if(mysqli_affected_rows($link) > 0) {
                echo '<div class="alert alert-success"><strong>Success!</strong> The office location has been changed </div>';
            }

        }

        if (isset($_POST['Bio']) && !empty($_POST['Bio'])){
            $bio = mysqli_real_escape_string($link, $_POST['Bio']);
            $query = "update `SUser` set `Bio`='".$bio."' WHERE FName='$FName'";
            mysqli_query($link, $query);
            if(mysqli_affected_rows($link) > 0) {
                echo '<div class="alert alert-success"><strong>Success!</strong> The bio has been changed </div>';
            }

        }

        if (isset($_POST['Department']) && !empty($_POST['Department'])){
            $department = mysqli_real_escape_string($link, $_POST['Department']);
            $query = "update `SUser` set `Department`='".$department."' WHERE FName='$FName'";
            mysqli_query($link, $query);
            if(mysqli_affected_rows($link) > 0) {
                echo '<div class="alert alert-success"><strong>Success!</strong> The department has been changed </div>';
            }

        }

        if (isset($_POST['Educatoin']) && !empty($_POST['Educatoin'])){
            $degree = mysqli_real_escape_string($link, $_POST['Educatoin']);
            $query = "update `SUser` set `Educatoin`='".$degree."' WHERE FName='$FName'";
            mysqli_query($link, $query);
            if(mysqli_affected_rows($link) > 0) {
                echo '<div class="alert alert-success"><strong>Success!</strong> The degree has been changed </div>';
            }

        }

        if (isset($_POST['ExperienceYears']) && !empty($_POST['ExperienceYears'])){
            $experience = $_POST['ExperienceYears'];
            $query = "update `SUser` set `ExperienceYears`='".$experience."' WHERE FName='$FName'";
            mysqli_query($link, $query);
            if(mysqli_affected_rows($link) > 0) {
                echo '<div class="alert alert-success"><strong>Success!</strong> Experience Years has been changed </div>';
            }

        }

        if (isset($_POST['Expertise']) && !empty($_POST['Expertise'])){
            $expertise = mysqli_real_escape_string($link, $_POST['Expertise']);
            $query = "update `SUser` set `Expertise`='".$expertise."' WHERE FName='$FName'";
            mysqli_query($link, $query);
            if(mysqli_affected_rows($link) > 0) {
                echo '<div class="alert alert-success"><strong>Success!</strong> The expertise area has been changed </div>';
            }

        }

        if (isset($_POST['Website']) && !empty($_POST['Website'])){
            $website = mysqli_real_escape_string($link, $_POST['Website']);
            $query = "update `SUser` set `Website`='".$website."' WHERE FName='$FName'";
            mysqli_query($link, $query);
            if(mysqli_affected_rows($link) > 0) {
                echo '<div class="alert alert-success"><strong>Success!</strong> The website has been changed </div>';
            }

        }

        if (isset($_FILES['Photo']['name']) && !empty($_FILES['Photo']['name'])) {
            $encoded_image = base64_encode(file_get_contents($_FILES['Photo']['tmp_name']));
            $ext = strtolower(pathinfo($_POST['Photo']['name'], PATHINFO_EXTENSION));

            $encoded_image = 'data:image/' . $ext . ';base64,' . $encoded_image;
            $query = "update `SUser` set `Photo`='".$encoded_image."' WHERE FName='$FName'";
            mysqli_query($link, $query);
            if(mysqli_affected_rows($link) > 0) {
                echo '<div class="alert alert-success"><strong>Success</strong> The photo has been uploaded </div>';
            } else {
                echo '<div class="alert alert-danger"><strong>Error</strong> The photo has not been changed </div>';
            }
        }

    }


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
            <a href="../../under/" class="w3-bar-item w3-button">Update Portfolio</a>
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

    
    <div class="container py-3" style="align-content: center;">
        <div class="row" >
            <div class="mx-auto col-sm-6" >
                <div class="card" style="width: 800px">
                    <div class="card-header">
                        <h4 class="mb-0">Faculty Information</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" role="form" autocomplete="off" method="post" enctype="multipart/form-data" action="updateForm.php">
                           
                           
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"><strong>Personal Info:</strong></label>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Photo</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="file" name="Photo" accept=".jpg, .jpeg, .png"  value="">


                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" placeholder="Hamdi" name="FName">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" placeholder="Aljamimi" name="LName">
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"><strong>Contact Info:</strong></label>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="email" placeholder="aljamimi@kfupm.edu.sa" name="Email">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Phone No.</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" placeholder="05XXXXXXXX" name="PhoneNo">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Office Location</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" placeholder="22-432" name="OfficeLocation">
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"><strong>Bio:</strong></label>
                            </div>
                            
                            <div class="form-group row">
                               <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" rows="5" name="Bio"></textarea>
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"><strong>Academic Info:</strong></label>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Department</label>
                                <select class="form-control" style="width: 70%; margin-left: 20px" name="Department">
                                        <option>ICS</option>
                                        <option>SWE</option>
                                        <option>COE</option>
                                        <option>ISE</option>
                                </select>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Degree</label>
                                <select class="form-control" style="width: 70%; margin-left: 20px" name="Educatoin">
                                        <option>Bachelor's</option>
                                        <option>Master's</option>
                                        <option>Doctor's</option>
                                </select>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Years of Experience</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="number" min="0" placeholder="20" name="ExperienceYears">
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"><strong>Area of Expertise:</strong></label>
                            </div>
                            
                            <div class="form-group row">
                               <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" rows="5" name="Expertise"></textarea>
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Website</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="url" placeholder="http://www.mywebsite.com" name="Website">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <a href="profile.php" class="btn btn-danger" role="button" style="margin-left: 54%">Cancel</a>
                                    <input type="submit" class="btn btn-primary" name="submit2" value="Save Changes">
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