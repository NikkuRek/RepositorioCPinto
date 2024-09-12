<?php
    require_once("conexionPDO.php");
	class tipo_psModelo extends Conexion {
		// Atributos
		private $idtipops;
		private $nombretipops;
		private $objbd;


		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
		public function get_idtipops(){
			return $this->idtipops;
		}
		
		public function set_idtipops( $idtipops ){
			$this->idtipops = $idtipops;	
		}
	
		public function get_nombretipops(){
			return $this->nombretipops;
		}
		
		public function set_nombretipops( $nombretipops ){
			$this->nombretipops = $nombretipops;
		}
	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT * FROM tipo_ps";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 
		
		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO tipo_ps (id_tipops,nombre_tipops) VALUES (:idtipops,:nombretipops)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':idtipops', $this->idtipops); 
			$preparado->bindParam(':nombretipops', $this->nombretipops);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
		// id_tipo_ps=idtipops	id_pedidoU=telefonop	id_tipops=nombrep	nombre_tipops=direccionp	precio_unitario=correop	descripcion	descuento	fecha_tipo_ps	

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from tipo_ps where id_tipoPS='".$this->idtipops."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idtipops = $datos['id_tipoPS'];
				$this->nombretipops = $datos['nombre_tipoPS'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		  
		public function modificar(){ 
			$registro= "UPDATE tipo_PS SET id_tipops='".$this->idtipops."', nombre_tipoPS='".$this->nombretipops."' WHERE id_tipops='".$this->idtipops."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM tipo_ps WHERE id_tipops='".$this->idtipops."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de tipo_ps
		// Consultar lista de tipo_pses
		public function tipops_consultar(){
			$lista = array();
			$registro = "SELECT * FROM tipo_ps";
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