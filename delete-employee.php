<?php
require_once("util-db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("DELETE FROM hw3.employee WHERE employee_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $conn->close();
        echo "<script>alert('Employee deleted successfully!'); window.location.href = 'employees.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error deleting employee: " . $e->getMessage() . "');</script>";
    }
}
?>
