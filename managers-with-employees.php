<?php
require_once("util-db.php");
require_once("model-managers-with-employees.php");

$pageTitle = "Managers with Employees";
include "view-header.php";

// Fetch all managers with their employees
$managers = selectManagersWithEmployees();
?>

<h1 class="text-center my-4">Managers with Employees</h1>

<div class="container">
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>Manager ID</th>
          <th>Manager Name</th>
          <th>Office Number</th>
          <th>Assigned Employees</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
<?php
while ($manager = $managers->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $manager['manager_id']; ?></td>
    <td><?php echo $manager['manager_name']; ?></td>
    <td><?php echo $manager['office_number']; ?></td>
    <td>
      <ul>
      <?php
      $employees = selectEmployeesByManager($manager['manager_id']);
      while ($employee = $employees->fetch_assoc()) {
          echo "<li>{$employee['employee_name']} ({$employee['email']})</li>";
      }
      ?>
      </ul>
    </td>
    <td>
      <!-- Edit Button -->
      <button class="btn btn-primary btn-sm" onclick="showEditModal(<?php echo $manager['manager_id']; ?>)">Edit Employees</button>
      
      <!-- Delete Button -->
      <button class="btn btn-danger btn-sm" onclick="showDeleteModal(<?php echo $manager['manager_id']; ?>)">Remove All Employees</button>
    </td>
  </tr>
<?php
}
?>
      </tbody>
    </table>
  </div>

  <!-- Add Manager Button -->
  <div class="text-center mt-4">
    <button class="btn btn-success" onclick="showAddModal()">Assign Employees to Manager</button>
  </div>
</div>

<!-- Modals -->
<!-- Assign Employees Modal -->
<div class="modal fade" id="assignEmployeesModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="assign-employees-to-manager.php">
        <div class="modal-header">
          <h5 class="modal-title">Assign Employees to Manager</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="managerId" class="form-label">Select Manager</label>
            <select class="form-select" name="manager_id" id="managerId" required>
              <?php
              $managersList = getAllManagers();
              while ($manager = $managersList->fetch_assoc()) {
                  echo "<option value='{$manager['manager_id']}'>{$manager['manager_name']}</option>";
              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="employeeIds" class="form-label">Select Employees</label>
            <select class="form-select" name="employee_ids[]" id="employeeIds" multiple required>
              <?php
              $employeesList = getAllEmployees();
              while ($employee = $employeesList->fetch_assoc()) {
                  echo "<option value='{$employee['employee_id']}'>{$employee['employee_name']} ({$employee['email']})</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Assign</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- JavaScript -->
<script>
function showAddModal() {
  const addModal = new bootstrap.Modal(document.getElementById('assignEmployeesModal'));
  addModal.show();
}

function showEditModal(managerId) {
  alert("Edit functionality is not yet implemented."); // Placeholder
}

function showDeleteModal(managerId) {
  alert("Remove employees functionality is not yet implemented."); // Placeholder
}
</script>

<?php include "view-footer.php"; ?>
