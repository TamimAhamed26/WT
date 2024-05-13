<?php
require_once '../model/user_model.php';
require_once '../model/tcpdf/tcpdf.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report_type = $_POST["report_type"];
    $table_html = generateReport($report_type);

    // Create new PDF document
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->writeHTML($table_html);
    $file_name = $report_type . '.pdf';

    // Output PDF as a download with the dynamically generated file name
    $pdf->Output($file_name, 'D'); // 'D' means download
   
} else {
    header("Location: ../View/login.php");
}