<?php
    require_once("conexionPDO.php");
	class cierreModelo extends Conexion {
		// Atributos
		private $idcierre;
		private $tipocierre;
		private $objbd;


		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
		public function get_idcierre(){
			return $this->idcierre;
		}
		
		public function set_idcierre( $idcierre ){
			$this->idcierre = $idcierre;	
		}
	
		public function get_tipocierre(){
			return $this->tipocierre;
		}
		
		public function set_tipocierre( $tipocierre ){
			$this->tipocierre = $tipocierre;
		}
	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT * FROM cierre";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 
		
		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO cierre (id_cierre,tipo_cierre) VALUES (:idcierre,:tipocierre)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':idcierre', $this->idcierre); 
			$preparado->bindParam(':tipocierre', $this->tipocierre);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
		// id_cierre=idcierre	id_pedidoU=telefonop	id_cierre=tipop	tipo_cierre=direccionp	precio_unitario=correop	descripcion	descuento	fecha_cierre	

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from cierre where id_cierre='".$this->idcierre."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idcierre = $datos['id_cierre'];
				$this->tipocierre = $datos['tipo_cierre'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		  
		public function modificar(){ 
			$registro= "UPDATE cierre SET id_cierre='".$this->idcierre."', tipo_cierre='".$this->tipocierre."' WHERE id_cierre='".$this->idcierre."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM cierre WHERE id_cierre='".$this->idcierre."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de cierre
		// Consultar lista de cierrees
		public function cierre_consultar(){
			$lista = array();
			$registro = "SELECT * FROM cierre";
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