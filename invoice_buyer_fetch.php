
<?php
require_once('connect.php');

$project_no=$_POST['project_no'];
  if($project_no!= "")
 {
    $sql1 = mysqli_query($conn, "SELECT `project_challan_no`, `project_bill_date` 
FROM `project` where `project_name`= '".$project_no."'");
$row = mysqli_fetch_array($sql1);

$project_challan_no=$row['project_challan_no'];
$project_bill_date=$row['project_bill_date'];

echo $project_challan_no."~_~".$project_bill_date;
}
?>