<?php
    require_once("conexionPDO.php");
    //session_start();
    class pedidouModelo extends Conexion {

        private $idpedidoU;
        private $documentocliente;
        private $nombrepedidou;
        private $preciopu;
        private $fechai;
        private $fechaf;
        private $obserpu;
        private $objbd;

        public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}

         // métodos 
		public function get_idpedidoU(){
			return $this->idpedidoU;
		}
		
		public function set_idpedidoU( $idpedidoU ){
			$this->idpedidoU = $idpedidoU;	
		}
	
		public function get_documentocliente(){
			return $this->documentocliente;
		}
		
		public function set_documentocliente( $documentocliente ){
			$this->documentocliente = $documentocliente;
		}
	
		public function get_nombrepedidou(){
			return $this->nombrepedidou;
		}
		
		public function set_nombrepedidou( $nombrepedidou ){
			$this->nombrepedidou = $nombrepedidou;
		}
	
		public function get_preciopu(){
			return $this->preciopu;
		}
		
		public function set_preciopu( $preciopu ){
			$this->preciopu = $preciopu;
		}
		
		public function get_fechai(){
			return $this->fechai;
		}
		
		public function set_fechai( $fechai ){
			$this->fechai = $fechai;
		}
 
		public function get_fechaf(){
			return $this->fechaf;
		}
		
		public function set_fechaf( $fechaf ){
			$this->fechaf = $fechaf;
		}

		public function get_obserpu(){
			return $this->obserpu;
		}

		public function set_obserpu( $obserpu ){
			$this->obserpu = $obserpu;
		}
	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT * FROM pedido_uniforme";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 

		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO pedido_uniforme (documento_cliente,nombre,precio,fecha_inicio,fecha_final,observacion) VALUES (:documentocliente,:nombrepedidou,:preciopu,:fechai,:fechaf,:obserpu)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':documentocliente', $this->documentocliente); 
			$preparado->bindParam(':nombrepedidou', $this->nombrepedidou);
			$preparado->bindParam(':preciopu', $this->preciopu);
			$preparado->bindParam(':fechai', $this->fechai);
			$preparado->bindParam(':fechaf', $this->fechaf);
			$preparado->bindParam(':obserpu', $this->obserpu);

			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
		// id_pedidou=idpedidoU	id_pedidoU=telefonop	documento_cliente=nombrepedidoup	nombre=direccionp	preciopu_unitario=correop	fechafcion	obserputo	

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from pedido_uniforme where id_pedidoU='".$this->idpedidoU."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idpedidoU = $datos['id_pedidoU'];
				$this->documentocliente = $datos['documento_cliente'];
				$this->nombrepedidou = $datos['nombre'];
				$this->preciopu = $datos['precio'];
				$this->fechai = $datos['fecha_inicio'];
				$this->fechaf = $datos['fecha_final'];
				$this->obserpu = $datos['observacion'];
			} else
				$encontro = 0;
				
			return $encontro;
		}         

		public function modificar(){ 
			$registro= "UPDATE pedido_uniforme SET documento_cliente='".$this->documentocliente."', nombre='".$this->nombrepedidou."', precio='".$this->preciopu."', fecha_inicio='".$this->fechai."', fecha_final='".$this->fechaf."', observacion='".$this->obserpu."' WHERE id_pedidoU='".$this->idpedidoU."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM pedido_uniforme WHERE id_pedidou='".$this->idpedidoU."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de pedidou
		// Consultar lista de pedidoues
		public function pedidou_consultar(){
			$lista = array();
			$registro = "SELECT * FROM pedido_uniforme";
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