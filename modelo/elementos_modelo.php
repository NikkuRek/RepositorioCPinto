<?php
    require_once("conexionPDO.php");
	class tipo_piModelo extends Conexion {
		// Atributos
		private $idtipopi;
		private $nombretipopi;
		private $objbd;


		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
		public function get_idtipopi(){
			return $this->idtipopi;
		}
		
		public function set_idtipopi( $idtipopi ){
			$this->idtipopi = $idtipopi;	
		}
	
		public function get_nombretipopi(){
			return $this->nombretipopi;
		}
		
		public function set_nombretipopi( $nombretipopi ){
			$this->nombretipopi = $nombretipopi;
		}
	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT * FROM tipo_pi";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 
		
		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO tipo_pi (id_tipoPI,nombre_tipoPI) VALUES (:idtipopi,:nombretipopi)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':idtipopi', $this->idtipopi); 
			$preparado->bindParam(':nombretipopi', $this->nombretipopi);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
		// id_tipo_pi=idtipopi	id_pedidoU=telefonop	id_tipoPI=nombrep	nombre_tipoPI=direccionp	precio_unitario=correop	descripcion	descuento	fecha_tipo_pi	

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from tipo_pi where id_tipoPI='".$this->idtipopi."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idtipopi = $datos['id_tipoPI'];
				$this->nombretipopi = $datos['nombre_tipoPI'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		  
		public function modificar(){ 
			$registro= "UPDATE tipo_pi SET id_tipopi='".$this->idtipopi."', nombre_tipoPI='".$this->nombretipopi."' WHERE id_tipopi='".$this->idtipopi."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM tipo_pi WHERE id_tipo_pi='".$this->idtipopi."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de tipo_pi
		// Consultar lista de tipo_pies
		public function tipo_pi_consultar(){
			$lista = array();
			$registro = "SELECT * FROM tipo_pi";
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