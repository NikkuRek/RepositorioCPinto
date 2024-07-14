<?php
    require_once("conexionPDO.php");
	class ClienteModelo extends Conexion {
		// Atributos
		private $idcliente;
		private $cedulac;
		private $nombrec;
		private $apellidoc;
		private $telefonoc;
		private $direccionc;
		private $objbd;
	
		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
		public function get_idcliente(){
			return $this->idcliente;
		}
		
		public function set_idcliente( $idcliente ){
			$this->idcliente = $idcliente;	
		}
	
		public function get_cedulac(){
			return $this->cedulac;
		}
		
		public function set_cedulac( $cedulac ){
			$this->cedulac = $cedulac;
		}
	
		public function get_nombrec(){
			return $this->nombrec;
		}
		
		public function set_nombrec( $nombrec ){
			$this->nombrec = $nombrec;
		}
	
		public function get_apellidoc(){
			return $this->apellidoc;
		}
		
		public function set_apellidoc( $apellidoc ){
			$this->apellidoc = $apellidoc;
		}
		
		public function get_telefonoc(){
			return $this->telefonoc;
		}
		
		public function set_telefonoc( $telefonoc ){
			$this->telefonoc = $telefonoc;
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
			$registro = "INSERT INTO cliente (cedula_c,nombre_c,apellido_c,telefono_c,direccion_c) VALUES (:cedulac,:nombrec,:apellidoc,:telefonoc,:direccionc)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':cedulac', $this->cedulac); 
			$preparado->bindParam(':nombrec', $this->nombrec);
			$preparado->bindParam(':apellidoc', $this->apellidoc);
			$preparado->bindParam(':telefonoc', $this->telefonoc);
			$preparado->bindParam(':direccionc', $this->direccionc);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
	
		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from cliente where id_cliente='".$this->idcliente."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idcliente = $datos['id_cliente'];
				$this->cedulac = $datos['cedula_c'];
				$this->nombrec = $datos['nombre_c'];
				$this->apellidoc = $datos['apellido_c'];
				$this->telefonoc = $datos['telefono_c'];
				$this->direccionc = $datos['direccion_C'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		 
		public function modificar(){ 
			$registro= "UPDATE cliente SET cedula_c='".$this->cedulac."', nombre_c='".$this->nombrec."', apellido_c='".$this->apellidoc."', telefono_c='".$this->telefonoc."', direccion_c='".$this->direccionc."' WHERE id_cliente='".$this->idcliente."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM cliente WHERE id_cliente='".$this->idcliente."'";
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