<?php
require('fpdf.php');
require('../modelo/reportes_modelo.php');

class PDF extends FPDF
{
// Variable para controlar el cambio de color de las filas
var $fill = false;
    
// Cabecera de página
function Header()
{
    $this->Image('../vista/img/fondo.png',0,0,215); //imagen(archivo, png/jpg || x,y,tamaño)
    $this->SetFont('Helvetica','B',25);
    $this->SetTextColor(255, 255, 255); // Cambiar color del texto a blanco
    $this->Image('../vista/img/logo.png',10,12,45);
    $this->SetXY(160,30);
    $this->SetTextColor(5, 188, 236);
    $this->Cell(1,10,utf8_decode('Lista de Clientes'),0,1,'C',0);
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Helvetica','B',10);
     // Salto de línea  
    $this->Ln(-10);
    $this->Setx(35);
    // Dirección de la academia
    $this->Cell(120,10,'Calle 57 entre Carreras 22 y 23, Barquisimeto, Edo Lara. ',0,1,'C',0);
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Setx(14);
    $this->Cell(21,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C',0);
    $this->SetFont('Arial','U',8);
    $this->Setx(35);
    // Autor de la página
    $this->Cell(120,10,utf8_decode('© Copyright Debora Mayurel'),0,0,'C',0);

     // fecha
     $this->SetFont('Arial','I',8);
     $this->Setx(155);
     $this->Cell(40,10,''.date('d/m/y'),0,1,'C');
     // Salto de línea
     $this->Ln(20);   
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetMargins(5,5,5,true);
$pdf->AddPage();
$pdf->SetAutoPageBreak(true,20);//salto de pagina automatico

// Llamada al modelo para obtener datos de Clientes
$reporte = new ReportesModelo();
$Clientes = $reporte->obtenerDatosClientes();



$pdf->SetFillColor(5, 188, 236);
$pdf->SetDrawColor(5, 188, 236);


$pdf->SetFont('Helvetica','B',14);
$pdf->SetTextColor(255, 255, 255); // Cambiar color del texto a blanco
$pdf->SetXY(10,50);

$pdf->Cell(10,10,utf8_decode('N°'),1,0,'C',1);
$pdf->Cell(10,10,utf8_decode('ID'),1,0,'C',1);
$pdf->Cell(30,10,utf8_decode('CEDULA'),1,0,'C',1);
$pdf->Cell(30,10,utf8_decode('NOMBRE'),1,0,'C',1);
$pdf->Cell(30,10,utf8_decode('APELLIDO'),1,0,'C',1);
$pdf->Cell(35,10,utf8_decode('TELEFONO'),1,0,'C',1);
$pdf->Cell(45,10,utf8_decode('DIRECCIÓN'),1,1,'C',1);

$pdf->SetFillColor(241, 243, 255);
$pdf->SetDrawColor(5, 188, 236);


$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 0); // Cambiar color del texto a blanco


for($i=0;$i<count($Clientes);$i++){
    // Cambiar el color de fondo de la fila
    if ($pdf->fill) {
        $pdf->SetFillColor(166, 236, 255);
    } else {
        $pdf->SetFillColor(255, 255, 255);
    }
    $pdf->fill = !$pdf->fill; // Cambiar el estado de la variable fill

    $pdf->setX(10);
    $pdf->Cell(10,10,$i+1,1,0,'C',1);
    $pdf->Cell(10,10,$Clientes[$i]['id_cliente'],1,0,'C',1);
    $pdf->Cell(30,10,$Clientes[$i]['cedula_c'],1,0,'C',1);
    $pdf->Cell(30,10,$Clientes[$i]['nombre_c'],1,0,'C',1);
    $pdf->Cell(30,10,$Clientes[$i]['apellido_c'],1,0,'C',1);
	$pdf->SetFont('Arial','',8);
    $pdf->Cell(35,10,$Clientes[$i]['telefono_c'],1,0,'C',1);
    $pdf->Cell(45,10,$Clientes[$i]['direccion_C'],1,0,'C',1);
	$pdf->Ln(10);
}


$pdf->Output('I','Clientes'.'.pdf');  // envia el documento
?>