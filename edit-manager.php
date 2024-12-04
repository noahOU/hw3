<?php
require_once("util-db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $office_number = $_POST['office_number'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE hw3.manager SET manager_name = ?, office_number = ? WHERE manager_id = ?");
        $stmt->bind_param("ssi", $name, $office_number, $id);
        $stmt->execute();
        $conn->close();
        echo "<script>alert('Manager updated successfully!'); window.location.href = 'managers.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error updating manager: " . $e->getMessage() . "');</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'managers.php';</script>";
}
?>
