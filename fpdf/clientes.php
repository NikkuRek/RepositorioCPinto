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
    //$this->Image('../vista/img/logo.png',10,12,45);
    $this->SetXY(47,30);
    $this->SetTextColor(35, 35, 35);
    $this->Cell(1,25,utf8_decode('Lista de Clientes'),0,1,'C',0);
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-8);
    // Arial italic 8
    $this->SetFont('Helvetica','B',10);
     // Salto de línea  
    $this->Ln(-10);
    $this->Setx(35);
    // Dirección de la academia
    // $this->Cell(120,10,'Calle 57 entre Carreras 22 y 23, Barquisimeto, Edo Lara. ',0,1,'C',0);
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Setx(17);
    $this->Cell(21,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C',0);
    $this->SetFont('Arial','U',8);
    $this->Setx(45);
    // Autor de la página
    $this->Cell(120,10,utf8_decode('© Copyright GECOP'),0,0,'C',0);

     // fecha
     $this->SetFont('Arial','I',8);
     $this->Setx(165);
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



$pdf->SetFillColor(169, 169, 169);
$pdf->SetDrawColor(255, 255, 255);


$pdf->SetFont('Helvetica','B',10);
$pdf->SetTextColor(255, 255, 255); // Cambiar color del texto a blanco
$pdf->SetXY(12,50);

$pdf->Cell(10,9,utf8_decode('N°'),1,0,'C',1);
$pdf->Cell(30,9,utf8_decode('CEDULA'),1,0,'C',1);
$pdf->Cell(30,9,utf8_decode('NOMBRE'),1,0,'C',1);
$pdf->Cell(35,9,utf8_decode('TELEFONO'),1,0,'C',1);
$pdf->Cell(80,9,utf8_decode('DIRECCIÓN'),1,1,'C',1);



$pdf->SetFillColor(241, 243, 255);
$pdf->SetDrawColor(169, 169, 169);


$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0, 0, 0); // Cambiar color del texto a blanco


for($i=0;$i<count($Clientes);$i++){
    // Cambiar el color de fondo de la fila
    if ($pdf->fill) {
        $pdf->SetFillColor(208, 208, 208);
    } else {
        $pdf->SetFillColor(255, 255, 255);
    }
    $pdf->fill = !$pdf->fill; // Cambiar el estado de la variable fill

    $pdf->setX(12);
    $pdf->Cell(10,7,$i+1,1,0,'C',1);
    $pdf->Cell(30,7,utf8_decode($Clientes[$i]['documento_cliente']),1,0,'C',1);
    $pdf->Cell(30,7,utf8_decode($Clientes[$i]['nombre']),1,0,'C',1);
    $pdf->Cell(35,7,utf8_decode($Clientes[$i]['telefono']),1,0,'C',1);
    $pdf->Cell(80,7,utf8_decode($Clientes[$i]['direccion']),1,0,'C',1);
	$pdf->Ln(7);
}


$pdf->Output('I','Clientes'.'.pdf');  // envia el documento
?>