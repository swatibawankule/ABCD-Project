<?php
include("ChromePhp.php");
include ('/vendor/autoload.php'); 
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

ChromePhp::log("Hello Text doc!!!");
$DB_Server = "localhost"; //MySQL Server    
$DB_Username = "root"; //MySQL Username     
$DB_Password = "";             //MySQL Password     
$DB_DBName = "abcd_enterprises";         //MySQL Database Name  
//$DB_TBLName = "monthtotal"; //MySQL Table Name   
$filename = "profit loss report";         //File Name
/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    
//create MySQL connection
//$date = date('j F, Y', strtotime(date));
//$excelDateStamp = PHPExcel_Shared_Date::PHPToExcel(
   // new DateTime($row_data2['date'])
   //$projectName= $_GET['projectName'];
  //header info for browser
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xlsx");  
header("Pragma: no-cache"); 
header("Expires: 0");

$sql= "select project_po_amount, project_po_customer, project_special_note as Remark, project_complete_date from project where project_name = 'Project-008'";
   
ChromePhp::log($sql);

$Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());
//select database   
$Db = @mysql_select_db($DB_DBName, $Connect) or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno());   
//execute query 
$result = @mysql_query($sql,$Connect) or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno());  
   
ChromePhp::log($result);
// Instantiate a new PHPExcel object
$spreadsheet = new Spreadsheet();
// Set the active Excel worksheet to sheet 0
$spreadsheet->setActiveSheetIndex(0);

// Set workbook properties
$spreadsheet->getProperties()->setCreator('Rob Gravelle')
        ->setLastModifiedBy('Rob Gravelle')
        ->setTitle('A Simple Excel Spreadsheet')
        ->setSubject('PhpSpreadsheet')
        ->setDescription('A Simple Excel Spreadsheet generated using PhpSpreadsheet.')
        ->setKeywords('Microsoft office 2013 php PhpSpreadsheet')
        ->setCategory('Test file');
 
//Set active sheet index to the first sheet, 
//and add some data
 
// Set worksheet title
$spreadsheet->getActiveSheet()->setTitle('profit');
 
// Initialise the Excel row number
$rowCount = 1; 
// Iterate through each result from the SQL query in turn
// We fetch each database result row into $row in turn
while($row = mysql_fetch_array($result)){ 
    // Set cell An to the "name" column from the database (assuming you have a column called name)
    //    where n is the Excel row number (ie cell A1 in the first row)
ChromePhp::log($row);
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$rowCount, $row['project_po_amount']); 
    // Set cell Bn to the "age" column from the database (assuming you have a column called age)
    //    where n is the Excel row number (ie cell A1 in the first row)
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B'.$rowCount, $row['project_po_customer']); 
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('C'.$rowCount,$row['project_special_note']); 

     $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('D'.$rowCount,$row['project_complete_date']); 
    // Increment the Excel row counter
    $rowCount++;      
} 
 
//new code:
//$writer = IOFactory::createWriter($spreadsheet, 'Xls');
//$writer->save('php://output');


$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
$writer->save('php://output');
exit;