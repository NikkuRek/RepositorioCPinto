<?php
    require_once("conexionPDO.php");
    class ReportesModelo extends Conexion {

        private $fechai;
        private $fechaf;

        public function get_fechai(){
            return $this->fechai;
        }
        
        public function set_fechai( $fechai ){
            $this->fechai = $fechai;
        }
    
        public function get_fechaf(){
            return $this->fechaf;
        }
        
        public function set_fechaf( $fechaf ){
            $this->fechaf = $fechaf;
        }
        
         // Constructor -> Activar conexión de clase padre
         public function __construct(){
            parent::__construct();
            $this->objbd = parent::conectar();
        }
        
        public function obtenerDatosClientes() {
            $consulta = "SELECT documento_cliente, nombre, telefono, direccion FROM cliente";
            $statement = $this->objbd->prepare($consulta);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public function obtenerDatosVentas() {
            $fechai = $this->get_fechai();
            $fechaf = $this->get_fechaf();
        
            // Prepara la consulta SQL con parámetros
            $consulta = "SELECT v.id_venta, p.nombre AS nombre_pedido, c.nombre AS nombre_cliente, cantidad_prendas, precio_unitario, fecha_venta 
                         FROM venta v 
                         INNER JOIN pedido_uniforme p ON p.id_pedidoU = v.id_pedidoU
                         INNER JOIN cliente c ON c.documento_cliente = p.documento_cliente
                         WHERE fecha_venta BETWEEN :fechai AND :fechaf
                         GROUP BY v.id_venta";
        
            $statement = $this->objbd->prepare($consulta);
            $statement->bindParam(':fechai', $fechai);
            $statement->bindParam(':fechaf', $fechaf);
            $statement->execute();
            
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

		
		public function obtenerDatosPdoClientes() {
			$fechai = $this->get_fechai();
			$fechaf = $this->get_fechaf();
		
			// Prepara la consulta SQL con parámetros
			$consulta = "SELECT c.documento_cliente, c.nombre AS nombre_cliente, telefono, COUNT(p.id_pedidoU) AS cantidad_pedidos
						 FROM cliente c
						 INNER JOIN pedido_uniforme p ON p.documento_cliente = c.documento_cliente
						 WHERE p.fecha_inicio BETWEEN :fechai AND :fechaf
						 GROUP BY c.documento_cliente, c.nombre";
			
			$statement = $this->objbd->prepare($consulta);
			$statement->bindParam(':fechai', $fechai);
			$statement->bindParam(':fechaf', $fechaf);
			$statement->execute();
			
			// Obtén los datos y guárdalos en una variable
			$datos = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			// Aquí podrías procesar los datos si es necesario
		
			return $datos;
		}

        public function obtenerDatosPCerrados() {
			$fechai = $this->get_fechai();
			$fechaf = $this->get_fechaf();
		
			// Prepara la consulta SQL con parámetros
            $consulta = "SELECT fecha, p.nombre AS nombre_pedido, c.nombre AS nombre_cliente, estado AS estatus
						 FROM seguimiento s
                         INNER JOIN pedido_uniforme p ON p.id_pedidoU = s.id_pedidoU
						 INNER JOIN cliente c ON c.documento_cliente = p.documento_cliente
                         WHERE id_proceso=7 AND estado=3 AND fecha BETWEEN :fechai AND :fechaf
						 GROUP BY p.id_pedidoU, p.nombre";
			
			$statement = $this->objbd->prepare($consulta);
			$statement->bindParam(':fechai', $fechai);
			$statement->bindParam(':fechaf', $fechaf);
			$statement->execute();
			
			// Obtén los datos y guárdalos en una variable
			$datos = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			// Aquí podrías procesar los datos si es necesario
		
			return $datos;
		}

    }
?>
