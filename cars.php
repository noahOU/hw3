<?php
require_once("util-db.php");
require_once("model-cars.php");

$pageTitle = "Cars";
include "view-header.php";

// Fetch all cars
$cars = selectCars();
?>

<h1 class="text-center my-4">Cars</h1>

<div class="container">
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Make</th>
          <th>Model</th>
          <th>Year</th>
          <th>Price</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
<?php
while ($car = $cars->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $car['car_id']; ?></td>
    <td><?php echo $car['car_make']; ?></td>
    <td><?php echo $car['car_model']; ?></td>
    <td><?php echo $car['year']; ?></td>
    <td><?php echo $car['price']; ?></td>
    <td>
      <a href="edit-car.php?id=<?php echo $car['car_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
      <form method="POST" action="delete-car.php" style="display:inline;">
        <input type="hidden" name="id" value="<?php echo $car['car_id']; ?>">
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
      <a href="add-car.php" class="btn btn-success">Add New Car</a>
    </div>
  </div>
</div>

<?php include "view-footer.php"; ?>
