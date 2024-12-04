<?php
require_once("util-db.php");
require_once("model-employees.php");

$pageTitle = "Employees";
include "view-header.php";

// Fetch all employees
$employees = selectEmployees();
?>

<h1>Employees</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
<?php
// Loop through employees and display each record
while ($employee = $employees->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $employee['employee_id']; ?></td>
    <td><?php echo $employee['employee_name']; ?></td>
    <td><?php echo $employee['email']; ?></td>
    <td>
      <!-- Edit button -->
      <a href="edit-employee.php?id=<?php echo $employee['employee_id']; ?>" class="btn btn-primary">Edit</a>

      <!-- Delete button -->
      <form method="POST" action="delete-employee.php" style="display:inline;">
        <input type="hidden" name="id" value="<?php echo $employee['employee_id']; ?>">
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</button>
      </form>
    </td>
  </tr>
<?php
}
?>
    </tbody>
  </table>

  <!-- Add Employee button -->
  <a href="add-employee.php" class="btn btn-success">Add New Employee</a>
</div>

<?php
include "view-footer.php";
?>
