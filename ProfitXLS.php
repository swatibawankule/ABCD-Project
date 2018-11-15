<?php
// CONNECT TO DATABASE
include("ChromePhp.php");
$DB_Server = "localhost"; //MySQL Server    
$DB_Username = "root"; //MySQL Username     
$DB_Password = ""; //MySQL Password     
$DB_DBName = "abcd_enterprises";  //MySQL Database Name  
//charset

// CREATE PHPSPREADSHEET OBJECT
require "/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;



   $projectName= $_GET['projectName'];
// CREATE A NEW SPREADSHEET + POPULATE DATA
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setTitle('Profit And Loss statement');
$sheet->setCellValueByColumnAndRow(0, 1, "test");
 //$sheet->mergeCells('A1:B1');

$sql= "select project_po_amount, project_po_customer, project_special_note as Remark, project_complete_date from project where project_name = '$projectName'";

$Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());
//select database   
$Db = @mysql_select_db($DB_DBName, $Connect) or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno());   
//execute query 
$result = @mysql_query($sql,$Connect) or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno()); 
 
 $sql1= "select sum(project_amount) as Expense from project_item where  project_name = '$projectName' ";
 //execute query 
$result1 = @mysql_query($sql1,$Connect) or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno()); 
 
 
foreach (range('A','D') as $col) {
  $sheet->getColumnDimension($col)->setAutoSize(true);  
}

$i = 4;
$revenue = 0;
$expense =0;
//code to print data of project table and project_po_amount as revenue.
while ($row =mysql_fetch_array($result, MYSQL_ASSOC)) {
	
  $sheet->setCellValue('A'.$i, $row['project_po_customer']);
 $sheet->setCellValue('B'.$i, $row['Remark']);
 $sheet->setCellValue('C'.$i, $row['project_po_amount']);
$revenue = $row['project_po_amount'];
  $sheet->setCellValue('D'.$i, $row['project_complete_date']);
  $i++;
}
// Code to calculate expenses
while ($row1 = mysql_fetch_row($result1)) {	
$i--;
$expense = $row1[0];
  $sheet->setCellValue('E'.$i, $row1[0]);
  $i++;
}
$i--;

$profit = $revenue - $expense;
$sheet->setCellValue('F'.$i, $revenue - $expense);
if($profit > 0){
	$sheet->getStyle('F'.$i)->getFont()->getColor()->setARGB(Color::COLOR_GREEN);
}
if($profit < 0){
	$sheet->getStyle('F'.$i)->getFont()->getColor()->setARGB(Color::COLOR_RED);
	$sheet->setCellValue('G'.$i,$expense - $revenue);
}

/* $styleArray = array(
    'borders' => array(
        'allborders' => array(
            'style' => Border::BORDER_MEDIUM,
            'color' => array('argb' => '00FF00'),
        ),
    ),
); */
//$sheet->getStyle('A1:D1'.$row)->applyFromArray($styleArray);
// OUTPUT
$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="users.xls"');
header('Cache-Control: max-age=0');
header('Expires: Fri, 11 Nov 2011 11:11:11 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');
$writer->save('php://output');
?>