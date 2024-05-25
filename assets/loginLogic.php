<?php
session_start();

include_once('config.php');

if (isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    if (empty($username) || empty($password)) {
        echo "Please fill in all fields";
    } else {
        $sql = "SELECT id, name, username, password, is_admin FROM users WHERE username=:username";

        $selectUser = $conn->prepare($sql);
        $selectUser->bindParam(":username", $username);
        $selectUser->execute();

        $data = $selectUser->fetch();

        if ($data == false) {
            logError("User not found");
            echo "Invalid username or password";
        } else {
            if (password_verify($password, $data['password'])) {
                $_SESSION['id'] = $data['id'];
                $_SESSION['name'] = $data['name'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['is_admin'] = $data['is_admin'];

                header('Location: index.php');
                exit;
            } else {
                logError("Invalid password");
                echo "Invalid username or password";
            }
        }
    }
}

function logError($message) {
    // Log the error to a file or a logging system
    error_log($message);
}