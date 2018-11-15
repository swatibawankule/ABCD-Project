<?php include('connect.php'); ?>
<?php include('ChromePhp.php'); ?>
<!DOCTYPE html>
<html lang="en">
	
<?php
 ChromePhp::log('hello world');

	if(isset($_POST['submit']))
	{  
	    $pi_sr_no=$_POST['pi_sr_no'];
		$po_challan_no_ref=$_POST['po_challan_no_ref'];
		$po_challan_no_date=$_POST['po_challan_no_date'];
	    $pi_supplier=$_POST['pi_supplier'];
		$pi_supplier_addr=$_POST['pi_supplier_addr'];
		$pi_supplier_gst=$_POST['pi_supplier_gst'];
		$pi_supplier_state=$_POST['pi_supplier_state'];
		$pi_supplier_state_code=$_POST['pi_supplier_state_code'];
		$po_basic_value=$_POST['po_basic_value'];
		$pi_challan_no= $_POST['pi_challan_no'];		
		$pi_bill_date=$_POST['pi_bill_date'];
		$pi_dispatched_through=$_POST['pi_dispatched_through'];
		$pi_terms_payment=$_POST['pi_terms_payment'];
		$pi_special_note=$_POST['pi_special_note'];
		$total_amount=$_POST['total_amount'];
		$cgst_per=$_POST['cgst_per'];
		$cgst_amnt=$_POST['cgst_amnt'];
		$sgst_per=$_POST['sgst_per'];
		$sgst_amnt=$_POST['sgst_amnt'];
		$igst_per=$_POST['igst_per'];
		$igst_amnt=$_POST['igst_amnt'];
		$grand_total=$_POST['grand_total'];
	
	   if(!$conn)
		   {
			 die ("Connection Failed" .mysqli_error());
		   }
		//$sql2=mysqli_query($conn,"select SUM(amount) AS total  from purchase_order_item WHERE po_item_sr_no='".$po_sr_no."'"); 
		//$row_sum = mysqli_fetch_array($sql2);
			//$total = $row_sum['total'];
		
$sql="INSERT INTO `purchase_invoice`(`pi_sr_no`,`po_challan_no_ref`,`po_challan_no_date`, `pi_supplier`,`pi_supplier_addr`,`pi_supplier_gst`,`pi_supplier_state`,`pi_supplier_state_code`,`po_basic_value`, `pi_challan_no`, `pi_bill_date`,`pi_dispatched_through`,`pi_terms_payment`,`pi_special_note`,`total_amount`, `cgst_per`, `cgst_amnt`, `sgst_per`, `sgst_amnt`,`igst_per`, `igst_amnt`, `grand_total`) VALUES (
'$pi_sr_no','$po_challan_no_ref','$po_challan_no_date','$pi_supplier','$pi_supplier_addr','$pi_supplier_gst','$pi_supplier_state','$pi_supplier_state_code','$po_basic_value','$pi_challan_no','$pi_bill_date','$pi_dispatched_through','$pi_terms_payment','$pi_special_note','$total_amount','$cgst_per','$cgst_amnt','$sgst_per','$sgst_amnt','$igst_per',
'$igst_amnt','$grand_total')";

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
						 <a href=purchase_order_dashboard.php class="btn btn-success btn-fill" style="float:right">PURCHASE INVOICE DASHBOARD</a>
                            <div class="header">
                                <h4 class="title">ADD NEW PURCHASE INVOICE</h4>
                                <p class="category">Purchase Invoice Details</p>
                            
							</div>
                           
						    <div class="content">
							   <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">  
									  <div class="row">
									  		<div class="col-md-2">
                                             <div class="form-group">
										       <label>SR. NO: </label>
											 <?php
									       require_once('connect.php');
									
									 
									     if( !$conn )
										{
										 die( 'Could not connect: ' . mysql_error() );
										}
										else
										{
										$rowSQL = mysqli_query($conn ,"SELECT MAX( pi_sr_no ) AS max FROM purchase_invoice;" );
												$row = mysqli_fetch_array($rowSQL);
												$largestNumber = $row['max'];
												$acc_no=$largestNumber+1;
										}
										?>
										
										
										       <input readonly=true type="number"  name="pi_sr_no" id="pi_sr_no"
												  value="<?php echo $acc_no  ; ?>" required class="form-control"/>
												</div>
												</div>
											
												  <div class="col-md-2">
                                             <div class="form-group">
										     <label>PURCHASE INVOICE NO:</label>
										      <input required type="text" name="pi_challan_no" id="pi_challan_no" 
										        value="" class="form-control"/>
												 </div>
											</div>
										
								<div class="col-md-2">
                                   <div class="form-group">
						     <label>BILL DATE</label>
							   <input type="date" name="pi_bill_date" id="pi_bill_date" 
										        value="" class="form-control"/>
												 </div>
											</div>
                                        <div class="col-md-4">
                                             <div class="form-group">
										        <label>PURCHASE ORDER NO</label>
													  <select id="po_challan_no_ref" name="po_challan_no_ref" class="form-control">
										                 <option>---Please Select---</option>
				<option value="verbal">VERBAL</option>
													    <?php
															Require_once('connect.php');
															$sql=mysqli_query($conn,"select distinct challan_no from purchase_order");
															while($row=mysqli_fetch_array($sql))
															 {
															?>
														  <option value="<?php echo $row["challan_no"];?>"> <?php echo $row["challan_no"]; ?></option>
															<?php
															}
															?>
													 </select>
												  </div>
												 </div>	
											
												 <div class="col-md-2">
                                             <div class="form-group">
										     <label>PO DATE</label>
										      <input type="date" name="po_challan_no_date" id="po_challan_no_date" 
										        value="" class="form-control"/>
												 </div>
											</div>
                                              </div>
									   <div class="row">
									    <div class="col-md-4">
                                             <div class="form-group">
										     <label>SUPPLIER NAME</label>
										      <input type="text" name="pi_supplier" id="pi_supplier" 
										        value="" class="form-control"/>
												 </div>
											</div>
									 	<div class="col-md-8">
                                             <div class="form-group">
										     <label>SUPPLIER ADDRESS:</label>
										 <textarea rows="2" type="text" name="pi_supplier_addr" id="pi_supplier_addr" 
										        value="" class="form-control">	</textarea>
												 </div>
											</div>
										
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>SUPPLIER GST NO</label>
										      <input type="text" name="pi_supplier_gst" id="pi_supplier_gst" 
										        value="" class="form-control"/>
												 </div>
											</div> 
				                         <div class="col-md-3">
                                             <div class="form-group">
										     <label>STATE</label>
										      <input type="text" name="pi_supplier_state" id="pi_supplier_state" 
										        value="" class="form-control"/>
												 </div>
											</div> 
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>STATE CODE</label>
										      <input type="text" name="pi_supplier_state_code" id="pi_supplier_state_code" 
										        value="" class="form-control"/>
												 </div>
											</div> 
											 <div class="col-md-3">
                                             <div class="form-group">
										     <label>PO BASIC VALUE</label>
										      <input type="text" name="po_basic_value" id="po_basic_value" 
										        value="" class="form-control"/>
												 </div>
											</div> 
									
												</div>		  
                                     <div class="row">
									 	<div class="col-md-3">
                                             <div class="form-group">
										     <label>DISPATCHED THROUGH:</label>
										      <input type="text" name="pi_dispatched_through" id="pi_dispatched_through" 
										        value="" class="form-control"/>
												 </div>
											</div>
										
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>MODE TERMS OF PAYMENT</label>
										      <input type="text" name="pi_terms_payment" id="pi_terms_payment" 
										        value="" class="form-control"/>
												 </div>
											</div> 
				
						<div class="col-md-6">
                  <div class="form-group">
				<label>SPECIAL NOTE:</label>
										     
						<textarea rows="5" type="text" name="pi_special_note" id="pi_special_note" 
										        value="" class="form-control">	</textarea>
												 </div>
											</div> 
											
												</div>
											<br>
										 	<div class="row" style="border:1px solid black; padding:20px">
											
												<div class="col-md-2">
                                             <div class="form-group">
										     <label>SR NO.</label>
											  <?php
									       require_once('connect.php');
									  if( !$conn )
										{
										 die( 'Could not connect: ' . mysql_error() );
										}
										else
										{
										$rowSQL = mysqli_query($conn ,"SELECT MAX( pi_item_sr_no ) AS max FROM purchase_invoice_item;" );
												$row = mysqli_fetch_array($rowSQL);
												$largestNumber = $row['max'];
												$acc_no=$largestNumber+1;
										}
										?>
										      <input readonly=true type="type" name="pi_item_sr_no" id="pi_item_sr_no" 
										        value="<?php echo $acc_no  ; ?>" class="form-control"/>
												 </div>
											</div>
								<div class="col-md-5">
                                  <div class="form-group">
							  <label>ITEMS</label>
							
							 <Select name="pi_item1" class="form-control" id="pi_item1">
													
									<option>--Please Select--</option>	
													 </select>
												 </div>
											</div>	
											<div class="col-md-4">
                                             <div class="form-group">
										     <label>INWARD ITEM</label>
										      <input type="text" name="pi_item" id="pi_item" 
										        value="" class="form-control"/>
												 </div>
											</div>	
											<div class="col-md-1">
                                             <div class="form-group">
										     <label>PO NO</label>
										      <input type="text" name="po_order_no1" id="po_order_no1" 
										        value="" class="form-control"/>
												 </div>
											</div>	
                                           <hr>
                                          <h4>Order Details</h4>
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>UNIT:</label>
								  <input type="type" name="pi_unit1" id="pi_unit1" 
										        value="" class="form-control"/>
												 </div>
											</div>
                              											
                                      	<div class="col-md-3">
                                             <div class="form-group">
										     <label>QUANTITY</label>
										      <input type="type" name="pi_quantity1" id="pi_quantity1" 
										        value="" class="form-control"/>
												 </div>
											</div>	

											<div class="col-md-3">
                                             <div class="form-group">
										     <label> RATE:</label>
										      <input type="text" name="pi_rate1" id="pi_rate1" 
										        value="" class="form-control"/>
												 </div>
											</div>	
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>AMOUNT:</label>
										      <input type="text" name="pi_amount1" id="pi_amount1" 
										        value="" class="form-control"/>
												 </div>
											</div>
									<h4>Received Order Details</h4>
										<div class="col-md-3">
                                             <div class="form-group">
										     <label>UNIT:</label>
								 <select class="form-control" name="pi_unit" id="pi_unit">
									<option value="Kg">KGS</option>
									<option value="No">NOS</option>
											</select>
												 </div>
											</div>
                              											
                                      	<div class="col-md-3">
                                             <div class="form-group">
										     <label>QUANTITY</label>
										      <input type="type" name="pi_quantity" id="pi_quantity" 
										        value="" class="form-control"/>
												 </div>
											</div>	

											<div class="col-md-3">
                                             <div class="form-group">
										     <label> RATE:</label>
										      <input type="text" name="pi_rate" id="pi_rate" 
										        value="" class="form-control"/>
												 </div>
											</div>	
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>AMOUNT:</label>
										      <input type="text" name="pi_amount" id="pi_amount" 
										        value="" class="form-control"/>
												 </div>
											</div>	
											
										<div class="col-md-2">
                                             <div style="margin-top:28px" class="form-group">
										  <label></label>
										     <input type="button" value="Calculate" id="myButton" class="btn btn-fill"/>
												 </div>
											</div>	
							
							 
							 
					 <button onClick="javascript: return confirm('Are you sure you want to save PO Item details');" type="submit" name="submit" id="btn_save_item" class="btn btn-success btn-fill" style="float:right;margin-top:20px">SAVE ITEM</button>
											
											</div>
											<br><br>
			 <div class="row">			   
			 <div class="col-md-3">
                                             <div class="form-group">
										     <label>TOTAL AMOUNT:</label>
										      <input type="text" name="total_amount" id="total_amount" 
										        value="0" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-1">
                                             <div class="form-group">
										     <label>CGST:</label>
										      <select class="form-control" name="cgst_per" id="cgst_per">
									<option value="0">0</option>
									<option value="6">6</option>
									<option value="9">9</option>
									<option value="14">14</option>
									
											</select>
												 </div>
											</div>
											<div class="col-md-2">
                                             <div class="form-group">
										     <label>CGST AMOUNT</label>
										      <input readonly=true type="text" name="cgst_amnt" id="cgst_amnt" 
										        value="0" class="form-control"/>
												 </div>
											</div>
											
											
												<div class="col-md-1">
                                             <div class="form-group">
										     <label>SGST:</label>
										      <select class="form-control" name="sgst_per" id="sgst_per">
									<option value="0">0</option>
									<option value="6">6</option>
									<option value="9">9</option>
									<option value="14">14</option>
									
											</select>
												 </div>
											</div>
											<div class="col-md-2">
                                             <div class="form-group">
										     <label>SGST AMOUNT</label>
										      <input readonly=true type="text" name="sgst_amnt" id="sgst_amnt" 
										        value="0" class="form-control"/>
												 </div>
											</div>
											
												<div class="col-md-1">
                                             <div class="form-group">
										     <label>IGST:</label>
										      <select class="form-control" name="igst_per" id="igst_per">
									<option value="0">0</option>
									<option value="6">6</option>
									<option value="9">9</option>
									<option value="14">14</option>
									
											</select>
												 </div>
											</div>
											<div class="col-md-2">
                                             <div class="form-group">
										     <label>IGST AMOUNT</label>
										      <input readonly=true type="text" name="igst_amnt" id="igst_amnt" 
										        value="0" class="form-control"/>
												 </div>
											</div>
										</div> 
										
					<div class="row">			   
			 <div class="col-md-3">
                           <div class="form-group">
			<label>GRAND TOTAL:</label>
			 <input readonly=true type="text" name="grand_total" id="grand_total" value="" class="form-control"/>
											 </div>
											</div>
											<div class="col-md-3" style="margin-top:27px">
                                             <div class="form-group">
										    
										 <input type="button" value="Calculate" id="myButtonlast" class="btn btn-fill"/>
											 </div>
											</div>	
											</div>	
	 </div>              
</div>				
</div>
	 <button onClick="javascript: return confirm('Are you sure you want to save PO details ?');" type="submit" name="submit" id="btn_save_item" class="btn btn-success btn-fill" style="float:right;margin-top:20px">SAVE</button>
							   
							   </div>
							   
							   
							   </form>
											   </div>
											   </div>
											   </div>
											   </div>
											   </div>
											   </div>
	
   <script type="text/javascript">
    	$(document).ready(function(){
  	    $("#pi_item1").change(function(){
		var pi_item1=$("#pi_item1").val();
		var po_order_no1=$("#po_order_no1").val();
	 	$.ajax({
			type:'post',	
			url: "pi_item_detail_fetch.php",
			data:{
		    'pi_item1':pi_item1 ,
            'po_order_no1':po_order_no1
			},
			success: function(result){
        		var ret_arr=result.split("~_~");			
				$("#pi_unit1").val(ret_arr[0]);
				$("#pi_quantity1").val(ret_arr[1]);
				$("#pi_rate1").val(ret_arr[2]);
				$("#pi_amount1").val(ret_arr[3]);
				}
		,
         error: function(jqxhr, status, exception) {
             alert('Exception:', exception);
         }
			});	
		});
	});
</script>
		
<script type="text/javascript">

$(document).ready(function() {
    $("#po_challan_no_ref").click(function()
{
	po_challan_no_ref
	po_order_no1

    var po_challan_no_ref= document.getElementById("po_challan_no_ref").value;
	document.getElementById("po_order_no1").value = po_challan_no_ref;
	
});
});
	
	</script>
<script type="text/javascript">

$(document).ready(function() {
    $("#pi_item1").click(function()
{
	pi_item1
	pi_item

    var pi_item1= document.getElementById("pi_item1").value;
	document.getElementById("pi_item").value=pi_item1;
		
});
});
	
	</script>										   
	<script type="text/javascript">
    	$(document).ready(function(){
        $("#po_challan_no_ref").change(function(){
		var po_challan_no_ref=$("#po_challan_no_ref").val();
			$.ajax({
			type:'post',
			url: "pi_detail_fetch.php",
			data:'po_challan_no_ref='+po_challan_no_ref,
			success: function(result){
			var ret_arr=result.split("~_~");
				$("#po_challan_no_date").val(ret_arr[0]);
				$("#pi_supplier").val(ret_arr[1]);
			    $("#pi_supplier_addr").val(ret_arr[2]);
				$("#pi_supplier_gst").val(ret_arr[3]);
				$("#pi_supplier_state").val(ret_arr[4]);
				$("#pi_supplier_state_code").val(ret_arr[5]);
				$("#po_basic_value").val(ret_arr[8]);
				$("#pi_dispatched_through").val(ret_arr[6]);
				$("#pi_terms_payment").val(ret_arr[7]);
				
				
		       }
			});	
				
				$.ajax({
			type:'post',
			url: "purchase_invoice_item_detail_fetch.php",
			data:'po_challan_no_ref='+po_challan_no_ref,
			cache: false,
			success: function(result){
			var data = jQuery.parseJSON(result);
		    var select = $("#pi_item1"), options = 'Please Select';
             select.empty(); 
			  $('#pi_item1').append($('<option/>').attr("value",""));
                                    for (var i = 0, len = data.length; i < len; i++) 
                                    {
                                        var name = data[i];
                                        $('#pi_item1').append("<option value='"+name+"'>"+name+"</option>");
                                      
                        }  
				}
			});	
		});
	});
</script>
<script type="text/javascript">
    	$(document).ready(function(){
  	    $("#po_supplier").change(function(){
		var po_supplier=$("#po_supplier").val();
	 	$.ajax({
			type:'post',	
			url: "po_supplier_fetch.php",
			data:'po_supplier='+po_supplier,
			success: function(result){
			
        		var ret_arr=result.split("~_~");
						
				$("#po_supplier_addr").val(ret_arr[0]);
				$("#po_supplier_gst").val(ret_arr[1]);
				$("#po_supplier_state").val(ret_arr[2]);
				$("#po_supplier_state_code").val(ret_arr[3]);
				
				
    			}
			});	
				
			
		});
		
    	});
</script>

<script type="text/javascript">

$(document).ready(function() {
    $("#po_raw_material").click(function()
{
	po_raw_material
	item

    var po_raw_material= document.getElementById("po_raw_material").value;
	document.getElementById("item").value=po_raw_material;
		
});
});
	
	</script>							
											
<script type="text/javascript">
$(document).ready(function() {
    $("#myButton").click(function()
{

    var pi_quantity= parseFloat(document.getElementById("pi_quantity").value);
	
    var pi_rate= parseFloat(document.getElementById("pi_rate").value);
		
	tot=pi_quantity*pi_rate;
	
  document.getElementById("pi_amount").value=tot;
			 
	var total_amount= parseFloat(document.getElementById("total_amount").value);
	var tot1=total_amount+tot;
	 document.getElementById("total_amount").value=tot1;
			
	
});
});
	
	</script>					
<script type="text/javascript">
$(document).ready(function() {
    $("#myButtonlast").click(function()
{
	//alert("fdshu");
    var total_amount= parseFloat(document.getElementById("total_amount").value);
	
      var cgst_per= parseFloat(document.getElementById("cgst_per").value);
	  var sgst_per= parseFloat(document.getElementById("sgst_per").value);
	  var igst_per= parseFloat(document.getElementById("igst_per").value);
	  var cgst_amnt1=(total_amount*cgst_per)/100;
	  var sgst_amnt1=(total_amount*sgst_per)/100;
	  var igst_amnt1=(total_amount*igst_per)/100;
	  
	document.getElementById("cgst_amnt").value=cgst_amnt1;
	document.getElementById("sgst_amnt").value=sgst_amnt1;
	document.getElementById("igst_amnt").value=igst_amnt1;
		 
	tot=total_amount+cgst_amnt1+sgst_amnt1+igst_amnt1;
			  document.getElementById("grand_total").value=tot;
			  	
});
});
	
	</script>											   
  <script type="text/javascript">
    	$(document).ready(function() {
        $("#btn_save_item").click(function(){
        var pi_item_sr_no = $("#pi_item_sr_no").val();
		var pi_sr_no = $("#pi_sr_no").val();
		var po_challan_no_ref =$("#po_challan_no_ref").val();
		var pi_challan_no =$("#pi_challan_no").val();
		var pi_item =$("#pi_item").val();
		var pi_rate = $("#pi_rate").val();
		var pi_unit = $("#pi_unit").val();
		var pi_quantity = $("#pi_quantity").val();
		var pi_amount = $("#pi_amount").val();
		
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'pi_item_sr_no=' + pi_item_sr_no + '&pi_item=' + pi_item + '&pi_rate='  + pi_rate + '&pi_unit=' + pi_unit + '&pi_sr_no=' + pi_sr_no +'&po_challan_no_ref=' + po_challan_no_ref +'&pi_challan_no=' + pi_challan_no + '&pi_quantity=' + pi_quantity+ '&pi_amount=' + pi_amount;
	
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "save_purchase_invoice_item.php",
data: dataString,

success: function(result){

alert(result);
var srno = parseInt($("#pi_item_sr_no").val());

var srn=srno+1;

$("#pi_item_sr_no").val(srn);

$("#pi_item").val("");
$("#pi_rate").val("");
$("#pi_unit").val("");
$("#pi_quantity").val("");
$("#pi_amount").val("");


}
});

return false;
});
});

</script>
			</body>
			</html>