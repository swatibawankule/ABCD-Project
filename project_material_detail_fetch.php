<?php
require_once('connect.php');
$project_item=$_POST['project_item'];

 if($project_item!= "")
 {
 // connection should be on this page  
$sql1 = mysqli_query($conn, "select * from product_inventory where componenet_name_product ='".$project_item."'");
$row = mysqli_fetch_array($sql1);
$raw_material=$row['raw_material'];
$material_casting_wt=$row['material_casting_wt'];

echo $raw_material."~_~".$material_casting_wt;
}

?>
