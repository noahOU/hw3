<?php
function selectCars() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT car_id, car_make, car_model, year, price FROM Car");
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
