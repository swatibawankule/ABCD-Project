<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

	
<?php
 
	if(isset($_POST['submit']))
	{  
	    $so_sr_no=$_POST['so_sr_no'];
	    $so_customer=$_POST['so_customer'];
	    $challan_no= $_POST['challan_no'];		
		//$bill_no=$_POST['bill_no'];
		$bill_date=$_POST['bill_date'];
		$so_customer_addr=$_POST['so_customer_addr'];
		$so_cust_gst=$_POST['so_cust_gst'];
		$so_cust_pan=$_POST['so_cust_pan'];
		$so_cust_state=$_POST['so_cust_state'];
		$so_cust_state_code=$_POST['so_cust_state_code'];
		$so_special_note=$_POST['so_special_note'];
		$so_mode_pay_term=$_POST['so_mode_pay_term'];
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
		
$sql="INSERT INTO `sale_order`(`so_sr_no`,`so_customer`,`challan_no`, `bill_date`,`so_customer_addr`,`so_cust_gst`,`so_cust_pan`,`so_cust_state`,`so_cust_state_code`,`so_special_note`,`so_mode_pay_term`,`total_amount`, `cgst_per`, `cgst_amnt`, `sgst_per`, `sgst_amnt`,`igst_per`, `igst_amnt`, `grand_total`) VALUES (
'$so_sr_no','$so_customer','$challan_no','$bill_date','$so_customer_addr','$so_cust_gst','$so_cust_pan','$so_cust_state','$so_cust_state_code','$so_special_note','$so_mode_pay_term','$total_amount','$cgst_per','$cgst_amnt','$sgst_per','$sgst_amnt','$igst_per',
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
						 <a href=sale_order_dashboard.php class="btn btn-success btn-fill" style="float:right">SALE ORDER DASHBOARD</a>

                            <div class="header">
                                <h4 class="title">ADD NEW SALE ORDER</h4>
                                <p class="category">Order Details</p>
                            
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
										$rowSQL = mysqli_query($conn ,"SELECT MAX( so_sr_no ) AS max FROM sale_order;" );
												$row = mysqli_fetch_array($rowSQL);
												$largestNumber = $row['max'];
												$acc_no=$largestNumber+1;
										}
										?>
										
										
										       <input readonly=true type="number"  name="so_sr_no" id="so_sr_no"
												  value="<?php echo $acc_no  ; ?>" required class="form-control"/>
												</div>
												</div>
											  <div class="col-md-4">
                                             <div class="form-group">
										        <label>CUSTOMER</label>
													  <select id="so_customer" name="so_customer" class="form-control">
										                 <option>---Please Select---</option>
													    <?php
															Require_once('connect.php');
															$sql=mysqli_query($conn,"select * from customer");
															while($row=mysqli_fetch_array($sql))
															 {
															?>
														  <option value="<?php echo $row["customer_name"];?>"> <?php echo $row["customer_name"]; ?></option>
															<?php
															}
															?>
													 </select>
												  </div>
												 </div>	
                                           
                                           
											  
                                  		<div class="col-md-3">
                                             <div class="form-group">
										     <label>SALE ORDER CHALLAN NO:</label>
										      <input type="text" name="challan_no" id="challan_no" 
										        value="" class="form-control"/>
												 </div>
											</div>
										
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>CHALLAN DATE</label>
										      <input type="date" name="bill_date" id="bill_date" 
										        value="" class="form-control"/>
												 </div>
											</div>
											
											<div class="col-md-6">
                                             <div class="form-group">
										     <label>CUSTOMER ADDRESS:</label>
										      <input type="text" name="so_customer_addr" id="so_customer_addr" 
										        value="" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>STATE:</label>
										      <input type="text" name="so_cust_state" id="so_cust_state" 
										        value="" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>STATE CODE:</label>
										      <input type="text" name="so_cust_state_code" id="so_cust_state_code" 
										        value="" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-2">
                                             <div class="form-group">
										     <label>GST NO.:</label>
										      <input type="text" name="so_cust_gst" id="so_cust_gst" 
										        value="" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-2">
                                             <div class="form-group">
										     <label>PAN NO.:</label>
										      <input type="text" name="so_cust_pan" id="so_cust_pan" 
										        value="" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>MODE/TERMS OF PAYMENT:</label>
										      <input type="text" name="so_mode_pay_term" id="so_mode_pay_term" 
										        value="" class="form-control"/>
												 </div>
											</div>
											
												<div class="col-md-5">
                  <div class="form-group">
				<label>SPECIAL NOTE:</label>
										     
						<textarea rows="5" type="text" name="so_special_note" id="so_special_note" 
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
										$rowSQL = mysqli_query($conn ,"SELECT MAX( so_item_sr_no ) AS max FROM salee_order_item;" );
												$row = mysqli_fetch_array($rowSQL);
												$largestNumber = $row['max'];
												$acc_no=$largestNumber+1;
										}
										?>
										      <input readonly=true type="type" name="so_item_sr_no" id="so_item_sr_no" 
										        value="<?php echo $acc_no  ; ?>" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-6">
                                             <div class="form-group">
										     <label>PRODUCT DESCRIPTION</label>
										      <Select name="item" class="form-control" id="item">
							<option>---Select Product---</option>
									 <?php	Require_once('connect.php');
									$sql=mysqli_query($conn,"select componenet_name_product from product_inventory");
									while($row=mysqli_fetch_array($sql))
															 {
													?>
					  <option value="<?php echo $row["componenet_name_product"];?>"> <?php echo $row["componenet_name_product"]; ?></option>
															<?php
															}
															?>
													 </select>
												 </div>
											</div>	
                                        <div class="col-md-2">
                                             <div class="form-group">
										     <label>HSN/SAC CODE</label>
										      <input type="type" name="so_hsn_code" id="so_hsn_code" 
										        value="" class="form-control"/>
												 </div>
											</div>
                                           <div class="col-md-3">
                                             <div class="form-group">
										     <label>PURPOSE</label>
										      <input type="type" name="so_pursose" id="so_pursose" 
										        value="" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-2">
                                             <div class="form-group">
										     <label>UNIT:</label>
								 <select class="form-control" name="unit" id="unit">
									<option value="Kg">Kg</option>
									<option value="No">No</option>
											</select>
												 </div>
											</div>
                              											
                                      	<div class="col-md-2">
                                             <div class="form-group">
										     <label>ORDER QUANTITY</label>
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
							
							 
							 
					 <button onClick="javascript: return confirm('Are you sure you want to save Sale Order Item details ?');" type="submit" name="" id="btn_save_item" class="btn btn-success btn-fill" style="float:right;margin-top:20px">SAVE ITEM</button>
											
											</div>
											<br><br>
			 <div class="row">			   
			 <div class="col-md-3">
                                             <div class="form-group">
										     <label>TOTAL AMOUNT:</label>
										      <input readonly=true type="text" name="total_amount" id="total_amount" 
										        value="0" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-1">
                                             <div class="form-group">
										     <label>CGST:</label>
										      <select class="form-control" name="cgst_per" id="cgst_per">
									<option value="0">0</option>
									<option value="2.5">2.5</option>
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
									<option value="2.5">2.5</option>
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
									<option value="2.5">2.5</option>
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
			
    <script type="text/javascript">
    	$(document).ready(function(){
        $("#so_customer").change(function(){
			var so_customer=$("#so_customer").val();
			$.ajax({
			type:'post',
			url: "so_customer_fetch.php",
			data:'so_customer='+so_customer,
			success: function(result){
			
        		var ret_arr=result.split("~_~");
						
				$("#so_customer_addr").val(ret_arr[0]);
				$("#so_cust_state").val(ret_arr[1]);
				$("#so_cust_state_code").val(ret_arr[2]);
				$("#so_cust_gst").val(ret_arr[3]);
				$("#so_cust_pan").val(ret_arr[4]);
				
				
    			}
			});	
		});
		});
</script>
			
	<script type="text/javascript">
    	$(document).ready(function(){
     	$("#item").change(function(){
		var item=$("#item").val();
		
			$.ajax({
			type:'post',
			url: "so_product_detail_fetch.php",
			data:'item='+item,
			success: function(result){
		
        		var ret_arr=result.split("~_~");
				
				$("#so_hsn_code").val(ret_arr[0]);
			}
			});	
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
											
											
				
	 </div>              
</div>				
</div>
	 <button onClick="javascript: return confirm('Are you sure you want to save Sale Order details');" type="submit" name="submit" id="btn_save_item" class="btn btn-success btn-fill" style="float:right;margin-top:20px">SAVE</button>
							   
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
    $("#btn_save_item").click(function(){
        
   	
		var po_item_sr_no = $("#so_item_sr_no").val();
		var so_sr_no = $("#so_sr_no").val();
		var challan_no = $("#challan_no").val();
		var item =$("#item").val();so_hsn_code
		var rate = $("#rate").val();
		var so_hsn_code = $("#so_hsn_code").val();
		var so_pursose = $("#so_pursose").val();
		var unit = $("#unit").val();
		var quantity = $("#quantity").val();
		var amount = $("#amount").val();
		
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'so_item_sr_no=' + so_item_sr_no + '&item=' + item + '&rate='  + rate +'&so_hsn_code='  + so_hsn_code+'&so_pursose='  + so_pursose + '&unit=' + unit + '&so_sr_no=' + so_sr_no +'&challan_no=' + challan_no + '&quantity=' + quantity+ '&amount=' + amount;
	
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "sale_order_item.php",
data: dataString,

success: function(result){

alert(result);
var srno = parseInt($("#so_item_sr_no").val());

var srn=srno+1;

$("#so_item_sr_no").val(srn);

$("#item").val("");
$("#rate").val("");
$("#so_hsn_code").val("");
$("#so_pursose").val("");
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