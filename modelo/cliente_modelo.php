<?php
    require_once("conexionPDO.php");
	class ClienteModelo extends Conexion {
		// Atributos
		private $documentocliente;
		private $nombrec;
		private $direccionc;
		private $telefonoc;
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
	
		public function get_nombrec(){
			return $this->nombrec;
		}
		
		public function set_nombrec( $nombrec ){
			$this->nombrec = $nombrec;
		}
	
		public function get_direccionc(){
			return $this->direccionc;
		}
		
		public function set_direccionc( $direccionc ){
			$this->direccionc = $direccionc;
		}
		
		public function get_telefonoc(){
			return $this->telefonoc;
		}
		
		public function set_telefonoc( $telefonoc ){
			$this->telefonoc = $telefonoc;
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
			$registro = "INSERT INTO cliente (documento_cliente, nombre, direccion, telefono) VALUES (:documentocliente,:nombrec,:direccionc,:telefonoc)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':documentocliente', $this->documentocliente); 
			$preparado->bindParam(':nombrec', $this->nombrec);
			$preparado->bindParam(':direccionc', $this->direccionc);
			$preparado->bindParam(':telefonoc', $this->telefonoc);
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
				$this->nombrec = $datos['nombre'];
				$this->direccionc = $datos['direccion'];
				$this->telefonoc = $datos['telefono'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		 
		public function modificar(){ 
			$registro= "UPDATE cliente SET documento_cliente='".$this->documentocliente."', nombre='".$this->nombrec."', direccion='".$this->direccionc."', telefono='".$this->telefonoc."' WHERE documento_cliente='".$this->documentocliente."'";  
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