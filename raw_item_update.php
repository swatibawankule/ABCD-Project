<?php
include('connect.php');

   $po_no=$_POST['po_no'];
		$customer_is_supplier=$_POST['customer_is_supplier'];
	    $supplier=$_POST['supplier'];
		$material_melting_loss=$_POST['material_melting_loss'];
		$challan_no= $_POST['challan_no'];		
	//	$bill_no=$_POST['bill_no'];
		$bill_date=$_POST['bill_date'];
		$material=$_POST['material'];
		$unit=$_POST['unit'];
		$in_quantity=$_POST['in_quantity'];
		//$component=$_POST['component'];
		//$part_no=$_POST['part_no'];
	

$sql="INSERT INTO `inward_item`(`po_no`, `supplier`, `customer_is_supplier`, `material_melting_loss`, `challan_no`, `bill_date`, `material`, `unit`,`in_quantity`) VALUES (
'$po_no','$supplier','$customer_is_supplier','$material_melting_loss','$challan_no','$bill_date','$material','$unit','$in_quantity')";  

  if(mysqli_query($conn, $sql))
	  {
    header("Location: inward_raw_material_inventory.php");
	
       }
	  else
	  {
	  echo "Error" . mysqli_error($conn);
	  }

	  
	  $in_quantity=$_POST['in_quantity'];
	  $material=$_POST['material'];
	  
	   $sql1 = mysqli_query($conn, "SELECT *
FROM `raw_material`
 WHERE `material` = '".$material."' " );
 $row = mysqli_fetch_array($sql1);
     $qty=$row['qty'];
	//$out_quantity=$out_quantity;
	$stock_qty_tot=$qty+$in_quantity;
$sql2="UPDATE `raw_material` SET `qty`='".$stock_qty_tot."'
 WHERE material='".$material."'";
 mysqli_query($conn, $sql2)


?>
