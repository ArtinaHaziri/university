<?php
session_start();

include_once('config.php');

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$username = $_POST['username'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	if (empty($name) || empty($subject) || empty($subject)) {

		echo "Please fill in all fields
			";
	} else {

		$sql = "INSERT INTO contact(name,username,subject,messages) VALUES (:name, :username, :subject, :message)";

		$insertSql = $conn->prepare($sql);


		$insertSql->bindParam(':name', $name);
		$insertSql->bindParam(':username', $username);
		$insertSql->bindParam(':subject', $subject);
		$insertSql->bindParam(':message', $message);

		$insertSql->execute();

		header("Location: index.php");
	}
}