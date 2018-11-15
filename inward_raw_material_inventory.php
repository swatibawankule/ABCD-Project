<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

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
						 <a href=raw_item_dashboard.php class="btn btn-success btn-fill" style="float:right">Inward Raw Material</a>

                            <div class="header">
                                <h4 class="title">INWARD RAW MATERIAL</h4>
                                <p class="category">Raw Material Details</p>
                            
							</div>
                           
						    <div class="content">
							   <form method="post" action="raw_item_update.php">  
									  <div class="row">
									  		<div class="col-md-4">
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
										$rowSQL = mysqli_query($conn ,"SELECT MAX( po_no ) AS max FROM inward_item;" );
												$row = mysqli_fetch_array($rowSQL);
												$largestNumber = $row['max'];
												$acc_no=$largestNumber+1;
										}
										?>
										
										
										       <input readonly=true type="number"  name="po_no" id="po_no"
												  value="<?php echo $acc_no  ; ?>" required class="form-control"/>
												</div>
												</div>
											  <div class="col-md-4">
                                             <div class="form-group">
										        <label>SUPPLIER</label>
													  <select id="supplier" name="supplier" class="form-control">
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
												   
										      <input type="hidden" name="customer_is_supplier" id="customer_is_supplier" 
										        value="" class="form-control"/>
												  
                                            <div class="col-md-4">
                                             <div class="form-group">
										     <label>MELTING LOSS:</label>
										      <input type="text" name="material_melting_loss" id="material_melting_loss" 
										        value="" class="form-control"/>
												 </div>
											</div> 
                                              </DIV>
                                     <div class="row">			   	<div class="col-md-4">
                                             <div class="form-group">
										     <label>CHALLAN NO:</label>
										      <input type="text" name="challan_no" id="challan_no" 
										        value="" class="form-control"/>
												 </div>
											</div>
										
											<div class="col-md-4">
                                             <div class="form-group">
										     <label>BILL DATE</label>
										      <input type="date" name="bill_date" id="bill_date" 
										        value="" class="form-control"/>
												 </div>
											</div>
												</div>
											
										 	<div class="row">
											 <div class="col-md-3">
                                             <div class="form-group">
										        <label>MATERIAL</label>
													  <select id="material" name="material" class="form-control">
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
                                          
										 <div class="col-md-3">
                                             <div class="form-group">
										     <label>HSN/SAC CODE:</label>
										      <input type="text" name="hsn_sac" id="hsn_sac" value="" class="form-control"/>
												 </div>
										</div>
										 <div class="col-md-3">
                                             <div class="form-group">
										     <label>WEIGHT:</label>
										      <input type="text" name="weight" id="weight" value="" class="form-control"/>
												 </div>
										</div>
										  
										  
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>UNIT:</label>
										     <input type="text" name="unit" id="unit" 
										        value="" class="form-control"/>
												 </div>
											</div>
                              											
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>RECEIVED QUANTITY:</label>
										      <input type="text" name="in_quantity" id="in_quantity" 
										        value="" class="form-control"/>
												 </div>
											</div>	
											
											</div>
				
	 </div>              
</div>				
</div>
	 <button onClick="javascript: return confirm('Are you sure you want to Add Raw Material ?');" type="submit" name="submit" id="btn_save_item" class="btn btn-success btn-fill" style="float:right;margin-top:20px">SAVE</button>
							   
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


		$("#supplier").change(function(){
			//alert("inn");
			var supplier=$("#supplier").val();
			//alert(bill_to);
			 
			
			$.ajax({
			type:'post',
			url: "supp_detail_fetch.php",
			data:'supplier='+supplier,
			success: function(result){
			//alert(result);
        		var ret_arr=result.split("~_~");
					//alert(ret_arr[0]);
				//$("#txt_add").val(ret_arr[1]);	
				$("#material_melting_loss").val(ret_arr[0]);
				$("#customer_is_supplier").val(ret_arr[1]);
				
    			}
			});	
				
			
		});
		
    	});
	</script>
<!--
	 <script type="text/javascript">
    	$(document).ready(function() {
    $("#btn_save_item").click(function(){
        
   	
		var po_no = $("#po_no").val();
		var supplier = $("#supplier").val();
		var material_melting_loss =$("#material_melting_loss").val();
		var challan_no =$("#challan_no").val();
		var bill_no = $("#bill_no").val();
		var bill_date = $("#bill_date").val();
		var material = $("#material").val();
		var unit =$("#unit").val();
			var in_quantity =$("#in_quantity").val();
		var component = $("#component").val();
		var part_no = $("#part_no").val();
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'po_no=' + po_no + '&supplier=' + supplier + '&material_melting_loss=' + material_melting_loss +'&challan_no=' + challan_no + '&bill_no='  + bill_no + '&bill_date=' + bill_date +
		'&material=' + material + '&unit=' + unit + '&in_quantity=' + in_quantity+  '&component=' + component + '&part_no=' + part_no;
		
	// AJAX Code To Submit Form.
	
$.ajax({
type: "POST",
url: "raw_item_update.php",
data: dataString,

success: function(result){

alert(result);
var po_no = parseInt($("#po_no").val());

var srn=srno+1;

$("#po_no").val(srn);

$("#challan_no").val("");
$("#supplier").val("");
$("#challan_no1").val("");
$("#material_melting_loss").val("");
$("#challan_no").val("");
$("#bill_no").val("");
$("#bill_date").val("");
$("#material").val("");
$("#unit").val("");
$("#in_quantity").val("");
$("#component").val("");
$("#part_no").val("");

}
});

return false;
});
});

</script>
	
	-->
	
		<script type="text/javascript">
    	$(document).ready(function(){


		$("#material").change(function(){
			//alert("inn");
			var material=$("#material").val();
			//alert(bill_to);
			 
			
			$.ajax({
			type:'post',
			url: "material_detail_fetch.php",
			data:'material='+material,
			success: function(result){
			//alert(result);
        		var ret_arr=result.split("~_~");
					//alert(ret_arr[0]);
				//$("#txt_add").val(ret_arr[1]);	
				$("#hsn_sac").val(ret_arr[0]);
				$("#weight").val(ret_arr[1]);
				$("#unit").val(ret_arr[2]);
				$("#component").val(ret_arr[3]);
				$("#part_no").val(ret_arr[4]);
				
				
    			}
			});	
				
			
		});
		
    	});
	</script>
	
		 <script type="text/javascript">
    	$(document).ready(function() {
    $("#btn_save_item1").click(function(){
        
   	
	
		var in_quantity = $("#in_quantity").val();
		
		
		
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'in_quantity=' + in_quantity ;
	// AJAX Code To Submit Form.
	
$.ajax({
type: "POST",
url: "raw_item_update.php",
data: dataString,

success: function(result){

alert(result);
var srno = parseInt($("#po_no").val());

var srn=srno+1;

//$("#po_no").val(srn);

//$("#challan_no").val("");
$("#in_quantity").val("");

}
});

return false;
});
});

</script>
	
			</body>
			</html>