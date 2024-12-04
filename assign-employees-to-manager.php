<?php
require_once("util-db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $manager_id = $_POST['manager_id'];
    $employee_ids = $_POST['employee_ids'];

    try {
        $conn = get_db_connection();

        // Remove existing assignments
        $stmt = $conn->prepare("DELETE FROM hw3.manager_employee WHERE manager_id = ?");
        $stmt->bind_param("i", $manager_id);
        $stmt->execute();

        // Add new assignments
        $stmt = $conn->prepare("INSERT INTO hw3.manager_employee (manager_id, employee_id) VALUES (?, ?)");
        foreach ($employee_ids as $employee_id) {
            $stmt->bind_param("ii", $manager_id, $employee_id);
            $stmt->execute();
        }

        $conn->close();
        echo "<script>alert('Employees assigned successfully!'); window.location.href = 'managers-with-employees.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error assigning employees: " . $e->getMessage() . "');</script>";
    }
}
?>
