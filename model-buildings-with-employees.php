<?php
function selectManagers() {
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

function selectEmployeesByManager($manager_id) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT e.employee_id, employee_name, email, building_number, closing_time 
                                FROM hw3.employee e 
                                JOIN hw3.building b ON b.employee_id = e.employee_id 
                                WHERE b.manager_id = ?");
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
?>
