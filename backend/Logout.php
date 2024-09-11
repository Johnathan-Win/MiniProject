<?php
session_start(); // Start the session to access session data

// Destroy all session variables
session_unset(); 

// Destroy the session
session_destroy(); 

// Optionally, destroy the session cookie (to prevent session reuse)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, 
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Redirect the user back to the login page
header("Location: ../index.php");
exit(); // Ensure that no further code is executed after redirection
