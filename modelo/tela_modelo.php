<?php
    require_once("conexionPDO.php");
	class telaModelo extends Conexion {
		// Atributos
		private $idtela;
		private $tipotela;
		private $objbd;


		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
		public function get_idtela(){
			return $this->idtela;
		}
		
		public function set_idtela( $idtela ){
			$this->idtela = $idtela;	
		}
	
		public function get_tipotela(){
			return $this->tipotela;
		}
		
		public function set_tipotela( $tipotela ){
			$this->tipotela = $tipotela;
		}
	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT * FROM tela";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 
		
		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO tela (id_tela,tipo_tela) VALUES (:idtela,:tipotela)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':idtela', $this->idtela); 
			$preparado->bindParam(':tipotela', $this->tipotela);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
		// id_tela=idtela	id_pedidoU=telefonop	id_tela=tipop	tipo_tela=direccionp	precio_unitario=correop	descripcion	descuento	fecha_tela	

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from tela where id_tela='".$this->idtela."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idtela = $datos['id_tela'];
				$this->tipotela = $datos['tipo_tela'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		  
		public function modificar(){ 
			$registro= "UPDATE tela SET id_tela='".$this->idtela."', tipo_tela='".$this->tipotela."' WHERE id_tela='".$this->idtela."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM tela WHERE id_tela='".$this->idtela."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de tela
		// Consultar lista de telaes
		public function tela_consultar(){
			$lista = array();
			$registro = "SELECT * FROM tela";
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