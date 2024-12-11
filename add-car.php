<?php
require_once("util-db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $price = $_POST['price'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO Car (car_make, car_model, year, price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssdi", $make, $model, $year, $price);
        $stmt->execute();
        $conn->close();
        echo "<script>alert('Car added successfully!'); window.location.href = 'cars.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>

<h1 class="text-center my-4">Add Car</h1>
<div class="container">
  <form method="POST">
    <div class="mb-3">
      <label for="make" class="form-label">Make</label>
      <input type="text" class="form-control" id="make" name="make" required>
    </div>
    <div class="mb-3">
      <label for="model" class="form-label">Model</label>
      <input type="text" class="form-control" id="model" name="model" required>
    </div>
    <div class="mb-3">
      <label for="year" class="form-label">Year</label>
      <input type="number" class="form-control" id="year" name="year" required>
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" class="form-control" id="price" name="price" step="0.01" required>
    </div>
    <button type="submit" class="btn btn-success">Add Car</button>
    <a href="cars.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
