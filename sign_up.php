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
        header('Location: redirect.html');
        exit;
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