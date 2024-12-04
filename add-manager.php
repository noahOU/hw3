<?php
require_once("util-db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $office_number = $_POST['office_number'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO hw3.manager (manager_name, office_number) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $office_number);
        $stmt->execute();
        $conn->close();
        echo "<script>alert('Manager added successfully!'); window.location.href = 'managers.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error adding manager: " . $e->getMessage() . "');</script>";
    }
}
?>
