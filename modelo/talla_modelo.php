<?php
    require_once("conexionPDO.php");
	class tallaModelo extends Conexion {
		// Atributos
		private $idtalla;
		private $ntalla;
		private $genero;
		private $objbd;


		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
		public function get_idtalla(){
			return $this->idtalla;
		}
		
		public function set_idtalla( $idtalla ){
			$this->idtalla = $idtalla;	
		}
	
		public function get_ntalla(){
			return $this->ntalla;
		}
		
		public function set_ntalla( $ntalla ){
			$this->ntalla = $ntalla;
		}

		public function get_genero(){
			return $this->genero;
		}
		
		public function set_genero( $genero){
			$this->genero = $genero;
		}
	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT * FROM talla";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 
		
		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO talla (id_talla,talla,genero) VALUES (:idtalla,:ntalla,:genero)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':idtalla', $this->idtalla); 
			$preparado->bindParam(':ntalla', $this->ntalla);
			$preparado->bindParam(':genero', $this->genero);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
		// id_talla=idtalla	id_pedidoU=telefonop	id_talla=p	_talla=direccionp	precio_unitario=correop	descripcion	descuento	fecha_talla	

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from talla where id_talla='".$this->idtalla."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idtalla = $datos['id_talla'];
				$this->ntalla = $datos['talla'];
				$this->genero = $datos['genero'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		  
		public function modificar(){ 
			$registro= "UPDATE talla SET id_talla='".$this->idtalla."', talla='".$this->ntalla."', genero='".$this->genero."' WHERE id_talla='".$this->idtalla."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM talla WHERE id_talla='".$this->idtalla."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de talla
		// Consultar lista de tallaes
		public function talla_consultar(){
			$lista = array();
			$registro = "SELECT * FROM talla";
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