<?php
	// Llamada al modelo
	require_once("../modelo/costados_modelo.php");
	$objcostados = new costadosModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("../controlador/vista_controlador.php");
	
	$lista_costados1 = $objcostados->consultar();
	$lista_costados = $objcostados->costados_consultar();
/*----------------------------------------------Formulario----------------------------------------------*/

	//id_costados=id_costados	id_pedidoU=id_pedidoU	documento_cliente=documento_cliente	cantidad_prendas=cantidad_prendas	precio_unitario=precio_unitario	descripcion	descuento	fecha_costados	precio_unitario 
	// Crear instancia de clase de Categorías
	$idcostados= "";
	$tipocostados= "";
	 
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objcostados->set_idcostados($_POST['idcostados']);
		$objcostados->set_tipocostados($_POST['tipocostados']);
		$result = $objcostados->incluir();
		if ($result == 1){
			/*header('Location: ../controlador/costadosForm_controlador.php?exito=true');*/
			header('Location: ../controlador/costados_controlador.php?exito=true');
			exit();
			
		} else {
			
			/*header('Location: ../controlador/costadosForm_controlador.php?exito=false');*/
			header('Location: ../controlador/costados_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objcostados->set_idcostados($_GET['id']);
		
		if ($objcostados->buscar()){
			$idcostados = $objcostados->get_idcostados();
			$tipocostados = $objcostados->get_tipocostados();
		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='costados_controlador.php';
			</script>";
		}			   
	}
	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objcostados->set_idcostados($_POST['idcostados']);
		$objcostados->set_tipocostados($_POST['tipocostados']);

		if ($objcostados->modificar()){
			header('Location: ../controlador/costados_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/costados_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objcostados->set_idcostados($_GET['eliminarId']);
	
		if($objcostados->eliminar()){
			header('Location: ../controlador/costados_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/costados_controlador.php?exito=false');
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
	require_once("../vista/costados_vista.php");

?>