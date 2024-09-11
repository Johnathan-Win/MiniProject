<?php
include_once 'config.php';
include_once 'backend/function.php';
session_start();

if (isset($_SESSION['ok']) && $_SESSION['ok'] === true) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($Title); ?></title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
    <link rel="stylesheet" href="CSS/Login.css" type="text/css">
    <link rel="stylesheet" href="CSS/footer.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="main">
        <form action="backend/login.php" method="post" class="Login">
            <h1>LOGIN</h1>
                <label>Username:</label>
                <input type="text" name="username" id="username" required>
                <label>Password:</label>
                <input type="password" name="password" id="password" required> <br>
                <input type="submit" value="Login">
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            <?php if (ClearSwal() === 'error'): ?>
                Swal.fire({
                    title: 'Login Failed',
                    text: 'Invalid email or password. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            <?php endif; ?>
        });
    </script>

    <?php include 'page/footer.php'; ?>
</body>

</html>
