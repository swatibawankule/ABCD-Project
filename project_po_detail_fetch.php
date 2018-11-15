<?php
require_once('connect.php');
$project_challan_no=$_POST['project_challan_no'];
  if($project_challan_no!= "")
 {
 // connection should be on this page  
$sql1 = mysqli_query($conn, "select * from sale_order where challan_no ='".$project_challan_no."'");
$row = mysqli_fetch_array($sql1);
$so_customer=$row['so_customer'];
$so_sr_no=$row['so_sr_no'];
//$bill_no=$row['bill_no'];
$bill_date=$row['bill_date'];
$total_amount=$row['total_amount'];

echo $so_sr_no."~_~".$so_customer."~_~".$bill_date."~_~".$total_amount;
}
?>