<?php
	// Llamada al modelo
	require_once("../modelo/configuracion_modelo.php");
	$objconfig = new config();

	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("../controlador/vista_controlador.php");

	// Llamada a la vista -> Formulario
	require_once("../vista/configuracion_vista.php");
?>