<?php
require_once('connect.php');
include('ChromePhp.php'); 


$po_order_no2 = $_POST['po_order_no1'];
$pi_item1 = $_POST['pi_item1']; 
ChromePhp::log('Hello pi item');
ChromePhp::log($po_order_no2);
ChromePhp::log($pi_item1);
 if($pi_item1!= " ")
 {
	 try{
 // connection should be on this page  
$sql1 = mysqli_query($conn, "select * from purchase_order_item where item ='".$pi_item1."' AND po_challan_no ='".$po_order_no2."' ");
$row = mysqli_fetch_array($sql1);
$unit=$row['unit'];
$quantity=$row['quantity'];
$rate=$row['rate'];
$amount=$row['amount'];
 

echo $unit."~_~".$quantity	."~_~".$rate."~_~".$amount;
	 }
	 catch(PDOException $e){
    echo $e->getMessage;
}
 
}
?>
