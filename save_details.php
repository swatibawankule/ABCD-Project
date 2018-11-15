<?php
include('connect.php');

    $customer_id=$_POST['customer_id'];
	    $customer_is_supplier=$_POST['customer_is_supplier'];
	    $customer_name=$_POST['customer_name'];
		$cust_contact_no=$_POST['cust_contact_no'];
		$cust_address_bill= $_POST['cust_address_bill'];		
		$state_name=$_POST['state_name'];
		$state_code=$_POST['state_code'];
		$cust_address_ship=$_POST['cust_address_ship'];
		$melting_loss=$_POST['melting_loss'];
		$cust_gst_no=$_POST['cust_gst_no'];
		$cust_email=$_POST['cust_email'];
		$cust_contact_person=$_POST['cust_contact_person'];
		$cust_contact_person_cont=$_POST['cust_contact_person_cont'];
		
		$cust_pan_no=$_POST['cust_pan_no'];
	
		
	
	   if($customer_is_supplier=="")
		   {
			 
	
		
$sql="INSERT INTO `customer`(`customer_id`,`customer_is_supplier`, `customer_name`, `cust_contact_no`, `cust_address_bill`, `cust_address_ship`,`state_name`,`state_code`, `melting_loss`,
 `cust_gst_no`, `cust_pan_no`, `cust_email`, `cust_contact_person`, `cust_contact_person_cont`) VALUES (
'$customer_id','$customer_is_supplier','$customer_name','$cust_contact_no','$cust_address_bill','$cust_address_ship','$state_name','$state_code','$melting_loss','$cust_gst_no','$cust_pan_no',
'$cust_email','$cust_contact_person','$cust_contact_person_cont')";  
 if(mysqli_query($conn,$sql))
	  {
      header("Location: customer.php");
	
       }	 
 }

	  
	else if($conn)
	   {
		   
		   	
$sql="INSERT INTO `customer`(`customer_id`,`customer_is_supplier`, `customer_name`, `cust_contact_no`, `cust_address_bill`, `cust_address_ship`, `state_name`,`state_code`,`melting_loss`,
 `cust_gst_no`, `cust_pan_no`, `cust_email`, `cust_contact_person`, `cust_contact_person_cont`) VALUES (
'$customer_id','$customer_is_supplier','$customer_name','$cust_contact_no','$cust_address_bill','$cust_address_ship','$state_name','$state_code','$melting_loss','$cust_gst_no','$cust_pan_no',
'$cust_email','$cust_contact_person','$cust_contact_person_cont')";  
		   
		if(mysqli_query($conn,$sql))
	  {
    
	
       }   
		   
		 $sql1="INSERT INTO `supplier`(`supplier_id`,`duplicate_customer_id`,`customer_is_supplier`, `supplier_name`, `supp_contact_no`, `supp_address`,`supp_state`,`supp_state_code`, `supp_emai`, `melting_loss`, `supp_contact_person`, `supp_contact_person_cont`, `supp_gst_no`, `supp_pan_no`)
 VALUES ('','$customer_id','$customer_is_supplier','$customer_name','$cust_contact_no','$cust_address_bill','$state_name','$state_code','$cust_email','$melting_loss','$cust_contact_person','$cust_contact_person_cont','$cust_gst_no','$cust_pan_no')";

    if(mysqli_query($conn,$sql1))
	  {
      header("Location: customer.php");
	
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
