<?php

/*
 *  Taylor Reid
 *  Module 11 Assignment
 *  5/10/2023
 *  The purpose of this assignment is to use a PHP PDF library from the the module 8 database assignment's data.
 */
try {

    // import and instantiate preconfigured connection
    require_once("./TaylorConnectionManager.php");
    $conn = new ConnectionManager();

    // import and instantiate FPDF library
    require_once("./fpdf.php");
    $fpdf = new FPDF();

    // halt execution if no DB connection
    if ($conn->connect_errno) {
        die($conn->connect_error);
    }

    // get all data from table
    $result = $conn->query("SELECT * FROM `shift`");

    // start new page
    $fpdf->AddPage();

    // set font for page header and column headers
    $fpdf->SetFont("Arial", "B", 12);

    // output page header
    $fpdf->Cell(40, 7, "Taylor Reid", 0, 1, 'L');
    $fpdf->Cell(40, 7, date("m/d/Y"), 0, 1, 'L');
    $fpdf->Cell(40, 7, "Module 11 Assignment", 0, 1, 'L');

    $fpdf->Ln();

    // output column headers
    foreach ($result->fetch_fields() as $column) {
        $fpdf->Cell(30, 7, $column->name, 1, 0, 'C');
    }
    
    $fpdf->Ln();

    $fpdf->SetFont("Arial", '', 12);

    // output body of page
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        foreach ($row as $cell) {
            $fpdf->Cell(30, 7, $cell, 1, 0, 'R');
        }
        $fpdf->ln();
    }

    $fpdf->ln();

    $fpdf->SetFont("Arial", 'B', 12);

    // output footer
    $fpdf->Cell(30, 7, "Page " . $fpdf->PageNo());

    // write to file
    $fpdf->Output();

} catch (\Throwable $th) {
    die($th->__toString());
}

?>