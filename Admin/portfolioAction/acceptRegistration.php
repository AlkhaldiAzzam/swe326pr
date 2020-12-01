<?php

require("../../dbConnect.php");

		//get the q parameter from URL
		$q=$_GET["q"];
		$sql = 'UPDATE SUser SET Flag=1 WHERE ID="'.$q.'"';
	
		$result = mysqli_query($link, $sql);

		//mysqli_free_result($result);
		mysqli_close($link);
?>