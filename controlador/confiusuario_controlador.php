<?php
	// Llamada al modelo
	require_once("../modelo/confiusuario_modelo.php");
	$objconfiusuario = new confiusuarioModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("../controlador/vista_controlador.php");
	
	$lista_usuario1 = $objconfiusuario->consultar();
	$lista_usuario = $objconfiusuario->usuario_consultar();
	$siguiente = $objconfiusuario -> SiguienteUsuario();

	$tablas_auxi = $objconfiusuario->tablas_aux();
	//Mostrar el numero de pedididou correspondiente
	if(isset($_GET['id'])){
		$id_usuario = ""; 

	} else {
		$id_usuario = $siguiente[0]['siguiente'] + 1;
	
	}
/*----------------------------------------------Formulario----------------------------------------------*/

	// Crear instancia de clase
	$idusuario= "";
	$iddepartamento= "";
	$usuario= "";
	$contrasena= "";
	$nombre= "";
	$rol= "";
	 
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objconfiusuario->set_idusuario($_POST['idusuario']);
		$objconfiusuario->set_iddepartamento($_POST['iddepartamento']);
		$objconfiusuario->set_usuario($_POST['usuario']);
		$objconfiusuario->set_contrasena($_POST['contrasena']);
		$objconfiusuario->set_nombre($_POST['nombre']);
		$objconfiusuario->set_rol($_POST['rol']);

		$result = $objconfiusuario->incluir();
		if ($result == 1){
			
			header('Location: ../controlador/confiusuario_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/confiusuario_controlador.php?exito=false');
			exit();

		}	
	}

	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objconfiusuario->set_idusuario($_GET['id']);
		
		if ($objconfiusuario->buscar()){
			$idusuario = $objconfiusuario->get_idusuario();
			$iddepartamento = $objconfiusuario->get_iddepartamento();
			$usuario = $objconfiusuario->get_usuario();
			$contrasena = $objconfiusuario->get_contrasena();
			$nombre = $objconfiusuario->get_nombre();
			$rol = $objconfiusuario->get_rol();
		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='confiusuario_controlador.php';
			</script>";
		}			   
	}
	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objconfiusuario->set_idusuario($_POST['idusuario']);
		$objconfiusuario->set_iddepartamento($_POST['iddepartamento']);
		$objconfiusuario->set_usuario($_POST['usuario']);
		$objconfiusuario->set_contrasena($_POST['contrasena']);
		$objconfiusuario->set_nombre($_POST['nombre']);
		$objconfiusuario->set_rol($_POST['rol']);

		if ($objconfiusuario->modificar()){
			header('Location: ../controlador/confiusuario_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/confiusuario_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objconfiusuario->set_idusuario($_GET['eliminarId']);
	
		if($objconfiusuario->eliminar()){
			header('Location: ../controlador/confiusuario_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/confiusuario_controlador.php?exito=false');
			exit();

		}	
	}

	//Boton para Volver
	if (isset($_POST['Volver'])) {
		echo "<script>location.href='confiusuario_controlador.php'</script>";
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
	require_once("../vista/confiusuario_vista.php");

?>