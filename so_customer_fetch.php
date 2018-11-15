<?php
require_once('connect.php');
$so_customer=$_POST['so_customer'];
  if($so_customer!= "")
 {
 // connection should be on this page  
$sql1 = mysqli_query($conn, "select * from customer where customer_name ='".$so_customer."'");
$row = mysqli_fetch_array($sql1);

$cust_address_bill=$row['cust_address_bill'];
$state_name=$row['state_name'];
$state_code=$row['state_code'];
$cust_gst_no=$row['cust_gst_no'];
$cust_pan_no=$row['cust_pan_no'];


echo $cust_address_bill."~_~".$state_name."~_~".$state_code."~_~".$cust_gst_no."~_~".$cust_pan_no;
}
?>