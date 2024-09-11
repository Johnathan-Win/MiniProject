<?php 
$Title = "RentRooms";

/*Ip Config*/
function connectDb()
{
	$connectionInfo = array("Database" => "RESERVE_ROOM", "UID" => "sa", "PWD" => "Jkh9hBQUzThSUW78MatheXZq#2dscTeDcQ!ZRn3rGb4aBMAy6JBEY37KxP3#MzkfI", "CharacterSet" => "UTF-8");
	$conn = sqlsrv_connect("147.50.253.87,4545", $connectionInfo);

	if (!$conn) {
		$errors = sqlsrv_errors();
		$errorMsg = "Connection failed: ";
		foreach ($errors as $error) {
			$errorMsg .= $error['message'] . " ";
		}
		die($errorMsg);
	}
	return $conn;
}

