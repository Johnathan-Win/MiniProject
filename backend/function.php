<?php
include_once "../config.php";
session_start();
$conn = connectDb();

if (isset($_SESSION['username']))
    $EmployeeID = GetID($_SESSION['username']);
else{	
    $EmployeeID = null;
}

function GetStmtByBool($stmt)
{
    if ($stmt) {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return $row ? true : false;
    }
    return false;
}

function GetStmtByValue($stmt)
{
    if ($stmt) {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return $row ? $row : false;
    }
    return false;
}

function GetID($email)
{
    global $conn;
    $query = "SELECT EmployeeID FROM Accounts WHERE Username = ?";
    $param = array($email);
    $stmt = sqlsrv_query($conn, $query, $param);
    $result = GetStmtByValue($stmt);
    return $result ? $result['EmployeeID'] : false;
}

function GetUsers($email, $password)
{
    global $conn;
    $query = "SELECT 1 FROM Accounts WHERE Username = ? AND Password = ?";
    $param = array($email, $password);
    $stmt = sqlsrv_query($conn, $query, $param);
    return GetStmtByBool($stmt);
}

function GetCustom($query, $param)
{
    global $conn;
    $stmt = sqlsrv_query($conn, $query, $param);
    $result = GetStmtByValue($stmt);
    return $result ? $result : false;
}

function Init($location)
{
    if (!isset($_SESSION['ok']) || $_SESSION['ok'] === false) {
        header("Location:" . $location);
        exit();
    }
}

function ClearSwal()
{
    $loginStatus = isset($_SESSION['login_status']) ? $_SESSION['login_status'] : '';
    unset($_SESSION['login_status']);
    return $loginStatus;
}

function Search($quere, $param){
    global $conn;
    
}