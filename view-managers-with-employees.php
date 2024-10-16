<h1>Managers with Employees</h1>
<div class="card-group">
<?php
while ($manager = $managers->fetch_assoc()) {
?>
    <div class="card">
    <div class="card-body">
      <h5 class="card-title"><?php echo $manager['manager_name'];?></h5>
      <p class="card-text">
  <ul class="list-group">
<?php
  $employees = selectEmployeesByManager($manager['manager_id']);
  while ($employee = $employees->fetch_assoc()) {
?>
      <li class="list-group-item"><?php echo $employee['employee_name'];?> - <?php echo $employee['email'];?> - Building: <?php echo $employee['building_number'];?> - Closing Time: <?php echo $employee['closing_time'];?></li>
<?php
  }
?>
  </ul>
      </p>
      <p class="card-text"><small class="text-body-secondary">Office: <?php echo $manager['office_number'];?></small></p>
    </div>
  </div>
<?php      
}
?>
</div>
