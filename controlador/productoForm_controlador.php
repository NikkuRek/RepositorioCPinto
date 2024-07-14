<?php
	// Llamada al modelo
	require_once("../modelo/producto_modelo.php");
	$objProducto = new ProductoModelo();
	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("vista_controlador.php");
	// Llamamos a la lista de proveedores -> Se utilizará en el formulario
	$lista_proveedor = $objProducto->proveedor_consultar();
	
	// Crear instancia de clase de Categorías
	$idproducto= "";
	$idproveedor= "";
	$nomproducto= "";
	$descripcion= "";
	$precio= "";
	$cantidaddisp= "";
	
	// Click > Botón Guardar
	if(isset($_POST['guardar'])){
		$objProducto->set_idproveedor($_POST['id_proveedor_input']);
		$objProducto->set_nomproducto($_POST['nomproducto']);
		$objProducto->set_descripcion($_POST['descripcion']);
		$objProducto->set_precio($_POST['precio']);
		$objProducto->set_cantidaddisp($_POST['cantidaddisp']);
		$result = $objProducto->incluir();
		if ($result == 1){
			header('Location: ../controlador/productoForm_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/productoForm_controlador.php?exito=true');
			exit();

		}	
	}
	// Si hacen clic en modificar desde la pantalla anterior
	if (isset($_GET['id'])){
		$objProducto->set_idproducto($_GET['id']);
		
		if ($objProducto->buscar()){
			$idproducto = $objProducto->get_idproducto();
			$idproveedor = $objProducto->get_idproveedor();
			$nomproducto = $objProducto->get_nomproducto();
			$descripcion = $objProducto->get_descripcion();
			$precio = $objProducto->get_precio();
			$cantidaddisp = $objProducto->get_cantidaddisp();
		} else {
			echo "<script>
				alert('No se encontraron los datos');
				location.href='producto_controlador.php';
			</script>";
		}			   
	}
	// Click > Botón Modificar
	if (isset($_POST['modificar'])){
		$objProducto->set_idproducto($_POST['idproducto']);
		$objProducto->set_idproveedor($_POST['id_proveedor_input']);
		$objProducto->set_nomproducto($_POST['nomproducto']);
		$objProducto->set_descripcion($_POST['descripcion']);
		$objProducto->set_precio($_POST['precio']);
		$objProducto->set_cantidaddisp($_POST['cantidaddisp']);
		
		if ($objProducto->modificar()){
			header('Location: ../controlador/productoForm_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/productoForm_controlador.php?exito=true');
			exit();

		}		
	}
	// Si hacen clic en eliminar desde la pantalla anterior
	if (isset($_GET['eliminarId'])){
		$objProducto->set_idproducto($_GET['eliminarId']);
	
		if($objProducto->eliminar()){
			header('Location: ../controlador/producto_controlador.php?exito=true');
			exit();
			
		} else {
			
			header('Location: ../controlador/producto_controlador.php?exito=true');
			exit();

		}	
	}



	if (isset($_POST['Volver'])) {
		echo "<script>location.href='producto_controlador.php'</script>";
	}
	
    $producto_conexion = new Conexion();
    $conexion = $producto_conexion->conectar();

    $consulta = "SELECT * FROM proveedor";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

	
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
	require_once("../vista/productoForm_vista.php");

?>