<?php
require_once('connect.php');
$bill_to=$_POST['bill_to'];
  if($bill_to!= "")
 {
 // connection should be on this page  
$sql1 = mysqli_query($conn, "select * from customer where customer_name ='".$bill_to."'");
$row = mysqli_fetch_array($sql1);

$cust_address_bill=$row['cust_address_bill'];
$cust_address_ship	=$row['cust_address_ship'];
$state_name=$row['state_name'];
$state_code=$row['state_code'];
$cust_gst_no=$row['cust_gst_no'];
$cust_contact_person=$row['cust_contact_person'];
$cust_contact_person_cont=$row['cust_contact_person_cont'];
$customer_id=$row['customer_id'];

echo $cust_address_bill."~_~".$cust_address_ship."~_~".$state_name."~_~".$state_code."~_~".$cust_gst_no."~_~".$cust_contact_person."~_~".$cust_contact_person_cont
."~_~".$customer_id;
}
?>