<?php
	// Llamada al modelo
	require_once("../modelo/cliente_modelo.php");
	$objCliente = new ClienteModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("../controlador/vista_controlador.php");
	// Llamamos a la lista de cliente -> Se utilizará en el formulario
	$lista_cliente = $objCliente->cliente_consultar();
	
	// Crear instancia de clase de Categorías
	$idcliente= "";
	$cedulac= "";
	$nombrec= "";
	$apellidoc= "";
	$telefonoc= "";
	$direccionc= "";
	
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objCliente->set_cedulac($_POST['cedulac']);
		$objCliente->set_nombrec($_POST['nombrec']);
		$objCliente->set_apellidoc($_POST['apellidoc']);
		$objCliente->set_telefonoc($_POST['telefonoc']);
		$objCliente->set_direccionc($_POST['direccionc']);
		$result = $objCliente->incluir();
		
		if ($result == 1){
			
		echo "<script>alert ('Registrado con exito')</script>";

		} else {
			

		echo "<script>alert ('Error al registrar, vuelva a intentarlo')</script>";
		}
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objCliente->set_idcliente($_GET['id']);
		
		if ($objCliente->buscar()){
			$idcliente = $objCliente->get_idcliente();
			$cedulac = $objCliente->get_cedulac();
			$nombrec = $objCliente->get_nombrec();
			$apellidoc = $objCliente->get_apellidoc();
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
		$objCliente->set_idcliente($_POST['idcliente']);
		$objCliente->set_cedulac($_POST['cedulac']);
		$objCliente->set_nombrec($_POST['nombrec']);
		$objCliente->set_apellidoc($_POST['apellidoc']);
		$objCliente->set_telefonoc($_POST['telefonoc']);
		$objCliente->set_direccionc($_POST['direccionc']);
		
		if ($objCliente->modificar()){
			
	echo "<script>alert ('Modificado con exito')</script>";

		} else {
			

		}echo "<script>alert ('No se pudo modificar')</script>";
	}
	
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objCliente->set_idcliente($_GET['eliminarId']);
	
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
	
		//Operacion Exitosa
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
	require_once("../vista/clienteForm_vista.php");
?>