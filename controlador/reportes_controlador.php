<?php
// Llamada al modelo
require_once("../modelo/reportes_modelo.php");

// Crear instancia del objeto ReportesModelo
$objReporte = new ReportesModelo();

// Lógica para obtener los datos necesarios del modelo
$datosAlumnos = $objReporte->obtenerDatosProductos();
$datosCategorias = $objReporte->obtenerDatosProveedores();
$datosDeportes = $objReporte->obtenerDatosClientes();

// Llamar controlador con funciones de diseño, para no repetir el mismo código
require_once("../controlador/vista_controlador.php");

// Incluir la vista de reportes
require_once("../vista/reportes_vista.php");
?>