<h1>Managers</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Office</th> 
      </tr>
    </thead>
    <tbody>
<?php
while ($manager = $managers->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $manager['manager_id'];?></td>
    <td><?php echo $manager['manager_name'];?></td>
    <td><?php echo $manager['office_number'];?></td>
    <td><a href="employees-by-manager.php?id=<?php echo $manager['manager_id'];?>">Employees</a></td>
  </tr>
<?php      
}
?>
    </tbody>
  </table>
</div>
