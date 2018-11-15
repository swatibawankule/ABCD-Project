
<?php
require_once('connect.php');
$project_item_raw_material=$_POST['project_item_raw_material'];
  if($project_item_raw_material!= "")
 {
 // connection should be on this page  
$sql1 = mysqli_query($conn, "select * from raw_material where material ='".$project_item_raw_material."'");
$row = mysqli_fetch_array($sql1);
$unit=$row['unit'];
$qty=$row['qty'];

echo $qty."~_~".$unit;
} 
?>