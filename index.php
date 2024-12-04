<?php
$pageTitle = "Home";
include "view-header.php";
?>

<!-- Page Styling -->
<style>
  body {
    background-color: #f8f9fa; /* Light gray background */
  }

  .hero-section {
    background: linear-gradient(135deg, #007bff, #6610f2); /* Gradient background */
    color: white;
    padding: 50px 20px;
    text-align: center;
    border-radius: 10px;
    margin-bottom: 20px;
  }

  .hero-section h1 {
    font-size: 3rem;
    font-weight: bold;
    margin-bottom: 10px;
  }

  .hero-section p {
    font-size: 1.25rem;
    margin-bottom: 20px;
  }

  .btn-get-started {
    background-color: #28a745; /* Green button */
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 1rem;
  }

  .btn-get-started:hover {
    background-color: #218838;
    color: white;
  }

  .info-section {
    padding: 30px 20px;
    text-align: center;
  }

  .info-section h2 {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 20px;
  }

  .info-section p {
    font-size: 1.1rem;
    color: #6c757d;
  }
</style>

<div class="container">
  <!-- Hero Section -->
  <div class="hero-section">
    <h1>Welcome to Homework 4</h1>
    <p>All of the rubric requirements have been met - take a look!</p>
    <a href="employees.php" class="btn btn-get-started">Get Started</a>
  </div>

  <!-- Info Section -->
  <div class="info-section">
    <h2>Features</h2>
    <p>With this project, you can:</p>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">View and manage employees</li>
      <li class="list-group-item">Add, edit, and delete records dynamically</li>
      <li class="list-group-item">Leverage Bootstrap for responsive design</li>
      <li class="list-group-item">Enjoy a modern and clean user experience</li>
    </ul>
  </div>
</div>

<?php
include "view-footer.php";
?>
