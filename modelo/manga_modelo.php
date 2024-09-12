<?php
    require_once("conexionPDO.php");
	class mangaModelo extends Conexion {
		// Atributos
		private $idmanga;
		private $tipomanga;
		private $objbd;


		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
		public function get_idmanga(){
			return $this->idmanga;
		}
		
		public function set_idmanga( $idmanga ){
			$this->idmanga = $idmanga;	
		}
	
		public function get_tipomanga(){
			return $this->tipomanga;
		}
		
		public function set_tipomanga( $tipomanga ){
			$this->tipomanga = $tipomanga;
		}
	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT * FROM manga";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 
		
		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO manga (id_manga,tipo_manga) VALUES (:idmanga,:tipomanga)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':idmanga', $this->idmanga); 
			$preparado->bindParam(':tipomanga', $this->tipomanga);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
		// id_manga=idmanga	id_pedidoU=telefonop	id_manga=tipop	tipo_manga=direccionp	precio_unitario=correop	descripcion	descuento	fecha_manga	

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from manga where id_manga='".$this->idmanga."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idmanga = $datos['id_manga'];
				$this->tipomanga = $datos['tipo_manga'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		  
		public function modificar(){ 
			$registro= "UPDATE manga SET id_manga='".$this->idmanga."', tipo_manga='".$this->tipomanga."' WHERE id_manga='".$this->idmanga."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM manga WHERE id_manga='".$this->idmanga."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de manga
		// Consultar lista de mangaes
		public function manga_consultar(){
			$lista = array();
			$registro = "SELECT * FROM manga";
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