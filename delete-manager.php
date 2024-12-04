<?php
require_once("util-db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("DELETE FROM hw3.manager WHERE manager_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $conn->close();
        echo "<script>alert('Manager deleted successfully!'); window.location.href = 'managers.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error deleting manager: " . $e->getMessage() . "');</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'managers.php';</script>";
}
?>
