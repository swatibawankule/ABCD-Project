<?php
require_once('connect.php');
$po_supplier=$_POST['po_supplier'];
  if($po_supplier!= "")
 {
 // connection should be on this page  
$sql1 = mysqli_query($conn, "select * from supplier where supplier_name ='".$po_supplier."'");
$row = mysqli_fetch_array($sql1);

$supp_address=$row['supp_address'];
$supp_gst_no=$row['supp_gst_no'];
$supp_state=$row['supp_state'];
$supp_state_code=$row['supp_state_code'];
//$supp_gst_no=$row['supp_gst_no'];
//$cust_contact_person_cont=$row['cust_contact_person_cont'];
//$customer_id=$row['customer_id'];

echo $supp_address."~_~".$supp_gst_no."~_~".$supp_state."~_~".$supp_state_code;
}
?>