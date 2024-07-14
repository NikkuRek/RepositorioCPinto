<?php
	// Llamada al modelo
	require_once("../modelo/producto_modelo.php");
	$objProducto = new ProductoModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("vista_controlador.php");
	
	$lista_producto = $objProducto->consultar();
	$total_productos = $objProducto->totalProductos();



	/*----------------------------------------------ALERTAS DEL SISTEMA----------------------------------------------*/
	
	//Operacion exitosa
	if(isset($_GET['exito']) && $_GET['exito'] == 'true'){ 
		echo "<script type='text/javascript'>
		window.onload = function(){
			swal.fire({
				title:'Resultado de operacion',
				text:'Se ha eliminado correctamente del registro',
				icon:'success',
				confirmButtonText:'Aceptar',
				confirmButtonColor: '#3085d6'

			});
		};
		</script>";

	//Operacion fallida
	}elseif(isset($_GET['exito']) && $_GET['exito'] == 'false') {

		echo "<script type='text/javascript'>
		window.onload = function(){
			swal.fire({
				title:'Resultado de operacion',
				text:'Operacion fallida, ha ocurrido un error',
				icon:'error',
				confirmButtonText:'Aceptar',
				confirmButtonColor: '#3085d6'

			});
		};
		</script>";
	}

	
	// Llamada a la vista
	require_once("../vista/producto_vista.php");
?>