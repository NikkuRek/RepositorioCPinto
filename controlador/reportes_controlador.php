<?php
// Llamada al modelo
require_once("../modelo/reportes_modelo.php");
$objReporte = new ReportesModelo();

// Verifica si se ha enviado el formulario




// Llamar controlador con funciones de diseño, para no repetir el mismo código
require_once("../controlador/vista_controlador.php");

// Incluir la vista de reportes
require_once("../vista/reportes_vista.php");
?>
