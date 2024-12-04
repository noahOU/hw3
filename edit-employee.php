<?php
require_once("util-db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE hw3.employee SET employee_name = ?, email = ? WHERE employee_id = ?");
        $stmt->bind_param("ssi", $name, $email, $id);
        $stmt->execute();
        $conn->close();
        echo "<script>alert('Employee updated successfully!'); window.location.href = 'employees.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error updating employee: " . $e->getMessage() . "');</script>";
    }
} else {
    $id = $_GET['id'];
    $conn = get_db_connection();
    $stmt = $conn->prepare("SELECT * FROM hw3.employee WHERE employee_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $conn->close();
}
?>

<h1>Edit Employee</h1>
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $result['employee_id']; ?>">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $result['employee_name']; ?>" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $result['email']; ?>" required>
    <br>
    <button type="submit">Update Employee</button>
</form>
