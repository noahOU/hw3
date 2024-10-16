<h1>Employees</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th> 
        <th></th>
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
    <td>
      <form method="post" action="buildings-by-employee.php">
        <input type="hidden" name="eid" value="<?php echo $employee['employee_id'];?>">
        <button type="submit" class="btn btn-primary">Buildings</button>
      </form>
    </td>
  </tr>
<?php      
}
?>
    </tbody>
  </table>
</div>
