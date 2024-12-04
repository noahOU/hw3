<?php
require_once("util-db.php");
require_once("model-employees.php");

$pageTitle = "Employees";
include "view-header.php";

// Fetch all employees
$employees = selectEmployees();
?>

<h1 class="text-center my-4">Employees</h1>

<!-- Employee Table -->
<div class="container">
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
<?php
while ($employee = $employees->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $employee['employee_id']; ?></td>
    <td><?php echo $employee['employee_name']; ?></td>
    <td><?php echo $employee['email']; ?></td>
    <td>
      <!-- Edit Button -->
      <button class="btn btn-primary btn-sm" onclick="showEditModal(<?php echo $employee['employee_id']; ?>, '<?php echo $employee['employee_name']; ?>', '<?php echo $employee['email']; ?>')">Edit</button>
      
      <!-- Delete Button -->
      <button class="btn btn-danger btn-sm" onclick="showDeleteModal(<?php echo $employee['employee_id']; ?>)">Delete</button>
    </td>
  </tr>
<?php
}
?>
      </tbody>
    </table>
  </div>

  <!-- Add Employee Button -->
  <button class="btn btn-success" onclick="showAddModal()">Add New Employee</button>
</div>

<!-- Modals -->
<!-- Add Employee Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="add-employee.php">
        <div class="modal-header">
          <h5 class="modal-title">Add Employee</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="addName" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="addName" required>
          </div>
          <div class="mb-3">
            <label for="addEmail" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="addEmail" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Add</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Employee Modal -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="edit-employee.php">
        <div class="modal-header">
          <h5 class="modal-title">Edit Employee</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="editEmployeeId">
          <div class="mb-3">
            <label for="editName" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="editName" required>
          </div>
          <div class="mb-3">
            <label for="editEmail" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="editEmail" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteEmployeeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="delete-employee.php">
        <div class="modal-header">
          <h5 class="modal-title">Delete Employee</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="deleteEmployeeId">
          <p>Are you sure you want to delete this employee?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Delete</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- JavaScript -->
<script>
function showAddModal() {
  const addModal = new bootstrap.Modal(document.getElementById('addEmployeeModal'));
  addModal.show();
}

function showEditModal(id, name, email) {
  document.getElementById('editEmployeeId').value = id;
  document.getElementById('editName').value = name;
  document.getElementById('editEmail').value = email;
  const editModal = new bootstrap.Modal(document.getElementById('editEmployeeModal'));
  editModal.show();
}

function showDeleteModal(id) {
  document.getElementById('deleteEmployeeId').value = id;
  const deleteModal = new bootstrap.Modal(document.getElementById('deleteEmployeeModal'));
  deleteModal.show();
}
</script>

<?php include "view-footer.php"; ?>
