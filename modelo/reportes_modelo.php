<?php
    require_once("conexionPDO.php");
	class ReportesModelo extends Conexion {
		
		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}

		public function obtenerDatosProductos() {
			$consulta = "SELECT producto.id_producto, producto.id_proveedor, producto.nombre_prod, producto.descripcion, producto.precio, producto.cantidad_disp, proveedor.nombre_p AS proveedor FROM producto, proveedor WHERE producto.id_proveedor = proveedor.id_proveedor";
			$statement = $this->objbd->prepare($consulta);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}
	
		public function obtenerDatosEntradas() {
			$consulta = "SELECT entrada.codigo_entrada, entrada.id_producto, entrada.cantidad_entrada,entrada.fecha_entrada, producto.nombre_prod AS producto FROM entrada, producto WHERE entrada.id_producto = producto.id_producto";
			$statement = $this->objbd->prepare($consulta);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}


		public function obtenerDatosSalidas() {
			$consulta = "SELECT salida.codigo_salida, salida.id_producto, salida.cant_salida,salida.fecha_salida, producto.nombre_prod AS producto FROM salida, producto WHERE salida.id_producto = producto.id_producto";
			$statement = $this->objbd->prepare($consulta);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}


		public function obtenerDatosProveedores() {
			$consulta = "SELECT id_proveedor, nombre_p, direccion_p, telefono_p, correo_p FROM proveedor";
			$statement = $this->objbd->prepare($consulta);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}
	
		public function obtenerDatosClientes() {
			$consulta = "SELECT id_cliente, cedula_c, nombre_c, apellido_c, telefono_c, direccion_C FROM cliente";
			$statement = $this->objbd->prepare($consulta);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}

        public function DatosCombinados(){
            
			$sql = "SELECT e.*, p.nombre_prod, p.descripcion, p.precio, 'entrada' as tipo, e.fecha_entrada as fecha_ordenada FROM entrada e JOIN producto p ON e.id_producto = p.id_producto";
			$sql2 = "SELECT s.*, p.nombre_prod, p.descripcion, p.precio, 'salida' as tipo, s.fecha_salida as fecha_ordenada FROM salida s JOIN producto p ON s.id_producto = p.id_producto";
	
			// Ejecutar la consulta y obtener los resultados en un array asociativo
			$resultados = $this->objbd->prepare($sql);
			$resultados -> execute();
			$datos_e = $resultados -> fetchAll(PDO::FETCH_ASSOC);
	
			$resultados2 = $this->objbd->prepare($sql2);
			$resultados2 -> execute();
			$datos_s = $resultados2 -> fetchAll(PDO::FETCH_ASSOC);
	
			//se combinan ambas consultas (entrada y salida) en un solo arreglo
			$datos_combinados = array_merge($datos_e, $datos_s);
	
			//se ordenan por fecha 
			usort($datos_combinados, function($a, $b){
				return strtotime($b['fecha_ordenada']) - strtotime($a['fecha_ordenada']);
			});
			
			return $datos_combinados;
		}


	}
?>