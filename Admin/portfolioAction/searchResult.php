<?php
require '../../dbConnect.php';

//get the q parameter from URL
$q=$_GET["q"];
$sql = 'SELECT FName,LName,Email,ID FROM SUser WHERE Flag = "1" AND FNAME="'.$q.'"';
$response = "";
if($result = mysqli_query($link, $sql)){
	$response = '<table class="table table-hover table-responsive">
								<thead>
									<tr> 
										<th valign="middle">ID</th>
										<th valign="middle">First name</th>
										<th valign="middle">Last name</th>
										<th valign="middle">Email</th>
										<th valign="middle">Delete</th>
									</tr>
								</thead>
								<tbody>';
	$count = 1;
	while($row = mysqli_fetch_array($result)){
	//	$row = mysqli_fetch_array($result);
		$response = $response .'<tr> <td valign="middle">' . $row["ID"] . '</td><td valign="middle" id="-' . $count . '">' . 
		$row["FName"] . '</td><td valign="middle">' . $row["LName"] . '</td><td valign="middle">' . 
		$row["Email"] . '</td><td valign="middle"><input id="' . $count . '" onclick="deletePortfolio(this)" type="image" src="reject.png" /></td></tr>';
		//$response = $response .'<tr> <td valign="middle"> ' .$q. '</td></tr>';
		$count = $count +1;
	}
	$response = $response . '</tbody></table>';
}
//output the response
if($response == '<table class="table table-hover table-responsive">
								<thead>
									<tr>
										<th valign="middle">ID</th>
										<th valign="middle">First name</th>
										<th valign="middle">Last name</th>
										<th valign="middle">Email</th>
										<th valign="middle">Email</th>
										<th valign="middle">Delete</th>
									</tr>
								</thead>
								<tbody></tbody></table>'){
	echo "<p><b>No Result</b></p>";
}else{
	echo $response;
}
//mysqli_free_result($result);
mysqli_close($link);
?>