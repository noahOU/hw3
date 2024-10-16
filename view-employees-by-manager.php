<h1>Employees by Manager</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th> 
        <th>Building Number</th> 
        <th>Closing Time</th>
      </tr>
    </thead>
    <tbody>
<?php
while ($employee = $employees->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $employee['employee_id'];?></td>
    <td><?php echo $employee['employee_name'];?></td>
    <td><?php echo $employee['email'];?></td>
    <td><?php echo $employee['building_number'];?></td>
    <td><?php echo $employee['closing_time'];?></td>
  </tr>
<?php      
}
?>
    </tbody>
  </table>
</div>
