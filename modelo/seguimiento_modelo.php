<?php
    require_once("conexionPDO.php");
	class seguimientoModelo extends Conexion {
		// Atributos
		private $idseguimiento;
		private $iddepartamento;
		private $nombrepedidou;
		private $idproceso;
		private $idpedidoU;
		private $estado;
		private $fecha;
		private $objbd;


		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
		public function get_idseguimiento(){
			return $this->idseguimiento;
		}
		
		public function set_idseguimiento( $idseguimiento ){
			$this->idseguimiento = $idseguimiento;	
		}
	
		public function get_iddepartamento(){
			return $this->iddepartamento;
		}
		
		public function set_iddepartamento( $iddepartamento ){
			$this->iddepartamento = $iddepartamento;
		}

		public function set_nombrepedidou( $nombrepedidou ){
			$this->nombrepedidou = $nombrepedidou;
		}
	
		public function get_idproceso(){
			return $this->idproceso;
		}
		
		public function set_idproceso( $idproceso ){
			$this->idproceso = $idproceso;
		}
	
		public function get_idpedidoU(){
			return $this->idpedidoU;
		}
		
		public function set_idpedidoU( $idpedidoU ){
			$this->idpedidoU = $idpedidoU;
		}

		public function get_estado(){
			return $this->estado;
		}
		
		public function set_estado( $estado ){
			$this->estado = $estado;
		}

		public function get_fecha(){
			return $this->fecha;
		}
		
		public function set_fecha( $fecha ){
			$this->fecha = $fecha;
		}
	
		public function consultar(){
			$lista = array();
			$registro = "SELECT s.*, 
							p.nombre AS nombre_proceso, 
							pu.nombre AS nombre_pedido, 
							d.nombre AS nombre_departamento
						FROM seguimiento s
						INNER JOIN proceso p ON s.id_proceso = p.id_proceso
						INNER JOIN pedido_uniforme pu ON s.id_pedidoU = pu.id_pedidoU
						INNER JOIN departamento d ON p.id_departamento = d.id_departamento";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
		
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		}
		
		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO seguimiento (id_departamento,id_proceso,id_pedidoU,estado,fecha) VALUES (:iddepartamento,:idproceso,:idpedidoU,:estado,now())";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':iddepartamento', $this->iddepartamento); 
			$preparado->bindParam(':idproceso', $this->idproceso);
			$preparado->bindParam(':idpedidoU', $this->idpedidoU);
			$preparado->bindParam(':estado', $this->estado);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
		// id_seguimiento=idseguimiento	id_pedidoU=telefonop	id_departamento	=nombrep	id_proceso=direccionp	=correop	estadocion		fecha	

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from seguimiento where id_seguimiento='".$this->idseguimiento."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idseguimiento = $datos['id_seguimiento'];
				$this->iddepartamento = $datos['id_departamento'];
				$this->idproceso = $datos['id_proceso'];
				$this->idpedidoU = $datos['id_pedidoU'];
				$this->estado = $datos['estado'];
				$this->fecha = $datos['fecha'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		  
		public function modificar(){ 
			$registro= "UPDATE seguimiento SET id_seguimiento='".$this->idseguimiento."', id_proceso='".$this->idproceso."', id_pedidoU='".$this->idpedidoU."', estado='".$this->estado."', fecha='".$this->fecha."' WHERE id_seguimiento='".$this->idseguimiento."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM seguimiento WHERE id_seguimiento='".$this->idseguimiento."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de seguimiento
		
		// Consultar lista de pedidos
		public function seguimiento_consultar(){
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

		public function SiguienteSeguimiento(){

			$sql = "SELECT MAX(id_seguimiento) as siguiente FROM seguimiento";
	
			$preparado = $this->objbd->prepare($sql);
			$preparado->execute();
			
			$ultimo = $preparado->fetchAll(PDO::FETCH_ASSOC);
			return $ultimo;
	
			$objbd = NULL;
	
		}

		public function tablas_aux(){
			$tablas = ['pedido_uniforme'];
				
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