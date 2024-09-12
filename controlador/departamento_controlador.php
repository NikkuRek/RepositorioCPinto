<?php
	// Llamada al modelo
	require_once("../modelo/departamento_modelo.php");
	$objdepartamento = new departamentoModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("../controlador/vista_controlador.php");
	
	$lista_departamento1 = $objdepartamento->consultar();
	$lista_departamento = $objdepartamento->departamento_consultar();
	$siguiente = $objdepartamento -> SiguienteDepartamento();

	//Mostrar el numero de pedididou correspondiente
	if(isset($_GET['id'])){
		$id_departamento = "";
	 
	} else {
		$id_departamento = $siguiente[0]['siguiente'] + 1;
	
	}
/*----------------------------------------------Formulario----------------------------------------------*/

	//id_departamento=id_departamento	id_pedidoU=id_pedidoU	documento_cliente=documento_cliente	cantidad_prendas=cantidad_prendas	precio_unitario=precio_unitario	descripcion	descuento	fecha_departamento	precio_unitario 
	// Crear instancia de clase de Categorías
	$iddepartamento= "";
	$nombre= "";
	$descripcion= "";
	 
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objdepartamento->set_iddepartamento($_POST['iddepartamento']);
		$objdepartamento->set_nombre($_POST['nombre']);
		$objdepartamento->set_descripcion($_POST['descripcion']);
		$result = $objdepartamento->incluir();
		if ($result == 1){
			/*header('Location: ../controlador/departamentoForm_controlador.php?exito=true');*/
			header('Location: ../controlador/departamento_controlador.php?exito=true');
			exit();
			
		} else {
			
			/*header('Location: ../controlador/departamentoForm_controlador.php?exito=false');*/
			header('Location: ../controlador/departamento_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objdepartamento->set_iddepartamento($_GET['id']);
		
		if ($objdepartamento->buscar()){
			$id_departamento = $objdepartamento->get_iddepartamento();
			$nombre = $objdepartamento->get_nombre();
			$descripcion = $objdepartamento->get_descripcion();
		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='departamento_controlador.php';
			</script>";
		}			   
	}
	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objdepartamento->set_iddepartamento($_POST['iddepartamento']);
		$objdepartamento->set_nombre($_POST['nombre']);
		$objdepartamento->set_descripcion($_POST['descripcion']);

		if ($objdepartamento->modificar()){
			header('Location: ../controlador/departamento_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/departamento_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objdepartamento->set_iddepartamento($_GET['eliminarId']);
	
		if($objdepartamento->eliminar()){
			header('Location: ../controlador/departamento_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/departamento_controlador.php?exito=false');
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
	require_once("../vista/departamento_vista.php");

?>