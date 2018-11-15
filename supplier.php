<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<?php
 
	if(isset($_POST['submit']))
	{  
	    $supplier_id=$_POST['supplier_id'];
		//$customer_is_supplier=$_POST['customer_is_supplier'];
	    $supplier_name=$_POST['supplier_name'];
		$supp_address=$_POST['supp_address'];
		$supp_state=$_POST['supp_state'];
		$supp_state_code=$_POST['supp_state_code'];
		$supp_contact_no= $_POST['supp_contact_no'];		
		$supp_emai=$_POST['supp_emai'];
		$melting_loss=$_POST['melting_loss'];
		$supp_contact_person=$_POST['supp_contact_person'];
		$supp_contact_person_cont=$_POST['supp_contact_person_cont'];
		$supp_gst_no=$_POST['supp_gst_no'];
		$supp_pan_no=$_POST['supp_pan_no'];
		$supp_bank_addr=$_POST['supp_bank_addr'];
		$supp_acc_name=$_POST['supp_acc_name'];
		$supp_bank_name=$_POST['supp_bank_name'];
		$supp_acc_no=$_POST['supp_acc_no'];
		$supp_ifsc_code=$_POST['supp_ifsc_code'];
		
$sql="INSERT INTO `supplier`(`supplier_id`, `supplier_name`, `supp_address`,`supp_state`,`supp_state_code`, `supp_contact_no`, `supp_emai`,`melting_loss`, `supp_contact_person`, `supp_contact_person_cont`, `supp_gst_no`, `supp_pan_no`, `supp_bank_addr`, `supp_bank_name`,`supp_acc_name`, `supp_acc_no`, `supp_ifsc_code`) VALUES (
'$supplier_id','$supplier_name','$supp_address','$supp_state','$supp_state_code','$supp_contact_no','$supp_emai','$melting_loss','$supp_contact_person','$supp_contact_person_cont','$supp_gst_no','$supp_pan_no','$supp_bank_addr','$supp_bank_name','$supp_acc_name','$supp_acc_no','$supp_ifsc_code')";  

if(mysqli_query($conn, $sql))
 {
	
	  }
	  else
	  {
	 echo "Error" . mysqli_error($conn);
	  }
	  
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
	

	</script>
       <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
						 <a href=supplier_dashboard.php class="btn btn-success btn-fill" style="float:right">Supplier Details</a>

                            <div class="header">
                                <h4 class="title">CREATE SUPPLIER</h4>
                                <p class="category">Supplier Details</p>
                            
							</div>
                           
						    <div class="content">
							   <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">  
									  <div class="row">
									  		<div class="col-md-4">
                                             <div class="form-group">
										       <label>SUPPLIER NO: </label>
											 <?php
									       require_once('connect.php');
									
									 
									     if( !$conn )
										{
										 die( 'Could not connect: ' . mysql_error() );
										}
										else
										{
										$rowSQL = mysqli_query($conn ,"SELECT MAX( supplier_id ) AS max FROM supplier;" );
												$row = mysqli_fetch_array($rowSQL);
												$largestNumber = $row['max'];
												$acc_no=$largestNumber+1;
										}
										?>
										
										
										       <input readonly=true type="number"  name="supplier_id" id="supplier_id"
												  value="<?php echo $acc_no  ; ?>" required class="form-control"/>
												</div>
												</div>
												<div class="col-md-4">
                                             <div class="form-group">
										     <label>SUPPLIER NAME</label>
										      <input type="text" name="supplier_name" id="supplier_name" 
										        value="" class="form-control"/>
												 </div>
											</div>	
                                            <div class="col-md-4">
                                             <div class="form-group">
										     <label>CONTACT NO:</label>
										      <input type="text" name="supp_contact_no" id="supp_contact_no" 
										        value="" class="form-control"/>
												 </div>
											</div> 
                                              </DIV>
                                     <div class="row">		
									 <div class="col-md-5">
                                             <div class="form-group">
										     <label>ADDRESS:</label>
										     
												<textarea rows="3" type="text" name="supp_address" id="supp_address" 
										        value="" class="form-control">	</textarea>
												 </div>
											</div> 
											
									<script type="text/javascript">
    	$(document).ready(function(){
        $("#supp_state").change(function(){
		
			var supp_state=$("#supp_state").val();
			$.ajax({
			type:'post',
			url: "supplier_state_fetch.php",
			data:'supp_state='+supp_state,
			success: function(result){
			var ret_arr=result.split("~_~");
			$("#supp_state_code").val(ret_arr[0]);
			
				}
			});	
				
		  });
		
    	});
</script>		
											
										<div class="col-md-3">
                                             <div class="form-group">
										     <label>STATE</label>
										    <select class="form-control" name="supp_state" id="supp_state">
										 <option>--Please Select--</option>
										  <?php
															Require_once('connect.php');
															$sql=mysqli_query($conn,"select state_name from state_information");
															while($row=mysqli_fetch_array($sql))
															 {
															?>
														  <option value="<?php echo $row["state_name"];?>"> <?php echo $row["state_name"]; ?></option>
															<?php
															}
															?>
										</select>
												 </div>
											</div>
												<div class="col-md-3">
                                             <div class="form-group">
										     <label>STATE CODE</label>
										      <input type="text" name="supp_state_code" id="supp_state_code" 
										        value="" class="form-control"/>
												 </div>
											</div>
											
												</div>
											
								 	<div class="row">
									<div class="col-md-4">
                                             <div class="form-group">
										     <label>E-MAIL ID</label>
										      <input type="text" name="supp_emai" id="supp_emai" 
										        value="" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>MELTING LOSS</label>
										      <input type="text" name="melting_loss" id="melting_loss" 
										        value="" class="form-control"/>
												 </div>
											</div>
									<div class="col-md-3">
                                             <div class="form-group">
										     <label>GST NO:</label>
										      <input type="text" name="supp_gst_no" id="supp_gst_no" 
										        value="" class="form-control"/>
												 </div>
											</div>		
                                          
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>PAN NO.</label>
										      <input type="text" name="supp_pan_no" id="supp_pan_no" 
										        value="" class="form-control"/>
												 </div>
											</div>	
                                      	<div class="col-md-3">
                                             <div class="form-group">
										     <label> CONTACT PERSON</label>
										      <input type="type" name="supp_contact_person" id="supp_contact_person" 
										        value="" class="form-control"/>
												 </div>
											</div>	

											<div class="col-md-3">
                                             <div class="form-group">
										     <label> CONTACT NO</label>
										      <input type="text" name="supp_contact_person_cont" id="supp_contact_person_cont" 
										        value="" class="form-control"/>
												 </div>
											</div>	
												
											</div>
										<div class="row">
										<div class="col-md-3">
                                             <div class="form-group">
										     <label>BANK NAME:</label>
										      <input type="text" name="supp_bank_name" id="supp_bank_name" 
										        value="" class="form-control"/>
												 </div>
											</div>
	                                <div class="col-md-3">
                                             <div class="form-group">
										     <label>ACCOUNT NAME:</label>
										      <input type="text" name="supp_acc_name" id="supp_acc_name" 
										        value="" class="form-control"/>
												 </div>
											</div>											
											<div class="col-md-3">
                                            <div class="form-group">
										     <label>BANK ADDRESS:</label>
										      <input type="text" name="supp_bank_addr" id="supp_bank_addr" 
										        value="" class="form-control"/>
												 </div>
											</div><div class="col-md-3">
                                            <div class="form-group">
											
										     <label>ACCOUNT NO:</label>
										      <input type="text" name="supp_acc_no" id="supp_acc_no" 
										        value="" class="form-control"/>
												 </div>
											</div><div class="col-md-3">
											<div class="form-group">
											
										     <label>IFSC CODE:</label>
										      <input type="text" name="supp_ifsc_code" id="supp_ifsc_code" 
										        value="" class="form-control"/>
												 </div>
											</div>
			
	  </div>
	 </div>              
</div>				
</div>
	 <button onClick="javascript: return confirm('Are you sure you want to save Supplier details');" type="submit" name="submit" id="btn" class="btn btn-success btn-fill" style="float:right;margin-top:20px">SAVE</button>
							   
							   </div>
							   
							   
							   </form>
											   </div>
											   </div>
											   </div>
											   </div>
											   </div>
											   </div>
									<!---		   
											   
											    <script type="text/javascript">
    	$(document).ready(function() {
    $("#btn_save_item").click(function(){
        
   	
		var item_sr_no = $("#item_sr_no").val();
		//alert(srno);
		var sr_no = $("#sr_no").val();
		var item_description =$("#item_description").val();
		var rate = $("#rate").val();
		var unit = $("#unit").val();
		
		//alert("inn");
		
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'item_sr_no=' + item_sr_no + '&item_description=' + item_description + '&rate='  + rate + '&unit=' + unit + '&sr_no=' + sr_no;
	// AJAX Code To Submit Form.
	
$.ajax({
type: "POST",
url: "quotation _item.php",
data: dataString,

success: function(result){

alert(result);
var srno = parseInt($("#item_sr_no").val());

var srn=srno+1;

$("#item_sr_no").val(srn);

$("#item_description").val("");

$("#rate").val("");
$("#unit").val("");



}
});

return false;
});
});

</script>
-->
			</body>
			</html>