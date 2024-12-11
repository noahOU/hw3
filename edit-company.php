<?php
require_once("util-db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $headquarters = $_POST['headquarters'];
    $industry = $_POST['industry'];

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE Company SET company_name = ?, headquarters = ?, industry = ? WHERE company_id = ?");
        $stmt->bind_param("sssi", $name, $headquarters, $industry, $id);
        $stmt->execute();
        $conn->close();
        echo "<script>alert('Company updated successfully!'); window.location.href = 'companies.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
} else {
    $id = $_GET['id'];
    $conn = get_db_connection();
    $stmt = $conn->prepare("SELECT * FROM Company WHERE company_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $company = $stmt->get_result()->fetch_assoc();
    $conn->close();
}
?>

<h1 class="text-center my-4">Edit Company</h1>
<div class="container">
  <form method="POST">
    <input type="hidden" name="id" value="<?php echo $company['company_id']; ?>">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $company['company_name']; ?>" required>
    </div>
    <div class="mb-3">
      <label for="headquarters" class="form-label">Headquarters</label>
      <input type="text" class="form-control" id="headquarters" name="headquarters" value="<?php echo $company['headquarters']; ?>">
    </div>
    <div class="mb-3">
      <label for="industry" class="form-label">Industry</label>
      <input type="text" class="form-control" id="industry" name="industry" value="<?php echo $company['industry']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
    <a href="companies.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
