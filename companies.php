<?php
require_once("util-db.php");
require_once("model-companies.php");

$pageTitle = "Companies";
include "view-header.php";

// Fetch all companies
$companies = selectCompanies();
?>

<h1 class="text-center my-4">Companies</h1>

<div class="container">
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Headquarters</th>
          <th>Industry</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
<?php
while ($company = $companies->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $company['company_id']; ?></td>
    <td><?php echo $company['company_name']; ?></td>
    <td><?php echo $company['headquarters']; ?></td>
    <td><?php echo $company['industry']; ?></td>
    <td>
      <a href="edit-company.php?id=<?php echo $company['company_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
      <form method="POST" action="delete-company.php" style="display:inline;">
        <input type="hidden" name="id" value="<?php echo $company['company_id']; ?>">
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</button>
      </form>
    </td>
  </tr>
<?php
}
?>
      </tbody>
    </table>
    <div class="text-center mt-4">
      <a href="add-company.php" class="btn btn-success">Add New Company</a>
    </div>
  </div>
</div>

<?php include "view-footer.php"; ?>
