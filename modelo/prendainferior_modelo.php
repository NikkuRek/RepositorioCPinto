<?php
    require_once("conexionPDO.php");
    //session_start();
    class pedidouModelo extends Conexion {
		private $idprendain;
        private $idpedidoU;
        private $idtela;
		private $idcostados;
        private $idtipoprod;
        private $idprotector;
        private $idtipopi;
        private $color;
		private $tapatra;
		private $tirante;
        private $obserpi;
        private $objbd;

        public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}

         // métodos 
		 public function get_idprendain(){
			return $this->idprendain;
		}
		
		public function set_idprendain( $idprendain ){
			$this->idprendain = $idprendain;	
		}

		public function get_idpedidoU(){
			return $this->idpedidoU;
		}
		
		public function set_idpedidoU( $idpedidoU ){
			$this->idpedidoU = $idpedidoU;	
		}
	
		public function get_idtela(){
			return $this->idtela;
		}
		
		public function set_idtela( $idtela ){
			$this->idtela = $idtela;
		}

			
		public function get_idcostados(){
			return $this->idcostados;
		}
		
		public function set_idcostados( $idcostados ){
			$this->idcostados = $idcostados;
		}
	
		public function get_idtipoprod(){
			return $this->idtipoprod;
		}
		
		public function set_idtipoprod( $idtipoprod ){
			$this->idtipoprod = $idtipoprod;
		}
	
		public function get_idprotector(){
			return $this->idprotector;
		}
		
		public function set_idprotector( $idprotector ){
			$this->idprotector = $idprotector;
		}
		
		public function get_idtipopi(){
			return $this->idtipopi;
		}
		
		public function set_idtipopi( $idtipopi ){
			$this->idtipopi = $idtipopi;
		}

		public function get_color(){
			return $this->color;
		}
		
		public function set_color( $color ){
			$this->color = $color;
		}

		public function get_tapatra(){
			return $this->tapatra;
		}
		
		public function set_tapatra( $tapatra ){
			$this->tapatra = $tapatra;
		}

		public function get_tirante(){
			return $this->tirante;
		}

		public function set_tirante( $tirante ){
			$this->tirante = $tirante;
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
			$registro = "INSERT INTO pedidou (documento_cliente,nombre,precio,fecha_inicio,fecha_final,observacion) VALUES (:idtela,:idtipoprod,:idprotector,:idtipo,:color,:obserpu)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':idtela', $this->idtela); 
			$preparado->bindParam(':idtipoprod', $this->idtipoprod);
			$preparado->bindParam(':idprotector', $this->idprotector);
			$preparado->bindParam(':idtipo', $this->idtipo);
			$preparado->bindParam(':color', $this->color);
			$preparado->bindParam(':obserpu', $this->obserpu);

			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
		// id_pedidou=idpedidoU	id_pedidoU=telefonop	documento_cliente=idtipoprodp	nombre=direccionp	idprotector_unitario=correop	colorcion	obserputo	

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from pedido_uniforme where id_pedidou='".$this->idpedidoU."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idpedidoU = $datos['id_pedidou'];
				$this->idtela = $datos['documento_cliente'];
				$this->idtipoprod = $datos['nombre'];
				$this->idprotector = $datos['id_pedidoU'];
				$this->idtipo = $datos['idprotector_unitario'];
				$this->color = $datos['colorcion'];
				$this->obserpu = $datos['obserputo'];
			} else
				$encontro = 0;
				
			return $encontro;
		}         

		public function modificar(){ 
			$registro= "UPDATE pedidou SET documento_cliente='".$this->idtela."', nombre='".$this->idtipoprod."', precio='".$this->idprotector."', fecha_inicio='".$this->idtipo."', fecha_final='".$this->color."', observacion='".$this->obserpu."' WHERE id_pedidoU='".$this->idpedidoU."'";  
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