<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<?php
 
	if(isset($_POST['submit']))
	{  
	    $sr_no=$_POST['sr_no'];
	    $material=$_POST['material'];
	    $material_melting_loss=$_POST['material_melting_loss'];
	    $material_hsn_sac_code=$_POST['material_hsn_sac_code'];
		$material_casting_wt=$_POST['material_casting_wt'];
		$unit= $_POST['unit'];		
		
	   if(!$conn)
		   {
			 die ("Connection Failed" .mysqli_error());
		   }
	
$sql="INSERT INTO `raw_material`(`sr_no`,`material`,  `material_melting_loss`,`material_hsn_sac_code`,`material_casting_wt`, `unit`) VALUES (
'$sr_no','$material','$material_melting_loss','$material_hsn_sac_code','$material_casting_wt','$unit')"; 

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

       <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
						 <a href=raw_material_dashboard.php class="btn btn-success btn-fill" style="float:right">Raw Material Dashboard</a>

                            <div class="header">
                                <h4 class="title">NEW RAW MATERIAL</h4>
                                <p class="category">Raw Material Details</p>
                          </div>
                          <div class="content">
							 <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
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
										$rowSQL = mysqli_query($conn ,"SELECT MAX( sr_no ) AS max FROM raw_material;" );
												$row = mysqli_fetch_array($rowSQL);
												$largestNumber = $row['max'];
												$acc_no=$largestNumber+1;
										}
										?>
										
										
										       <input readonly=true type="number"  name="sr_no" id="sr_no"
												  value="<?php echo $acc_no  ; ?>" required class="form-control"/>
												</div>
												</div>
											
												     <div class="col-md-4">
                                             <div class="form-group">
										     <label>RAW MATERIAL NAME:</label>
										      <input type="text" name="material" id="material" 
										        value="" class="form-control"/>
												 </div>
											</div>    
										 
                                            <div class="col-md-4">
                                             <div class="form-group">
										     <label>MELTING LOSS:</label>
										    
						<select name="material_melting_loss" id="material_melting_loss" class="form-control">
						<option value="">---PLease Select---</option>
							<option value="5%">5%</option>
                            <option value="6%">6%</option>	
                            <option value="7%">7%</option>	
                             <option value="8%">8%</option>								
										</select>
												 </div>
											</div> 
                                              </DIV>
                                     <div class="row">			   	
                                          
										 <div class="col-md-3">
                                             <div class="form-group">
										     <label>HSN/SAC CODE:</label>
										      <input type="text" name="material_hsn_sac_code" id="material_hsn_sac_code" value="" class="form-control"/>
												 </div>
										</div>
										 <div class="col-md-3">
                                             <div class="form-group">
										     <label>CASTING WEIGHT:</label>
										      <input type="text" name="material_casting_wt" id="material_casting_wt" value="" class="form-control"/>
												 </div>
										</div>
										  
										  
											<div class="col-md-3">
                                             <div class="form-group">
										     <label>UNIT:</label>
										     <input type="text" name="unit" id="unit" 
										        value="" class="form-control"/>
												 </div>
											</div>
                              			</div>
				
	 </div>              
</div>				
</div>
	 <button onClick="javascript: return confirm('Are you sure you want to New Raw Material ?');" type="submit" name="submit" id="btn_save_item" class="btn btn-success btn-fill" style="float:right;margin-top:20px">SAVE</button>
							   
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