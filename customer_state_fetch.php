<?php
require_once('connect.php');
$state_name=$_POST['state_name'];
  if($state_name!= "")
 {
 // connection should be on this page  
$sql1 = mysqli_query($conn, "select * from state_information where 	state_name ='".$state_name."'");
$row = mysqli_fetch_array($sql1);
$state_code=$row['state_code'];


echo $state_code;
}
?>