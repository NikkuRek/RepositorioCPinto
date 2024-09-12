<?php
	// Llamada al modelo
	require_once("../modelo/manga_modelo.php");
	$objmanga = new mangaModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("../controlador/vista_controlador.php");
	
	$lista_manga1 = $objmanga->consultar();
	$lista_manga = $objmanga->manga_consultar();
/*----------------------------------------------Formulario----------------------------------------------*/

	//id_manga=id_manga	id_pedidoU=id_pedidoU	documento_cliente=documento_cliente	cantidad_prendas=cantidad_prendas	precio_unitario=precio_unitario	descripcion	descuento	fecha_manga	precio_unitario 
	// Crear instancia de clase de Categorías
	$idmanga= "";
	$tipomanga= "";
	 
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objmanga->set_idmanga($_POST['idmanga']);
		$objmanga->set_tipomanga($_POST['tipomanga']);
		$result = $objmanga->incluir();
		if ($result == 1){
			/*header('Location: ../controlador/mangaForm_controlador.php?exito=true');*/
			header('Location: ../controlador/manga_controlador.php?exito=true');
			exit();
			
		} else {
			
			/*header('Location: ../controlador/mangaForm_controlador.php?exito=false');*/
			header('Location: ../controlador/manga_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objmanga->set_idmanga($_GET['id']);
		
		if ($objmanga->buscar()){
			$idmanga = $objmanga->get_idmanga();
			$tipomanga = $objmanga->get_tipomanga();
		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='manga_controlador.php';
			</script>";
		}			   
	}
	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objmanga->set_idmanga($_POST['idmanga']);
		$objmanga->set_tipomanga($_POST['tipomanga']);

		if ($objmanga->modificar()){
			header('Location: ../controlador/manga_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/manga_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objmanga->set_idmanga($_GET['eliminarId']);
	
		if($objmanga->eliminar()){
			header('Location: ../controlador/manga_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/manga_controlador.php?exito=false');
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
	require_once("../vista/manga_vista.php");

?>