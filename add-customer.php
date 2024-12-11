<?php
require_once("util-db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO Customer (customer_name, email, phone) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $phone);
        $stmt->execute();
        $conn->close();
        echo "<script>alert('Customer added successfully!'); window.location.href = 'customers.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>

<h1 class="text-center my-4">Add Customer</h1>
<div class="container">
  <form method="POST">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
      <label for="phone" class="form-label">Phone</label>
      <input type="text" class="form-control" id="phone" name="phone">
    </div>
    <button type="submit" class="btn btn-success">Add Customer</button>
    <a href="customers.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
