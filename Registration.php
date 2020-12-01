<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FR Portfolio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="script/registration.js"></script>

</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" id="centered">
        <a class="navbar-brand" id="logo" href="#">FR<br>Portfolio</a>
        <div class="container-fluid" id="moreRight">
        <ul class="navbar-nav" >
            <li class="nav-item" >
                <a class="nav-link" href="index.php" >Homepage</a>
            </li>
            <li class="nav-item" >
                <a class="nav-link" href="#" >View Statistics</a>
            </li>
        </ul>
        </div>
    </nav>
    <div class="jumbotron jumbotron-fluid" id="jumbotron">
        <div class="container" id="centered">
            <h1>Registration</h1>
        </div>
    </div>

    
    <div class="container">
    <form class="form-horizontal" role="form" method="POST" action="Registration.php" id="centered" name="regForm" onsubmit="return validateForm()">
        

       <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="ID" id="labelRight">ID:</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="ID" class="form-control" id="ID" placeholder="201234560" required autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle" id="IDValid">
                            <!-- Put name validation error messages here -->
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="FName" id="labelRight">First name:</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="FName" class="form-control" id="FName"
                               placeholder="Hamdi" required autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle" id="FNameValid">
                            <!-- Put name validation error messages here -->
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="LName" id="labelRight">Last name:</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="LName" class="form-control" id="LName"
                               placeholder="Aljamimi" required autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle" id="LNameValid">
                            <!-- Put name validation error messages here -->
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="Email" id="labelRight">E-Mail Address:</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                        <input type="text" name="Email" class="form-control" id="Email"
                               placeholder="you@example.com" required autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle" id="EmailValid">
                            <!-- Put e-mail validation error messages here -->
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="Pswrd" id="labelRight">Password:</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                        <input type="password" name="Pswrd" class="form-control" id="Pswrd"
                               placeholder="Password" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle" id="PswrdValid">
                            
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="PswrdConf" id="labelRight">Confirm Password:</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                            <i class="fa fa-repeat"></i>
                        </div>
                        <input type="password" name="PswrdConf" class="form-control"
                               id="PswrdConf" placeholder="Re-write password" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle" id="PswrdMatch">
                            
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="regReason" id="labelRight">Portfolio Description:</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem; height: 10rem"><i class="fa fa-user"></i></div>
                        <textarea type="text" name="regReason" class="form-control" id="regReason"
                                required autofocus></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle" id="regReasonValid">
                            <!-- Put name validation error messages here -->
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-outline-primary"><i class="fa fa-user-plus"></i> Register</button>
            </div>
        </div>
        <?php

        if(isset($_POST['ID'])){
            require_once('dbConnect.php');

            $id = mysqli_real_escape_string($link, $_POST['ID']);
            $fName = mysqli_real_escape_string($link, $_POST['FName']);
            $lLame = mysqli_real_escape_string($link, $_POST['LName']);
            $email = mysqli_real_escape_string($link, $_POST['Email']);
            $pswrd = mysqli_real_escape_string($link, $_POST['Pswrd']);
            $regReason = mysqli_real_escape_string($link, $_POST['regReason']);
            $flag = 2;

            $sql = "INSERT INTO SUser (ID, FName, LName, Email, Pswrd, regReason, Flag) VALUES ('$id', '$fName', '$lLame', '$email', '$pswrd', '$regReason', '$flag')";

            if (mysqli_query($link, $sql)) {
                echo "<script>window.location.href='redirect.html';</script>";
                /*ob_start();
                header('Location: index.php');
                ob_end_flush();*/
                //exit;
            } else{
                //echo "ERROR: " . mysqli_error($link);
                $idError = "Duplicate entry '" . $id . "' for key 'PRIMARY'";
                $fNameError = "Duplicate entry '" . $fName . "' for key 'FName'";
                if (strcmp(mysqli_error($link), $idError) == 0) {
                    echo '<div class="alert alert-danger"> <strong>Duplicate!</strong> The ID you have entered already exists </div>';
                } else if (strcmp(mysqli_error($link), $fNameError) == 0) {
                    echo '<div class="alert alert-danger"> <strong>Duplicate!</strong> The First Name you have entered already exists </div>';
                }
            }

            mysqli_close($link);
        }
        ?>
    </form>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>