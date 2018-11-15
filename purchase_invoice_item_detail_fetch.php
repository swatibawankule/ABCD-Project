<?php
require_once('connect.php');
$po_challan_no_ref=$_POST['po_challan_no_ref'];
if($po_challan_no_ref!= "")
 {
  
    $sql1 = mysqli_query($conn, "SELECT `item` 
FROM `purchase_order_item` where `po_challan_no`= '".$po_challan_no_ref."' and quantity > 0");
while($row=mysqli_fetch_Array($sql1))
{
 $itemname = $row['item'];
 
   
	$users_arr[] = array($itemname);
}

// encoding array to json format
echo json_encode($users_arr);

}
?>