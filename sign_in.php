<?php

session_start(); //Start the Session

require('dbConnect.php');


if (isset($_POST['Email']) and isset($_POST['Pswrd'])){
    $email = $_POST['Email'];
    $pswrd = $_POST['Pswrd'];
    //Checking the values are existing in the database or not
    $query = "SELECT * FROM SUser WHERE Email='$email' and Pswrd='$pswrd'";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    $count = mysqli_num_rows($result);

    if ($count == 1){
        $flagQuery = "SELECT Flag FROM SUser WHERE  Email='$email' and Pswrd='$pswrd'"; // to check the flag of the user
        $flagResult = mysqli_query($link, $query) or die(mysqli_error($link));
        $row = mysqli_fetch_row($flagResult);
        if ($row[16] == 0){
            $_SESSION['Email'] = $email;
            $_SESSION['Flag'] = 0;
            header('Location: Admin/index.php');
        }else if ($row[16] == 1) {
            $_SESSION['Email'] = $email;
            $_SESSION['Flag'] = 1;
            header('Location: Faculty/faculty.php');
        }else {
            echo "'<script type='text/javascript'>alert('Your account has not been approved yet. Wait for 24 hours for approval');</script>'";
            echo "<script>window.location.href='index.php';</script>";
        }


    }else{// the login credentials doesn't match
        $fmsg = "Wrong email or password";
        echo '<div class="alert alert-danger">Wrong email or password</div>';

    }
}
// if the user is logged in Greets the user with message
/*if (isset($_SESSION['Email'])){
    $email = $_SESSION['Email'];
    echo "Welcome " . $email . "";
    echo "This is the Members Area";
    echo "<a href='logout.php'>Logout</a>";
}else {
    echo mysqli_error($link);
}*/

?>