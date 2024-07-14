<?php
    require_once("../modelo/conexionPDO.php");

    class SalidaModelo extends Conexion{
        private $id_producto;
        private $id_usuario;
        private $cedula_c;
        private $codigo_salida;
        private $cant_salida;
        private $total_salida;
        private $fecha_salida;
        private $objbd;

        public function __construct(){
            parent::__construct();
            $this->objbd = parent::conectar();
        }


        public function get_idcliente() 	{
            return $this->id_cliente;
        }
        
        public function set_idcliente($id_cliente) {
            $this->id_cliente=$id_cliente;	
        }
         public function get_idproducto() 	{
            return $this->id_producto;
        }
        
        public function set_idproducto($id_producto) {
            $this->id_producto=$id_producto;	
        }
    
        public function get_idusuario() {
            return $this->id_usuario;
        }
        
        public function set_idusuario($id_usuario) {
            $this->id_usuario=$id_usuario;
        }
    
        public function get_codigosalida() {
            return $this->codigo_salida;
        }
        
        function set_codigosalida($codigo_salida) 	{
            $this->codigo_salida=$codigo_salida;
        }

        public function get_cantsalida() {
            return $this->cant_salida;
        }
        
        function set_cantsalida($cant_salida) 	{
            $this->cant_salida=$cant_salida;
        }
    
        
        public function get_fechasalida() {
            return $this->fecha_salida;
        }
        
        function set_fechasalida($fecha_salida) {
            $this->fecha_salida=$fecha_salida;
        }


        public function agregar() {
            $almacenar = "INSERT INTO salida (id_cliente,id_producto,id_usuario,codigo_salida,cant_salida,fecha_salida) VALUES (:id_cliente,:id_producto,:id_usuario,:codigo_salida,:cant_salida,:fecha_salida)";
            $preparado = $this->objbd->prepare($almacenar);
            $preparado->bindParam(':id_cliente', $this->id_cliente);
            $preparado->bindParam(':id_producto', $this->id_producto);
            $preparado->bindParam(':id_usuario', $this->id_usuario); 
            $preparado->bindParam(':codigo_salida', $this->codigo_salida);
            $preparado->bindParam(':cant_salida', $this->cant_salida);
            $preparado->bindParam(':fecha_salida', $this->fecha_salida);
            $resul= $preparado->execute();
            if ($resul) {
                    $res = 1;
                }else{
                    $res = 0;
            }
            return $res;   		
        }

        public function modificar()  {
            $almacenar = "UPDATE salida SET id_producto='".$this->id_producto."',id_usuario='".$this->id_usuario."',cedula_c='".$this->cedula_c."', cant_salida='".$this->cant_salida."', total_salida='".$this->total_salida."', fecha_salida='".$this->fecha_salida."' where codigo_salida='".$this->codigo_salida."'";  
            $preparado = $this->objbd->prepare($almacenar);
            $resul = $preparado->execute();
            return $resul; 	
        } 

        
        public function eliminar() 	{
            $almacenar = "DELETE FROM salida where codigo_salida='".$this->codigo_salida."'";
            $preparado = $this->objbd->prepare($almacenar);
            $resul = $preparado->execute();
            return $resul;
        } 

        public function totalSalidas(){
			$consulta = "SELECT COUNT(*) AS total FROM salida";
			$preparado = $this->objbd->prepare($consulta);
			$preparado->execute();
			$resultado = $preparado->fetch(PDO::FETCH_ASSOC);
			return $resultado['total'];
		}
    }
?>