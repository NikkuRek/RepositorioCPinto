<?php
	// Llamada al modelo
	require_once("../modelo/cortemanga_modelo.php");
	$objcorte_manga = new corte_mangaModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("../controlador/vista_controlador.php");
	
	$lista_corte_manga1 = $objcorte_manga->consultar();
	$lista_cortemanga = $objcorte_manga->cortemanga_consultar();
/*----------------------------------------------Formulario----------------------------------------------*/

	//id_corte_manga=id_corte_manga	id_pedidoU=id_pedidoU	documento_cliente=documento_cliente	cantidad_prendas=cantidad_prendas	precio_unitario=precio_unitario	descripcion	descuento	fecha_corte_manga	precio_unitario 
	// Crear instancia de clase de Categorías
	$idcortemanga= "";
	$tipocortemanga= "";
	 
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objcorte_manga->set_idcortemanga($_POST['idcortemanga']);
		$objcorte_manga->set_tipocortemanga($_POST['tipocortemanga']);
		$result = $objcorte_manga->incluir();
		if ($result == 1){
			/*header('Location: ../controlador/corte_mangaForm_controlador.php?exito=true');*/
			header('Location: ../controlador/cortemanga_controlador.php?exito=true');
			exit();
			
		} else {
			
			/*header('Location: ../controlador/corte_mangaForm_controlador.php?exito=false');*/
			header('Location: ../controlador/cortemanga_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objcorte_manga->set_idcortemanga($_GET['id']);
		
		if ($objcorte_manga->buscar()){
			$idcortemanga = $objcorte_manga->get_idcortemanga();
			$tipocortemanga = $objcorte_manga->get_tipocortemanga();
		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='cortemanga_controlador.php';
			</script>";
		}			   
	}
	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objcorte_manga->set_idcortemanga($_POST['idcortemanga']);
		$objcorte_manga->set_tipocortemanga($_POST['tipocortemanga']);

		if ($objcorte_manga->modificar()){
			header('Location: ../controlador/cortemanga_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/cortemanga_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objcorte_manga->set_idcortemanga($_GET['eliminarId']);
	
		if($objcorte_manga->eliminar()){
			header('Location: ../controlador/cortemanga_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/cortemanga_controlador.php?exito=false');
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
	require_once("../vista/cortemanga_vista.php");

?>