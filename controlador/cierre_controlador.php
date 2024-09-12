<?php
	// Llamada al modelo
	require_once("../modelo/cierre_modelo.php");
	$objcierre = new cierreModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("../controlador/vista_controlador.php");
	
	$lista_cierre1 = $objcierre->consultar();
	$lista_cierre = $objcierre->cierre_consultar();
/*----------------------------------------------Formulario----------------------------------------------*/

	//id_cierre=id_cierre	id_pedidoU=id_pedidoU	documento_cliente=documento_cliente	cantidad_prendas=cantidad_prendas	precio_unitario=precio_unitario	descripcion	descuento	fecha_cierre	precio_unitario 
	// Crear instancia de clase de Categorías
	$idcierre= "";
	$tipocierre= "";
	 
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objcierre->set_idcierre($_POST['idcierre']);
		$objcierre->set_tipocierre($_POST['tipocierre']);
		$result = $objcierre->incluir();
		if ($result == 1){
			/*header('Location: ../controlador/cierreForm_controlador.php?exito=true');*/
			header('Location: ../controlador/cierre_controlador.php?exito=true');
			exit();
			
		} else {
			
			/*header('Location: ../controlador/cierreForm_controlador.php?exito=false');*/
			header('Location: ../controlador/cierre_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objcierre->set_idcierre($_GET['id']);
		
		if ($objcierre->buscar()){
			$idcierre = $objcierre->get_idcierre();
			$tipocierre = $objcierre->get_tipocierre();
		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='cierre_controlador.php';
			</script>";
		}			   
	}
	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objcierre->set_idcierre($_POST['idcierre']);
		$objcierre->set_tipocierre($_POST['tipocierre']);

		if ($objcierre->modificar()){
			header('Location: ../controlador/cierre_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/cierre_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objcierre->set_idcierre($_GET['eliminarId']);
	
		if($objcierre->eliminar()){
			header('Location: ../controlador/cierre_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/cierre_controlador.php?exito=false');
			exit();

		}	
	}

	//Boton para Volver
	if (isset($_POST['Volver'])) {
		echo "<script>location.href='elementos_controlador.php'</script>";
	}

	
	/*----------------------------------------------ALERTAS DEL SISTEMA----------------------------------------------*/
	
	//Operacion exitosa
	if(isset($_GET['exito']) && $_GET['exito'] == 'true'){ 
		echo "<script type='text/javascript'>
		window.onload = function(){
			swal.fire({
				title:'Resultado de operacion',
				text:'Operacion realizada exitosamente',
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
	
	// Llamada a la vista -> Formulario
	require_once("../vista/cierre_vista.php");

?>