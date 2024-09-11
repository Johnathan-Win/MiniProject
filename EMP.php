<?php
include_once 'config.php';
include_once 'backend/function.php';
session_start();

// Handle the Create Operation
if (isset($_POST['action']) && $_POST['action'] == 'create') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $tellNumber = $_POST['tellNumber'];
    $department = $_POST['department'];
    $position = $_POST['position'];

    $sql = "INSERT INTO Employee (FirstName, LastName, TellNumber, Department, Position, Email) VALUES (?, ?, ?, ?, ?, ?)";
    $params = array($firstName, $lastName, $tellNumber, $department, $position, $email);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "Record inserted successfully.";
    }
}

// Handle the Delete Operation
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM Employee WHERE EmployeeID = ?";
    $params = array($id);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "Record deleted successfully.";
    }
}

// Handle the Search Operation
$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM Employee WHERE FirstName LIKE ? OR LastName LIKE ? OR Department LIKE ? OR Position LIKE ?";
$params = array("%$search%", "%$search%", "%$search%", "%$search%");
$stmt = GetCustom($sql, $params);
?>

<?php include 'page/header.php'; ?>

<h1>Employee Management</h1>

<!-- Search Form -->
<form method="get" action="EMP.php">
    Search: <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>">
    <input type="submit" value="Search">
</form>

<!-- Create Form -->
<form method="post" action="EMP.php">
    <h2>Add New Employee</h2>
    <input type="hidden" name="action" value="create">
    First Name: <input type="text" name="firstName" required>
    Last Name: <input type="text" name="lastName" required>
    Tell Number: <input type="text" name="tellNumber" required>
    Department: <input type="text" name="department" required>
    Position: <input type="text" name="position" required>
    Email: <input type="email" name="email" required>
    <input type="submit" value="Add Employee">
</form>

<!-- Display Employee -->
<table border="1">
    <tr>
        <th>EmployeeID</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>TellNumber</th>
        <th>Department</th>
        <th>Position</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['EmployeeID']); ?></td>
            <td><?php echo htmlspecialchars($row['FirstName']); ?></td>
            <td><?php echo htmlspecialchars($row['LastName']); ?></td>
            <td><?php echo htmlspecialchars($row['TellNumber']); ?></td>
            <td><?php echo htmlspecialchars($row['Department']); ?></td>
            <td><?php echo htmlspecialchars($row['Position']); ?></td>
            <td><?php echo htmlspecialchars($row['Email']); ?></td>
            <td>
                <a href="EMP.php?action=delete&id=<?php echo htmlspecialchars($row['EmployeeID']); ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                <a href="edit.php?id=<?php echo htmlspecialchars($row['EmployeeID']); ?>">Edit</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
