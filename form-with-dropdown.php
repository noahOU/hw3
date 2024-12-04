<?php
require_once("util-db.php");
$conn = get_db_connection();
$result = $conn->query("SELECT building_id, building_number FROM hw3.building");
$conn->close();
?>

<h1>Assign Employee to Building</h1>
<form method="POST" action="assign-employee.php">
    <label>Employee ID:</label>
    <input type="number" name="employee_id" required>
    <br>
    <label>Building:</label>
    <select name="building_id" required>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <option value="<?php echo $row['building_id']; ?>"><?php echo $row['building_number']; ?></option>
        <?php } ?>
    </select>
    <br>
    <button type="submit">Assign</button>
</form>
