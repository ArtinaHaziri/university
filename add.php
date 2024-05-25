<?php 
include_once('config.php');
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];
    $confirm_password = password_hash($confirm_password, PASSWORD_DEFAULT);

    if(empty($name || $username || $password || $confirm_password )) {
        echo "Please fill all the fields!";
    }

    else {
        $sql = "INSERT INTO users (name, username, password, confirm_password) VALUES (:name, :username, :password, :confirm_password)";

        $insertSql = $conn->prepare($sql);

        $insertSql->bindParam(':name', $name);
        $insertSql->bindParam(':username', $username);
        $insertSql->bindParam(':password', $password);
        $insertSql->bindParam(':confirm_password', $confirm_password);

        $insertSql->execute();
        header("Location: login.php");
    }
}

?>