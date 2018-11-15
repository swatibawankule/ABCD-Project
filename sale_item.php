<?php
include('connect.php');

$invoice_no=$_POST['invoice_no'];
$project_no=$_POST['project_no'];
$sr_no=$_POST['sr_no'];
$product_name=$_POST['product_name'];
$unit=$_POST['unit'];
$qty=$_POST['qty'];
$rate=$_POST['rate'];
$amount=$_POST['amount'];


$sql1="INSERT INTO `sales_invoice_item`(`sr_no`, `invoice_no_duplicate`,`project_no`, `product_name`,`unit`, `qty`, `rate`, `amount`) 
VALUES ('$sr_no','$invoice_no','$project_no','$product_name','$unit','$qty','$rate','$amount')";
  if(mysqli_query($conn, $sql1))
	  {
     echo "Inserted Successfully";
       }
	  else
	  {
	  echo "Error" . mysqli_error($conn);
	  }



?>
