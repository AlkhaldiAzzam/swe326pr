<?php
require("../dbConnect.php");

$ID = $_POST["ID"];
$FName = $_POST["FName"];
$LName = $_POST["LName"];
$Email = $_POST["Email"];
$Pswrd = $_POST["Pswrd"];


$sql = "INSERT INTO `SUser` (`FName`, `LName`, `ID`, `Email`, `Pswrd`, `Flag`) VALUES ('$FName', '$LName', '$ID', '$Email', '$Pswrd', '1')";


if($result = mysqli_query($link, $sql)){
	echo "Portfolio added successfuly";
}
else{
	echo "ERROR: Could not execute $sql ";
}
//mysqli_free_result($result);
mysqli_close($link);
header("Refresh:1; url=addPortfolio.html")

?>