<?php

include("connect.php");

   $conDB=mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
   
//$conDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('Error: Could not connect to database.');

// Pagination Function
function pagination($query,$per_page=2,$page=1,$url='?'){   
    global $conDB; 
    $query = "SELECT COUNT(*) as `num` FROM {$query}";
    $row = mysqli_fetch_array(mysqli_query($conDB,$query));
    $total = $row['num'];
    $adjacents = "4"; 
     
    $prevlabel = "&lsaquo; Prev";
    $nextlabel = "Next &rsaquo;";
	$lastlabel = "Last &rsaquo;&rsaquo;";
     
    $page = ($page == 0 ? 1 : $page);  
    $start = ($page - 1) * $per_page;                               
     
    $prev = $page - 1;                          
    $next = $page + 1;
     
    $lastpage = ceil($total/$per_page);
     
    $lpm1 = $lastpage - 1; // //last page minus 1
     
    $pagination = "";
    if($lastpage > 1){ 
	
        $pagination .= "<ul class='pagination'>";
         
		$pagination .= "<li class='page_info'>Page {$page} of {$lastpage}</li>";
             
            if ($page > 1) $pagination.= "<li><a href='{$url}page={$prev}'>{$prevlabel}</a></li>";
             
        if ($lastpage < 1 + ($adjacents * 2)){   
            for ($counter = 1; $counter <= $lastpage; $counter++){
                if ($counter == $page)
                    $pagination.= "<li><a class='current'>{$counter}</a></li>";
                else
                    $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
             
			}
         
        } elseif($lastpage > 3 + ($adjacents * 2)){
             
            if($page < 1 + ($adjacents * 2)) {
                 
                for ($counter = 1; $counter < 2 + ($adjacents * 2); $counter++){
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
					
                    
					else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
                
				}
				
                 $pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                
				$pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";  
                     
            } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                 
                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                
				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>...</li>";
               
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                   
				   else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                
				$pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";      
                 
            } else {
                   $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                
				$pagination.= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
               
			   }
            }
        }
         
            if ($page < $counter - 1) {
				$pagination.= "<li><a href='{$url}page={$next}'>{$nextlabel}</a></li>";
				$pagination.= "<li><a href='{$url}page=$lastpage'>{$lastlabel}</a></li>";
			
			}
         
        $pagination.= "</ul>";        
    }
     
    return $pagination;
}
?>
<!doctype html>
<html lang="en">


<style type="text/css">
.blue{
		background-color:#42d0ed !important;
		border:1px solid #42d0ed !important;
		
	}
/* For this page only */
body { font-family:Arial, Helvetica, sans-serif; font-size:13px; }
.wrap { text-align:center; line-height:21px; padding:20px; }

/* For pagination function. */
ul.pagination {
    text-align:center;
    color:#829994;
}
ul.pagination li {
    display:inline;
    padding:0 3px;
}
ul.pagination a {
    color:#0d7963;
    display:inline-block;
    padding:5px 10px;
    border:1px solid #cde0dc;
    text-decoration:none;
}
ul.pagination a:hover,
ul.pagination a.current {
    background:#0d7963;
    color:#fff;
}
</style>
</head>
<body>
<div class="wrapper">
  
    <?php include('menu.php'); ?>
    	
<script type="text/javascript">
    	$(document).ready(function(){
	$("#excel").click(function(){
			//alert("inn");
			//var drp_po=$("#supplier_name").val();
	
			 window.location="excel_php_month_supp.php?sr=";
			
		});
		});
		</script>

    <div class="main-panel">
       
		
		  <div class="content">
            <div class="container-fluid">
                <div class="row">
				            
                    <div class="col-md-12">
					
					<!--
					 <button style="float:right;margin-right:20px" id="excel" type="submit" name="" class="btn  btn-fill btn-success" style="float:right;">Export To Excel</button>
					-->
                  
                        <div class="card">
                            <div class="header">
							   <h4 class="title">Item Details</h4>
                             </div>
                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
											
											
											
                                                <div class="content table-responsive table-full-width">
                                                    <table class="table table-hover table-striped">
							

<thead>
								  <th align="center" style="color:black;">Challan No.</th>
								  <th align="center" style="color:black;">Challan Date</th>
								  <th align="center" style="color:black;">Supplier</th>
								    <th align="center" style="color:black;">Material Name</th>
								
		
								   <th align="center" style="color:black;">Melting Loss</th>
								     <th align="center" style="color:black;">Unit</th>
								   <th align="center" style="color:black;">Quantity</th>
								
                                  
                                </thead>
<tbody>

<?php
$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
if ($page <= 0) $page = 1;

$per_page = 500; // Set how many records do you want to display per page.

$startpoint = ($page * $per_page) - $per_page;

$statement = "`inward_item` where customer_is_supplier ='y' "; // Change `records` according to your table name.
 
$results = mysqli_query($conDB,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");

if (mysqli_num_rows($results) != 0) {
    
	// displaying records.
    while ($row = mysqli_fetch_array($results)) {
		echo "<tr>
                                    
                                      <td style='font-size:15px'>$row[challan_no]</td>
									   <td style='font-size:15px'>$row[bill_date]</td>
									  
                                      <td style='font-size:15px'>$row[supplier]</td>
									   <td style='font-size:15px'>$row[material]</td>
                                     <td style='font-size:15px'>$row[material_melting_loss]</td>
 <td style='font-size:15px'>$row[unit]</td>
										  <td style='font-size:15px'>$row[in_quantity]</td>
										  
                                    
                                
									
									
                                   
									 </a></td>
									
                                      </tr>";
		}

 
} else {
     echo "No records are found.";
}

 // displaying paginaiton.
?>
</div>
<?php 
echo pagination($statement,$per_page,$page,$url='?');

?>
                              </div>
                           </div>
                          </div> 
</tbody>
</table><!-- .wrap -->
<?php 
echo pagination($statement,$per_page,$page,$url='?');

?>
</body>
</html>