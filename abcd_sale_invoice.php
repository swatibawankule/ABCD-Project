<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>ABCD Enterprises</title>

 <script>
function printpage() {
    
    var printButton = document.getElementById("printpagebutton");
    printButton.style.visibility = 'hidden';
    window.print()
    printButton.style.visibility = 'visible';
}
</script>

<?php
 
 function numtowords($number){

   $no = floor($number);
  // print_r($no);
   $point = round($number - $no ,2)* 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 :2;
     if ($number){
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? '  ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
   
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ? $words[floor($point / 10) * 10]. " " . $words[$point % 10] :'';
 // print_r($point);
 if($point==0)
 {
	 echo $result . "Rupees "."Only ";
 }
 else
 {
  echo $result . "Rupees "."and"." " . $points . " Paise "." Only ";
 }
 }
 ?>
 <style type="text/css" media="print">
    @page 
    {
        size:  auto;   /* auto is the initial value */
        margin: 1;  /* this affects the margin in the printer settings */
    }

    html
    {
        background-color: #FFFFFF; 
        margin: 5px;  /* this affects the margin on the html before sending to printer */
    }
	@page front-matter :left {
  @bottom-left {
    content: (page, original);
  }
}

    body
    {
        border: solid 1px #FFFFFF ;
      /*  margin: 10mm 15mm 10mm 15mm;  margin you want for the content */
    }
	header
{
  }

footer
{
  
}

    </style>
<!--<style>
@media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}
</style>
-->
<?php
require_once('connect.php');
$invoice_no=$_REQUEST['invoice_no'];
	$query = "SELECT * from sale_invoice where invoice_no='".$invoice_no."'"; 
	$result = mysqli_query($conn, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);
	
 $invoice_no=$row['invoice_no'];
	    $invoice_date=$row['invoice_date'];
		
		$timestamp = strtotime($invoice_date);
        $invoice_date = date("d-m-Y", $timestamp);
		//$powo=$row['powo'];
		//$powo_date= $row['powo_date'];		
			//$timestamp = strtotime($powo_date);
        //$powo_date = date("d-m-Y", $timestamp);
		//$vendor_code_no=$row['vendor_code_no'];
		$bill_to=$row['bill_to'];
		$bill_to_address=$row['bill_to_address'];
		$gst_no=$row['gst_no'];
		$ship_to=$row['ship_to'];
		$shipping_address=$row['shipping_address'];
		$contc_person=$row['contc_person'];
		$buyer_ordr_no=$row['buyer_ordr_no'];
		$buyer_ordr_no_dated=$row['buyer_ordr_no_dated'];
		$mode_term_of_payment=$row['mode_term_of_payment'];
		$other_resources=$row['other_resources'];
		$delivery_note_date=$row['delivery_note_date'];
		$dispatched_through=$row['dispatched_through'];
		$destination=$row['destination'];
		$contc_no=$row['contc_no'];
		$state_name=$row['state_name'];
		$state_code=$row['state_code'];
		$terms_cond=$row['terms_cond'];
		//$unit=$row['unit'];
		$cgst=$row['cgst'];
		$sgst=$row['sgst'];
		$igst=$row['igst'];
		$cgst1=$row['cgst1'];
		$sgst1=$row['sgst1'];
		$igst1=$row['igst1'];
		$grand_total=$row['grand_total'];
		//$total=$row['total'];
			$sql2=mysqli_query($conn,"select SUM(amount) AS total  from sales_invoice_item WHERE invoice_no_duplicate='".$invoice_no."'"); 
		$row_sum = mysqli_fetch_array($sql2);
			$total = $row_sum['total'];

?>
</head>
<body style="font-family:Arial, Helvetica, sans-serif">
<div>
<header><label id="print" style="float:right"></label></header>

<table border="1"  style="width: 1000px; height: 20px; border-collapse: collapse;padding:0;margin:0" >
     <tr>
      <td align="center" style="font-size: xx-large;">
        <label>Tax Invoice</label>
      </td>
     </tr>
</table>
<table border="1" style="width: 1000px; height: 150px; border-collapse: collapse;padding:0;margin:0" >
  <tr>
    <td rowspan="3" style="width: 500px;">
    <b>ABCD ENTERPRISES (ALUMINIUM BEST CASTING & DIES)</b><br>
    Gat No 19, Moi-Road, Near Chikhali<br>
    Pune - 411062<br>
    GSTIN/UIN: 27ATSPK1386Q1ZO<br>
    State Name : Maharashtra, Code : 27<br>
    E-Mail : abcdentpune@gmail.com
    </td>
	 <td>Invoice No.<br>
	      &emsp;<b><?php echo $invoice_no;?></b>
	  </td>
      <td>Dated:<br>
	       &emsp;<b><?php echo $invoice_date;?></b>
	  </td>
    
   </tr>
 
	  <tr>
    <td>Delivery Note:<br>
	     &emsp;<b><?php echo $invoice_no;?></b>
	</td>
    <td>Mode/Terms of Payment:<br>
	<?php echo $mode_term_of_payment;?>
	</td>
  </tr>
     <tr>
       <td>Supplier's Ref.<br>
	        &emsp;<b><?php echo $invoice_no;?></b>
   	   </td>
       <td>Other Reference(s):<br>
	
	   </td>
     </tr>
 </table>
 <table border="1" style="width: 1000px; height: 150px; border-collapse: collapse;padding:0;margin:0" >
  <tr>
    <td rowspan="3" style="width: 500px;">
     Consignee<br>
          <b><?php echo $bill_to;?></b><br>
          <?php echo $bill_to_address;?><br>
		  
  GSTIN/UIN : <?php echo $gst_no;?><br>
   State Name : <?php echo $state_name;?>, Code : <?php echo $state_code;?>
    </td>
       <td>Buyer's Order No.<br>
	      &emsp;<b><?php echo $buyer_ordr_no;?></b>
	  </td>
      <td>Dated:<br>
	       &emsp;<b><?php echo $buyer_ordr_no_dated;?></b>
	  </td>
   </tr>
  <tr>
    <td>Dispatched Document No.<br>
	     &emsp;<b><?php echo $invoice_no;?></b>
	</td>
    <td>Delivery Note Date<br>
	      &emsp;<b><?php echo $delivery_note_date;?></b>
	</td>
  </tr>
     <tr>
       <td>Despatched through<br>
	        &emsp;<b><?php echo $dispatched_through;?></b>
   	   </td>
       <td>Destination:<br>
	       <b><?php echo $destination;?></b>
	   </td>
     </tr>
 </table>
 <table border="1" style="width: 1000px; height: 150px; border-collapse: collapse;padding:0;margin:0" >
  <tr>
    <td style="width: 500px;">
        Buyer (if other than consignee)<br>
          <b><?php echo $ship_to;?></b><br>
          <?php echo $shipping_address;?><br>
		  
        GSTIN/UIN : <?php echo $gst_no;?><br>
        State Name : <?php echo $state_name;?>, Code : <?php echo $state_code;?>
    </td>terms_cond
	<td>Terms of Delivery:<br><br><br><br><br><br>
	     <?php echo $terms_cond;?>
	     
	</td>
    </tr>
 
 </table>

 <br>
 <table border="1"  style="width: 1000px; height:100px; border-collapse: collapse;padding:0;margin:0" >
  <tr>
   <td style="width: 10px;"><b>Sr. <br>No.</b></td>
   <td align="center"><b>Description Of Goods</b></td>
  <td align="center"><b>HSN/SAC</b></td>
    <td align="center" style="width: 70px;"><b>Quantity</b></td>
	  <td align="center"><b>Rate</b></td>
     <td align="center"><b>Per</b></td>
  
    <td align="center"><b>Amount</b></td>

 <tr style="height: 40px;">
   <td align="center">
   <?php 
		
		     $sql2=mysqli_query($conn,"select * from sales_invoice_item WHERE invoice_no_duplicate='".$invoice_no."'");
			$i=1;
			while ($row5 = mysqli_fetch_array ($sql2))
			{								
			echo $i."<br>"."<hr>";
		$i++;
			} ?>
   </td>
    <td align="center">
		<?php 
		
		      $sql2=mysqli_query($conn,"select * from sales_invoice_item WHERE invoice_no_duplicate='".$invoice_no."'");
			while ($row5 = mysqli_fetch_array ($sql2))
			{								
				echo $row5['product_name']."<br>"."<hr>";
		
			} ?>
	</td>
      <td align="center">	<?php 
		
		     $sql2=mysqli_query($conn,"select * from sales_invoice_item WHERE invoice_no_duplicate='".$invoice_no."'");
			while ($row5 = mysqli_fetch_array ($sql2))
			{								
				echo $row5['invoice_item_hsn']."<br>"."<hr>";
		
			} ?>
 </td>
 
   <td align="center">	<?php 
		
		     $sql2=mysqli_query($conn,"select * from sales_invoice_item WHERE invoice_no_duplicate='".$invoice_no."'");
			while ($row5 = mysqli_fetch_array ($sql2))
			{								
				echo $row5['qty']."<br>"."<hr>";
		
			} ?>
 </td>
	  <td align="center">
  	<?php 
		
	     $sql2=mysqli_query($conn,"select * from sales_invoice_item WHERE invoice_no_duplicate='".$invoice_no."'");
				while ($row5 = mysqli_fetch_array ($sql2))
			{								
				echo $row5['rate']."<br>"."<hr>";
		
			} ?>
  </td>			 
  <td align="center">
  	<?php 
		
	     $sql2=mysqli_query($conn,"select * from sales_invoice_item WHERE invoice_no_duplicate='".$invoice_no."'");
			while ($row5 = mysqli_fetch_array ($sql2))
			{								
				echo $row5['unit']."<br>"."<hr>";
		
			} ?>
  </td>

  <td align="right">
  	<?php 
		
	     $sql2=mysqli_query($conn,"select * from sales_invoice_item WHERE invoice_no_duplicate='".$invoice_no."'");
			while ($row5 = mysqli_fetch_array ($sql2))
			{								
				echo $row5['amount']."<br>"."<hr>";
		
			} ?>
  </td>
 </tr>

<tr>

  <td></td>
  <td align="right">OUTPUT CGST @ <?php echo $cgst;?>%<br>
  OUTPUT SGST @ <?php echo $sgst;?>%<br>
  OUTPUT IGST @ <?php echo $igst;?>%  </td>
   <td></td>
   <td></td>
   <td align="right"><?php echo $cgst;?><br><?php echo $sgst;?><br><?php echo $igst;?></td>
  <td align="right" style="font-size:large"><b>%<br>%<br>%</b></td>
   <td align="right"><?php echo $cgst1;?><br><?php echo $sgst1;?><br><?php echo $igst;?></td>
</tr>
 <tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td align="right" style="font-size:large"><b>Total:</b></td>
  <td align="right" style="font-size:large"><b><?php echo $grand_total;?></b></td>
</tr>
 </table>
 
 <table border="1"  style="width: 1000px; height: 70px; border-collapse: collapse;padding:0;margin:0" >
  <tr>
   <td style="width: 600px;"><b>Amount In Words: &emsp;<?php echo numtowords($grand_total)?> </b>
   
   </td>
   <td style="width: 400px;"><b>Grand Total&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:
          <?php
	 
	  function toMoney($val,$symbol='&#8377; ',$r=2)
{


    $n = $val; 
    $c = is_float($n) ? 1 : number_format($n,$r);
    $d = '.';
    $t = ',';
    $sign = ($n < 0) ? '-' : '';
    $i = $n=number_format(abs($n),$r); 
    $j = (($j = strlen($i)) > 3) ? $j % 3 : 0; 

   return  $symbol.$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j)) ;

}

//echo toMoney($grandtotal);
$amount=$grand_total;
$amount<0?(($sign='-').($amount*=-1)):$sign=''; //Extracting sign from given amount
$pos=strpos($amount, '.'); //Identifying the decimal point position
$amt=  substr($amount, $pos-3); // Extracting last 3 digits of integer part along with fractional part
$amount=  substr($amount,0, $pos-3); //removing the extracted part from amount
for(;strlen($amount);$amount=substr($amount,0,-2)) // Now loop through each 2 digits of remaining integer part
    $amt=substr ($amount,-2).','.$amt; //forming Indian Currency format by appending (,) for each 2 digits
echo  '&#8377; '.$sign.$amt; //Appending sign

   ?>
   </td>
  </tr>
 </table>
 <table border="1"  style="width: 1000px; height: 50px; border-collapse: collapse;padding:0;margin:0" >
 <tr>
 <td align="center"><b>HSN / SAC Code</b></td>
  <td align="center"><b>Taxable Value</b></td>
    <td style="width: 120px;">
      <table>
        <tr>
         <td colspan="2" align="center" style="width: 700px;"><b>CGST</b></td>
        </tr>
        <tr>
         <td style="width: 25px;" align="center"><b>Rate | Amount </b></td>
       </tr>
      </table>
   </td>
  <td style="width: 120px;">
      <table>
        <tr>
         <td colspan="2" align="center" style="width: 700px;"><b>SGST</b></td>
        </tr>
        <tr>
         <td style="width: 25px;" align="center"><b>Rate | Amount </b></td>
       </tr>
      </table>
   </td>
     <td style="width: 120px;">
      <table>
        <tr>
         <td colspan="2" align="center" style="width: 700px;"><b>IGST</b></td>
        </tr>
        <tr>
         <td style="width: 25px;" align="center"><b>Rate | Amount </b></td>
       </tr>
      </table>
   </td>
     <td align="center"><b>Total Tax Amount</b></td>
 </tr>
 
 <tr>
  <td align="center">	
  <?php 
		
		     $sql2=mysqli_query($conn,"select * from sales_invoice_item WHERE invoice_no_duplicate='".$invoice_no."'");
			while ($row5 = mysqli_fetch_array ($sql2))
			{								
				echo $row5['invoice_item_hsn']."<br>";
		
			} ?>
 </td>
<?php $grandtotal1=$cgst1+$sgst1+$igst1; ?>
 <td align="right"><?php echo $total;?></td>
 <td align="center"><?php echo $cgst;?>% | <?php echo $cgst1;?></td>
 <td align="center"><?php echo $sgst;?>% | <?php echo $sgst1;?></td>
 <td align="center"><?php echo $igst;?>% | <?php echo $igst1;?></td>
 <td align="right"><?php echo $grandtotal1;?></td>
 </tr>
  <tr align="right">
 <td>Total</td>
  <td align="right"><?php echo $total;?></td>
  <td><?php echo $cgst1;?></td>
  <td><?php echo $sgst1;?></td>
  <td><?php echo $igst1;?></td>
 <td><?php echo $grand_total;?></td>
 </tr>
 </table>
 
  <table border="1"  style="width: 1000px; height: 70px; border-collapse: collapse;padding:0;margin:0" >
  <tr style="border-bottom:hidden">
   <td style="width: 600px;"><b>Tax Amount In Words: &emsp;<?php echo numtowords($grandtotal1)?></b><br>
Amount of tax subject to Reverse Charge
   
    </td>
  
  </tr>
 </table>

 <table border="1"  style="width: 1000px; height: 90px; border-collapse: collapse;padding:0;margin:0" >
 <tr style="border-top:hidden">
 
  <td style="width: 300px;" >
    <table>
    
       <tr>
        <td><b>PAN No.</b></td>
        <td>: BKMPS2167K</td>
      </tr>
    </table>
  </td>
  
 </tr>
 
 </table>

 
 <table border="1"  style="width: 1000px; height: 200px; border-collapse: collapse;padding:0;margin:0" >
   <tr>
      <td align="center" width="300px"><b>Declarartion</b><br>
      <p align="justify" style="font-size: small;padding:10px">
	
We declare that this invoice shows the actual price of the
goods described and that all particulars are true and
correct.
      </p>
	
	</td>
	
    
	
	    <td align="center" width="300px">
		
	<table>
<tr>
      <td></td>
	  
	</tr>   
<tr>
	    <td align="center"><b>
	     <b>for ABCD ENTERPRISES (ALUMINIUM BEST CASTING & DIES)</b><br><b><br><br><br><br><br><br><br>
	    <br>Authorised signatory</b></td>

	</tr>
		</table>
		
		
	</td>
 
  </table>
</div>





<input type="button"  style="width:100px;height:50px;font-size:20px;background-color:grey" value="Print" onClick="printpage()" id="printpagebutton"/>

</body>
</html>