<?php
	// Llamada al modelo
	require_once("../modelo/pedido_modelo.php");
	$objpedidou = new pedidouModelo();
	
	require_once("../modelo/prendainferior_modelo.php");
	$objprendain = new prendainModelo();

	require_once("../modelo/prendasuperior_modelo.php");


	
	// Llamar controlador con funciones, para no repetir el mismo código
	require_once("vista_controlador.php");

	$lista_pedidou1 = $objpedidou->consultar();
	$lista_pedidou = $objpedidou->pedidou_consultar();
	$tablas_auxi = $objprendain->tablas_aux();
	$siguiente = $objpedidou -> SiguientePedidou();

		//Mostrar el numero de pedididou correspondiente
		if(isset($_GET['id'])){
			$id_pedidoU = "";
 
			} else {
				$id_pedidoU = $siguiente[0]['siguiente'] + 1;

			}
			


/*----------------------------------------------Formulario----------------------------------------------*/

 
	// Crear instancia de clase de Categorías
	$idpedidoU= "";
	$documentocliente= "";
	$nombrepedidou= "";
	$preciopu= 0.0;
	$fechai= '2024-02-11';
	$fechaf= '2024-02-11';
	$obserpu= "";
	
	
	// Crear instancia de clase de Categorías
	$idprendain= "";
	$idpedidoU= "";
	$idtela= "";
	$idcostados= "";
	$idtipoprod= "";
	$idprotector= "";
	$idtipopi= "";
	$color= "";
	$tapatra= "";
	$tirante= "";
	$obserpi= "";

	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objpedidou->set_documentocliente($_POST['documentocliente']);
		$objpedidou->set_nombrepedidou($_POST['nombrepedidou']);
		$objpedidou->set_preciopu($_POST['preciopu']);
		$objpedidou->set_fechai($_POST['fechai']);
		$objpedidou->set_fechaf($_POST['fechaf']);
		$objpedidou->set_obserpu($_POST['obserpu']);
		$result = $objpedidou->incluir();
		// if ($result == 1){

		// 	header('Location: ../controlador/pedido_controlador.php?exito2=true');
		// 	exit();
			
		// } else {
			
		// 	header('Location: ../controlador/pedido_controlador.php?exito=false');
		// 	exit();

		// }	

		$objprendain->set_idpedidoU($_POST['idpedidoU']);
		$objprendain->set_idtela($_POST['idtela']);
		$objprendain->set_idcostados($_POST['idcostados']);
		$objprendain->set_idtipoprod($_POST['idtipoprod']);
		$objprendain->set_idprotector($_POST['idprotector']);
		$objprendain->set_idtipopi($_POST['idtipopi']);
		$objprendain->set_color($_POST['color']);
		$objprendain->set_tapatra($_POST['tapatra']);
		$objprendain->set_tirante($_POST['tirante']);
		$objprendain->set_obserpi($_POST['obserpi']);
		$result = $objprendain->incluir();
		if ($result == 1){

			header('Location: ../controlador/pedido_controlador.php?exito2=true');
			exit();
			
		} else {
			

			header('Location: ../controlador/pedido_controlador.php?exito=false');
			exit();

		}	


	}

	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objpedidou->set_idpedidoU($_GET['id']);
		
		if ($objpedidou->buscar()){
			$id_pedidoU = $objpedidou->get_idpedidoU();
			$documentocliente = $objpedidou->get_documentocliente();
			$nombrepedidou = $objpedidou->get_nombrepedidou();
			$preciopu = $objpedidou->get_preciopu();
			$fechai = $objpedidou->get_fechai();
			$fechaf = $objpedidou->get_fechaf();
			$obserpu = $objpedidou->get_obserpu();

		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='pedido_controlador.php';
			</script>";
		}
		
		
		$objprendain->set_idprendain($_GET['id']);
			
		if ($objprendain->buscar()){
			$id_prendain= $objprendain->get_idprendain();
			$$idprendain= $objprendain->get_idpedidoU();
			$idtela = $objprendain->get_idtela();
			$idcostados = $objprendain->get_idcostados();
			$idtipoprod = $objprendain->get_idtipoprod();
			$idprotector = $objprendain->get_idprotector();
			$idtipopi = $objprendain->get_idtipopi();
			$color = $objprendain->get_color();
			$tirante = $objprendain->get_tirante();
			$obserpi = $objprendain->get_obserpi();
			$i = $objprendain->get_i();

		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='prendainferior_controlador.php';
			</script>";
		}
				   
	}


	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objpedidou->set_idpedidoU($_POST['id_pedidoU']);
		$objpedidou->set_documentocliente($_POST['documentocliente']);
		$objpedidou->set_nombrepedidou($_POST['nombrepedidou']);
		$objpedidou->set_preciopu($_POST['preciopu']);
		$objpedidou->set_fechai($_POST['fechai']);
		$objpedidou->set_fechaf($_POST['fechaf']);
		$objpedidou->set_obserpu($_POST['obserpu']);

		// if ($objpedidou->modificar()){
		//	header('Location: ../controlador/pedido_controlador.php?exito1=true');
		//	exit();
			
		//} else {
			
		//	header('Location: ../controlador/pedido_controlador.php?exito=false');
		//	exit();

		//}	

		$objprendain->set_prendain($_POST['id_pedidouc_input']);
		$objprendain->set_idpedidoU($_POST['$idpedidoU']);
		$objprendain->set_idtela($_POST['idtela']);
		$objprendain->set_idcostados($_POST['idcostados']);
		$objprendain->set_idtipoprod($_POST['idtipoprod']);
		$objprendain->set_idprotector($_POST['idprotector']);
		$objprendain->set_idtipopi($_POST['idtipopi']);
		$objprendain->set_color($_POST['color']);
		$objprendain->set_tapatra($_POST['tapatra']);
		$objprendain->set_tirante($_POST['tirante']);
		$objprendain->set_obserpi($_POST['obserpi']);

		$objprendain->set_i($_POST['i']);


		if ($objprendain->modificar()){
			header('Location: ../controlador/prendainferior_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/prendainferior_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objpedidou->set_idpedidoU($_GET['eliminarId']);
	
		if($objpedidou->eliminar()){
			header('Location: ../controlador/pedido_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/pedido_controlador.php?exito=false');
			exit();

		}	

		$objprendain->set_idprendain($_GET['eliminarId']);
	
		if($objprendain->eliminar()){
			header('Location: ../controlador/prendainferior_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/prendainferior_controlador.php?exito=false');
			exit();

		}	

	}

	//Boton para Volver
	if (isset($_POST['Volver'])) {
		echo "<script>location.href='pedido_controlador.php'</script>";
	}

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
		

	// Llamada a la vista
	require_once("../vista/transacciones_vista.php");
?>