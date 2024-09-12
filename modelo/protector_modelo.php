<?php
    require_once("conexionPDO.php");
	class protectorModelo extends Conexion {
		// Atributos
		private $idprotector;
		private $tipoprotector;
		private $objbd;


		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
		public function get_idprotector(){
			return $this->idprotector;
		}
		
		public function set_idprotector( $idprotector ){
			$this->idprotector = $idprotector;	
		}
	
		public function get_tipoprotector(){
			return $this->tipoprotector;
		}
		
		public function set_tipoprotector( $tipoprotector ){
			$this->tipoprotector = $tipoprotector;
		}
	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT * FROM protector";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 
		
		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO protector (id_protector,tipo_protector) VALUES (:idprotector,:tipoprotector)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':idprotector', $this->idprotector); 
			$preparado->bindParam(':tipoprotector', $this->tipoprotector);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
		// id_protector=idprotector	id_pedidoU=telefonop	id_protector=tipop	tipo_protector=direccionp	precio_unitario=correop	descripcion	descuento	fecha_protector	

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from protector where id_protector='".$this->idprotector."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idprotector = $datos['id_protector'];
				$this->tipoprotector = $datos['tipo_protector'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		  
		public function modificar(){ 
			$registro= "UPDATE protector SET id_protector='".$this->idprotector."', tipo_protector='".$this->tipoprotector."' WHERE id_protector='".$this->idprotector."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM protector WHERE id_protector='".$this->idprotector."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de protector
		// Consultar lista de protectores
		public function protector_consultar(){
			$lista = array();
			$registro = "SELECT * FROM protector";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 
	}
?>