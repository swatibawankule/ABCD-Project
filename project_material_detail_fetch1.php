<?php
require_once('connect.php');
$project_item=$_POST['project_item'];
if($project_item!= "")
 {
  
    $sql1 = mysqli_query($conn, "SELECT `raw_material` 
FROM `product_inventory` where `componenet_name_product`= '".$project_item."'");
while($row=mysqli_fetch_Array($sql1))
{
 $itemname = $row['raw_material'];
 
   
	$users_arr[] = array($itemname);
}

// encoding array to json format
echo json_encode($users_arr);

}
?>