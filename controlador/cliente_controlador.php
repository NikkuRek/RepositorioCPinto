<?php
	// Llamada al modelo
	require_once("../modelo/cliente_modelo.php");
	$objCliente = new ClienteModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("../controlador/vista_controlador.php");
	
	$lista_cliente1 = $objCliente->consultar();
	$lista_cliente = $objCliente->cliente_consultar();

		// Crear instancia de clase de Categorías
		$documentocliente= "";
		$nombrec= "";
		$telefonoc= "";
		$direccionc= "";
		
		// Click > Botón Guardar
		if(isset($_POST['guardar'])){
			$objCliente->set_documentocliente($_POST['documentocliente']);
			$objCliente->set_nombrec($_POST['nombrec']);
			$objCliente->set_telefonoc($_POST['telefonoc']);
			$objCliente->set_direccionc($_POST['direccionc']);
			$result = $objCliente->incluir();
			
			if ($result == 1){

			header('Location: ../controlador/cliente_controlador.php?exito2=true');	
			
	
			} else {
				
			header('Location: ../controlador/cliente_controlador.php?exito=false');
			}
		}
		// Si hacen clic en modificar desde la pantalla anterior
		if (isset($_GET['id'])){
			$objCliente->set_documentocliente($_GET['id']);
			
			if ($objCliente->buscar()){
				$documentocliente = $objCliente->get_documentocliente();
				$nombrec = $objCliente->get_nombrec();
				$telefonoc = $objCliente->get_telefonoc();
				$direccionc = $objCliente->get_direccionc();
			} else {
				
				echo "<script>
					alert('No se encontraron los datos');
					location.href='cliente_controlador.php';
				</script>";
				
			}			   
		}
		// Click > Botón Modificar
		if (isset($_POST['modificar'])){
			$objCliente->set_documentocliente($_POST['documentocliente']);
			$objCliente->set_nombrec($_POST['nombrec']);
			$objCliente->set_telefonoc($_POST['telefonoc']);
			$objCliente->set_direccionc($_POST['direccionc']);
			
			if ($objCliente->modificar()){
				header('Location: ../controlador/cliente_controlador.php?exito1=true');
				exit();
				
			} else {
				
				header('Location: ../controlador/cliente_controlador.php?exito1=false');
				exit();
	
			}
		}
		
		// Si hacen clic en eliminar desde la pantalla anterior
		if (isset($_GET['eliminarId'])){
			$objCliente->set_documentocliente($_GET['eliminarId']);
		
			if($objCliente->eliminar()){
				
				header('Location: ../controlador/cliente_controlador.php?exito=true');
				exit();
				
			} else {
				
				header('Location: ../controlador/cliente_controlador.php?exito=false');
				exit();
	 
			}
		}
	
		//Boton de Volver
		if (isset($_POST['volver'])) {
			echo "<script>location.href='cliente_controlador.php'</script>";
		}
		



	/*----------------------------------------------ALERTAS DEL SISTEMA----------------------------------------------*/
	
	//Operacion exitosa al eliminar
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


	//Operacion exitosa al modificar
	if(isset($_GET['exito1']) && $_GET['exito1'] == 'true'){ 
		echo "<script type='text/javascript'>
		window.onload = function(){
			swal.fire({
				title:'Resultado de operacion',
				text:'Se ha modificado correctamente del registro',
				icon:'success',
				confirmButtonText:'Aceptar',
				confirmButtonColor: '#3085d6'

			});
		};
		</script>";

	}

		//Operacion exitosa al guardar
		if(isset($_GET['exito2']) && $_GET['exito2'] == 'true'){ 
			echo "<script type='text/javascript'>
			window.onload = function(){
				swal.fire({
					title:'Resultado de operacion',
					text:'Se ha guardado correctamente el registro',
					icon:'success',
					confirmButtonText:'Aceptar',
					confirmButtonColor: '#3085d6'
	
				});
			};
			</script>";
	
		}
	


	// Llamada a la vista
	require_once("../vista/cliente_vista.php");
?>