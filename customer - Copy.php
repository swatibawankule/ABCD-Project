<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
	
<?php
 
	if(isset($_POST['submit']))
	{  
	    $customer_id=$_POST['customer_id'];
	    $customer_is_supplier=$_POST['customer_is_supplier'];
	    $customer_name=$_POST['customer_name'];
		$cust_contact_no=$_POST['cust_contact_no'];
		$cust_address_bill= $_POST['cust_address_bill'];		
		
		$cust_address_ship=$_POST['cust_address_ship'];
		$melting_loss=$_POST['melting_loss'];
		$cust_gst_no=$_POST['cust_gst_no'];
		$cust_email=$_POST['cust_email'];
		$cust_contact_person=$_POST['cust_contact_person'];
		$cust_contact_person_cont=$_POST['cust_contact_person_cont'];
		
		$cust_pan_no=$_POST['cust_pan_no'];
	
		
	
	   if(!$conn)
		   {
			 die ("Connection Failed" .mysqli_error());
		   }
	
		
$sql="INSERT INTO `customer`(`customer_id`,`customer_is_supplier`, `customer_name`, `cust_contact_no`, `cust_address_bill`, `cust_address_ship`, `melting_loss`,
 `cust_gst_no`, `cust_pan_no`, `cust_email`, `cust_contact_person`, `cust_contact_person_cont`) VALUES (
'$customer_id','$customer_is_supplier','$customer_name','$cust_contact_no','$cust_address_bill','$cust_address_ship','$melting_loss','$cust_gst_no','$cust_pan_no',
'$cust_email','$cust_contact_person','$cust_contact_person_cont')";  if(mysqli_query($conn, $sql))
	 
	   

 {
	 
	
	  }
	  else
	  {
	 echo "Error" . mysqli_error($conn);
	  }
	  
	 /* $sql1=mysqli_query($conn, "select quantity from items where itemcode='".$txt_itemcode."'"); 
													   $row = mysqli_fetch_array($sql1);
													   $qty=$row['quantity'];
													   //echo  $qty;
													   $total= $qty-$txt_qty;
													  // echo $total;
													   $sql2="update items set quantity='".$total."' where itemcode='".$txt_itemcode."'";  
	                                                   mysqli_query($conn, $sql2) or die(mysqli_error($conn));
	   }*/
	}
	   
?>

<style>
label{
	 text-transform: uppercase;
	
}
</style>

<body>
 <div class="wrapper">
   

   


    <div class="main-panel" style="width:100%">


<?php include('menu.php'); ?>
<script type="text/javascript">
	

$(document).ready(function() {
    $("#myButton").click(function()
{
	cust_address_bill
	cust_address_ship
//alert("iuyu");
    var cust_address_bill= document.getElementById("cust_address_bill").value;
	document.getElementById("cust_address_ship").value=cust_address_bill;
	//var value_amount1= parseFloat(document.getElementById("txt_amount").value);
	
	
});
});
	
	</script>
       <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
						 <a href=customer_dashboard.php class="btn btn-success btn-fill" style="float:right">Customer Details</a>

                            <div class="header">
                                <h4 class="title">CREATE CUSTOMER</h4>
                                <p class="category">Customer Details</p>
                            
							</div>
                           
						    <div class="content">
							   <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">  
									  <div class="row">
									  		<div class="col-md-2">
                                             <div class="form-group">
										       <label>CUSTOMER No: </label>
											    <?php
									       require_once('connect.php');
									
									 
									     if( !$conn )
										{
										 die( 'Could not connect: ' . mysql_error() );
										}
										else
										{
										$rowSQL = mysqli_query($conn ,"SELECT MAX( customer_id ) AS max FROM customer;" );
												$row = mysqli_fetch_array($rowSQL);
												$largestNumber = $row['max'];
												$acc_no=$largestNumber+1;
										}
										?>
										
										       <input readonly=true type="number"  name="customer_id" id="customer_id"
												  value="<?php echo $acc_no ; ?>" required class="form-control"/>
												</div>
												</div>
												
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>CUSTOMER IS SUPPLIER </label>
								<select name="customer_is_supplier" id="customer_is_supplier" class="form-control">
								<option value="">--Please Select--</option>
								<option value="y">Yes</option>
                               								
											</select>
												 </div>
											</div>			
												
												<div class="col-md-4">
                                             <div class="form-group">
										     <label>CUSTOMER NAME</label>
										      <input type="text" name="customer_name" id="customer_name" 
										        value="" class="form-control"/>
												 </div>
											</div>	
	<div class="col-md-3">
                                             <div class="form-group">
										     <label>CONTACT NO:</label>
										      <input type="text" name="cust_contact_no" id="cust_contact_no" 
										        value="" class="form-control"/>
												 </div>
											</div> 											
												
												<div class="col-md-6">
                                             <div class="form-group">
										     <label> BILLING ADDRESS:</label>
										     
												<textarea rows="3" type="text" name="cust_address_bill" id="cust_address_bill" 
										        value="" class="form-control">	</textarea>
												 </div>
											</div> 
												
											<div class="col-md-6">
                                             <div class="form-group">
										     <label> SHIPPING ADDRESS:</label>
										   	<textarea   rows="3" type="text" name="cust_address_ship" id="cust_address_ship" 
										        value="" class="form-control">	</textarea>
												 </div>
											</div> 
										</div>
										<div class="row">
											<div class="col-md-6">
                                             <div class="form-group">
										
												 </div>
											</div> 
											<div class="col-md-4">
                                             <div class="form-group">
										
										<input id="myButton" type="checkbox" name="check" value="check">same as billing address<br>
													 </div>
											</div> 
										
										</div>
										 	<div class="row">


												<div class="col-md-3">
                                             <div class="form-group">
										     <label>E-MAIL ID</label>
										      <input type="text" name="cust_email" id="cust_email" 
										        value="" class="form-control"/>
												 </div>
											</div>	
												<div class="col-md-3">
                                             <div class="form-group">
										     <label>MELTING LOSS:</label>
										      <input type="text" name="melting_loss" id="melting_loss" 
										        value="" class="form-control"/>
												 </div>
											</div>	
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>GST NO:</label>
										      <input required type="text" name="cust_gst_no" id="cust_gst_no" 
										        value="" class="form-control"/>
												 </div>
											</div>			<div class="col-md-3">
                                             <div class="form-group">
										     <label>PAN NO.</label>
										      <input type="text" name="cust_pan_no" id="cust_pan_no" 
										        value="" class="form-control"/>
												 </div>
											</div>	
											<div class="col-md-3">
                                             <div class="form-group">
										     <label> CONTACT PERSON</label>
										      <input type="type" name="cust_contact_person" id="cust_contact_person" 
										        value="" class="form-control"/>
												 </div>
											</div>	


											<div class="col-md-3">
                                             <div class="form-group">
										     <label>CONTACT PERSON CONTACT NO</label>
										      <input type="text" name="cust_contact_person_cont" id="cust_contact_person_cont" 
										        value="" class="form-control"/>
												 </div>
											</div>					
	  </div>
	 </div>

                  
</div>							  

											
										
											   </div>
		    <button onClick="javascript: return confirm('Are you sure you want to save Customer details');" type="submit" name="submit" id="btn_save_supplier" class="btn btn-success btn-fill" style="float:right;margin-top:20px">SAVE</button>
							   
							   </div>
							   
							   
							   </form>
											   </div>
											   </div>
											   </div>
											   </div>
											   </div>
											   </div>
											   
										   
		 <script type="text/javascript">
    	$(document).ready(function() {
    $("#btn_save_supplier").click(function(){
        
		var customer_is_supplier = $("#customer_is_supplier").val();
		
   	
		var supplier_id = $("#supplier_id").val();
		//alert(srno);
		
		//if(customer_is_supplier=="Yes"){
			//	customer_is_supplier=customer_is_supplier;
				
			//}
			
		var supplier_name = $("#supplier_name").val();
		var supp_address =$("#supp_address").val();
		var supp_contact_no =$("#supp_contact_no").val();
		var supp_emai = $("#supp_emai").val();
		var melting_loss = $("#melting_loss").val();
		var supp_contact_person = $("#supp_contact_person").val();
		
			var supp_contact_person_cont = $("#supp_contact_person_cont").val();
		var supp_gst_no = $("#supp_gst_no").val();
		var supp_pan_no = $("#supp_pan_no").val();
		//alert("inn");
		
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'supplier_id=' + supplier_id + 'customer_is_supplier=' + customer_is_supplier +'&supplier_name=' + supplier_name + '&supp_address='  + supp_address +
		'&supp_contact_no=' + supp_contact_no +
		'&supp_emai=' + supp_emai + '&melting_loss=' + melting_loss+
		'&supp_contact_person=' + supp_contact_person + '&supp_contact_person_cont=' + supp_contact_person_cont + 
		'&supp_gst_no=' + supp_gst_no + '&supp_pan_no=' + supp_pan_no;
	// AJAX Code To Submit Form.
	
$.ajax({
type: "POST",
url: "sale_item.php",
data: dataString,

success: function(result){

alert(result);
var srno = parseInt($("#supplier_id").val());

var srn=srno+1;

$("#supplier_id").val(srn);
$("#customer_is_supplier").val(srn);
$("#supplier_name").val("");
$("#supp_address").val("");
$("#supp_contact_no").val("");
$("#supp_emai").val("");
$("#melting_loss").val("");
//$("#sac_code").val("");
//$("#hsn_sac_code").val("");
//$("#description_of_item").val("");
//$("#item_no").val(""); 

//$("#amount").val(""); 

}
});

return false;
});
});

</script>

<!--
 <script type="text/javascript">
    	$(document).ready(function() {
    $("#btn_save_supplier").click(function(){
		
	
        
   	    var supplier_id = $("#supplier_id").val();
        var supplier_name = $("#supplier_name").val();
		var supp_address =$("#supp_address").val();
		var supp_contact_no =$("#supp_contact_no").val();
		var supp_emai = $("#supp_emai").val();
		
		//alert("inn");
		
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'supplier_id=' + supplier_id + '&supplier_name=' + supplier_name + '&supp_address='  + supp_address +
		'&supp_contact_no=' + supp_contact_no +
		'&supp_emai=' + supp_emai;
	// AJAX Code To Submit Form.
	
$.ajax({
type: "POST",
url: "quotation_item.php",
data: dataString,

success: function(result){

alert(result);
var srno = parseInt($("#supplier_id").val());

var srn=srno+1;

$("#supplier_id").val(srn);

$("#supplier_name").val("");
$("#supp_address").val("");
$("#supp_contact_no").val("");
$("#supp_emai").val("");
}
});

return false;
});
});

</script>
--->
			</body>
			</html>