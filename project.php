<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">


<?php
 
	if(isset($_POST['submit']))
	{  
	   $project_sr_no=$_POST['project_sr_no'];
	   $project_date=$_POST['project_date'];
	    $project_so_no=$_POST['project_so_no'];
	    $project_name=$_POST['project_name'];
		$project_po_customer=$_POST['project_po_customer'];
		$project_challan_no= $_POST['project_challan_no'];		
		//$project_bill_no=$_POST['project_bill_no'];
		$project_po_amount=$_POST['project_po_amount'];
		$project_special_note=$_POST['project_special_note'];
		$project_bill_date=$_POST['project_bill_date'];
		//$project_amount=$_POST['project_amount'];
	
	   if(!$conn)
		   {
			 die ("Connection Failed" .mysqli_error());
		   }
	
$sql="INSERT INTO `project`(`project_sr_no`,`project_date`,  `project_so_no`,`project_challan_no`, `project_name`, `project_po_customer`,`project_po_amount`,`project_special_note`, `project_bill_date`) VALUES (
'$project_sr_no','$project_date','$project_so_no','$project_challan_no','$project_name','$project_po_customer','$project_po_amount','$project_special_note','$project_bill_date')"; 

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
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

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
						 <a href="project_dashboard.php" class="btn btn-success btn-fill" style="float:right;margin:20px">Project Details</a>

                            <div class="header">
                                  <h4 class="title">CREATE PROJECT</h4>
                                <p class="category">Project Details</p>
                            
							</div>
                           
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">  
									  <div class="row">
									  		<div class="col-md-2">
                                             <div class="form-group">
										       <label>Sr No: </label>
											 <?php
									       require_once('connect.php');
									
									 
									     if( !$conn )
										{
										 die( 'Could not connect: ' . mysql_error() );
										}
										else
										{
										$rowSQL = mysqli_query($conn ,"SELECT MAX( project_sr_no ) AS max FROM project;" );
												$row = mysqli_fetch_array($rowSQL);
												$largestNumber = $row['max'];
												$acc_no=$largestNumber+1;
										}
										?>
							
										       <input readonly=true type="number"  name="project_sr_no" id="project_sr_no"
												  value="<?php echo $acc_no  ; ?>" required class="form-control"/>
												</div>
												</div>
											
											  	
											  	<div class="col-md-4">
                                             <div class="form-group">
										     <label> PROJECT NAME</label>
										      <input  type="text" name="project_name" id="project_name" 
										        value="" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-3">
                                             <div class="form-group">
										     <label> PROJECT DATE</label>
										      <input  type="date" name="project_date" id="project_date" 
										        value="" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-3">
                                             <div class="form-group">
										     <label> PROJECT COMLITION DATE</label>
										      <input  type="date" name="project_complete_date" id="project_complete_date" 
										        value="" class="form-control"/>
												 </div>
											</div>
								  <div class="col-md-3">
                                             <div class="form-group">
										     <label>SALE ORDER CHALLAN NO:</label>
										        <Select name="project_challan_no" class="form-control" id="project_challan_no">
							<option>--Please Select--</option>
							
														 <?php
															Require_once('connect.php');
															$sql=mysqli_query($conn,"select challan_no from sale_order");
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
											  
								<input  type="hidden" name="project_so_no" id="project_so_no" value="" class="form-control"/>
												
 	                                      <div class="col-md-3">
                                             <div class="form-group">
										     <label> CUSTOMER NAME</label>
										      <input  type="text" name="project_po_customer" id="project_po_customer" 
										        value="" class="form-control"/>
												 </div>
											</div>
										
											 	<div class="col-md-3">
                                             <div class="form-group">
										     <label>BILL DATE</label>
										      <input  type="date" name="project_bill_date" id="project_bill_date" 
										        value="" class="form-control"/>
												 </div>
											</div>
                                         		 	<div class="col-md-3">
                                             <div class="form-group">
										     <label>BASIC SALE ORDER AMOUNT</label>
										      <input  type="text" name="project_po_amount" id="project_po_amount" 
										        value="" class="form-control"/>
												 </div>
											</div>	
				<div class="col-md-6">
                  <div class="form-group">
				<label>SPECIAL NOTE:</label>
										     
						<textarea rows="5" type="text" name="project_special_note" id="project_special_note" 
										        value="" class="form-control">	</textarea>
												 </div>
											</div> 
                   						</div>					
							<div class="row" style="border:1px solid black; padding:20px">
							  		<div class="col-md-2">
                                             <div class="form-group">
										       <label>Sr No: </label>
											 <?php
									       require_once('connect.php');
									
									 
									     if( !$conn )
										{
										 die( 'Could not connect: ' . mysql_error() );
										}
										else
										{
										$rowSQL = mysqli_query($conn ,"SELECT MAX( project_item_sr_no ) AS max FROM project_item;" );
												$row = mysqli_fetch_array($rowSQL);
												$largestNumber = $row['max'];
												$acc_no=$largestNumber+1;
										}
										?>
							
										       <input readonly=true type="number"  name="project_item_sr_no" id="project_item_sr_no"
												  value="<?php echo $acc_no  ; ?>" required class="form-control"/>
												</div>
												</div>
											<div class="col-md-4">
                                             <div class="form-group">
										     <label>PRODUCT NAME</label>
								 <Select name="project_item" class="form-control" id="project_item">
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
											
												<div class="col-md-3">
                                             <div class="form-group">
										     <label>PRODUCT QUANTITY</label>
										      <input type="text" name="project_product_qty" id="project_product_qty" 
										        value="0" class="form-control"/>
												 </div>
											</div>
											
												<div class="col-md-3">
                                             <div class="form-group">
										     <label>RAW MATERIAL</label>
										     
								 <Select name="project_item_raw_material" id="project_item_raw_material" class="form-control" >
													
									<option>--Please Select--</option>	
													 </select>
												 </div>
											</div>
											
												<div class="col-md-2">
                                             <div class="form-group">
										     <label>AVAILABLE RAW QTY</label>
										      <input type="text" name="project_qty_available" id="project_qty_available" 
										        value="" class="form-control"/>
												 </div>
											</div>
											
											<div class="col-md-2">
                                             <div class="form-group">
										     <label>MATERIAL WEIGHT</label>
										      <input type="text" name="material_weight" id="material_weight" 
										        value="" class="form-control"/>
												 </div>
											</div>
											
										
											
											<div class="col-md-2">
                                             <div class="form-group">
										     <label>UNIT</label>
										      <input type="text" name="project_item_unit" id="project_item_unit" 
										        value="" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-2">
                                             <div class="form-group">
										     <label>USABLE QUANTITY:</label>
										      <input  type="text" name="project_quantity" id="project_quantity" 
										        value="" class="form-control"/>
												 </div>
											</div>
												<div class="col-md-2">
                                             <div style="margin-top:28px" class="form-group">
										  <label></label>
										     <input type="button" value="Click Here" id="myButton" class="btn btn-fill"/>
												 </div>
											</div>	
												<div class="col-md-2">
                                             <div class="form-group">
										     <label>PROJECT AMOUNT:</label>
										      <input  type="text" name="project_amount" id="project_amount" 
										        value="" class="form-control"/>
												 </div>
											</div>
											
												 <button onClick="javascript: return confirm('Are you sure you want to save Project Item details');" type="submit" name="submit" id="btn_save_item" class="btn btn-success btn-fill" style="float:right;margin-top:20px">SAVE ITEM</button>
											
											</div>
											
														
                                    </div>
	 <button onClick="javascript: return confirm('Are you sure you want to Save Project Details');" type="submit" name="submit" id="btn" class="btn btn-success btn-fill" style="float:right; margin-top:50px">SAVE</button>
							   
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
        $("#project_item_raw_material").change(function(){
	      var project_item_raw_material=$("#project_item_raw_material").val();
			
			$.ajax({
			type:'post',
			url: "project_raw_material_detail_fetch.php",
			data:'project_item_raw_material='+project_item_raw_material,
			success: function(result){
			
			var ret_arr=result.split("~_~");
						
				$("#project_qty_available").val(ret_arr[0]);
				$("#project_item_unit").val(ret_arr[2]);
				
    			}
			});	
				
			
		});
		
    	});
	</script>	
	

						
 <script type="text/javascript">
    $(document).ready(function() {
    $("#myButton").click(function()
   {
    var project_product_qty= parseFloat(document.getElementById("project_product_qty").value);
	
	var material_weight= parseFloat(document.getElementById("material_weight").value);
	
	
	
	tot=project_product_qty*material_weight;
	
    document.getElementById("project_quantity").value=tot;
	
	//var total_amount= parseFloat(document.getElementById("total_amount").value);
	//var tot1=total_amount+tot;
    //document.getElementById("total_amount").value=tot1;
			
	
});
});
	
	</script>	

							
  <script type="text/javascript">
    	$(document).ready(function(){
        $("#project_item").change(function(){
	      var project_item=$("#project_item").val();
			
			$.ajax({
			type:'post',
			url: "project_material_detail_fetch.php",
			data:'project_item='+project_item,
			success: function(result){
			
			var ret_arr=result.split("~_~");
						
				//$("#project_item_raw_material").val(ret_arr[0]);
				$("#material_weight").val(ret_arr[1]);
				
    			}
			});	
			
					$.ajax({
			type:'post',
			url: "project_material_detail_fetch1.php",
			data:'project_item='+project_item,
			cache: false,
			success: function(result){
		
		
			var data = jQuery.parseJSON(result);
			
			
			 var select = $("#project_item_raw_material"), options = 'Please Select';
             select.empty(); 
			  $('#project_item_raw_material').append($('<option/>').attr("value",""));
                                    for (var i = 0, len = data.length; i < len; i++) 
                                    {
                                        var name = data[i];
                                        $('#project_item_raw_material').append("<option value='"+name+"'>"+name+"</option>");
                                      
                                  }  
								
              
				}
			
			
			});
			
			
	    	});
			
			
		
    	});
	</script>	
											
											
 <script type="text/javascript">
    	$(document).ready(function() {
    $("#btn_save_item").click(function(){
        var project_sr_no = $("#project_sr_no").val();
		var project_name = $("#project_name").val();
		var project_item_sr_no = $("#project_item_sr_no").val();
		var project_item =$("#project_item").val();
		var project_product_qty =$("#project_product_qty").val();
		var project_item_raw_material = $("#project_item_raw_material").val();
		var project_item_unit = $("#project_item_unit").val();
		var project_quantity = $("#project_quantity").val();
		var project_amount = $("#project_amount").val();
		
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'project_sr_no=' + project_sr_no + '&project_name=' + project_name + '&project_item=' + project_item+ '&project_product_qty=' + project_product_qty + '&project_item_raw_material='  + project_item_raw_material + '&project_item_unit=' + project_item_unit + '&project_item_sr_no=' + project_item_sr_no + '&project_quantity=' + project_quantity+ '&project_amount=' + project_amount;
	
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "save_project_details.php",
data: dataString,

success: function(result){

alert(result);
var srno = parseInt($("#project_item_sr_no").val());

var srn=srno+1;

$("#project_item_sr_no").val(srn);

$("#project_item").val("");
$("#project_product_qty").val("");
$("#project_item_raw_material").val("");
$("#project_item_unit").val("");
$("#project_quantity").val("");
$("#project_amount").val("");


}
});

return false;
});
});

</script>
											
									   
											   
<script type="text/javascript">
    	$(document).ready(function(){
        $("#project_challan_no").change(function(){
		var project_challan_no=$("#project_challan_no").val();
			$.ajax({
			type:'post',
			url: "project_po_detail_fetch.php",
			data:'project_challan_no='+project_challan_no,
			
			
			
			success: function(result){
			
        		var ret_arr=result.split("~_~");
				$("#project_so_no").val(ret_arr[0]);
				$("#project_po_customer").val(ret_arr[1]);
				//$("#project_bill_no").val(ret_arr[2]);
				$("#project_bill_date").val(ret_arr[2]);
				$("#project_po_amount").val(ret_arr[3]);
		
				
    			}
			});	
				
				$.ajax({
			type:'post',
			url: "project_po_item_detail_fetch.php",
			data:'project_challan_no='+project_challan_no,
			cache: false,
			success: function(result){
		
		
			var data = jQuery.parseJSON(result);
			
			
			 var select = $("#project_item"), options = 'Please Select';
             select.empty(); 
			  $('#project_item').append($('<option/>').attr("value",""));
                                    for (var i = 0, len = data.length; i < len; i++) 
                                    {
                                        var name = data[i];
                                        $('#project_item').append("<option value='"+name+"'>"+name+"</option>");
                                      
                                  }  
								
              
				}
			
			
			});	
			
			
		});
		
    	});
	</script>

			</body>
			</html>