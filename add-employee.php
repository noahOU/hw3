<?php
require_once("util-db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO hw3.employee (employee_name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();
        $conn->close();
        echo "<script>alert('Employee added successfully!'); window.location.href = 'employees.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error adding employee: " . $e->getMessage() . "');</script>";
    }
}
?>

<h1>Add Employee</h1>
<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" required>
    <br>
    <button type="submit">Add Employee</button>
</form>
