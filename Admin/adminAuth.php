<?php
    session_start();
if (isset($_SESSION['Flag'])){
    $flag = $_SESSION['Flag'];
    if($flag != "0")
    {
        header("location: ../error/");
    }
}
else{
    header("location: ../error/");
}
?>