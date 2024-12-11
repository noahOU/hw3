<?php
require_once("util-db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("DELETE FROM Company WHERE company_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $conn->close();
        echo "<script>alert('Company deleted successfully!'); window.location.href = 'companies.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>
