<?php
	// Llamada al modelo
	require_once("../modelo/talla_modelo.php");
	$objtalla = new tallaModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("../controlador/vista_controlador.php");
	
	$lista_talla1 = $objtalla->consultar();
	$lista_talla = $objtalla->talla_consultar();
/*----------------------------------------------Formulario----------------------------------------------*/

	//id_talla=id_talla	id_pedidoU=id_pedidoU	documento_cliente=documento_cliente	cantidad_prendas=cantidad_prendas	precio_unitario=precio_unitario	descripcion	descuento	fecha_talla	precio_unitario 
	// Crear instancia de clase de Categorías
	$idtalla= "";
	$ntalla= "";
	$genero= "";
	 
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objtalla->set_idtalla($_POST['idtalla']);
		$objtalla->set_ntalla($_POST['ntalla']);
		$objtalla->set_genero($_POST['genero']);
		$result = $objtalla->incluir();
		if ($result == 1){
			/*header('Location: ../controlador/tallaForm_controlador.php?exito=true');*/
			header('Location: ../controlador/talla_controlador.php?exito=true');
			exit();
			
		} else {
			
			/*header('Location: ../controlador/tallaForm_controlador.php?exito=false');*/
			header('Location: ../controlador/talla_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objtalla->set_idtalla($_GET['id']);
		
		if ($objtalla->buscar()){
			$idtalla = $objtalla->get_idtalla();
			$ntalla = $objtalla->get_ntalla();
			$genero = $objtalla->get_genero();
		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='talla_controlador.php';
			</script>";
		}			   
	}
	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objtalla->set_idtalla($_POST['idtalla']);
		$objtalla->set_ntalla($_POST['ntalla']);
		$objtalla->set_genero($_POST['genero']);

		if ($objtalla->modificar()){
			header('Location: ../controlador/talla_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/talla_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objtalla->set_idtalla($_GET['eliminarId']);
	
		if($objtalla->eliminar()){
			header('Location: ../controlador/talla_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/talla_controlador.php?exito=false');
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
	require_once("../vista/talla_vista.php");

?>