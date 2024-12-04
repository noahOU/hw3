<?php
require_once("util-db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $manager_id = $_POST['manager_id'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE hw3.employee SET employee_name = ?, email = ?, manager_id = ? WHERE employee_id = ?");
        $stmt->bind_param("ssii", $name, $email, $manager_id, $id);
        $stmt->execute();
        $conn->close();
        echo "<script>alert('Employee updated successfully!'); window.location.href = 'employees.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error updating employee: " . $e->getMessage() . "');</script>";
    }
} else {
    $id = $_GET['id'];
    $conn = get_db_connection();

    // Fetch employee data
    $stmt = $conn->prepare("SELECT * FROM hw3.employee WHERE employee_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $employee = $stmt->get_result()->fetch_assoc();

    // Fetch managers for the dropdown
    $managers = $conn->query("SELECT manager_id, manager_name FROM hw3.manager");
    $conn->close();
}
?>

<h1>Edit Employee</h1>
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $employee['employee_id']; ?>">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $employee['employee_name']; ?>" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $employee['email']; ?>" required>
    <br>
    <label>Manager:</label>
    <select name="manager_id" required>
        <option value="" disabled>Select a Manager</option>
        <?php while ($manager = $managers->fetch_assoc()) { ?>
            <option value="<?php echo $manager['manager_id']; ?>" <?php if ($employee['manager_id'] == $manager['manager_id']) echo 'selected'; ?>>
                <?php echo $manager['manager_name']; ?>
            </option>
        <?php } ?>
    </select>
    <br>
    <button type="submit">Save Changes</button>
</form>
