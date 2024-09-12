<?php
	// Llamada al modelo
	require_once("../modelo/venta_modelo.php");
	$objventa = new ventaModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código

	$total_ventas= $objventa->totalventas();
	require_once("../controlador/vista_controlador.php");
	
	$lista_venta1 = $objventa->consultar();
	$lista_venta = $objventa->venta_consultar();
/*----------------------------------------------Formulario----------------------------------------------*/

	//id_venta=id_venta	id_pedidoU=id_pedidoU	documento_cliente=documento_cliente	cantidad_prendas=cantidad_prendas	precio_unitario=precio_unitario	descripcion	descuento	fecha_venta	precio_unitario 
	// Crear instancia de clase de Categorías
	$idventa= "";
	$documentocliente= "";
	$cantidadprendas= 0;
	$idpedidoU= "";
	$preciounitario= 0.0;
	$descrip= "";
	$descuen= 0;
	$fechaventa= '2024-02-11';
	 
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objventa->set_documentocliente($_POST['documentocliente']);
		$objventa->set_cantidadprendas($_POST['cantidadprendas']);
		$objventa->set_idpedidoU($_POST['idpedidoU']);
		$objventa->set_preciounitario($_POST['preciounitario']);
		$objventa->set_descrip($_POST['descrip']);
		$objventa->set_descuen($_POST['descuen']);
		$objventa->set_fechaventa($_POST['fechaventa']);
		$result = $objventa->incluir();
		if ($result == 1){
			
			header('Location: ../controlador/venta_controlador.php?exito2=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/venta_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objventa->set_idventa($_GET['id']);
		
		if ($objventa->buscar()){
			$id_venta = $objventa->get_idventa();
			$documentocliente = $objventa->get_documentocliente();
			$cantidadprendas = $objventa->get_cantidadprendas();
			$idpedidoU = $objventa->get_idpedidoU();
			$preciounitario = $objventa->get_preciounitario();
			$descrip = $objventa->get_descrip();
			$descuen = $objventa->get_descuen();
			$fechaventa = $objventa->get_fechaventa();

		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='venta_controlador.php';
			</script>";
		}			   
	}
	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objventa->set_idventa($_POST['id_venta']);
		$objventa->set_documentocliente($_POST['documentocliente']);
		$objventa->set_cantidadprendas($_POST['cantidadprendas']);
		$objventa->set_idpedidoU($_POST['idpedidoU']);
		$objventa->set_preciounitario($_POST['preciounitario']);
		$objventa->set_descrip($_POST['descrip']);
		$objventa->set_descuen($_POST['descuen']);
		$objventa->set_fechaventa($_POST['fechaventa']);

		if ($objventa->modificar()){
			header('Location: ../controlador/venta_controlador.php?exito1=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/venta_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objventa->set_idventa($_GET['eliminarId']);
	
		if($objventa->eliminar()){
			header('Location: ../controlador/venta_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/venta_controlador.php?exito=false');
			exit();

		}	
	} 

	//Boton para Volver
	if (isset($_POST['Volver'])) {
		echo "<script>location.href='venta_controlador.php'</script>";
	}

	
//funcion para rellenar input de cliente con select de pedido
	echo '<script type="text/javascript">
	
	function rellenar(){

		var select = document.getElementById("idpedidoU");
	
		var seleccion = select.options[select.selectedIndex];

		var cedula = seleccion.getAttribute("data-cedula");

		document.getElementById("documentocliente").value = cedula;
	}</script>';


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
	
	// Llamada a la vista -> Formulario
	require_once("../vista/venta_vista.php");

?>