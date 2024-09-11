<?php
include_once 'backend/function.php';
session_start();

$query = "SELECT Status FROM Employee WHERE EmployeeID = ?";
$param = array($EmployeeID);
$stmt = GetCustom($query, $param);

if ($stmt && isset($stmt['Status'])) {
    $empStatus = $stmt['Status'];
    $permissions = str_split($empStatus);
} else {
    include_once 'backend/logout.php';
}

$current_page = basename($_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <title><?php echo htmlspecialchars($Title); ?></title>
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
    <link rel="stylesheet" href="CSS/Login.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="topnav">
        <a href="dashboard.php" class="<?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>">Home</a>
        
        <?php if (isset($permissions[0]) && $permissions[0] == '1') { ?>
            <a href="about.php" class="<?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">About</a>
        <?php } ?>
        
        <?php if (isset($permissions[1]) && $permissions[1] == '1') { ?>
            <a href="contact.php" class="<?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact</a>
        <?php } ?>
        
        <?php /*if (isset($permissions[2]) && $permissions[2] == '1') { ?>
            <div class="dropdown">
                <button class="dropbtn <?php echo ($current_page == 'EMP.php' || $current_page == 'add_employee.php') ? 'active' : ''; ?>">Employee Management</button>
                <div class="dropdown-content">
                    <a href="EMP.php" class="<?php echo ($current_page == 'EMP.php') ? 'active' : ''; ?>">View Employees</a>
                    <a href="add_employee.php" class="<?php echo ($current_page == 'add_employee.php') ? 'active' : ''; ?>">Add Employee</a>
                </div>
            </div>
        <?php } */?>
		
		<?php if (isset($permissions[2]) && $permissions[2] == '1') { ?>
		 <a href="EMP.php" class="dropbtn <?php echo ($current_page == 'EMP.php' || $current_page == 'add_employee.php') ? 'active' : ''; ?>">Employee Management</a>
		<?php }?>
		
		<a class="logout" href="backend/Logout.php" >Logout</a>
		
		
	</div>
</body>
</html>
