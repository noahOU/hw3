<?php
function selectBuildingsByEmployee($employee_id) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT b.building_id, building_number, closing_time 
                                FROM hw3.building b 
                                WHERE b.employee_id = ?");
        $stmt->bind_param("i", $employee_id);
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
