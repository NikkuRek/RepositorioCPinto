<?php
	// Llamada al modelo
	require_once("../modelo/tipops_modelo.php");
	$objtipo_ps = new tipo_psModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("../controlador/vista_controlador.php");
	
	$lista_tipo_ps1 = $objtipo_ps->consultar();
	$lista_tipops = $objtipo_ps->tipops_consultar();
/*----------------------------------------------Formulario----------------------------------------------*/

	//id_tipo_ps=id_tipo_ps	id_pedidoU=id_pedidoU	documento_cliente=documento_cliente	cantidad_prendas=cantidad_prendas	precio_unitario=precio_unitario	descripcion	descuento	fecha_tipo_ps	precio_unitario 
	// Crear instancia de clase de Categorías
	$idtipops= "";
	$nombretipops= "";
	 
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objtipo_ps->set_idtipops($_POST['idtipops']);
		$objtipo_ps->set_nombretipops($_POST['nombretipops']);
		$result = $objtipo_ps->incluir();
		if ($result == 1){
			/*header('Location: ../controlador/tipo_psForm_controlador.php?exito=true');*/
			header('Location: ../controlador/tipops_controlador.php?exito=true');
			exit();
			
		} else {
			
			/*header('Location: ../controlador/tipo_psForm_controlador.php?exito=false');*/
			header('Location: ../controlador/tipops_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objtipo_ps->set_idtipops($_GET['id']);
		
		if ($objtipo_ps->buscar()){
			$idtipops = $objtipo_ps->get_idtipops();
			$nombretipops = $objtipo_ps->get_nombretipops();
		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='tipops_controlador.php';
			</script>";
		}			   
	}
	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objtipo_ps->set_idtipops($_POST['idtipops']);
		$objtipo_ps->set_nombretipops($_POST['nombretipops']);

		if ($objtipo_ps->modificar()){
			header('Location: ../controlador/tipops_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/tipops_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objtipo_ps->set_idtipops($_GET['eliminarId']);
	
		if($objtipo_ps->eliminar()){
			header('Location: ../controlador/tipops_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/tipops_controlador.php?exito=false');
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
	require_once("../vista/tipops_vista.php");

?>