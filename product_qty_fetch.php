<?php
require_once('connect.php');
$product_name=$_POST['product_name'];
$project_no=$_POST['project_no'];
  if($product_name!= "")
 {
 // connection should be on this page  
 
  $sql1 = mysqli_query($conn, "SELECT * FROM `project_item` 
   where `project_item` ='".$product_name."' and project_name='".$project_no."'");
 
$row = mysqli_fetch_array($sql1);
$project_product_qty=$row['project_product_qty'];
//$cust_address_ship	=$row['cust_address_ship'];
//$vendor_code_no=$row['vendor_code_no'];
//$cust_gst_no=$row['cust_gst_no'];
//$cust_contact_person=$row['cust_contact_person'];
//$cust_contact_person_cont=$row['cust_contact_person_cont'];
//$customer_id=$row['customer_id'];
  
echo $project_product_qty;
}
?>