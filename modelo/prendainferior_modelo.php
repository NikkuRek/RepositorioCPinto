<?php
    require_once("conexionPDO.php");
    //session_start();
    class prendainModel extends Conexion {
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

		public function get_obserpi(){
			return $this->obserpi;
		}

		public function set_obserpi( $obserpi ){
			$this->obserpi = $obserpi;
		}
	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT * FROM prenda_inferior";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 

		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO prenda_inferior (id_pedidoU,id_tela,id_costados,id_tipoprod,id_protector,id_tipoPI,color,tapa_trasera,tirante,descripcion) 
			VALUES (:idpedidoU,:idtela,:idcostados,:idtipoprod,:idprotector,:idtipopi,:color,:tapatra,:tirante,:obserpi)";
			
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':idpedidoU', $this->idpedidoU); 
			$preparado->bindParam(':idtela', $this->idtela); 
			$preparado->bindParam(':idcostados', $this->iidcostados);
			$preparado->bindParam(':idtipoprod', $this->idtipoprod);
			$preparado->bindParam(':idprotector', $this->idprotector);
			$preparado->bindParam(':idtipopi', $this->idtipopi);
			$preparado->bindParam(':color', $this->color);
			$preparado->bindParam(':tapatra', $this->tapatra);
			$preparado->bindParam(':tirante', $this->tirante);
			$preparado->bindParam(':obserpi', $this->obserpi);

			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
		// id_pedidou=idpedidoU	id_pedidoU=telefonop	id_prendain=idtipoprodp	id_pedidoU=direccionp	idprotector_unitario=correop	colorcion	obserpito	

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from prenda_inferior where id_pedidoU='".$this->idpedidoU."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idprendain = $datos['id_pendrain'];
				$this->idpedidoU = $datos['id_pedidou'];
				$this->idtela = $datos['id_tela'];
				$this->idcostados = $datos['id_costados'];
				$this->idtipoprod = $datos['id_tipopdrod'];
				$this->idprotector = $datos['id_protector'];
				$this->idtipopi = $datos['id_tipoPI'];
				$this->color = $datos['color'];
				$this->tapatra = $datos['tapa_trasera'];
				$this->tirante = $datos['tirante'];	
				$this->obserpi = $datos['descripcion'];
			} else
			$encontro = 0;
			
			return $encontro;
		}          

		public function modificar(){ 
			$registro= "UPDATE pedidou SET id_prendain='".$this->idtela."', id_pedidoU='".$this->idtipoprod."', precio='".$this->idprotector."', fecha_inicio='".$this->idtipo."', fecha_final='".$this->color."', observacion='".$this->obserpi."' WHERE id_pedidoU='".$this->idpedidoU."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM prenda_inferior WHERE id_pedidou='".$this->idpedidoU."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de pedidou
		// Consultar lista de pedidoues
		public function prendain_consultar(){
			$lista = array();
			$registro = "SELECT * FROM prenda_inferior";
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