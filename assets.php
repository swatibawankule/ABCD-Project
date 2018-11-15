<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

	
<?php
 
	if(isset($_POST['submit']))
	{  
	    $assets_sr_no=$_POST['assets_sr_no'];
	    $asset_date=$_POST['asset_date'];
	    $asset_supplier_nmae= $_POST['asset_supplier_nmae'];		
		$asset_bill_no=$_POST['asset_bill_no'];
		$bill_date=$_POST['bill_date'];
		$total_amount=$_POST['total_amount'];
		$cgst_per=$_POST['cgst_per'];
		$cgst_amnt=$_POST['cgst_amnt'];
		$sgst_per=$_POST['sgst_per'];
		$sgst_amnt=$_POST['sgst_amnt'];
		$asset_igst=$_POST['asset_igst'];
		$asset_igst1=$_POST['asset_igst1'];
		$asset_grand_total=$_POST['asset_grand_total'];
	
	   if(!$conn)
		   {
			 die ("Connection Failed" .mysqli_error());
		   }
	
		
$sql="INSERT INTO `purchase_order`(`assets_sr_no`, `asset_date`, `asset_supplier_nmae`, `bill_no`, `bill_date`,`total_amount`, `cgst_per`, `cgst_amnt`, `sgst_per`, `sgst_amnt`,`igst_per`, `igst_amnt`, `grand_total`) VALUES (
'$assets_sr_no','$asset_date','$asset_supplier_nmae','$bill_no','$bill_date','$total_amount','$cgst_per','$cgst_amnt','$sgst_per','$sgst_amnt','$igst_per',
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
						 <a href=assts_dashboard.php class="btn btn-success btn-fill" style="float:right"> ASSET DASHBOARD</a>

                            <div class="header">
                                <h4 class="title">ADD NEW ASSET</h4>
                                <p class="category">Asset Details</p>
                            
							</div>
                           
						    <div class="content">
							   <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">  
									  <div class="row">
									  		<div class="col-md-3">
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
										$rowSQL = mysqli_query($conn ,"SELECT MAX( assets_sr_no ) AS max FROM assets;" );
												$row = mysqli_fetch_array($rowSQL);
												$largestNumber = $row['max'];
												$acc_no=$largestNumber+1;
										}
										?>
										
										
										       <input readonly=true type="number"  name="assets_sr_no" id="assets_sr_no"
												  value="<?php echo $acc_no  ; ?>" required class="form-control"/>
												</div>
												</div>
												  <div class="col-md-3">
                                             <div class="form-group">
										     <label>DATE:</label>
										      <input type="date" name="asset_date" id="asset_date" 
										        value="" class="form-control"/>
												 </div>
											</div>
											 <div class="col-md-6">
                                             <div class="form-group">
										     <label>SUPPLIER:</label>
										      <input type="text" name="asset_supplier_nmae" id="asset_supplier_nmae" 
										        value="" class="form-control"/>
												 </div>
											</div>
                                          
                                              </div>
											  
                                     <div class="row">			   
									
											<div class="col-md-4">
                                             <div class="form-group">
										     <label>BILL NO:</label>
										      <input type="text" name="asset_bill_no" id="asset_bill_no" 
										        value="" class="form-control"/>
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
										$rowSQL = mysqli_query($conn ,"SELECT MAX( asset_item_sr_no ) AS max FROM assets_item;" );
												$row = mysqli_fetch_array($rowSQL);
												$largestNumber = $row['max'];
												$acc_no=$largestNumber+1;
										}
										?>
										      <input readonly=true type="type" name="asset_item_sr_no" id="asset_item_sr_no" 
										        value="<?php echo $acc_no  ; ?>" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-6">
                                             <div class="form-group">
										     <label>ITEM DESCRIPTION</label>
										      <input type="type" name="item_description" id="item_description" 
										        value="" class="form-control"/>
												 </div>
											</div>	

                                        	<div class="col-md-4">
                                             <div class="form-group">
										     <label>Remark</label>
										      <input type="text" name="asset_quantity" id="asset_quantity" 
										        value="" class="form-control"/>
												 </div>
											</div>	  
											
                              											
                                      	<div class="col-md-3">
                                             <div class="form-group">
										     <label>QUANTITY</label>
										      <input type="text" name="asset_quantity" id="asset_quantity" 
										        value="" class="form-control"/>
												 </div>
											</div>	

											<div class="col-md-3">
                                             <div class="form-group">
										     <label> RATE:</label>
										      <input type="text" name="asset_rate" id="asset_rate" 
										        value="" class="form-control"/>
												 </div>
											</div>	
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>AMOUNT:</label>
										      <input readonly=true type="text" name="asset_amount" id="asset_amount" 
										        value="" class="form-control"/>
												 </div>
											</div>
									
											<div class="col-md-1">
                                             <div class="form-group">
										     <label>CGST:</label>
										      <select class="form-control" name="asset_cgst" id="asset_cgst">
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
										      <input readonly=true type="text" name="asset_cgst1" id="asset_cgst1" 
										        value="0" class="form-control"/>
												 </div>
											</div>
											
											
												<div class="col-md-1">
                                             <div class="form-group">
										     <label>SGST:</label>
										      <select class="form-control" name="asset_sgst" id="asset_sgst">
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
										      <input readonly=true type="text" name="asset_sgst1" id="asset_sgst1" 
										        value="0" class="form-control"/>
												 </div>
											</div>
											
												<div class="col-md-1">
                                             <div class="form-group">
										     <label>IGST:</label>
										      <select class="form-control" name="asset_igst" id="asset_igst">
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
										      <input readonly=true type="text" name="asset_igst1" id="asset_igst1" 
										        value="0" class="form-control"/>
												 </div>
											</div>
											     <div class="col-md-2">
                                             <div class="form-group">
										     <label>TOTAL AMOUNT:</label>
										      <input readonly=true type="text" name="total_amount" id="total_amount" 
										        value="0" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-3">
                                             <div style="margin-top:28px" class="form-group">
										  <label></label>
										     <input type="button" value="Calculate" id="myButton" class="btn btn-fill"/>
												 </div>
											</div>	
							 <button onClick="javascript: return confirm('Are you sure you want to save Purchase Item details');" type="submit" name="submit" id="btn_save_item" class="btn btn-success btn-fill" style="float:right;margin-top:20px">SAVE ITEM</button>
										</div> 
										
					<div class="row">			   
			 <div class="col-md-3">
                           <div class="form-group">
			<label>GRAND TOTAL:</label>
			 <input readonly=true type="text" name="asset_grand_total" id="asset_grand_total" value="" class="form-control"/>
											 </div>
											</div>
											<div class="col-md-3" style="margin-top:27px">
                                             <div class="form-group">
										    
										 <input type="button" value="Calculate" id="myButtonlast" class="btn btn-fill"/>
											 </div>
											</div>	
											</div>	
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
	 <button onClick="javascript: return confirm('Are you sure you want to save Customer details');" type="submit" name="submit" id="btn_save_item" class="btn btn-success btn-fill" style="float:right;margin-top:20px">SAVE</button>
							   
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
        
   	
		var assets_sr_no = $("#assets_sr_no").val();
		var asset_item_sr_no = $("#asset_item_sr_no").val();
		var item_description =$("#item_description").val();
		var asset_quantity = $("#asset_quantity").val();
		var asset_rate = $("#asset_rate").val();
		var asset_amount = $("#asset_amount").val();
		
		
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'asset_item_sr_no=' + asset_item_sr_no + '&item_description=' + item_description + '&asset_quantity='  + asset_quantity + '&asset_rate=' + asset_rate + '&assets_sr_no=' + assets_sr_no + '&asset_amount=' + asset_amount;
	
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "purchase_item.php",
data: dataString,

success: function(result){

alert(result);
var srno = parseInt($("#asset_item_sr_no").val());

var srn=srno+1;

$("#asset_item_sr_no").val(srn);

$("#item_description").val("");
$("#asset_quantity").val("");
$("#asset_rate").val("");
$("#asset_amount").val("");

}
});

return false;
});
});

</script>
			</body>
			</html>