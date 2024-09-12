<?php
	// Llamada al modelo
	require_once("../modelo/pedido_modelo.php");
	$objpedidou = new pedidouModelo();
	$objprendain = new prendainModelo();
	$objprendasu = new prendasuModelo();
	$objtallapi = new tallapiModelo();
	$objtallasu = new tallasuModelo();


	$total_pedidos = $objpedidou->totalPedidos();
	$total_pedidosfinalizados = $objpedidou->totalPedidosfinalizados();
	$total_pedidospendientes = $objpedidou->totalPedidospedientes();
	
	if(isset($_GET['id'])){
	$objtallapi->set_idprendain($_GET['id']);
	$todosLosRegistros = $objtallapi->buscar();

	$objtallasu->set_idprendasu($_GET['id']);
	$todosLosRegistros2 = $objtallasu->buscar();
	}
	


	// Llamar controlador con funciones, para no repetir el mismo código
	require_once("vista_controlador.php");

	$lista_pedidou1 = $objpedidou->consultar();
	$lista_pedidou = $objpedidou->pedidou_consultar();
	$tablas_auxi = $objprendain->tablas_aux();
	$tablas_auxia = $objprendasu->tablas_auxa();
	$siguiente = $objpedidou -> SiguientePedidou();
	$siguientepi = $objpedidou -> SiguientePrendain();
	$siguientesu = $objpedidou -> SiguientePrendasu();



		//Mostrar el numero de pedididou correspondiente
		if(isset($_GET['id'])){
			$id_pedidoU = "";
			$idprendain = "";
			$idprendasu = "";
			} else {
				$id_pedidoU = $siguiente[0]['siguiente'] + 1;
				$id_prendain = $siguientepi[0]['siguientepi'] + 1;
				$id_prendasu = $siguientesu[0]['siguientesu'] + 1;
			}
			


/*----------------------------------------------Formulario----------------------------------------------*/

 
	// Crear instancia de clase de Pedido Uniforme
	$idpedidoU= "";
	$documentocliente= "";
	$nombrepedidou= "";
	$preciopu= 0.0;
	$imgpu= "";
	$fechai= '2024-02-11';
	$fechaf= '2024-02-11';
	$obserpu= "";
	
	
	// Crear instancia de clase de Prenda inferior
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


	// Crear instancia de clase de Prenda Superior
	$idprendasu= "";
	$idpedidoU= "";	
	$idtelasu= ""; 	
	$idcostados= ""; 	
	$idtipoprod= "";	
	$idmanga= "";	 
	$telamanga= "";	
	$idcortemanga= "";	
	$idcuello= ""; 	
	$idcierre= ""; 	
	$idtipoPS= "";  	
	$obserps= ""; 
	
	// Crear instancia de clase de tallapi
	$idprendain= "";
	$idtalla= "";	
	$cantidad= ""; 	

	// Crear instancia de clase de tallasu
	$idprendasu= "";
	$idtallasu= "";	
	$cantidadsu= ""; 	
	
/*------------------------------------------------------------- */

	// Click > Botón Guardar
	if(isset($_POST['guardar'])){

		/*-----------------> Modulo de Imagenes <-----------------*/

			//Obtener la información de la imagen
   	 		$nombre = $_FILES['imagen']['name'];
			$tmp = $_FILES['imagen']['tmp_name'];
			$extension = pathinfo($nombre, PATHINFO_EXTENSION);

			//Generar un nombre
			$imgpu = uniqid() . "." . $extension;
		
			//Guardar la imagen en la carpeta seleccionada con el nombre generado
			$directorio = "../imgpedidos";
			$ruta = $directorio . "/" . $imgpu;
			move_uploaded_file($tmp, $ruta);

		/*--------------------------------------------------*/

		$objpedidou->set_documentocliente($_POST['documentocliente']);
		$objpedidou->set_nombrepedidou($_POST['nombrepedidou']);
		$objpedidou->set_preciopu($_POST['preciopu']);
		$objpedidou->set_imgpu($imgpu);
		$objpedidou->set_fechai($_POST['fechai']);
		$objpedidou->set_fechaf($_POST['fechaf']);
		$objpedidou->set_obserpu($_POST['obserpu']);
		$result = $objpedidou->incluir();

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

		$objprendasu->set_idpedidoU($_POST['idpedidoU']);
		$objprendasu->set_idtelasu($_POST['idtelasu']);
		$objprendasu->set_idcostados($_POST['idcostadossu']);
		$objprendasu->set_idtipoprod($_POST['tipoprodsu']);
		$objprendasu->set_idmanga($_POST['idmangasu']);
		$objprendasu->set_telamanga($_POST['idtelaman']);
		$objprendasu->set_idcortemanga($_POST['idcorteman']);
		$objprendasu->set_idcuello($_POST['idcuello']);
		$objprendasu->set_idcierre($_POST['idcierre']);
        $objprendasu->set_idtipoPS($_POST['idtipops']);
		$objprendasu->set_obserps($_POST['obserps']);
		$result = $objprendasu->incluir();


		$idtallas = $_POST['idtallas'];
		$cantidades = $_POST['cantidades'];
		$datos = [];
		foreach(array_combine($idtallas, $cantidades) as $talla => $cantidad){
			$datos[] = ['idprendain' => $_POST['idprendain'], 'idtalla' => $talla, 'cantidad' => $cantidad];
	}




	$idtallassu = $_POST['idtallassu'];
	$cantidadesu = $_POST['cantidadessu'];
	$datossu = [];
	foreach(array_combine($idtallassu, $cantidadesu) as $tallau => $cantidadu){
		$datossu[] = ['idprendasu' => $_POST['idprendasu'], 'idtallasu' => $tallau, 'cantidadsu' => $cantidadu];
}
	
	
	$result = $objtallapi->incluirMultiple($datos);
	$result = $objtallasu->incluirMultiple($datossu);	


		if ($result == 1){
<<<<<<< HEAD

=======
			/*header('Location: ../controlador/proveedorForm_controlador.php?exito=true');*/
>>>>>>> de4a7b87e97764835d2b07c31a6ce63a69816cc5
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
			$imgpu = $objpedidou->get_imgpu();
			$fechai = $objpedidou->get_fechai();
			$fechaf = $objpedidou->get_fechaf();
			$obserpu = $objpedidou->get_obserpu();
		} 
		
		$objprendain->set_idpedidoU($_GET['id']);	
		if ($objprendain->buscar()){
			$idprendain = $objprendain->get_idprendain();
			$idpedidoU = $objprendain->get_idpedidoU();
			$idtela = $objprendain->get_idtela();
			$idcostados = $objprendain->get_idcostados();
			$idtipoprod = $objprendain->get_idtipoprod();
			$idprotector = $objprendain->get_idprotector();
			$idtipopi = $objprendain->get_idtipopi();
			$color = $objprendain->get_color();
			$tapatra = $objprendain->get_tapatra();
			$tirante = $objprendain->get_tirante();
			$obserpi = $objprendain->get_obserpi();

		}
		
        $objprendasu->set_idpedidoU($_GET['id']);	
		if ($objprendasu->buscar()){
			$idprendasu = $objprendasu->get_idprendasu();
			$idpedidoU = $objprendasu->get_idpedidoU();
			$idtelasu = $objprendasu->get_idtelasu	();
			$idcostados = $objprendasu->get_idcostados();
			$idtipoprod = $objprendasu->get_idtipoprod();
			$idmanga = $objprendasu->get_idmanga();
			$telamanga = $objprendasu->get_telamanga();
			$idcortemanga = $objprendasu->get_idcortemanga();
			$idcuello = $objprendasu->get_idcuello();
			$idcierre = $objprendasu->get_idcierre();
            $idtipoPS = $objprendasu->get_idtipoPS();
			$obserps = $objprendasu->get_obserps();

		}
		

	}
	

	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
<<<<<<< HEAD
		
		/*-----------------> Modulo de Imagenes <-----------------*/

			//Obtener la información de la imagen
			$nombre = $_FILES['imagen']['name'];
			$tmp = $_FILES['imagen']['tmp_name'];
			$extension = pathinfo($nombre, PATHINFO_EXTENSION);

			//Generar un nombre
			$imgpu = uniqid() . "." . $extension;
		
			//Guardar la imagen en la carpeta seleccionada con el nombre generado
			$directorio = "../imgpedidos";
			$ruta = $directorio . "/" . $imgpu;
			move_uploaded_file($tmp, $ruta);

		/*--------------------------------------------------*/

		$objpedidou->set_idpedidoU($_POST['idpedidoU']);
=======
		$objpedidou->set_idpedidoU($_POST['id_pedidoU']);
>>>>>>> de4a7b87e97764835d2b07c31a6ce63a69816cc5
		$objpedidou->set_documentocliente($_POST['documentocliente']);
		$objpedidou->set_nombrepedidou($_POST['nombrepedidou']);
		$objpedidou->set_preciopu($_POST['preciopu']);
		$objpedidou->set_imgpu($imgpu);
		$objpedidou->set_fechai($_POST['fechai']);
		$objpedidou->set_fechaf($_POST['fechaf']);
		$objpedidou->set_obserpu($_POST['obserpu']);

<<<<<<< HEAD
		$objprendain->set_idprendain($_POST['idprendain']);
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

		$objprendasu->set_idpedidoU($_POST['idpedidoU']);
		$objprendasu->set_idtelasu($_POST['idtelasu']);
		$objprendasu->set_idcostados($_POST['idcostadossu']);
		$objprendasu->set_idtipoprod($_POST['tipoprodsu']);
		$objprendasu->set_idmanga($_POST['idmangasu']);
		$objprendasu->set_telamanga($_POST['idtelaman']);
		$objprendasu->set_idcortemanga($_POST['idcorteman']);
		$objprendasu->set_idcuello($_POST['idcuello']);
		$objprendasu->set_idcierre($_POST['idcierre']);
        $objprendasu->set_idtipoPS($_POST['idtipops']);
		$objprendasu->set_obserps($_POST['obserps']);

		//$objprendain->set_i($_POST['i']);


		if ($objprendain->modificar() && $objprendasu->modificar() && $objpedidou->modificar()){
			header('Location: ../controlador/transacciones_controlador.php?exito1=true');
=======
		if ($objpedidou->modificar()){
			header('Location: ../controlador/pedido_controlador.php?exito1=true');
>>>>>>> de4a7b87e97764835d2b07c31a6ce63a69816cc5
			exit();
			
		} else {
			
			header('Location: ../controlador/transacciones_controlador.php?exito=false');
			exit();

		}	
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objpedidou->set_idpedidoU($_GET['eliminarId']);
		$objprendain->set_idpedidoU($_GET['eliminarId']);
		$objprendasu->set_idpedidoU($_GET['eliminarId']);

		if($objprendain->eliminar() && $objpedidou->eliminar() && $objprendasu->eliminar()){
			header('Location: ../controlador/transacciones_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/transacciones_controlador.php?exito=false');
			exit();

		}	

	}

	//Boton para Volver
	if (isset($_POST['Volver'])) {
		echo "<script>location.href='transacciones_controlador.php'</script>";
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
	require_once("../vista/pedido_vista.php");
	
?>