<?php
require_once("util-db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $price = $_POST['price'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE Car SET car_make = ?, car_model = ?, year = ?, price = ? WHERE car_id = ?");
        $stmt->bind_param("ssdii", $make, $model, $year, $price, $id);
        $stmt->execute();
        $conn->close();
        echo "<script>alert('Car updated successfully!'); window.location.href = 'cars.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
} else {
    $id = $_GET['id'];
    $conn = get_db_connection();
    $stmt = $conn->prepare("SELECT * FROM Car WHERE car_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $car = $stmt->get_result()->fetch_assoc();
    $conn->close();
}
?>

<h1 class="text-center my-4">Edit Car</h1>
<div class="container">
  <form method="POST">
    <input type="hidden" name="id" value="<?php echo $car['car_id']; ?>">
    <div class="mb-3">
      <label for="make" class="form-label">Make</label>
      <input type="text" class="form-control" id="make" name="make" value="<?php echo $car['car_make']; ?>" required>
    </div>
    <div class="mb-3">
      <label for="model" class="form-label">Model</label>
      <input type="text" class="form-control" id="model" name="model" value="<?php echo $car['car_model']; ?>" required>
    </div>
    <div class="mb-3">
      <label for="year" class="form-label">Year</label>
      <input type="number" class="form-control" id="year" name="year" value="<?php echo $car['year']; ?>" required>
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?php echo $car['price']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
    <a href="cars.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
