<?php
require_once('connect.php');
$supp_state=$_POST['supp_state'];
  if($supp_state!= "")
 {
 // connection should be on this page  
$sql1 = mysqli_query($conn, "select * from state_information where 	state_name ='".$supp_state."'");
$row = mysqli_fetch_array($sql1);
$state_code=$row['state_code'];


echo $state_code;
}
?>