<?php
require '../../bd/conexion.php';
require "plantilla.php";

$mysql = Conexion::Conectar();
$sql = "SELECT formula_codigo,formula_nombre, formula_descripcion FROM cat_formula";
$resultado = $mysql->prepare($sql);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

$pdf = new FPDF("P", "mm", "letter");
$pdf->AliasNbPages();
$pdf->SetMargins(15, 30, 10, "C");
$pdf->AddPage();

$pdf->SetFont("Arial", "B", 9);

$pdf->Cell(190, 5, "Panaderia Nano", 0, 1, "C");
// $pdf->Image("../../../images/logo.png", 10, 5, 30);

$pdf->Ln(2);

$pdf->Cell(20, 5, "Id", 1, 0, "C");
$pdf->Cell(40, 5, "Nombre", 1, 0, "C");
$pdf->Cell(60, 5, "Descripcion", 1, 1, "C");

$pdf->SetFont("Arial", "", 8);
// print_r($data);
// print_r(count($data));

foreach ($data as $fila) {
    $fila['formula_codigo'];
    $pdf->Cell(20, 5, $fila['formula_codigo'], 1, 0, "C");
    $pdf->Cell(40, 5, $fila['formula_nombre'], 1, 0, "C");
    $pdf->Cell(60, 5, $fila['formula_descripcion'], 1, 1, "C");
}
$pdf->output();



// while ($fila = $resultado->fetch_assoc()) {

    // $fila['formula_codigo'];
    // $pdf->Cell(20, 5, $fila['formula_codigo'], 1, 0, "C");
    // $pdf->Cell(40, 5, $fila['formula_nombre'], 1, 0, "C");
    // $pdf->Cell(60, 5, $fila['formula_descripcion'], 1, 1, "C");

    // $pdf->output();
// }
