<?php
include('connect.php');

$so_item_sr_no=$_POST['so_item_sr_no'];
$item=$_POST['item'];
$rate=$_POST['rate'];
$so_hsn_code=$_POST['so_hsn_code'];
$so_pursose=$_POST['so_pursose'];
$quantity=$_POST['quantity'];
$unit=$_POST['unit'];
$so_sr_no=$_POST['so_sr_no'];
$challan_no=$_POST['challan_no'];
$amount=$_POST['amount'];

$sql1="INSERT INTO `salee_order_item`(`so_item_sr_no`, `so_no_sr_duplicate`,`challan_no`, `item`, `quantity`, `rate`,`so_hsn_code`,`so_pursose`,`unit`,`amount`)
 VALUES ('$so_item_sr_no','$so_sr_no','$challan_no','$item','$quantity','$rate','$so_hsn_code','$so_pursose','$unit','$amount')";
  if(mysqli_query($conn, $sql1))
	  {
     echo "Inserted Successfully";
       }
	  else
	  {
	  echo "Error" . mysqli_error($conn);
	  }



?>
