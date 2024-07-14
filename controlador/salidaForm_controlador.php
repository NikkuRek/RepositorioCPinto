<?php
    require_once("../modelo/salida_modelo.php");
    $objSalida = new SalidaModelo();
    $id_usuario = $_SESSION['id_usuario'];
    
    require_once("vista_controlador.php");
    
    $salida_conexion = new Conexion();
    $conexion = $salida_conexion->conectar();

    $consulta = "SELECT * FROM cliente";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

    $consulta2 = "SELECT * FROM producto";
    $resultado2 = $conexion->prepare($consulta2);
    $resultado2->execute();
    $data2 = $resultado2->fetchAll(PDO::FETCH_ASSOC);

    
    $searchValue = isset($_POST['search']) ? $_POST['search'] : '';

    $query = "SELECT * FROM producto WHERE CONCAT(id_producto, nombre_prod, descripcion, precio, cantidad_disp) LIKE :filtervalues";
    $stmt = $conexion->prepare($query);
    $stmt->bindValue(':filtervalues', "%$searchValue%", PDO::PARAM_STR);
    $stmt->execute();


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    

    
    if(isset($_POST['Enviar'])){
        echo "<script>console.log('Conectado')</script>";

        $objSalida->set_idcliente($_POST['cliente_codigo_input']);
        $objSalida->set_idproducto($_POST['id_producto']);
        $objSalida->set_idusuario($id_usuario);
        $objSalida->set_cantsalida($_POST['cant_salida']);
        $objSalida->set_fechasalida($_POST['fecha_s']);
        echo "<script>console.log('Conectado2')</script>";
        
        $result=$objSalida->agregar();
        if ($result == 1){
            // Actualizar la cantidad disponible del producto
            $id_producto = $_POST['id_producto'];
            $cant_salida = $_POST['cant_salida'];
            $actualizar_consulta = "UPDATE producto SET cantidad_disp = cantidad_disp - :cant_salida WHERE id_producto = :id_producto";
            $actualizar_stmt = $conexion->prepare($actualizar_consulta);
            $actualizar_stmt->bindValue(':cant_salida', $cant_salida, PDO::PARAM_INT);
            $actualizar_stmt->bindValue(':id_producto', $id_producto, PDO::PARAM_INT);
            $actualizar_result = $actualizar_stmt->execute();
            if ($actualizar_result){
                header('Location: ../controlador/salidaForm_controlador.php?exito=true');
                exit();
            } else {
                echo "<script>alert('Error, al actualizar la cantidad del producto')</script>";
            }
        } else {
            echo "<script>alert('Error, al realizar registro, vuelva a intentarlo')</script>";
        }
    }


    if (isset($_GET['eliminarId'])){
			
        $objSalida->set_codigosalida($_GET['eliminarId']);
    
        if($objSalida->eliminar()){
            header('Location: ../controlador/transacciones_controlador.php?exito=true');
            exit();
            
        } else {
            
            header('Location: ../controlador/transacciones_controlador.php?exito=false');
            exit();

        }	
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

    require_once("../vista/salidaForm_vista.php");

?>