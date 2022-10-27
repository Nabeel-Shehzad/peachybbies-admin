<?php
require "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

include_once("connection.php");

$values = $_GET['ids'];
$list = explode(",", $values);


$fileName = "peachybbies_export_data-custom-" . date('Ymd') . ".xlsx";
$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();

$index = 1;

//print list
foreach ($list as $id) {
    $sql = mysqli_query($conn, "SELECT employee.first_name,employee.last_name,
       slime.slime_name,slime.slime_texture, data.* FROM `data` JOIN employee ON employee.id = data.username
        JOIN slime ON slime.id = data.sku_packed
        WHERE data.id = '$id'");
    while ($row = mysqli_fetch_assoc($sql)) {
        $sheet->setCellValue('A1', 'Date');
        $sheet->setCellValue('B1', $row['date']);

        $sheet->setCellValue('A2', 'Packing Report');

        $sheet->setCellValue('A4', 'Username');
        $sheet->setCellValue('B4', $row['first_name'] . " " . $row['last_name']);

        $sheet->setCellValue('A5', 'Start Time');
        $sheet->setCellValue('B5', $row['start_time']);

        $sheet->setCellValue('A6', 'End Time');
        $sheet->setCellValue('B6', $row['end_time']);

        $sheet->setCellValue('A7', 'Total Working Time');
        $sheet->setCellValue('B7', $row['total_working_time']);

        $sheet->setCellValue('A8', 'Target Working Time');
        $sheet->setCellValue('B8', $row['target_working_time']);

        $sheet->setCellValue('A9', 'Bathroom Pause');
        $sheet->setCellValue('B9', $row['bathroom_break']);

        $sheet->setCellValue('A10', 'General Break Pause');
        $sheet->setCellValue('B10', $row['general_break']);

        $sheet->setCellValue('A11', 'Shelving Product Pause');
        $sheet->setCellValue('B11', $row['shelving_break']);

        $sheet->setCellValue('A12', 'Meal Pause');
        $sheet->setCellValue('B12', $row['meal_break']);

        $sheet->setCellValue('A13', 'Other Task Pause');
        $sheet->setCellValue('B13', $row['other_break']);

        $sheet->setCellValue('A14', 'Target Quota');
        $sheet->setCellValue('B14', $row['target_quota']);

        $sheet->setCellValue('A15', 'Actual Packed');
        $sheet->setCellValue('B15', $row['actual_quota']);


        $sheet->setCellValue('A16', 'SKU Packed');
        $sheet->setCellValue('B16', $row['slime_name'] . " " . $row['slime_texture']);

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
}
$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
$writer->save('php://output');



?>