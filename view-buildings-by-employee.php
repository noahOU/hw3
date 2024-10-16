<h1>Buildings by Employee</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Building ID</th>
        <th>Building Number</th>
        <th>Closing Time</th>
      </tr>
    </thead>
    <tbody>
<?php
while ($building = $buildings->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $building['building_id'];?></td>
    <td><?php echo $building['building_number'];?></td>
    <td><?php echo $building['closing_time'];?></td>
  </tr>
<?php      
}
?>
    </tbody>
  </table>
</div>
