<?php
function selectManagersWithEmployees() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT manager_id, manager_name, office_number FROM hw3.manager");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectEmployeesByManager($manager_id) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("
            SELECT e.employee_id, e.employee_name, e.email 
            FROM hw3.employee e
            JOIN hw3.manager_employee me ON e.employee_id = me.employee_id 
            WHERE me.manager_id = ?
        ");
        $stmt->bind_param("i", $manager_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function getAllManagers() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT manager_id, manager_name FROM hw3.manager");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function getAllEmployees() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT employee_id, employee_name, email FROM hw3.employee");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
