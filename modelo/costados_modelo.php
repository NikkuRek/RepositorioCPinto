<?php
    require_once("conexionPDO.php");
	class costadosModelo extends Conexion {
		// Atributos
		private $idcostados;
		private $tipocostados;
		private $objbd;


		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
		public function get_idcostados(){
			return $this->idcostados;
		}
		
		public function set_idcostados( $idcostados ){
			$this->idcostados = $idcostados;	
		}
	
		public function get_tipocostados(){
			return $this->tipocostados;
		}
		
		public function set_tipocostados( $tipocostados ){
			$this->tipocostados = $tipocostados;
		}
	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT * FROM costados";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 
		
		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO costados (id_costados,tipo_costados) VALUES (:idcostados,:tipocostados)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':idcostados', $this->idcostados); 
			$preparado->bindParam(':tipocostados', $this->tipocostados);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
		// id_costados=idcostados	id_pedidoU=telefonop	id_costados=tipop	tipo_costados=direccionp	precio_unitario=correop	descripcion	descuento	fecha_costados	

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from costados where id_costados='".$this->idcostados."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idcostados = $datos['id_costados'];
				$this->tipocostados = $datos['tipo_costados'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		  
		public function modificar(){ 
			$registro= "UPDATE costados SET id_costados='".$this->idcostados."', tipo_costados='".$this->tipocostados."' WHERE id_costados='".$this->idcostados."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM costados WHERE id_costados='".$this->idcostados."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de costados
		// Consultar lista de costadoses
		public function costados_consultar(){
			$lista = array();
			$registro = "SELECT * FROM costados";
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