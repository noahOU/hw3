<?php
require_once("util-db.php");
require_once("model-managers.php");

$pageTitle = "Managers";
include "view-header.php";

// Fetch all managers
$managers = selectManagers();
?>

<h1 class="text-center my-4">Managers</h1>

<!-- Managers Table -->
<div class="container">
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Office Number</th>
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
      <!-- Edit Button -->
      <button class="btn btn-primary btn-sm" onclick="showEditModal(<?php echo $manager['manager_id']; ?>, '<?php echo $manager['manager_name']; ?>', '<?php echo $manager['office_number']; ?>')">Edit</button>
      
      <!-- Delete Button -->
      <button class="btn btn-danger btn-sm" onclick="showDeleteModal(<?php echo $manager['manager_id']; ?>)">Delete</button>
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
    <button class="btn btn-success" onclick="showAddModal()">Add New Manager</button>
  </div>
</div>

<!-- Modals -->
<!-- Add Manager Modal -->
<div class="modal fade" id="addManagerModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="add-manager.php">
        <div class="modal-header">
          <h5 class="modal-title">Add Manager</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="addName" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="addName" required>
          </div>
          <div class="mb-3">
            <label for="addOffice" class="form-label">Office Number</label>
            <input type="text" class="form-control" name="office_number" id="addOffice" required>
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

<!-- Edit Manager Modal -->
<div class="modal fade" id="editManagerModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="edit-manager.php">
        <div class="modal-header">
          <h5 class="modal-title">Edit Manager</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="editManagerId">
          <div class="mb-3">
            <label for="editName" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="editName" required>
          </div>
          <div class="mb-3">
            <label for="editOffice" class="form-label">Office Number</label>
            <input type="text" class="form-control" name="office_number" id="editOffice" required>
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
<div class="modal fade" id="deleteManagerModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="delete-manager.php">
        <div class="modal-header">
          <h5 class="modal-title">Delete Manager</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="deleteManagerId">
          <p>Are you sure you want to delete this manager?</p>
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
  const addModal = new bootstrap.Modal(document.getElementById('addManagerModal'));
  addModal.show();
}

function showEditModal(id, name, officeNumber) {
  document.getElementById('editManagerId').value = id;
  document.getElementById('editName').value = name;
  document.getElementById('editOffice').value = officeNumber;
  const editModal = new bootstrap.Modal(document.getElementById('editManagerModal'));
  editModal.show();
}

function showDeleteModal(id) {
  document.getElementById('deleteManagerId').value = id;
  const deleteModal = new bootstrap.Modal(document.getElementById('deleteManagerModal'));
  deleteModal.show();
}
</script>

<?php include "view-footer.php"; ?>
