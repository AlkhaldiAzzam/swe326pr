<?php
session_start(); //Start the Session

require('../dbConnect.php');

if (isset($_POST['submit'])){


    $photo = $_POST['Photo'];
    $fName = mysqli_real_escape_string($link, $_POST['FName']);
    $lLame = mysqli_real_escape_string($link, $_POST['LName']);
    $email = mysqli_real_escape_string($link, $_POST['Email']);
    $phoneNo = mysqli_real_escape_string($link, $_POST['PhoneNo']);
    $officeLocation = mysqli_real_escape_string($link, $_POST['OfficeLocation']);
    $bio = mysqli_real_escape_string($link, $_POST['Bio']);
    $department = mysqli_real_escape_string($link, $_POST['Department']);
    $degree = mysqli_real_escape_string($link, $_POST['Educatoin']);
    $experience = $_POST['ExperienceYears'];
    $expertise = mysqli_real_escape_string($link, $_POST['Expertise']);
    $website = mysqli_real_escape_string($link, $_POST['Website']);

    $sql = "UPDATE `SUser` SET `FName`='$fName',`LName`='$lLame', `Email`='$email', `ExperienceYears`='$experience',`Expertise`='$expertise',`Bio`='$bio',`Department`='$department',`Educatoin`='$degree',`OfficeLocation`='$officeLocation',`PhoneNo`='$phoneNo',`Photo`='$photo',`Website`='$website' WHERE `ID`='$email'";

    if (mysqli_query($link, $sql)) {
        echo "<div class='alert alert-success'> <strong>Success!</strong> Changes has been saved successfully.  </div>";
        /*ob_start();
        header('Location: index.php');
        ob_end_flush();*/
        //exit;
    } else{
        echo 'error';
    }

    mysqli_close($link);

}
?>