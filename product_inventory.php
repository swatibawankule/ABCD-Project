<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<?php
 
	if(isset($_POST['submit']))
	{  
	    $inventory_id=$_POST['inventory_id'];
		$componenet_name_product=$_POST['componenet_name_product'];
	    $componenet_hsn_sac=$_POST['componenet_hsn_sac'];
		$raw_material=$_POST['raw_material'];
		$raw_materila_melting_loss= $_POST['raw_materila_melting_loss'];
		$material_casting_wt=$_POST['material_casting_wt'];
		$material_net_casting_wt=$_POST['material_net_casting_wt'];
		$componenet_product_qty=$_POST['componenet_product_qty'];
		
$sql="INSERT INTO `product_inventory`(`inventory_id`, `componenet_name_product`, `componenet_hsn_sac`, `raw_material`, `raw_materila_melting_loss`,`material_casting_wt`,`material_net_casting_wt`,`componenet_product_qty`) VALUES (
'$inventory_id','$componenet_name_product','$componenet_hsn_sac','$raw_material','$raw_materila_melting_loss','$material_casting_wt','$material_net_casting_wt','$componenet_product_qty')";  

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
						 <a href=product_inventory_dashboard.php class="btn btn-success btn-fill" style="float:right">Product Dashboard</a>

                            <div class="header">
                                <h4 class="title">ADD NEW PRODUCT</h4>
                                <p class="category">Product Details</p>
                            
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
										$rowSQL = mysqli_query($conn ,"SELECT MAX( inventory_id ) AS max FROM product_inventory;" );
												$row = mysqli_fetch_array($rowSQL);
												$largestNumber = $row['max'];
												$acc_no=$largestNumber+1;
										}
										?>
										
										
										       <input readonly=true type="number"  name="inventory_id" id="inventory_id"
												  value="<?php echo $acc_no  ; ?>" required class="form-control"/>
												</div>
												</div>
												<div class="col-md-5">
                                             <div class="form-group">
										     <label>PRODUCT(COMPONENET) NAME</label>
										      <input type="text" name="componenet_name_product" id="componenet_name_product" 
										        value="" class="form-control"/>
												 </div>
											</div>	
                                        <div class="col-md-4">
                                             <div class="form-group">
										     <label>MATERIAL </label>
										       <Select name="raw_material" class="form-control" id="raw_material">
												<option>--Please Select--</option>
														 <?php
															Require_once('connect.php');
															$sql=mysqli_query($conn,"select material from raw_material");
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
                                              </div>
                                 
										<div class="row">
										<div class="col-md-2">
                                             <div class="form-group">
										     <label>HSN/SAC CODE:</label>
										      <input type="text" name="componenet_hsn_sac" id="componenet_hsn_sac" 
										        value="" class="form-control"/>
												 </div>
											</div>	
											<div class="col-md-2">
                                            <div class="form-group">
											
										  <label>CASTING WEIGHT:</label>
										   <input type="text" name="material_casting_wt" id="material_casting_wt" 
										        value="" class="form-control"/>
												 </div>
											</div>
											
													<div class="col-md-2">
                                            <div class="form-group">
										     <label>MELTING LOSS:</label>
										      
							    <select class="form-control" name="raw_materila_melting_loss" id="raw_materila_melting_loss">
								<option>--Please Select--</option>
								<option value=" 5%"> 5%</option>
								<option value=" 6%"> 6%</option>
								<option value=" 7%"> 7%</option>
								<option value=" 8%"> 8%</option>
								<option value=" 9%"> 9%</option>
								<option value=" 10%"> 10%</option>
								
										</select>
												 </div>
											</div>
											<div class="col-md-2">
                                            <div class="form-group">
											
										  <label>NET CASTING WEIGHT:</label>
										   <input type="text" name="material_net_casting_wt" id="material_net_casting_wt" 
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
											
										  <label>PRODUCT QUANTITY:</label>
										   <input type="text" name="componenet_product_qty" id="componenet_product_qty" 
										        value="" class="form-control"/>
												 </div>
											</div>
			
	  </div>
	 </div>              
</div>				
</div>
	 <button onClick="javascript: return confirm('Are you sure you want to save Product details');" type="submit" name="submit" id="btn" class="btn btn-success btn-fill" style="float:right;margin-top:20px">SAVE</button>
							   
							   </div>
							   
							   
							   </form>
											   </div>
											   </div>
											   </div>
											   </div>
											   </div>
											   </div>
									
			</body>
			</html>
			
			<script type="text/javascript">
    $(document).ready(function() {
    $("#myButton").click(function()
   {
    var material_casting_wt= parseFloat(document.getElementById("material_casting_wt").value);
	
	var raw_materila_melting_loss= parseFloat(document.getElementById("raw_materila_melting_loss").value);
	
	
	
	tot = material_casting_wt * (raw_materila_melting_loss*(1/100));
	
	tot1= tot + material_casting_wt
    document.getElementById("material_net_casting_wt").value=tot1;
	

			
	
});
});
	
	</script>