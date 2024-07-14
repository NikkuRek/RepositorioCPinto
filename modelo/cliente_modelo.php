<?php
    require_once("conexionPDO.php");
	class ClienteModelo extends Conexion {
		// Atributos
		private $documentocliente;
		private $nombre;
		private $direccion;
		private $telefono;
		private $direccionc;
		private $objbd;
	
		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
	
		public function get_documentocliente(){
			return $this->documentocliente;
		}
		
		public function set_documentocliente( $documentocliente ){
			$this->documentocliente = $documentocliente;
		}
	
		public function get_nombre(){
			return $this->nombre;
		}
		
		public function set_nombre( $nombre ){
			$this->nombre = $nombre;
		}
	
		public function get_direccion(){
			return $this->direccion;
		}
		
		public function set_direccion( $direccion ){
			$this->direccion = $direccion;
		}
		
		public function get_telefono(){
			return $this->telefono;
		}
		
		public function set_telefono( $telefono ){
			$this->telefono = $telefono;
		}

		public function get_direccionc(){
			return $this->direccionc;
		}
		
		public function set_direccionc( $direccionc ){
			$this->direccionc = $direccionc;
		}
	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT * FROM cliente";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 
		
		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO cliente (documento_cliente, nombre, direccion, telefono) VALUES (:documentocliente,:nombre,:direccion,:telefono,:direccion)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':documentocliente', $this->documentocliente); 
			$preparado->bindParam(':nombre', $this->nombre);
			$preparado->bindParam(':direccion', $this->direccion);
			$preparado->bindParam(':telefono', $this->telefono);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
	
		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from cliente where documento_cliente='".$this->documentocliente."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->documentocliente = $datos['documento_cliente'];
				$this->nombre = $datos['nombre'];
				$this->direccion = $datos['direccion'];
				$this->telefono = $datos['telefono'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		 
		public function modificar(){ 
			$registro= "UPDATE cliente SET documento_cliente='".$this->documentocliente."', nombre='".$this->nombre."', direccion='".$this->direccion."', telefono_c='".$this->telefono."', direccion_c='".$this->direccionc."' WHERE documento_cliente='".$this->documentocliente."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM cliente WHERE documento_cliente='".$this->documentocliente."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de Cliente
		// Consultar lista de clientes
		public function cliente_consultar(){
			$lista = array();
			$registro = "SELECT * FROM cliente";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 

		public function totalClientes(){
			$consulta = "SELECT COUNT(*) AS total FROM cliente";
			$preparado = $this->objbd->prepare($consulta);
			$preparado->execute();
			$resultado = $preparado->fetch(PDO::FETCH_ASSOC);
			return $resultado['total'];
	}
	}
?>