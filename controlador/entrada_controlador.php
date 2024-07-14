<?php
	// Llamada al modelo
	require_once("../modelo/entrada_modelo.php");
	$objEntrada = new EntradaModelo();
	//Array para el selector de productos
	$resultados = $objEntrada -> ListaProductos();
	$siguiente = $objEntrada -> SiguienteEntrada();


	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("vista_controlador.php");



	//Mostrar el numero de entrada correspondiente
	if(isset($_GET['id'])){
	$codigo_entrada = "";
	$cantidad_entrada = "";	
	
	 
	} else {
		$codigo_entrada = $siguiente[0]['siguiente'] + 1;
		$cantidad_entrada = "";
		$id_producto = "";
		$nombre_prod = "";
	}
	
	/*--------------------------------------Metodos relacionados al CRUD-----------------------------------*/

	// Obtener los datos del formulario
	if(isset( $_POST['Guardar']) ){
		$id_producto = $_POST["id_producto"];
		$cantidad_entrada = $_POST["cantidad_entrada"];

		// Asignar los valores a las propiedades del objeto
		$objEntrada->setid_producto($id_producto);
		$objEntrada->setcantidad_entrada($cantidad_entrada);

		
		$resultado = $objEntrada->insertar();

		if ($resultado == 1){
			
		$resultado2 = $objEntrada->Actualizar_producto();

		header('Location: ../controlador/entrada_controlador.php?exito=true');
		exit();

		} else {
		header('Location: ../controlador/entrada_controlador.php?exito=false');
		exit();
		}
	}

	// Boton Editar en Transacciones
	if (isset($_GET['id'])){
		$objEntrada->setcodigo_entrada($_GET['id']);
		
		if ($objEntrada->buscar()){
			$id_producto = $objEntrada->getid_producto();
			$codigo_entrada = $objEntrada->getcodigo_entrada();
			$cantidad_entrada = $objEntrada->getcantidad_entrada();

		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='transacciones_controlador.php';
			</script>";
		}			   
	}

		// Botón Modificar
		if (isset($_POST['modificar'])){
			$objEntrada->setid_producto($_POST['id_producto']);
			$objEntrada->setcodigo_entrada($_POST['codigo_entrada']);
			$objEntrada->setcantidad_entrada($_POST['cantidad_entrada']);
			
			if ($objEntrada->modificar()){
				
				header('Location: ../controlador/entrada_controlador.php?exito=true');
				exit();
				
			} else {
				
				header('Location: ../controlador/entrada_controlador.php?exito=false');
				exit();

			}	
		}

		// Boton Eliminar
		if (isset($_GET['eliminarId'])){
			
			$objEntrada->setcodigo_entrada($_GET['eliminarId']);
		
			if($objEntrada->eliminar()){
				
				header('Location: ../controlador/transacciones_controlador.php?exito=true');
				exit();
				
			} else {
				
				header('Location: ../controlador/transacciones_controlador.php?exito=false');
				exit();

			}	
		}

	/*--------------------------------------Fin de metodos relacionados al CRUD--------------------------------------*/
	


	//Boton Volver
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

	// Llamada a la vista
	require_once("../vista/entrada_vista.php");
?>