<?php
	// Llamada al modelo
	require_once("../modelo/tipopi_modelo.php");
	$objtipo_pi = new tipo_piModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("../controlador/vista_controlador.php");
	
	$lista_tipo_pi1 = $objtipo_pi->consultar();
	$lista_tipopi = $objtipo_pi->tipo_pi_consultar();
/*----------------------------------------------Formulario----------------------------------------------*/

	//id_tipo_pi=id_tipo_pi	id_pedidoU=id_pedidoU	documento_cliente=documento_cliente	cantidad_prendas=cantidad_prendas	precio_unitario=precio_unitario	descripcion	descuento	fecha_tipo_pi	precio_unitario 
	// Crear instancia de clase de Categorías
	$idtipopi= "";
	$nombretipopi= "";
	 
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objtipo_pi->set_idtipopi($_POST['idtipopi']);
		$objtipo_pi->set_nombretipopi($_POST['nombretipopi']);
		$result = $objtipo_pi->incluir();
		if ($result == 1){
			/*header('Location: ../controlador/tipo_piForm_controlador.php?exito=true');*/
			header('Location: ../controlador/tipopi_controlador.php?exito=true');
			exit();
			
		} else {
			
			/*header('Location: ../controlador/tipo_piForm_controlador.php?exito=false');*/
			header('Location: ../controlador/tipopi_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objtipo_pi->set_idtipopi($_GET['id']);
		
		if ($objtipo_pi->buscar()){
			$id_tipo_pi = $objtipo_pi->get_idtipopi();
			$nombretipopi = $objtipo_pi->get_nombretipopi();
		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='tipopi_controlador.php';
			</script>";
		}			   
	}
	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objtipo_pi->set_idtipopi($_POST['id_tipopi']);
		$objtipo_pi->set_nombretipopi($_POST['nombretipopi']);

		if ($objtipo_pi->modificar()){
			header('Location: ../controlador/tipopi_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/tipopi_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objtipo_pi->set_idtipopi($_GET['eliminarId']);
	
		if($objtipo_pi->eliminar()){
			header('Location: ../controlador/tipopi_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/tipopi_controlador.php?exito=false');
			exit();

		}	
	}

	//Boton para Volver
	if (isset($_POST['Volver'])) {
		echo "<script>location.href='tipopi_controlador.php'</script>";
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
	require_once("../vista/elementos_vista.php");

?>