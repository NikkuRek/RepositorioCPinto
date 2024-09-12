<?php
	// Llamada al modelo
	require_once("../modelo/protector_modelo.php");
	$objprotector = new protectorModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("../controlador/vista_controlador.php");
	
	$lista_protector1 = $objprotector->consultar();
	$lista_protector = $objprotector->protector_consultar();
/*----------------------------------------------Formulario----------------------------------------------*/

	//id_protector=id_protector	id_pedidoU=id_pedidoU	documento_cliente=documento_cliente	cantidad_prendas=cantidad_prendas	precio_unitario=precio_unitario	descripcion	descuento	fecha_protector	precio_unitario 
	// Crear instancia de clase de Categorías
	$idprotector= "";
	$tipoprotector= "";
	 
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objprotector->set_idprotector($_POST['idprotector']);
		$objprotector->set_tipoprotector($_POST['tipoprotector']);
		$result = $objprotector->incluir();
		if ($result == 1){
			/*header('Location: ../controlador/protectorForm_controlador.php?exito=true');*/
			header('Location: ../controlador/protector_controlador.php?exito=true');
			exit();
			
		} else {
			
			/*header('Location: ../controlador/protectorForm_controlador.php?exito=false');*/
			header('Location: ../controlador/protector_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objprotector->set_idprotector($_GET['id']);
		
		if ($objprotector->buscar()){
			$idprotector = $objprotector->get_idprotector();
			$tipoprotector = $objprotector->get_tipoprotector();
		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='protector_controlador.php';
			</script>";
		}			   
	}
	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objprotector->set_idprotector($_POST['idprotector']);
		$objprotector->set_tipoprotector($_POST['tipoprotector']);

		if ($objprotector->modificar()){
			header('Location: ../controlador/protector_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/protector_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objprotector->set_idprotector($_GET['eliminarId']);
	
		if($objprotector->eliminar()){
			header('Location: ../controlador/protector_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/protector_controlador.php?exito=false');
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
	require_once("../vista/protector_vista.php");

?>