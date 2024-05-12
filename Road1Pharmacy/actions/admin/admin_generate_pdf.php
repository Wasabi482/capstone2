<?php

if (isset($_POST['generate_pdf'])) {
    require_once('tcpdf/tcpdf.php');

    // Create a new TCPDF instance
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator('Your Name');
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Table to PDF');
    $pdf->SetSubject('Exporting Table to PDF');
    $pdf->SetKeywords('PDF, table, export');

    // Set font
    $pdf->SetFont('helvetica', '', 10);

    // Add a page
    $pdf->AddPage();

    // HTML table content
    $html = $_POST['table_content'];

    // Output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // Output PDF to a file
    $pdf->Output('table.pdf', 'D');
}
