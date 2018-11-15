<?php
include('connect.php');
 
$pi_item_sr_no=$_POST['pi_item_sr_no'];
$po_challan_no_ref=$_POST['po_challan_no_ref'];
$pi_challan_no=$_POST['pi_challan_no'];
$pi_item=$_POST['pi_item'];
$pi_rate=$_POST['pi_rate'];
$pi_quantity=$_POST['pi_quantity'];
$pi_unit=$_POST['pi_unit'];
$pi_sr_no=$_POST['pi_sr_no'];
$pi_amount=$_POST['pi_amount'];


$sql="INSERT INTO `purchase_invoice_item`(`pi_item_sr_no`, `pi_no_sr_duplicate`,`pi_challan_no1`,`po_order_no`, `pi_item`, `pi_quantity`, `pi_rate`,`pi_unit`,`pi_amount`)
 VALUES ('$pi_item_sr_no','$pi_sr_no','$pi_challan_no','$po_challan_no_ref','$pi_item','$pi_quantity','$pi_rate','$pi_unit','$pi_amount')";; 

  if(mysqli_query($conn, $sql))
	 {
     echo "Inserted Successfully";
       }
	  else
	  {
	  echo "Error" . mysqli_error($conn);
	  }

	 
	  
	  $pi_quantity=$_POST['pi_quantity'];
	  $pi_item=$_POST['pi_item'];
	  
	   $sql2 = mysqli_query($conn, "SELECT *
FROM `raw_material`
 WHERE `material` = '".$pi_item."' " );
 $row = mysqli_fetch_array($sql2);
     $qty=$row['qty'];
	//$out_quantity=$out_quantity;
	$stock_qty_tot=$qty+$pi_quantity;
$sql2="UPDATE `raw_material` SET `qty`='".$stock_qty_tot."'
 WHERE material='".$pi_item."'";
 //mysqli_query($conn, $sql2)
 if(mysqli_query($conn, $sql2))
	 {
		 
      }
	  
	  $po_challan_no_ref=$_POST['po_challan_no_ref'];
	  $pi_quantity=$_POST['pi_quantity'];
	  $pi_item=$_POST['pi_item'];
	  
 $sql1 = mysqli_query($conn, "SELECT *
 FROM `purchase_order_item`
 WHERE `po_challan_no` = '".$po_challan_no_ref."' and `item` = '".$pi_item."' " );
 $row = mysqli_fetch_array($sql1);
     $quantity=$row['quantity'];
	 $stock_qty_tot=$quantity-$pi_quantity;
	 
$sql1="UPDATE `purchase_order_item` SET `quantity`='".$stock_qty_tot."'
 WHERE `po_challan_no` = '".$po_challan_no_ref."' and `item` = '".$pi_item."'";
 mysqli_query($conn, $sql1)
	 
	  
	 


?>
