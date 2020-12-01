<?php
session_start();
if (isset($_SESSION['Email'])){
    if($_SESSION['Flag'] != 1)
    {
        header("location: ../error/");
    }
}
else{
    header("location: ../error/");
}
?>