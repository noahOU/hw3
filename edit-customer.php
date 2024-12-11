<?php
require_once("util-db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE Customer SET customer_name = ?, email = ?, phone = ? WHERE customer_id = ?");
        $stmt->bind_param("sssi", $name, $email, $phone, $id);
        $stmt->execute();
        $conn->close();
        echo "<script>alert('Customer updated successfully!'); window.location.href = 'customers.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
} else {
    $id = $_GET['id'];
    $conn = get_db_connection();
    $stmt = $conn->prepare("SELECT * FROM Customer WHERE customer_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $customer = $stmt->get_result()->fetch_assoc();
    $conn->close();
}
?>

<h1 class="text-center my-4">Edit Customer</h1>
<div class="container">
  <form method="POST">
    <input type="hidden" name="id" value="<?php echo $customer['customer_id']; ?>">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $customer['customer_name']; ?>" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $customer['email']; ?>">
    </div>
    <div class="mb-3">
      <label for="phone" class="form-label">Phone</label>
      <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $customer['phone']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
    <a href="customers.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
