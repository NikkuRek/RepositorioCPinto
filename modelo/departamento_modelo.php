<?php
    require_once("conexionPDO.php");
	class departamentoModelo extends Conexion {
		// Atributos
		private $iddepartamento;
		private $nombre;
		private $descripcion;

		private $objbd;


		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
		public function get_iddepartamento(){
			return $this->iddepartamento;
		}
		
		public function set_iddepartamento( $iddepartamento ){
			$this->iddepartamento = $iddepartamento;	
		}

		public function get_nombre(){
			return $this->nombre;
		}
		
		public function set_nombre( $nombre ){
			$this->nombre = $nombre;	
		}

		public function get_descripcion(){
			return $this->descripcion;
		}
		
		public function set_descripcion( $descripcion ){
			$this->descripcion = $descripcion;	
		}

	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT * FROM departamento";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 
		
		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO departamento (id_departamento,nombre,descripcion) VALUES (:iddepartamento,:nombre,:descripcion)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':iddepartamento', $this->iddepartamento); 
			$preparado->bindParam(':nombre', $this->nombre); 
			$preparado->bindParam(':descripcion', $this->descripcion);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
		// id_departamento=iddepartamento	id_pedidoU=telefonop	id_departamento=tipop	tipo_departamento=direccionp	precio_unitario=correop	descripcion	descuento	fecha_departamento	

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from departamento where id_departamento='".$this->iddepartamento."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->iddepartamento = $datos['id_departamento'];
				$this->nombre = $datos['nombre'];
				$this->descripcion = $datos['descripcion'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		  
		public function modificar(){ 
			$registro= "UPDATE departamento SET id_departamento='".$this->iddepartamento."', nombre='".$this->nombre."', descripcion='".$this->descripcion."' WHERE id_departamento='".$this->iddepartamento."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM departamento WHERE id_departamento='".$this->iddepartamento."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de departamento
		// Consultar lista de departamentoes
		public function departamento_consultar(){
			$lista = array();
			$registro = "SELECT * FROM departamento";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 


		public function SiguienteDepartamento(){

			$sql = "SELECT MAX(id_departamento) as siguiente FROM departamento";
	
			$preparado = $this->objbd->prepare($sql);
			$preparado->execute();
			
			$ultimo = $preparado->fetchAll(PDO::FETCH_ASSOC);
			return $ultimo;
	
			$objbd = NULL;
	
		}
	}
?>