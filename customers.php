<?php
require_once("util-db.php");
require_once("model-customers.php");

$pageTitle = "Customers";
include "view-header.php";

// Fetch all customers
$customers = selectCustomers();
?>

<h1 class="text-center my-4">Customers</h1>

<div class="container">
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
<?php
while ($customer = $customers->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $customer['customer_id']; ?></td>
    <td><?php echo $customer['customer_name']; ?></td>
    <td><?php echo $customer['email']; ?></td>
    <td><?php echo $customer['phone']; ?></td>
    <td>
      <a href="edit-customer.php?id=<?php echo $customer['customer_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
      <form method="POST" action="delete-customer.php" style="display:inline;">
        <input type="hidden" name="id" value="<?php echo $customer['customer_id']; ?>">
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
      <a href="add-customer.php" class="btn btn-success">Add New Customer</a>
    </div>
  </div>
</div>

<?php include "view-footer.php"; ?>
