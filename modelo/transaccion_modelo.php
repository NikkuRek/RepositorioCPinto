<?php
    require_once("conexionPDO.php");
    //session_start();
    class TransaccionModelo extends Conexion {
        private $id_usuario;
        private $usuario;
        private $clave;
        private $correo_u;
        private $objbd;

        public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}

        // Funcion que solicita los datos de las tablas, los une y los ordena por fecha
        
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