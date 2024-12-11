<?php
require_once("util-db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $headquarters = $_POST['headquarters'];
    $industry = $_POST['industry'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO Company (company_name, headquarters, industry) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $headquarters, $industry);
        $stmt->execute();
        $conn->close();
        echo "<script>alert('Company added successfully!'); window.location.href = 'companies.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>

<h1 class="text-center my-4">Add Company</h1>
<div class="container">
  <form method="POST">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
      <label for="headquarters" class="form-label">Headquarters</label>
      <input type="text" class="form-control" id="headquarters" name="headquarters">
    </div>
    <div class="mb-3">
      <label for="industry" class="form-label">Industry</label>
      <input type="text" class="form-control" id="industry" name="industry">
    </div>
    <button type="submit" class="btn btn-success">Add Company</button>
    <a href="companies.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
