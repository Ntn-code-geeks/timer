<?php

$host='localhost';
$username='root';
$password='';
$db_name='timer';

$conn = mysqli_connect($host,$username,$password,$db_name);

if(mysqli_connect_errno()){
	echo "Connection Error". $conn->mysqli_error();
}

date_default_timezone_set('Asia/Kolkata');

?>