<?php
	// Llamada al modelo
	require_once("../modelo/cuello_modelo.php");
	$objcuello = new cuelloModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("../controlador/vista_controlador.php");
	
	$lista_cuello1 = $objcuello->consultar();
	$lista_cuello = $objcuello->cuello_consultar();
/*----------------------------------------------Formulario----------------------------------------------*/

	//id_cuello=id_cuello	id_pedidoU=id_pedidoU	documento_cliente=documento_cliente	cantidad_prendas=cantidad_prendas	precio_unitario=precio_unitario	descripcion	descuento	fecha_cuello	precio_unitario 
	// Crear instancia de clase de Categorías
	$idcuello= "";
	$tipocuello= "";
	 
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objcuello->set_idcuello($_POST['idcuello']);
		$objcuello->set_tipocuello($_POST['tipocuello']);
		$result = $objcuello->incluir();
		if ($result == 1){
			/*header('Location: ../controlador/cuelloForm_controlador.php?exito=true');*/
			header('Location: ../controlador/cuello_controlador.php?exito=true');
			exit();
			
		} else {
			
			/*header('Location: ../controlador/cuelloForm_controlador.php?exito=false');*/
			header('Location: ../controlador/cuello_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objcuello->set_idcuello($_GET['id']);
		
		if ($objcuello->buscar()){
			$idcuello = $objcuello->get_idcuello();
			$tipocuello = $objcuello->get_tipocuello();
		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='cuello_controlador.php';
			</script>";
		}			   
	}
	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objcuello->set_idcuello($_POST['idcuello']);
		$objcuello->set_tipocuello($_POST['tipocuello']);

		if ($objcuello->modificar()){
			header('Location: ../controlador/cuello_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/cuello_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objcuello->set_idcuello($_GET['eliminarId']);
	
		if($objcuello->eliminar()){
			header('Location: ../controlador/cuello_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/cuello_controlador.php?exito=false');
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
	require_once("../vista/cuello_vista.php");

?>