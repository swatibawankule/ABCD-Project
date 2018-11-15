<?php
include('connect.php');

$po_item_sr_no=$_POST['po_item_sr_no'];
$item=$_POST['item'];
$rate=$_POST['rate'];
$challan_no=$_POST['challan_no'];
$quantity=$_POST['quantity'];
$unit=$_POST['unit'];
$po_sr_no=$_POST['po_sr_no'];
$amount=$_POST['amount'];

$sql1="INSERT INTO `purchase_order_item`(`po_item_sr_no`, `po_no_sr_duplicate`,`po_challan_no`, `item`, `quantity`, `rate`,`unit`,`amount`)
 VALUES ('$po_item_sr_no','$po_sr_no','$challan_no','$item','$quantity','$rate','$unit','$amount')";
  if(mysqli_query($conn, $sql1))
	  {
     echo "Inserted Successfully";
       }
	  else
	  {
	  echo "Error" . mysqli_error($conn);
	  }



?>
