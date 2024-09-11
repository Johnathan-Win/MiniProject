<?php
include 'function.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if (GetUsers($username, $password)) {
        $_SESSION["username"] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['ok'] = true;
        $_SESSION['login_status'] = 'success';
        header("Location: ../index.php");
    } else {
        $_SESSION['login_status'] = 'error';
        header("Location: ../index.php");
    }
    exit(); 
}
