<?php

require_once("./TaylorConnectionManager.php");
require_once("./fpdf.php");

$conn = new ConnectionManager();
$fdpf = new FPDF();

if ($conn->connect_errno()) {
    die("something went wrong");
}

// get all data from table
$result = $conn->query("SELECT * FROM `shift`");

// get column metadata
$metaData = $result->fetch_fields();

$fdpf->AddPage();

// output column names
foreach ($metaData as $column) {
    $fdpf->MultiCell(0, 5, $column->name);
}

while ($row = $result->fetch_array(MYSQLI_NUM)) {
    foreach ($row as $cell) {
        $fdpf->MultiCell(0, 5, $cell);
    }
    $fdpf->ln();
}

$fdpf->Output();

?>