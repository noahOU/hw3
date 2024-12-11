<?php
function selectCompanies() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT company_id, company_name, headquarters, industry FROM Company");
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
