<?php
//why is this important? Why does localhost have to be first?
//this is localhost, user name, password, and the database. They have to be in order for the database to even exits
$mysqli = new mysqli("localhost","root", "root", "todo2");
//$mysqli->connect_error then we want it to die and have this message
if($mysqli->connect_error){
die('Connect Error(' . $mysqli->connect_errno .')'
	.$mysqli->connect_error);
}
else{
//	echo "Connection Made";
}
$mysqli->close();
?>