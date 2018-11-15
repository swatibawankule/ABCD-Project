
<?php
include('connect.php');
$customer_is_supplier=$_POST['customer_is_supplier'];
$supplier_name=$_POST['supplier_name'];
$supp_contact_no=$_POST['supp_contact_no'];
$supp_address=$_POST['supp_address'];
$supp_emai=$_POST['supp_emai'];

$supplier_id=$_POST['supplier_id'];
//$rate=$_POST['rate'];
//$amount=$_POST['amount'];
//$sac_code_description=$_POST['sac_code_description'];
//$hsn_code_description=$_POST['hsn_code_description'];


	   if($customer_is_supplier!=" ")
	   {
		  $sql="INSERT INTO `supplier`(`supplier_id`,`customer_is_supplier`, `supplier_name`, `supp_contact_no`, `supp_address`, `supp_emai`)
 VALUES ('$supplier_id','$customer_is_supplier','$supplier_name','$supp_contact_no','$supp_address','$supp_emai')";
		  mysqli_query($conn, $sql);
	   }

?>
