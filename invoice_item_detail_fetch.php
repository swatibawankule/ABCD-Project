<?php
require_once('connect.php');
$project_no=$_POST['project_no'];
if($project_no!= "")
 {
  
    $sql1 = mysqli_query($conn, "SELECT `project_item` 
FROM `project_item` where `project_name`= '".$project_no."'");
while($row=mysqli_fetch_Array($sql1))
{
 $itemname = $row['project_item'];
 
   
	$users_arr[] = array($itemname);
}

// encoding array to json format
echo json_encode($users_arr);

}
?>