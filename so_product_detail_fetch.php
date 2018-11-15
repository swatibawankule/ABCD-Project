<?php
require_once('connect.php');
$item=$_POST['item'];
  if($item!= "")
 {
 // connection should be on this page  
$sql1 = mysqli_query($conn, "select componenet_hsn_sac from  product_inventory where componenet_name_product ='".$item."'");
$row = mysqli_fetch_array($sql1);
$componenet_hsn_sac=$row['componenet_hsn_sac'];

echo $componenet_hsn_sac;
}
?>