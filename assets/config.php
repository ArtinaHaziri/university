<?php
$user="root";
$pass="";
$server="localhost";
$dbname="e3a";
try {
	$conn =new PDO("mysql:host=$server;dbname=$dbname",$user,$pass);
} catch (PDOException $e) {
	echo "error: " . $e->getMessage();
}

?>