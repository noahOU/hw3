<?php
require_once("util-db.php");

// Fetch managers for the dropdown
$conn = get_db_connection();
$managers = $conn->query("SELECT manager_id, manager_name FROM hw3.manager");
$conn->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $manager_id = $_POST['manager_id'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO hw3.employee (employee_name, email, manager_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $name, $email, $manager_id);
        $stmt->execute();
        $conn->close();
        echo "<script>alert('Employee added successfully!'); window.location.href = 'employees.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error adding employee: " . $e->getMessage() . "');</script>";
    }
}
?>

<h1>Add Employee</h1>
<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" required>
    <br>
    <label>Manager:</label>
    <select name="manager_id" required>
        <option value="" disabled selected>Select a Manager</option>
        <?php while ($manager = $managers->fetch_assoc()) { ?>
            <option value="<?php echo $manager['manager_id']; ?>"><?php echo $manager['manager_name']; ?></option>
        <?php } ?>
    </select>
    <br>
    <button type="submit">Add Employee</button>
</form>

