<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<script type="text/javascript">	
 function saveInDbAndSendSMS()
 {	
   <?php
	if($_SERVER['REQUEST_METHOD'] === 'POST')
	{  
	 // ChromePhp::log('hello world');
	    $invoice_no=$_POST['invoice_no'];
	    $invoice_date=$_POST['invoice_date'];
		$project_no=$_POST['project_no'];
		$bill_to=$_POST['bill_to'];
		$bill_to_address=$_POST['bill_to_address'];
		$gst_no=$_POST['gst_no'];
		$ship_to=$_POST['ship_to'];
		$shipping_address=$_POST['shipping_address'];
		$state_name=$_POST['state_name'];
		$state_code=$_POST['state_code'];
		$buyer_ordr_no=$_POST['buyer_ordr_no'];
		$buyer_ordr_no_dated=$_POST['buyer_ordr_no_dated'];
		$mode_term_of_payment=$_POST['mode_term_of_payment'];
        $other_resources=$_POST['other_resources'];
        $delivery_note_date=$_POST['delivery_note_date'];
        $dispatched_through=$_POST['dispatched_through'];
        $destination=$_POST['destination'];
		$contc_person=$_POST['contc_person'];
		$contc_no=$_POST['contc_no'];
		$terms_cond=$_POST['terms_cond'];
		$cgst=$_POST['cgst'];
		$sgst=$_POST['sgst'];
		$igst=$_POST['igst'];
		$cgst1=$_POST['cgst1'];
		$sgst1=$_POST['sgst1'];
		$igst1=$_POST['igst1'];
		$c_no=$_POST['c_no'];
		$grand_total=$_POST['grand_total'];
					
		//$total=$_POST['total'];
			$sql2=mysqli_query($conn,"select SUM(amount) AS total  from sales_invoice_item WHERE invoice_no_duplicate='".$invoice_no."'"); 
		$row_sum = mysqli_fetch_array($sql2);
			$total = $row_sum['total'];
	
		
$sql="INSERT INTO `sale_invoice`(`invoice_no`, `invoice_date`, `project_no`,`bill_to`, `bill_to_address`, `gst_no`, `ship_to`, `shipping_address`,`state_name`,`state_code`, `buyer_ordr_no`,`buyer_ordr_no_dated`,`mode_term_of_payment`,`delivery_note_date`,`other_resources`,`dispatched_through`,`destination`, `contc_person`, `contc_no`, `terms_cond`,`cgst`,  `sgst`,  `igst`,`cgst1`,  `sgst1`,  `igst1`, `total`, `c_no`, `grand_total`, `balance`) VALUES (
'$invoice_no','$invoice_date','$project_no','$bill_to','$bill_to_address','$gst_no','$ship_to', '$shipping_address','$state_name','$state_code','$buyer_ordr_no','$buyer_ordr_no_dated','$mode_term_of_payment','$delivery_note_date','$other_resources','$dispatched_through','$destination', '$contc_person','$contc_no','$terms_cond','$cgst','$sgst','$igst','$cgst1','$sgst1','$igst1','$total','$c_no','$grand_total','$grand_total' )";  

if(mysqli_query($conn, $sql))
 {
	  }
	  else
	  {
	 echo "Error" . mysqli_error($conn);
	  }	
	}
 ?>
  $.ajax({
      type: "POST",
      url: "SendSMS.php",   
  data: {
        mobileNum: $("#cust_cont_no").val();
 },
      success: function(result) {
        alert('ok');
      },
      error: function(result) {
        alert('error');
      }
    });
 

   	
 }
</script>	
	

<style>
label{
	 text-transform: uppercase;
	
}
</style>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

	<script type="text/javascript">
$(document).ready(function() {
    $("#myButtonlast").click(function()
{
	//alert("fdshu");
    var total_amount= parseFloat(document.getElementById("total_amount").value);
	
    var cgst= parseFloat(document.getElementById("cgst").value);
    var sgst= parseFloat(document.getElementById("sgst").value);
    var igst= parseFloat(document.getElementById("igst").value);
	  
	  var cgst1=(total_amount*cgst)/100;
	  var sgst1=(total_amount*sgst)/100;
	  var igst1=(total_amount*igst)/100;
	
	document.getElementById("cgst1").value=cgst1;
	document.getElementById("sgst1").value=sgst1;
	document.getElementById("igst1").value=igst1;
	
	 tot=total_amount+cgst1+sgst1+igst1;
	 
	 document.getElementById("grand_total").value=tot;
			  
	
});
});
	
	</script>
	
	<script type="text/javascript">
$(document).ready(function() {
    $("#myButton").click(function()
{
	//alert("fdshu");
    var qty= parseFloat(document.getElementById("qty").value);
	
    var rate= parseFloat(document.getElementById("rate").value);
	tot=qty*rate;
			  document.getElementById("amount").value=tot;
			  
			  var total_amount= parseFloat(document.getElementById("total_amount").value);
			 // alert(tot);
			  var sum=total_amount+tot;
			    document.getElementById("total_amount").value=sum;
			  
			  
		
	
});
});
	
	</script>
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
						 <a href=sale_dashboard.php class="btn btn-success btn-fill" style="float:right;margin:20px">Sale Invoice Details</a>

                            <div class="header">
                                  <h4 class="title">CREATE SALE INVOICE</h4>
                                <p class="category">Invoice Details</p>
                            
							</div>
                           
		   <form method="post" id="form" >  
									  <div class="row">
									  		<div class="col-md-4">
                                             <div class="form-group">
										       <label>Invoice No: </label>
											 <?php
									       require_once('connect.php');
									
									 
									     if( !$conn )
										{
										 die( 'Could not connect: ' . mysql_error() );
										}
										else
										{
										$rowSQL = mysqli_query($conn ,"SELECT MAX( invoice_no ) AS max FROM sale_invoice;" );
												$row = mysqli_fetch_array($rowSQL);
												$largestNumber = $row['max'];
												$acc_no=$largestNumber+1;
										}
										?>
							
										       <input READONLY=TRUE type="number"  name="invoice_no" id="invoice_no"
												  value="<?php echo $acc_no  ; ?>" required class="form-control"/>
												</div>
												</div>
												 <div class="col-md-4">
                                            <div class="form-group">
									           <label>Invoice Date: </label>
											   <input type="date" name="invoice_date" class="form-control"  value="<?php echo date('Y-m-d'); ?>" />
												  
										   
												</div>
											   </div>
											     <div class="col-md-4">
                                             <div class="form-group">
										       <label>PROJECT NAME </label>
											   <Select name="project_no" class="form-control" id="project_no" value="">
										<option>---Please Select---</option>
											 <?php	Require_once('connect.php');
											$sql=mysqli_query($conn,"select project_name from project");
												while($row=mysqli_fetch_array($sql))
															 {
															?>
										<option value="<?php echo $row["project_name"];?>"> <?php echo $row["project_name"]; ?></option>
															<?php
															}
															?>
													 </select>
												</div>
												</div>
									
                                        <div class="col-md-4">
                                             <div class="form-group">
										     <label> BUYER'S ORDER NO</label>
										      <input type="text" name="buyer_ordr_no" id="buyer_ordr_no" 
										        value="" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-4">
                                             <div class="form-group">
										     <label>DELIVERY CHALLAN NO</label>
										      <input type="text" name="delivery_challan_no" id="delivery_challan_no" 
										        value="" class="form-control"/>
												 </div>
											</div>
                                        <div class="col-md-4">
                                             <div class="form-group">
										     <label> BUYER'S ORDER NO DATED</label>
										      <input type="text" name="buyer_ordr_no_dated" id="buyer_ordr_no_dated" 
										        value="" class="form-control"/>
												 </div>
											</div>
												</div>
											
										 	<div class="row">
                                      	<div class="col-md-5">
                                           <div class="form-group">
										     <label> BILL TO</label>
								 <Select name="bill_to" class="form-control" id="bill_to">
									<option>---Select Bill To---</option>
									</select>
											</div>
										</div>

												<div class="col-md-7">
                                             <div class="form-group">
										     <label> BILLING ADDRESS</label>
										      <input type="text" name="bill_to_address" id="bill_to_address" 
										        value="" class="form-control"/>
												 </div>
											</div>	
											</div>
											<div class="row">
											<div class="col-md-5">
                                             <div class="form-group">
										     <label>SHIP TO:</label>
										      <input type="text" name="ship_to" id="ship_to" 
										        value="" class="form-control"/>
												 </div>
											</div>		
                                          
											<div class="col-md-7">
                                             <div class="form-group">
										     <label>SHIPPING ADDRESS</label>
										      <input type="text" name="shipping_address" id="shipping_address" 
										        value="" class="form-control"/>
												 </div>
											</div>		
											</div>
										<div class="row">
										<div class="col-md-3">
                                             <div class="form-group">
										     <label>STATE:</label>
										      <input type="text" name="state_name" id="state_name" 
										        value="" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>STATE CODE:</label>
										      <input type="text" name="state_code" id="state_code" 
										        value="" class="form-control"/>
												 </div>
											</div>
										<div class="col-md-3">
                                             <div class="form-group">
										     <label>CONTACT NO:</label>
										      <input type="text" name="cust_cont_no" id="cust_cont_no" 
										        value="" class="form-control"/>
												 </div>
											</div>	
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>EMAIL ID:</label>
										      <input type="text" name="cust_email" id="cust_email" 
										        value="" class="form-control"/>
												 </div>
											</div>	
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>GST NO:</label>
										      <input type="text" name="gst_no" id="gst_no" 
										        value="" class="form-control"/>
												 </div>
											</div>	
                                           
											<div class="col-md-3">
											 <div class="form-group">
										     <label>CONTACT PERSON:</label>
										      <input type="text" name="contc_person" id="contc_person" 
										        value="" class="form-control"/>
												 </div>
											</div>
											<div class="form-group">
											<div class="col-md-3">
										     <label>CONTACT NO:</label>
										      <input type="text" name="contc_no" id="contc_no" 
										        value="" class="form-control"/>
												 </div>
											</div>
										  <input type="hidden" name="c_no" id="c_no" 
										        value="" class="form-control"/>
												
									<div class="col-md-3">
											 <div class="form-group">
										     <label>MODE/TERMS OF PAYMENT:</label>
										      <input type="text" name="mode_term_of_payment" id="mode_term_of_payment" 
										        value="" class="form-control"/>
												 </div>
											</div>	<div class="col-md-4">
											 <div class="form-group">
										     <label>OTHER RESOURCES:</label>
										      <input type="text" name="other_resources" id="other_resources" 
										        value="" class="form-control"/>
												 </div>
											</div>
											<div class="col-md-4">
											 <div class="form-group">
										     <label>DELIVERY NOTE DATE:</label>
										      <input type="date" name="delivery_note_date" id="delivery_note_date" 
										        value="" class="form-control"/>
												 </div>
											</div>	
											<div class="col-md-4">
											 <div class="form-group">
										     <label>DISPATCHED THROUHG:</label>
										      <input type="text" name="dispatched_through" id="dispatched_through" 
										        value="" class="form-control"/>
												 </div>
											</div>	
											<div class="col-md-4">
											 <div class="form-group">
										     <label>DESTINATION:</label>
										      <input type="text" name="destination" id="destination" 
										        value="" class="form-control"/>
												 </div>
											</div>							
												
												
												<div class="col-md-6">
                                             <div class="form-group">
										     <label>TERMS AND CONDITION:</label>
										     
												<textarea rows="3" type="text" name="terms_cond" id="terms_cond" 
										        value="" class="form-control">	</textarea>
												 </div>
											   </div> 
											   
			                             </div>
			                             
			                            <div class="row">
			                            
			                                 </div>
											  <div class="row" style="border:1px solid black;padding:20px">
											  <div class="col-md-1">
                                             <div class="form-group">
										     <label>SR NO:</label>
											 	  <?php
									       require_once('connect.php');
									
									 
									     if( !$conn )
										{
										 die( 'Could not connect: ' . mysql_error() );
										}
										else
										{
										$rowSQL = mysqli_query($conn ,"SELECT MAX( sr_no ) AS max FROM sales_invoice_item;" );
												$row = mysqli_fetch_array($rowSQL);
												$largestNumber = $row['max'];
												$acc_no=$largestNumber+1;
										}
										?>
										      <input readonly=true type="text" name="sr_no" id="sr_no" 
										        value="<?php echo $acc_no; ?>"  class="form-control"/>
												 </div>
											</div>	
											<div class="col-md-4">
                                            <div class="form-group">
										     <label>PRODUCT NAME:</label>
										     <Select name="product_name" class="form-control" id="product_name">
													
													<option>--Please Select--</option>	
													 </select>
												 </div>
											</div>
											
                                        	  <div class="col-md-2">
                                             <div class="form-group">
										     <label>UNIT:</label>
										      <input type="text" name="unit" id="unit" 
										        value="" class="form-control"/>
												 </div>
											</div>	
											 <div class="col-md-2">
                                             <div class="form-group">
										     <label>HSN/SAC CODE:</label>
										      <input type="text" name="invoice_item_hsn" id="invoice_item_hsn" 
										        value="" class="form-control"/>
												 </div>
											</div>
											 <div class="col-md-2">
                                             <div class="form-group">
										     <label>ORDERED QUANTITY:</label>
										      <input readonly=true type="text" name="order_qty" id="order_qty" 
										        value="" class="form-control"/>
												 </div>
											</div>
											
											 <div class="col-md-3">
                                             <div class="form-group">
										     <label>SELLING PRODUCT QUANTITY:</label>
										      <input  type="text" name="qty" id="qty" 
										        value="" class="form-control"/>
												 </div>
											</div>	
											
                                          <div class="col-md-3">
                                             <div class="form-group">
										     <label>RATE:</label>
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
										
									
										 <div class="col-md-2" style="margin-top:29px;">
                                             <div class="form-group">
										    
								 <input type="button" value="Calculate" id="myButton" class="btn btn-fill"/>
											 </div>
											</div>
											
									
			 <input style="float:right" type="submit" name="item" value="Save Sale Items" class="btn btn-fill btn-info" id="btn_save_item"/>
								</div>
									<br>
											<div class="row">
												<div class="col-md-2">
                                             <div class="form-group">
										     <label> Total AMOUNT:</label>
										      <input readonly=true type="text" name="total_amount" id="total_amount" 
										        value="0" class="form-control"/>
												 </div>
											</div>
											  <div class="col-md-1">
                                             <div class="form-group">
										     <label>CGST</label>
											 <td><select name="cgst" id="cgst"  class="form-control">
											  <option value="0">0</option>
                                             <option value="6">6</option>
                                             <option value="9">9</option>
											  <option value="14">14</option>
												   </select>
												 </div>
										       </div>	
											   <div class="col-md-2">
                                             <div class="form-group">
										     <label>CGST AMOUNT:</label>
										      <input readonly=true type="text" name="cgst1" id="cgst1" 
										        value="0" class="form-control"/>
												 </div>
												 </div>
                                              <div class="col-md-1">
                                             <div class="form-group">
										     <label>SGST</label>
											 <td><select name="sgst" id="sgst"  class="form-control">
											  <option value="0">0</option>
                                             <option value="6">6</option>
                                             <option value="9">9</option>
											  <option value="14">14</option>
												   </select>
												 </div>
										       </div>	
											      <div class="col-md-2">
                                             <div class="form-group">
										     <label>SGST AMOUNT:</label>
										      <input readonly=true type="text" name="sgst1" id="sgst1" 
										        value="0" class="form-control"/>
												 </div>
												 </div>
											    <div class="col-md-1">
                                             <div class="form-group">
										     <label>IGST</label>
											 <td><select name="igst" id="igst"  class="form-control">
											  <option value="0">0</option>
                                             <option value="6">6</option>
                                             <option value="9">9</option>
											  <option value="14">14</option>
                                       <option value="18">18</option>
												   </select>
												 </div>
												  </div>
											   <div class="col-md-2">
                                             <div class="form-group">
										     <label>IGST AMOUNT:</label>
										      <input readonly=true type="text" name="igst1" id="igst1" 
										        value="0" class="form-control"/>
												 </div>
												 </div>
									
										  <div class="col-md-3">
                                             <div class="form-group">
										     <label>Grand Total :</label>
										      <input readonly=true type="text" name="grand_total" id="grand_total" 
										        value="" class="form-control"/>
												 </div>
												</div>		 
												
	                    <div class="col-md-2" style="margin-top:29px;">
                                             <div class="form-group">
										    
										 <input type="button" value="Calculate" id="myButtonlast" class="btn btn-fill"/>
											 </div>
											</div>	

                          </div>		
                       </div>				
                     </div>
   <a href=abcd_sale_invoice.php?invoice_no=<?php echo $acc_no-1 ; ?> class="btn btn-success btn-fill" style="float:right;margin-top:20px;margin-left:5px">Print</a>
							   
 <button onClick= "saveInDbAndSendSMS()" type="submit" name="submit" id="btn" class="btn btn-success btn-fill" style="float:right;margin-top:20px">SAVE</button>
							   
							   
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
         $("#product_name").change(function(){
        var product_name=$("#product_name").val();
        var buyer_ordr_no=$("#buyer_ordr_no").val();
         $.ajax({
            type:'post',    
            url: "si_product_detail_fetch.php",
            data:{
            'product_name':product_name ,
           'buyer_ordr_no':buyer_ordr_no
            },
            success: function(result){
             alert('result:', result);
               var ret_arr=result.split("~_~");            
                $("#unit").val(ret_arr[0]);
                $("#invoice_item_hsn").val(ret_arr[1]);
                $("#order_qty").val(ret_arr[2]);
               
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
    	$(document).ready(function(){
     	$("#product_name").change(function(){
		var product_name=$("#product_name").val();
		//var project_no=$("#project_no").val();
		//  document.getElementById("ship_to").value=bill_to;
			
			$.ajax({
			type:'post',
			url: "product_qty_fetch.php",
			data:'product_name='+product_name,
			success: function(result){
		
        		var ret_arr=result.split("~_~");
				
				$("#project_product_qty").val(ret_arr[0]);
			}
			});	
		});
     });
	</script>		
	<script type="text/javascript">
       $(document).ready(function(){
         $("#bill_to").change(function(){
        var bill_to=$("#bill_to").val();
        var buyer_ordr_no=$("#buyer_ordr_no").val();
         $.ajax({
            type:'post',    
            url: "invoice_buyer_details_fetch.php",
            data:{
            'bill_to':bill_to,
           'buyer_ordr_no':buyer_ordr_no
            },
            success: function(result){
             alert('result:', result);
               var ret_arr=result.split("~_~");            
                $("#mode_term_of_payment").val(ret_arr[0]);
               
                }
          });    
        });
    });
</script>
	<script type="text/javascript">
    	$(document).ready(function(){
     	$("#project_no").change(function(){
		var project_no=$("#project_no").val();
		$.ajax({
			type:'post',
			url: "invoice_delivery_details_fetch.php",
			data:'project_no='+project_no,
			success: function(result){
		
        		var ret_arr=result.split("~_~");
				
				$("#delivery_challan_no").val(ret_arr[0]);
				$("#buyer_ordr_no_dated").val(ret_arr[2]);
			}
			});		
        });
     });
	</script>
		
	<script type="text/javascript">
    	$(document).ready(function(){
     	$("#project_no").change(function(){
		var project_no=$("#project_no").val();
		$.ajax({
			type:'post',
			url: "invoice_buyer_fetch.php",
			data:'project_no='+project_no,
			success: function(result){
		
        		var ret_arr=result.split("~_~");
				
				$("#buyer_ordr_no").val(ret_arr[0]);
				$("#buyer_ordr_no_dated").val(ret_arr[1]);
			}
			});	
			
			$.ajax({
			type:'post',
			url: "invoice_bill_to_fetch.php",
			data:'project_no='+project_no,
			cache: false,
			success: function(result){
		
		
			var data = jQuery.parseJSON(result);
			
			
			 var select = $("#bill_to"), options = 'Please Select';
             select.empty(); 
			  $('#bill_to').append($('<option/>').attr("value",""));
                                    for (var i = 0, len = data.length; i < len; i++) 
                                    {
                                        var name = data[i];
                                        $('#bill_to').append("<option value='"+name+"'>"+name+"</option>");
                                      
                                  }  
			             	}
			
		               	});	
			
		});
     });
	</script>	
	
	<script type="text/javascript">
    	$(document).ready(function(){
        $("#project_no").change(function(){
		var project_no=$("#project_no").val();
		
		/*
			$.ajax({
			type:'post',
			url: "invoice_buyer_fetch.php",
			data:'project_no='+project_no,
			
			
			
			success: function(result){
			
        		var ret_arr=result.split("~_~");
				
				$("#buyer_ordr_no").val(ret_arr[0]);
				$("#project_challan_no").val(ret_arr[1]);
				$("#project_bill_no").val(ret_arr[2]);
				$("#project_bill_date").val(ret_arr[3]);
				$("#project_po_amount").val(ret_arr[4]);
		
				
    			}
			});	
				
			*/	
				$.ajax({
			type:'post',
			url: "invoice_item_detail_fetch.php",
			data:'project_no='+project_no,
			cache: false,
			success: function(result){
		
		
			var data = jQuery.parseJSON(result);
			
			
			 var select = $("#product_name"), options = 'Please Select';
             select.empty(); 
			  $('#product_name').append($('<option/>').attr("value",""));
                                    for (var i = 0, len = data.length; i < len; i++) 
                                    {
                                        var name = data[i];
                                        $('#product_name').append("<option value='"+name+"'>"+name+"</option>");
                                      
                                  }  
			             	}
			
		               	});	
			
	         	});
		
    	});
	</script>				   
											   
	 <script type="text/javascript">
    	$(document).ready(function() {
        $("#btn_save_item").click(function(){
    	var invoice_no = $("#invoice_no").val();
		var sr_no = $("#sr_no").val();
		var product_name =$("#product_name").val();
		var project_no =$("#project_no").val();
		var delivery_challan_no =$("#delivery_challan_no").val();
		var buyer_ordr_no =$("#buyer_ordr_no").val();
		var unit = $("#unit").val();
		var qty =$("#qty").val();
		var rate = $("#rate").val();
		var amount = $("#amount").val();
		
		// Returns successful data submission message when the entered information is stored in database.
		delivery_challan_no
		var dataString = 'invoice_no=' + invoice_no + '&project_no=' + project_no+ '&buyer_ordr_no=' + buyer_ordr_no +'&delivery_challan_no=' + delivery_challan_no + '&sr_no=' + sr_no + '&product_name='  + product_name + '&unit=' + unit+ '&qty=' + qty + '&rate=' + rate + '&project_no=' + project_no + '&amount=' + amount;
	
	
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "sale_item.php",
data: dataString,

success: function(result){

alert(result);
var srno = parseInt($("#sr_no").val());
var srn=srno+1;
$("#sr_no").val(srn);
$("#product_name").val("");
$("#rate").val("");
$("#unit").val("");
$("#qty").val("");
$("#amount").val(""); 

}
});

return false;
});
});





</script>




    <script type="text/javascript">
    	$(document).ready(function(){
        $("#bill_to").change(function(){
			//alert("inn");
			var bill_to=$("#bill_to").val();
			//alert(bill_to);
			  document.getElementById("ship_to").value=bill_to;
			
			$.ajax({
			type:'post',
			url: "bill_to_fetch.php",
			data:'bill_to='+bill_to,
			success: function(result){
			
        		var ret_arr=result.split("~_~");
						
				$("#bill_to_address").val(ret_arr[0]);
				$("#shipping_address").val(ret_arr[1]);
				$("#state_name").val(ret_arr[2]);
				$("#state_code").val(ret_arr[3]);
				$("#cust_cont_no").val(ret_arr[4]);
				$("#cust_email").val(ret_arr[5]);
				$("#gst_no").val(ret_arr[6]);
				$("#contc_person").val(ret_arr[7]);
				$("#contc_no").val(ret_arr[8]);
				$("#c_no").val(ret_arr[9]);
				
    			}
			});	
		});
		});
</script>


			</body>
			</html>