<?php
	// Llamada al modelo
	require_once("../modelo/seguimiento_modelo.php");
	$objseguimiento = new seguimientoModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código

	//$total_seguimiento= $objseguimiento->totalseguimiento();
	require_once("../controlador/vista_controlador.php");
	
	$lista_seguimiento1 = $objseguimiento->consultar();
	$lista_seguimiento = $objseguimiento->seguimiento_consultar();
	$tablas_auxi = $objseguimiento->tablas_aux();
	$siguiente = $objseguimiento -> SiguienteSeguimiento();

/*----------------------------------------------Formulario----------------------------------------------*/

	//id_seguimiento=id_seguimiento	id_pedidoU=id_pedidoU	documento_cliente=documento_cliente	cantidad_prendas=cantidad_prendas	precio_unitario=precio_unitario	estadocion	descuento	fecha_seguimiento	precio_unitario 
	// Crear instancia de clase de Categorías
	$idseguimiento= "";
	$iddepartamento= "";
	$idproceso= "";
	$idpedidoU= "";
	$estado= "";
	$fecha= '2024-02-11';


	 
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objseguimiento->set_iddepartamento($_POST['iddepartamento']);
		$objseguimiento->set_idproceso($_POST['idproceso']);
		$objseguimiento->set_idpedidoU($_POST['idpedidoU']);
		$objseguimiento->set_estado($_POST['estado']);
		$objseguimiento->set_fecha($_POST['fecha']);
		$result = $objseguimiento->incluir();
		if ($result == 1){
			
			header('Location: ../controlador/seguimiento_controlador.php?exito2=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/seguimiento_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objseguimiento->set_idseguimiento($_GET['id']);
		
		if ($objseguimiento->buscar()){
			$id_seguimiento = $objseguimiento->get_idseguimiento();
			$iddepartamento = $objseguimiento->get_iddepartamento();
			$idproceso = $objseguimiento->get_idproceso();
			$idpedidoU = $objseguimiento->get_idpedidoU();
			$estado = $objseguimiento->get_estado();
			$fecha = $objseguimiento->get_fecha();

		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='seguimiento_controlador.php';
			</script>";
		}			   
	}
	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objseguimiento->set_idseguimiento($_POST['idseguimiento']);
		$objseguimiento->set_iddepartamento($_POST['iddepartamento']);
		$objseguimiento->set_idproceso($_POST['idproceso']);
		$objseguimiento->set_idpedidoU($_POST['idpedidoU']);
		$objseguimiento->set_estado($_POST['estado']);
		$objseguimiento->set_fecha($_POST['fecha']);

		if ($objseguimiento->modificar()){
			header('Location: ../controlador/seguimiento_controlador.php?exito1=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/seguimiento_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objseguimiento->set_idseguimiento($_GET['eliminarId']);
	
		if($objseguimiento->eliminar()){
			header('Location: ../controlador/seguimiento_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/seguimiento_controlador.php?exito=false');
			exit();

		}	
	}

	//Boton para Volver
	if (isset($_POST['Volver'])) {
		echo "<script>location.href='seguimiento_controlador.php'</script>";
	}

	
//funcion para rellenar input de departamento con select de proceso
	echo '<script type="text/javascript">
	
	function rellenar(){

		var select = document.getElementById("idproceso");
	
		var seleccion = select.options[select.selectedIndex];

		var proceso = seleccion.getAttribute("data-proceso");

		document.getElementById("iddepartamento").value = proceso;
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
	require_once("../vista/seguimiento_vista.php");

?>