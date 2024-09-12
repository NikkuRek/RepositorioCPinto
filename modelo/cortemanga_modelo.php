<?php
    require_once("conexionPDO.php");
	class corte_mangaModelo extends Conexion {
		// Atributos
		private $idcortemanga;
		private $tipocortemanga;
		private $objbd;


		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
		public function get_idcortemanga(){
			return $this->idcortemanga;
		}
		
		public function set_idcortemanga( $idcortemanga ){
			$this->idcortemanga = $idcortemanga;	
		}
	
		public function get_tipocortemanga(){
			return $this->tipocortemanga;
		}
		
		public function set_tipocortemanga( $tipocortemanga ){
			$this->tipocortemanga = $tipocortemanga;
		}
	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT * FROM corte_manga";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 
		
		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO corte_manga (id_cortemanga,tipo_cortemanga) VALUES (:idcortemanga,:tipocortemanga)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':idcortemanga', $this->idcortemanga); 
			$preparado->bindParam(':tipocortemanga', $this->tipocortemanga);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
		// id_corte_manga=idcortemanga	id_pedidoU=telefonop	id_cortemanga=tipop	tipo_cortemanga=direccionp	precio_unitario=correop	descripcion	descuento	fecha_corte_manga	

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from corte_manga where id_cortemanga='".$this->idcortemanga."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idcortemanga = $datos['id_cortemanga'];
				$this->tipocortemanga = $datos['tipo_cortemanga'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		  
		public function modificar(){ 
			$registro= "UPDATE corte_manga SET id_cortemanga='".$this->idcortemanga."', tipo_cortemanga='".$this->tipocortemanga."' WHERE id_cortemanga='".$this->idcortemanga."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM corte_manga WHERE id_cortemanga='".$this->idcortemanga."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de corte_manga
		// Consultar lista de corte_mangaes
		public function cortemanga_consultar(){
			$lista = array();
			$registro = "SELECT * FROM corte_manga";
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