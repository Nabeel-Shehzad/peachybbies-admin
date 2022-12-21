<?php
require "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

include_once("connection.php");


$id = $_GET['id'];

//SELECT break.*, break_taken.*,
//		employee.first_name,employee.last_name,
//       slime.slime_name,slime.slime_texture, data.*
//        FROM `data`
//            JOIN employee ON employee.id = data.username
//	        JOIN slime ON slime.id = data.sku_packed
//            LEFT JOIN break_taken ON data.username = break_taken.user_id
//            LEFT JOIN break ON break_taken.break_id = break.id
//        WHERE
//        data.date = break_taken.date AND username LIKE '18';

$sql = mysqli_query($conn,"SELECT break.*, break_taken.*,
		employee.first_name,employee.last_name,
       slime.slime_name,slime.slime_texture, data.*
        FROM `data`
            JOIN employee ON employee.id = data.username
	        JOIN slime ON slime.id = data.sku_packed
            LEFT JOIN break_taken ON data.username = break_taken.employee_id
            LEFT JOIN break ON break_taken.break_id = break.id
        WHERE
        	username LIKE '$id';");

// Excel file name for download 
$fileName = "peachybbies_export_data-" . $id . "-" . date('Ymd') . ".xlsx";


$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();

$index = 1;

while ($row = mysqli_fetch_assoc($sql)) {

    $sheet->setCellValue('A1', 'Date');
    $sheet->setCellValue('B1', $row['date']);

    $sheet->setCellValue('A2', 'Packing Report');

    $sheet->setCellValue('A4', 'Username');
    $sheet->setCellValue('B4', $row['first_name'] ." ". $row['last_name']);

    $sheet->setCellValue('A5', 'Start Time');
    $sheet->setCellValue('B5', $row['start_time']);

    $sheet->setCellValue('A6', 'End Time');
    $sheet->setCellValue('B6', $row['end_time']);

    $sheet->setCellValue('A7', 'Total Working Time');
    $sheet->setCellValue('B7', $row['total_working_time']);

    $sheet->setCellValue('A8', 'Target Working Time');
    $sheet->setCellValue('B8', $row['target_working_time']);

    $sheet->setCellValue('A9', $row['name'] . ' '. 'pause');
    $sheet->setCellValue('B9', $row['time']);

    $sheet->setCellValue('A15', 'Target Quota');
    $sheet->setCellValue('B15', $row['target_quota']);

    $sheet->setCellValue('A16', 'Actual Packed');
    $sheet->setCellValue('B16', $row['actual_quota']);


    $sheet->setCellValue('A17', 'SKU Packed');
    $sheet->setCellValue('B17', $row['slime_name'] . " " . $row['slime_texture']);

    foreach ($sheet->getColumnIterator() as $column) {
        $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
    }

    try {
        $spreadsheet->createSheet();
        $sheet = $spreadsheet->getSheet($index);
        $spreadsheet->setActiveSheetIndex($index);
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
        echo $e->getMessage();
    }
    $index++;
}

$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
$writer->save('php://output');


?>