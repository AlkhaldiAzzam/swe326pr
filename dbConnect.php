<?php
    $link = mysqli_connect("localhost", "root", "", "FR_Portfolio");

    $error = mysqli_connect_error();
    print $error;
    if ($error != null) {
        $output = "<p>Unable to connect to the database</p>" . $error ;
        exit($output);
    }
?>