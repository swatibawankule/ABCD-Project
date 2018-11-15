<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

	
<?php
 
	if(isset($_POST['submit']))
	{  
	    $po_sr_no=$_POST['po_sr_no'];
	    $po_supplier=$_POST['po_supplier'];
	    $challan_no= $_POST['challan_no'];		
		$bill_date=$_POST['bill_date'];
		$po_supplier_addr=$_POST['po_supplier_addr'];
		$po_supplier_gst=$_POST['po_supplier_gst'];
		$po_supplier_state=$_POST['po_supplier_state'];
		$po_supplier_state_code=$_POST['po_supplier_state_code'];
		$po_dispatched_through=$_POST['po_dispatched_through'];
		$po_terms_payment=$_POST['po_terms_payment'];
		$po_special_note=$_POST['po_special_note'];
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
		
$sql="INSERT INTO `purchase_order`(`po_sr_no`, `po_supplier`, `challan_no`, `bill_date`,`po_supplier_addr`,`po_supplier_gst`,`po_supplier_state`,`po_supplier_state_code`,`po_dispatched_through`,`po_terms_payment`,`po_special_note`,`total_amount`, `cgst_per`, `cgst_amnt`, `sgst_per`, `sgst_amnt`,`igst_per`, `igst_amnt`, `grand_total`) VALUES (
'$po_sr_no','$po_supplier','$challan_no','$bill_date','$po_supplier_addr','$po_supplier_gst','$po_supplier_state','$po_supplier_state_code','$po_dispatched_through','$po_terms_payment','$po_special_note','$total_amount','$cgst_per','$cgst_amnt','$sgst_per','$sgst_amnt','$igst_per',
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
						 <a href=purchase_order_dashboard.php class="btn btn-success btn-fill" style="float:right">PURCHASE ORDER DASHBOARD</a>

                            <div class="header">
                                <h4 class="title">ADD NEW PURCHASE ORDER</h4>
                                <p class="category">Purchase Order Details</p>
                            
							</div>
                           
						    <div class="content">
							   <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">  
									  <div class="row">
									  		<div class="col-md-2">
                                             <div class="form-group">
										       <label>PO. NO: </label>
											 <?php
									       require_once('connect.php');
									
									 
									     if( !$conn )
										{
										 die( 'Could not connect: ' . mysql_error() );
										}
										else
										{
										$rowSQL = mysqli_query($conn ,"SELECT MAX( po_sr_no ) AS max FROM purchase_order;" );
												$row = mysqli_fetch_array($rowSQL);
												$largestNumber = $row['max'];
												$acc_no=$largestNumber+1;
										}
										?>
										
										
										       <input readonly=true type="number"  name="po_sr_no" id="po_sr_no"
												  value="<?php echo $acc_no  ; ?>" required class="form-control"/>
												</div>
												</div>
											  <div class="col-md-4">
                                             <div class="form-group">
										        <label>SUPPLIER NAME</label>
													  <select id="po_supplier" name="po_supplier" class="form-control">
										                 <option>---Please Select---</option>
													    <?php
															Require_once('connect.php');
															$sql=mysqli_query($conn,"select * from supplier");
															while($row=mysqli_fetch_array($sql))
															 {
															?>
														  <option value="<?php echo $row["supplier_name"];?>"> <?php echo $row["supplier_name"]; ?></option>
															<?php
															}
															?>
													 </select>
												  </div>
												 </div>	
												  <div class="col-md-3">
                                             <div class="form-group">
										     <label>INVOICE NO:</label>
										      <input type="text" name="challan_no" id="challan_no" 
										        value="" class="form-control"/>
												 </div>
											</div>
										
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>BILL DATE</label>
										      <input type="date" name="bill_date" id="bill_date" 
										        value="" class="form-control"/>
												 </div>
											</div>
                                      
                                              </div>
									   <div class="row">
									 	<div class="col-md-5">
                                             <div class="form-group">
										     <label>SUPPLIER ADDRESS:</label>
										 <textarea rows="2" type="text" name="po_supplier_addr" id="po_supplier_addr" 
										        value="" class="form-control">	</textarea>
												 </div>
											</div>
										
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>SUPPLIER GST NO</label>
										      <input type="text" name="po_supplier_gst" id="po_supplier_gst" 
										        value="" class="form-control"/>
												 </div>
											</div> 
				                         <div class="col-md-2">
                                             <div class="form-group">
										     <label>STATE</label>
										      <input type="text" name="po_supplier_state" id="po_supplier_state" 
										        value="" class="form-control"/>
												 </div>
											</div> 
											<div class="col-md-2">
                                             <div class="form-group">
										     <label>STATE CODE</label>
										      <input type="text" name="po_supplier_state_code" id="po_supplier_state_code" 
										        value="" class="form-control"/>
												 </div>
											</div> 
									
												</div>		  
                                     <div class="row">
									 	<div class="col-md-3">
                                             <div class="form-group">
										     <label>DISPATCHED THROUGH:</label>
										      <input type="text" name="po_dispatched_through" id="po_dispatched_through" 
										        value="" class="form-control"/>
												 </div>
											</div>
										
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>MODE TERMS OF PAYMENT</label>
										      <input type="text" name="po_terms_payment" id="po_terms_payment" 
										        value="" class="form-control"/>
												 </div>
											</div> 
				
									<div class="col-md-6">
                  <div class="form-group">
				<label>SPECIAL NOTE:</label>
										     
						<textarea rows="5" type="text" name="po_special_note" id="po_special_note" 
										        value="" class="form-control">	</textarea>
												 </div>
											</div> 
											
												</div>
											<br>
										 	<div class="row" style="border:1px solid black; padding:20px">
											
												<div class="col-md-1">
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
										$rowSQL = mysqli_query($conn ,"SELECT MAX( po_item_sr_no ) AS max FROM purchase_order_item;" );
												$row = mysqli_fetch_array($rowSQL);
												$largestNumber = $row['max'];
												$acc_no=$largestNumber+1;
										}
										?>
										      <input readonly=true type="type" name="po_item_sr_no" id="po_item_sr_no" 
										        value="<?php echo $acc_no  ; ?>" class="form-control"/>
												 </div>
											</div>
								<div class="col-md-4">
                                  <div class="form-group">
							  <label>RAW MATERIAL</label>
								 <select id="po_raw_material" name="po_raw_material" class="form-control">
										                 <option>---Please Select---</option>
													    <?php
															Require_once('connect.php');
															$sql=mysqli_query($conn,"select * from raw_material");
															while($row=mysqli_fetch_array($sql))
															 {
															?>
														  <option value="<?php echo $row["material"];?>"> <?php echo $row["material"]; ?></option>
															<?php
															}
															?>
													 </select>
												 </div>
											</div>	
											<div class="col-md-5">
                                             <div class="form-group">
										     <label>OTHER ITEM NAME</label>
										      <input type="text" name="item" id="item" 
										        value="" class="form-control"/>
												 </div>
											</div>	

                                          
											<div class="col-md-2">
                                             <div class="form-group">
										     <label>UNIT:</label>
								 <select class="form-control" name="unit" id="unit">
									<option value="Kg">KGS</option>
									<option value="No">NOS</option>
											</select>
												 </div>
											</div>
                              											
                                      	<div class="col-md-3">
                                             <div class="form-group">
										     <label>QUANTITY</label>
										      <input type="type" name="quantity" id="quantity" 
										        value="" class="form-control"/>
												 </div>
											</div>	

											<div class="col-md-3">
                                             <div class="form-group">
										     <label> RATE:</label>
										      <input type="text" name="rate" id="rate" 
										        value="" class="form-control"/>
												 </div>
											</div>	
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>AMOUNT:</label>
										      <input readonly=true type="text" name="amount" id="amount" 
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

    var quantity= parseFloat(document.getElementById("quantity").value);
	
    var rate= parseFloat(document.getElementById("rate").value);
		
	tot=quantity*rate;
	
  document.getElementById("amount").value=tot;
			 
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
        
   	
		var po_item_sr_no = $("#po_item_sr_no").val();
		var po_sr_no = $("#po_sr_no").val();
		var item =$("#item").val();
		var challan_no =$("#challan_no").val();
		var rate = $("#rate").val();
		var unit = $("#unit").val();
		var quantity = $("#quantity").val();
		var amount = $("#amount").val();
		
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'po_item_sr_no=' + po_item_sr_no + '&item=' + item +'&rate='  + rate + '&unit=' + unit + '&po_sr_no=' + po_sr_no +'&challan_no=' + challan_no + '&quantity=' + quantity+ '&amount=' + amount;
	
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "purchase_item.php",
data: dataString,

success: function(result){

alert(result);
var srno = parseInt($("#po_item_sr_no").val());

var srn=srno+1;

$("#po_item_sr_no").val(srn);
$("#item").val("");
$("#rate").val("");
$("#unit").val("");
$("#quantity").val("");
$("#amount").val("");


}
});

return false;
});
});

</script>
			</body>
			</html>