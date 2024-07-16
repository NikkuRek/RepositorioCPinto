<?php
	// Llamada al modelo
	require_once("../modelo/pedido_modelo.php");
	$objpedidou = new pedidouModelo();
	// Llamar controlador con funciones, para no repetir el mismo código
	require_once("vista_controlador.php");

	$lista_pedidou1 = $objpedidou->consultar();
	$lista_pedidou = $objpedidou->pedidou_consultar();
/*----------------------------------------------Formulario----------------------------------------------*/

 
	// Crear instancia de clase de Categorías
	$idpedidoU= "";
	$documentocliente= "";
	$nombrepedidou= "";
	$preciopu= 0.0;
	$fechai= '2024-02-11';
	$fechaf= '2024-02-11';
	$obserpu= "";
	 
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objpedidou->set_documentocliente($_POST['documentocliente']);
		$objpedidou->set_nombrepedidou($_POST['nombrepedidou']);
		$objpedidou->set_preciopu($_POST['preciopu']);
		$objpedidou->set_fechai($_POST['fechai']);
		$objpedidou->set_fechaf($_POST['fechaf']);
		$objpedidou->set_obserpu($_POST['obserpu']);
		$result = $objpedidou->incluir();
		if ($result == 1){
			/*header('Location: ../controlador/proveedorForm_controlador.php?exito=true');*/
			header('Location: ../controlador/pedido_controlador.php?exito=true');
			exit();
			
		} else {
			
			/*header('Location: ../controlador/proveedorForm_controlador.php?exito=false');*/
			header('Location: ../controlador/pedido_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objpedidou->set_idpedidoU($_GET['id']);
		
		if ($objpedidou->buscar()){
			$id_pedidoU = $objpedidou->get_idpedidoU();
			$documentocliente = $objpedidou->get_documentocliente();
			$nombrepedidou = $objpedidou->get_nombrepedidou();
			$preciopu = $objpedidou->get_preciopu();
			$fechai = $objpedidou->get_fechai();
			$fechaf = $objpedidou->get_fechaf();
			$obserpu = $objpedidou->get_obserpu();

		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='pedido_controlador.php';
			</script>";
		}	
				   
	}
	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objpedidou->set_idpedidoU($_POST['idpedidoU']);
		$objpedidou->set_documentocliente($_POST['documentocliente']);
		$objpedidou->set_nombrepedidou($_POST['nombrepedidou']);
		$objpedidou->set_preciopu($_POST['preciopu']);
		$objpedidou->set_fechai($_POST['fechai']);
		$objpedidou->set_fechaf($_POST['fechaf']);
		$objpedidou->set_obserpu($_POST['obserpu']);

		if ($objpedidou->modificar()){
			header('Location: ../controlador/pedido_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/pedido_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objpedidou->set_idpedidoU($_GET['eliminarId']);
	
		if($objpedidou->eliminar()){
			header('Location: ../controlador/pedido_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/pedido_controlador.php?exito=false');
			exit();

		}	
	}

	//Boton para Volver
	if (isset($_POST['Volver'])) {
		echo "<script>location.href='pedido_controlador.php'</script>";
	}

	








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
	require_once("../vista/pedido_vista.php");
?>