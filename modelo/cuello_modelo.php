<?php
    require_once("conexionPDO.php");
	class cuelloModelo extends Conexion {
		// Atributos
		private $idcuello;
		private $tipocuello;
		private $objbd;


		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
		public function get_idcuello(){
			return $this->idcuello;
		}
		
		public function set_idcuello( $idcuello ){
			$this->idcuello = $idcuello;	
		}
	
		public function get_tipocuello(){
			return $this->tipocuello;
		}
		
		public function set_tipocuello( $tipocuello ){
			$this->tipocuello = $tipocuello;
		}
	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT * FROM cuello";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 
		
		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO cuello (id_cuello,tipo_cuello) VALUES (:idcuello,:tipocuello)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':idcuello', $this->idcuello); 
			$preparado->bindParam(':tipocuello', $this->tipocuello);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
		// id_cuello=idcuello	id_pedidoU=telefonop	id_cuello=tipop	tipo_cuello=direccionp	precio_unitario=correop	descripcion	descuento	fecha_cuello	

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from cuello where id_cuello='".$this->idcuello."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idcuello = $datos['id_cuello'];
				$this->tipocuello = $datos['tipo_cuello'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		  
		public function modificar(){ 
			$registro= "UPDATE cuello SET id_cuello='".$this->idcuello."', tipo_cuello='".$this->tipocuello."' WHERE id_cuello='".$this->idcuello."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM cuello WHERE id_cuello='".$this->idcuello."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de cuello
		// Consultar lista de cuelloes
		public function cuello_consultar(){
			$lista = array();
			$registro = "SELECT * FROM cuello";
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