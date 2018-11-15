<?php
require_once('connect.php');
$project_challan_no=$_POST['project_challan_no'];
if($project_challan_no!= "")
 {
  
    $sql1 = mysqli_query($conn, "SELECT `item` 
FROM `salee_order_item` where `challan_no`= '".$project_challan_no."'");
while($row=mysqli_fetch_Array($sql1))
{
 $itemname = $row['item'];
 
   
	$users_arr[] = array($itemname);
}

// encoding array to json format
echo json_encode($users_arr);

}
?>