<?php
require_once('connect.php');
$material=$_POST['material'];
  if($material!= "")
 {
 // connection should be on this page  
$sql1 = mysqli_query($conn, "select * from raw_material where 	material ='".$material."'");
$row = mysqli_fetch_array($sql1);
$unit=$row['unit'];
$material_hsn_sac_code=$row['material_hsn_sac_code'];
$material_casting_wt=$row['material_casting_wt'];
$component=$row['component'];
$part_no=$row['part_no'];



echo $material_hsn_sac_code."~_~".$material_casting_wt."~_~".$unit."~_~".$component."~_~".$part_no;
}
?>