<?php


$DB_Server = "localhost"; //MySQL Server    
$DB_Username = "root"; //MySQL Username     
$DB_Password = "";             //MySQL Password     
$DB_DBName = "abcd_enterprises";         //MySQL Database Name  
//$DB_TBLName = "monthtotal"; //MySQL Table Name   
$filename = "Raw Material Supplier Wise Report";         //File Name
/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    
//create MySQL connection
//$date = date('j F, Y', strtotime(date));
//$excelDateStamp = PHPExcel_Shared_Date::PHPToExcel(
   // new DateTime($row_data2['date'])
   //$sr2=$_GET['sr'];
  $sr1=$_GET['sr'];
  
  
   $sql="SELECT challan_no AS 'Challan No',bill_no AS 'Bill No',bill_date AS 'Bill Date',supplier AS 'Supplier Name',material AS 'Material',component AS 'Component',part_no AS 'Part No',unit AS 'Unit',in_quantity AS 'Received Quantity',material_melting_loss AS 'Melting Loss' FROM  inward_item  WHERE supplier='$sr1' ";
   

   //$sql2 = "Select *   from $DB_TBLName where MONTH(sd) ='$sr2' AND  YEAR(sd)=2017  ";
//$sql1 = "Select *   from $DB_TBLName   ";

   $Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());
//select database   
$Db = @mysql_select_db($DB_DBName, $Connect) or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno());   
//execute query 
$result = @mysql_query($sql,$Connect) or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno());    
$file_ending = "xls";
//header info for browser
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
/*******Start of Formatting for Excel*******/   
//define separator (defines columns in excel & tabs in word)
$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
for ($i = 0; $i < mysql_num_fields($result); $i++) {
echo mysql_field_name($result,$i) . "\t";

}
print("\n");    
//end of printing column names  
//start while loop to get data
    while($row = mysql_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysql_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }  
	
//SELECT invoice_item.item_name,invoice.date,invoice.invoice_no,invoice_item.quantity, invoice_item.rate,invoice_item.sales_amount, invoice_item.total FROM invoice_item JOIN invoice ON invoice_item.invoice_no_duplicate=invoice.invoice_no ORDER BY item_name	

   print "\n";

  print "\t";
  print "\t";
   print "\t";
   
   print "Total Received Quantity";

  
 
   $sql=" select SUM(quantity) AS 'Recived Quantity' from   items";

  //$sql=" select SUM(out_quantity) AS 'Outward Quantity' from   out_items";
  
  
   //$sql2 = "Select *   from $DB_TBLName where MONTH(sd) ='$sr2' AND  YEAR(sd)=2017  ";
//$sql1 = "Select *   from $DB_TBLName   ";

   $Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());
//select database   
$Db = @mysql_select_db($DB_DBName, $Connect) or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno());   
//execute query 
$result = @mysql_query($sql,$Connect) or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno());    
$file_ending = "xls";
//header info for browser

/*******Start of Formatting for Excel*******/   
//define separator (defines columns in excel & tabs in word)
$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
for ($i = 0; $i < mysql_num_fields($result); $i++) {
//echo mysql_field_name($result,$i) . "\t";

}
    
//end of printing column names  
//start while loop to get data
    while($row = mysql_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysql_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
    print("\t"); 
	
	   print(trim($schema_insert));
        print "\n";
    }  
	
	
	
?>

