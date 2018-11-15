<?php
include('connect.php');

      
$project_item_sr_no=$_POST['project_item_sr_no'];
$project_item=$_POST['project_item'];
$project_name=$_POST['project_name'];
$project_product_qty=$_POST['project_product_qty'];
$project_amount=$_POST['project_amount'];
$project_quantity=$_POST['project_quantity'];
$project_item_raw_material=$_POST['project_item_raw_material'];
$project_sr_no=$_POST['project_sr_no'];
$project_item_unit=$_POST['project_item_unit'];

$sql="INSERT INTO `project_item`(`project_item_sr_no`, `project_sr_no_duplicate`, `project_item`, `project_name`, `project_product_qty`,`project_amount`,`project_item_raw_material`, `project_quantity`,`project_item_unit`)
 VALUES ('$project_item_sr_no','$project_sr_no','$project_item','$project_name','$project_product_qty','$project_amount','$project_item_raw_material','$project_quantity','$project_item_unit')"; 

  if(mysqli_query($conn, $sql))
	 {
     echo "Inserted Successfully";
       }
	  else
	  {
	  echo "Error" . mysqli_error($conn);
	  }

	  
	  $project_quantity=$_POST['project_quantity'];
	  $project_item_raw_material=$_POST['project_item_raw_material'];
	  
	   $sql1 = mysqli_query($conn, "SELECT *
FROM `raw_material`
 WHERE `material` = '".$project_item_raw_material."' " );
 $row = mysqli_fetch_array($sql1);
     $qty=$row['qty'];
	//$out_quantity=$out_quantity;
	$stock_qty_tot=$qty-$project_quantity;
$sql2="UPDATE `raw_material` SET `qty`='".$stock_qty_tot."'
 WHERE material='".$project_item_raw_material."'";
 mysqli_query($conn, $sql2)


?>
