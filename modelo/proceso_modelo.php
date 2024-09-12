<?php
    require_once("conexionPDO.php");
	class procesoModelo extends Conexion {
		// Atributos
		private $idproceso;
		private $iddepartamento;
		private $nombre;
		private $posicion;
		private $objbd;


		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
		public function get_idproceso(){
			return $this->idproceso;
		}
		
		public function set_idproceso( $idproceso ){
			$this->idproceso = $idproceso;	
		}

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
		public function get_posicion(){
			return $this->posicion;
		}
		
		public function set_posicion( $posicion ){
			$this->posicion = $posicion;	
		}

	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT p.*, d.nombre AS nombre_departamento
						 FROM proceso p 
						 INNER JOIN departamento d ON p.id_departamento = d.id_departamento";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 
		
		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO proceso (id_proceso,id_departamento,nombre, posicion) VALUES (:idproceso,:iddepartamento,:nombre,:posicion)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':idproceso', $this->idproceso); 
			$preparado->bindParam(':iddepartamento', $this->iddepartamento); 
			$preparado->bindParam(':nombre', $this->nombre);
			$preparado->bindParam(':posicion', $this->posicion);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
		// id_proceso=idproceso	id_pedidoU=telefonop	id_proceso=tipop	tipo_departamento=direccionp	precio_unitario=correop	nombre	descuento	fecha_departamento	

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from proceso where id_proceso='".$this->idproceso."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idproceso = $datos['id_proceso'];
				$this->iddepartamento = $datos['id_departamento'];
				$this->nombre = $datos['nombre'];
				$this->posicion = $datos['posicion'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		  
		public function modificar(){ 
			$registro= "UPDATE proceso SET id_proceso='".$this->idproceso."', id_departamento='".$this->iddepartamento."', nombre='".$this->nombre."', posicion='".$this->posicion."' WHERE id_proceso='".$this->idproceso."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM proceso WHERE id_proceso='".$this->idproceso."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de departamento
		// Consultar lista de departamentoes
		public function proceso_consultar(){
			$lista = array();
			$registro = "SELECT * FROM proceso";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 


		public function SiguienteProceso(){

			$sql = "SELECT MAX(id_proceso) as siguiente FROM proceso";
	
			$preparado = $this->objbd->prepare($sql);
			$preparado->execute();
			
			$ultimo = $preparado->fetchAll(PDO::FETCH_ASSOC);
			return $ultimo;
	
			$objbd = NULL;
	
		}

		public function tablas_aux(){
			$tablas = ['cierre', 'corte_manga', 'costados', 'cuello', 'manga', 
			'protector', 'tela', 'tipo_pi', 'tipo_producto', 'tipo_ps', 'talla', 'departamento'];
				
			$lista =[];
			
			foreach ($tablas as $tabla) {
			
			$consulta = "SELECT * FROM $tabla";
			$preparado = $this->objbd->prepare($consulta);
			$preparado->execute();
			$lista[$tabla] = $preparado->fetchAll(PDO::FETCH_ASSOC);
			}
			return $lista;
			}
	}
?>