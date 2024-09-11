<?php
include_once 'config.php';
include_once 'backend/function.php';
?>
<?php include 'page/header.php'; ?>

    <form action="backend/Logout.php" method="post">
        <h1>This is the Dashboard</h1>
    </form>
	
	 <script>
        document.addEventListener('DOMContentLoaded', function () {
            <?php if (ClearSwal() === 'success'):
                $stmt = GetCustom("SELECT FirstName FROM EMPLOYEE WHERE EmployeeID = ?;", array($EmployeeID));
                ?>
                Swal.fire({
                    title: 'Login Successful',
                    text: 'Welcome back! ' + <?php echo json_encode($stmt['FirstName']); ?>,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            <?php endif; ?>
        });
    </script>

<?php include 'page/footer.php'; ?>