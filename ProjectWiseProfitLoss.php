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
//$gdImage =$_GET['gdImage'];
// CREATE A NEW SPREADSHEET + POPULATE DATA
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setTitle('Profit And Loss statement');
$sql = "SELECT  p.project_po_customer, p.project_po_amount,
               pi.so_challan_no, pi.project_name, pi.project_item, pi.project_product_qty, pi.project_quantity, pi.project_item_raw_material, pi.project_amount 
       FROM    project_item pi, project p
	   WHERE  p.project_name = '$projectName' and p.project_sr_no = pi.project_sr_no_duplicate";

$Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());
//select database   
$Db = @mysql_select_db($DB_DBName, $Connect) or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno());   
//execute query 
$result = @mysql_query($sql,$Connect) or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno()); 
 
$i = 2;
$revenue = 0;
$expense =0;
//code to print data of project table and project_po_amount as revenue.
while ($row =mysql_fetch_array($result, MYSQL_ASSOC)) {
	
  $sheet->setCellValue('A'.$i, $row['project_po_customer']);
 $sheet->setCellValue('B'.$i, $row['project_item']);
 $sheet->setCellValue('C'.$i, $row['project_product_qty']);
 $sheet->setCellValue('D'.$i, $row['project_item_raw_material']);
 $sheet->setCellValue('E'.$i, $row['project_amount']);
 $expense += $row['project_amount'];
 $revenue =$row['project_po_amount'];
//$sheet->setCellValue('D'.$i, $row['project_complete_date']);
  $i++;
}
 $sheet->setCellValue('E'.$i, $expense );
 $sheet->setCellValue('A'.$i, $revenue ); 
 
 /* $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
$richText->createText('This invoice is ');
$payable = $richText->createTextRun('payable within thirty days after the end of the month');
$payable->getFont()->setBold(true);
$payable->getFont()->setItalic(true);
$payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKGREEN) );
$richText->createText(', unless specified otherwise on the invoice.');
$spreadsheet->getActiveSheet()->getCell('A18')->setValue($richText); */

/* $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
$richText->createText('');
$payable1 = $richText->createTextRun('ABCD ENTERPRISES');
$payable1->getFont()->setBold(true);
$richText->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
$spreadsheet->getActiveSheet()->getCell('H1')->setValue($richText); */

$richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
$richText->createText('PROJECT WISE   ');
$payable = $richText->createTextRun('PROFIT LOSS STATEMENT');
$payable->getFont()->setBold(true);
$payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKGREEN) );
$spreadsheet->getActiveSheet()->getCell('H1')->setValue($richText);

/* // Define named ranges
$spreadsheet->addNamedRange( new \PhpOffice\PhpSpreadsheet\NamedRange('PersonFN', $spreadsheet->getActiveSheet(), 'B1') );
$spreadsheet->addNamedRange( new \PhpOffice\PhpSpreadsheet\NamedRange('PersonLN', $spreadsheet->getActiveSheet(), 'B2') ); */


/* // Generate an image
$gdImage = @imagecreatetruecolor(120, 20) or die('Cannot Initialize new GD image stream');
$textColor = imagecolorallocate($gdImage, 255, 255, 255);
imagestring($gdImage, 1, 5, 5,  'Created with PhpSpreadsheet', $textColor);

// Add a drawing to the worksheet
$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing();
$drawing->setName('ABCD ENTERPRISES');
$drawing->setDescription('Sample image');
$drawing->setImageResource($gdImage);
$drawing->setRenderingFunction(\PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::RENDERING_JPEG);
$drawing->setMimeType(\PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::MIMETYPE_DEFAULT);
$drawing->setHeight(36);
$drawing->setWorksheet($spreadsheet->getActiveSheet()); */



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