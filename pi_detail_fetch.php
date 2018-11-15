<?php
require_once('connect.php');
$po_challan_no_ref=$_POST['po_challan_no_ref'];
  if($po_challan_no_ref!= "")
 {
 // connection should be on this page  
$sql1 = mysqli_query($conn, "select * from purchase_order where challan_no ='".$po_challan_no_ref."'");
$row = mysqli_fetch_array($sql1);
$bill_date=$row['bill_date'];
$po_supplier=$row['po_supplier'];
$po_supplier_addr=$row['po_supplier_addr'];
$po_supplier_gst=$row['po_supplier_gst'];
$po_supplier_state=$row['po_supplier_state'];
$po_supplier_state_code=$row['po_supplier_state_code'];
$po_dispatched_through=$row['po_dispatched_through'];
$po_terms_payment=$row['po_terms_payment'];
$total_amount=$row['total_amount'];

echo $bill_date."~_~".$po_supplier."~_~".$po_supplier_addr."~_~".$po_supplier_gst."~_~".$po_supplier_state."~_~".$po_supplier_state_code."~_~".$po_dispatched_through."~_~".$po_terms_payment."~_~".$total_amount;
}
?>