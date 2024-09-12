<?php
	// Llamada al modelo
	require_once("../modelo/proceso_modelo.php");
	$objproceso = new procesoModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("../controlador/vista_controlador.php");
	
	$lista_proceso1 = $objproceso->consultar();
	$lista_proceso = $objproceso->proceso_consultar();
	$siguiente = $objproceso -> Siguienteproceso();

	$tablas_auxi = $objproceso->tablas_aux();

	//Mostrar el numero de pedididou correspondiente
	if(isset($_GET['id'])){
		$id_proceso = "";
	 
	} else {
		$id_proceso = $siguiente[0]['siguiente'] + 1;
	
	}
/*----------------------------------------------Formulario----------------------------------------------*/

	//id_proceso=id_proceso	id_pedidoU=id_pedidoU	documento_cliente=documento_cliente	cantidad_prendas=cantidad_prendas	precio_unitario=precio_unitario	nombre	descuento	fecha_proceso	precio_unitario 
	// Crear instancia de clase de Categorías
	$idproceso= "";
	$iddepartamento= "";
	$nombre= "";
	$posicion= "";
	 
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objproceso->set_idproceso($_POST['idproceso']);
		$objproceso->set_iddepartamento($_POST['iddepartamento']);
		$objproceso->set_nombre($_POST['nombre']);
		$objproceso->set_posicion($_POST['posicion']);
		$result = $objproceso->incluir();
		if ($result == 1){
			/*header('Location: ../controlador/procesoForm_controlador.php?exito=true');*/
			header('Location: ../controlador/proceso_controlador.php?exito=true');
			exit();
			
		} else {
			
			/*header('Location: ../controlador/procesoForm_controlador.php?exito=false');*/
			header('Location: ../controlador/proceso_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objproceso->set_idproceso($_GET['id']);
		
		if ($objproceso->buscar()){
			$id_proceso = $objproceso->get_idproceso();
			$iddepartamento = $objproceso->get_iddepartamento();
			$nombre = $objproceso->get_nombre();
			$posicion = $objproceso->get_posicion();
		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='proceso_controlador.php';
			</script>";
		}			   
	}
	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objproceso->set_idproceso($_POST['idproceso']);
		$objproceso->set_iddepartamento($_POST['iddepartamento']);
		$objproceso->set_nombre($_POST['nombre']);
		$objproceso->set_posicion($_POST['posicion']);

		if ($objproceso->modificar()){
			header('Location: ../controlador/proceso_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/proceso_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objproceso->set_idproceso($_GET['eliminarId']);
	
		if($objproceso->eliminar()){
			header('Location: ../controlador/proceso_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/proceso_controlador.php?exito=false');
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
	require_once("../vista/proceso_vista.php");

?>