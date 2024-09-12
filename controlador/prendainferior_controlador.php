<?php
	// Llamada al modelo
	require_once("../modelo/prendainferior_modelo.php");
	$objprendain= new prendainModelo();
	// Llamar controlador con funciones, para no repetir el mismo código
	require_once("vista_controlador.php");

	$lista_prendain1 = $objprendain->consultar();
	$lista_prendain= $objprendain->prendain_consultar();
/*----------------------------------------------Formulario----------------------------------------------*/

 
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
			/*header('Location: ../controlador/proveedorForm_controlador.php?exito=true');*/
			header('Location: ../controlador/prendainferior_controlador.php?exito=true');
			exit();
			
		} else {
			
			/*header('Location: ../controlador/proveedorForm_controlador.php?exito=false');*/
			header('Location: ../controlador/prendainferior_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
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
		echo "<script>location.href='prendainferior_controlador.php'</script>";
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

	// Llamada a la vista
	require_once("../vista/prendain_pop-up.php");
?>