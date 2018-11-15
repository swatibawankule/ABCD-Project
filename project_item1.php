<?php
include('connect.php');
<?php
include('connect.php');

  
$po_item_sr_no=$_POST['po_item_sr_no'];
$item=$_POST['item'];
$rate=$_POST['rate'];
$quantity=$_POST['quantity'];
$unit=$_POST['unit'];
$po_sr_no=$_POST['po_sr_no'];
$amount=$_POST['amount'];
	
		
	
	   if($po_raw_material!="")
		   {
			 
//$in_quantity=$_POST['in_quantity'];
	  $po_raw_material=$_POST['po_raw_material'];
	  
	   $sql1 = mysqli_query($conn, "SELECT *
FROM `raw_material`
 WHERE `material` = '".$po_raw_material."' " );
 $row = mysqli_fetch_array($sql1);
     $qty=$row['qty'];
	//$out_quantity=$out_quantity;
	$stock_qty_tot=$qty+$quantity;
$sql2="UPDATE `raw_material` SET `qty`='".$stock_qty_tot."'
 WHERE material='".$po_raw_material."'";
 mysqli_query($conn, $sql2)


		   
		if(mysqli_query($conn,$sql))
	  {
    
	
       }   
		   
		 $sql1="INSERT INTO `purchase_order_item`(`po_item_sr_no`, `po_no_sr_duplicate`, `item`, `quantity`, `rate`,`unit`,`amount`)
 VALUES ('$po_item_sr_no','$po_sr_no','$item','$quantity','$rate','$unit','$amount')";

    if(mysqli_query($conn,$sql1))
	  {
      header("Location: purchase_order.php");
	
       }
	
 }

	  
	else if($conn)
	   {
			
		
$sql="INSERT INTO `purchase_order_item`(`po_item_sr_no`, `po_no_sr_duplicate`, `item`, `quantity`, `rate`,`unit`,`amount`)
 VALUES ('$po_item_sr_no','$po_sr_no','$item','$quantity','$rate','$unit','$amount')";
 if(mysqli_query($conn,$sql))
	  {
      header("Location: purchase_order.php");
	
       }	   

 }

 
	   
	   
	  else
	  {
	  echo "Error" . mysqli_error($conn);
	  }

	  

/*
$supplier_id=$_POST['supplier_id'];
$customer_is_supplier=$_POST['customer_is_supplier'];
$supplier_name=$_POST['supplier_name'];
$supp_contact_no=$_POST['supp_contact_no'];
$supp_address=$_POST['supp_address'];
$supp_emai=$_POST['supp_emai'];
$melting_loss=$_POST['melting_loss'];
$supp_contact_person=$_POST['supp_contact_person'];
$supp_contact_person_cont=$_POST['supp_contact_person_cont'];
$supp_gst_no=$_POST['supp_gst_no'];
$supp_pan_no=$_POST['supp_pan_no'];

	  $sql1="INSERT INTO `supplier`(`supplier_id`,`customer_is_supplier1`, `supplier_name`, `supp_contact_no`, `supp_address`, `supp_emai`, `melting_loss`, `supp_contact_person`, `supp_contact_person_cont`, `supp_gst_no`, `supp_pan_no`)
 VALUES ('$supplier_id','$customer_is_supplier','$supplier_name','$supp_contact_no','$supp_address','$supp_emai','$melting_loss','$supp_contact_person','$supp_contact_person_cont','$supp_gst_no','$supp_pan_no')";



  if(mysqli_query($conn, $sql1))
	  {
     echo "Inserted Successfully";
       }
	  else
	  {
	  echo "Error" . mysqli_error($conn);
	  }

	 
	  /*
$sql1="INSERT INTO `supplier`(`supplier_id`,`customer_is_supplier`, `supplier_name`, `supp_contact_no`, `supp_address`, `supp_emai`, `melting_loss`, `supp_contact_person`, `supp_contact_person_cont`, `supp_gst_no`, `supp_pan_no`)
 VALUES ('','$customer_is_supplier','$supplier_name','$supp_contact_no','$supp_address','$supp_emai','$melting_loss','$supp_contact_person','$supp_contact_person_cont','$supp_gst_no','$supp_pan_no')";



  if(mysqli_query($conn, $sql1))
	  {
     echo "Inserted Successfully";
       }
	  else
	  {
	  echo "Error" . mysqli_error($conn);
	  }

	 
*/


?>

$po_item_sr_no=$_POST['po_item_sr_no'];
$item=$_POST['item'];
$rate=$_POST['rate'];
$quantity=$_POST['quantity'];
$unit=$_POST['unit'];
$po_sr_no=$_POST['po_sr_no'];
$amount=$_POST['amount'];

$sql1="INSERT INTO `purchase_order_item`(`po_item_sr_no`, `po_no_sr_duplicate`, `item`, `quantity`, `rate`,`unit`,`amount`)
 VALUES ('$po_item_sr_no','$po_sr_no','$item','$quantity','$rate','$unit','$amount')";
  if(mysqli_query($conn, $sql1))
	  {
     echo "Inserted Successfully";
       }
	  else
	  {
	  echo "Error" . mysqli_error($conn);
	  }



?>
