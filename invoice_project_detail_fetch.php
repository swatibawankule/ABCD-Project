<?php
require_once('connect.php');
$project_no=$_POST['project_no'];
  if($project_no!= "")
 {
 // connection should be on this page  
$sql1 = mysqli_query($conn, "select * from project where project_sr_no ='".$project_no."'");
$row = mysqli_fetch_array($sql1);
$project_po_customer=$row['project_po_customer'];
//$challan_no=$row['challan_no'];
$bill_no=$row['bill_no'];
$bill_date=$row['bill_date'];
$grand_total=$row['grand_total'];

echo $project_po_customer."~_~".$challan_no."~_~".$bill_no."~_~".$bill_date."~_~".$grand_total;
}
?>