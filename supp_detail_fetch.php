<?php
require_once('connect.php');
$supplier=$_POST['supplier'];
  if($supplier!= "")
 {
 // connection should be on this page  
$sql1 = mysqli_query($conn, "select * from supplier where 	supplier_name ='".$supplier."'");
$row = mysqli_fetch_array($sql1);
$melting_loss=$row['melting_loss'];
$customer_is_supplier=$row['customer_is_supplier'];

echo $melting_loss."~_~".$customer_is_supplier;
}
?>