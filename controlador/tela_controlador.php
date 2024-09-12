<?php
	// Llamada al modelo
	require_once("../modelo/tela_modelo.php");
	$objtela = new telaModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("../controlador/vista_controlador.php");
	
	$lista_tela1 = $objtela->consultar();
	$lista_tela = $objtela->tela_consultar();
/*----------------------------------------------Formulario----------------------------------------------*/

	//id_tela=id_tela	id_pedidoU=id_pedidoU	documento_cliente=documento_cliente	cantidad_prendas=cantidad_prendas	precio_unitario=precio_unitario	descripcion	descuento	fecha_tela	precio_unitario 
	// Crear instancia de clase de Categorías
	$idtela= "";
	$tipotela= "";
	 
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objtela->set_idtela($_POST['idtela']);
		$objtela->set_tipotela($_POST['tipotela']);
		$result = $objtela->incluir();
		if ($result == 1){
			/*header('Location: ../controlador/telaForm_controlador.php?exito=true');*/
			header('Location: ../controlador/tela_controlador.php?exito=true');
			exit();
			
		} else {
			
			/*header('Location: ../controlador/telaForm_controlador.php?exito=false');*/
			header('Location: ../controlador/tela_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objtela->set_idtela($_GET['id']);
		
		if ($objtela->buscar()){
			$idtela = $objtela->get_idtela();
			$tipotela = $objtela->get_tipotela();
		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='tela_controlador.php';
			</script>";
		}			   
	}
	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objtela->set_idtela($_POST['idtela']);
		$objtela->set_tipotela($_POST['tipotela']);

		if ($objtela->modificar()){
			header('Location: ../controlador/tela_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/tela_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objtela->set_idtela($_GET['eliminarId']);
	
		if($objtela->eliminar()){
			header('Location: ../controlador/tela_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/tela_controlador.php?exito=false');
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
	require_once("../vista/tela_vista.php");

?>