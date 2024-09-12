<?php
    require_once("conexionPDO.php");
	class ventaModelo extends Conexion {
		// Atributos
		private $idventa;
		private $documentocliente;
		private $nombrepedidou;
		private $cantidadprendas;
		private $idpedidoU;
		private $preciounitario;
		private $descrip;
		private $descuen;
		private $fechaventa;
		private $objbd;


		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
		public function get_idventa(){
			return $this->idventa;
		}
		
		public function set_idventa( $idventa ){
			$this->idventa = $idventa;	
		}
	
		public function get_documentocliente(){
			return $this->documentocliente;
		}
		
		public function set_documentocliente( $documentocliente ){
			$this->documentocliente = $documentocliente;
		}

		public function set_nombrepedidou( $nombrepedidou ){
			$this->nombrepedidou = $nombrepedidou;
		}
	
		public function get_cantidadprendas(){
			return $this->cantidadprendas;
		}
		
		public function set_cantidadprendas( $cantidadprendas ){
			$this->cantidadprendas = $cantidadprendas;
		}
	
		public function get_idpedidoU(){
			return $this->idpedidoU;
		}
		
		public function set_idpedidoU( $idpedidoU ){
			$this->idpedidoU = $idpedidoU;
		}
		
		public function get_preciounitario(){
			return $this->preciounitario;
		}
		
		public function set_preciounitario( $preciounitario ){
			$this->preciounitario = $preciounitario;
		}

		public function get_descrip(){
			return $this->descrip;
		}
		
		public function set_descrip( $descrip ){
			$this->descrip = $descrip;
		}

		public function get_descuen(){
			return $this->descuen;
		}

		public function set_descuen( $descuen ){
			$this->descuen = $descuen;
		}
		public function get_fechaventa(){
			return $this->fechaventa;
		}
		
		public function set_fechaventa( $fechaventa ){
			$this->fechaventa = $fechaventa;
		}
	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT v.*, pu.nombre AS nombre_pedido, c.nombre AS nombre_cliente
						FROM venta v
						INNER JOIN pedido_uniforme pu ON v.id_pedidoU = pu.id_pedidoU
						INNER JOIN cliente c ON pu.documento_cliente = c.documento_cliente";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 
		
		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO venta (documento_cliente,cantidad_prendas,id_pedidoU,precio_unitario,descripcion,descuento,fecha_venta) 
			VALUES (:documentocliente,:cantidadprendas,:idpedidoU,:preciounitario,:descrip,:descuen, NOW())";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':documentocliente', $this->documentocliente); 
			$preparado->bindParam(':cantidadprendas', $this->cantidadprendas);
			$preparado->bindParam(':idpedidoU', $this->idpedidoU);
			$preparado->bindParam(':preciounitario', $this->preciounitario);
			$preparado->bindParam(':descrip', $this->descrip);
			$preparado->bindParam(':descuen', $this->descuen);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from venta where id_venta='".$this->idventa."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idventa = $datos['id_venta'];
				$this->documentocliente = $datos['documento_cliente'];
				$this->cantidadprendas = $datos['cantidad_prendas'];
				$this->idpedidoU = $datos['id_pedidoU'];
				$this->preciounitario = $datos['precio_unitario'];
				$this->descrip = $datos['descripcion'];
				$this->descuen = $datos['descuento'];
				$this->fechaventa = $datos['fecha_venta'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		  
		public function modificar(){ 
			$registro= "UPDATE venta SET documento_cliente='".$this->documentocliente."', cantidad_prendas='".$this->cantidadprendas."', id_pedidoU='".$this->idpedidoU."', precio_unitario='".$this->preciounitario."', descripcion='".$this->descrip."', descuento='".$this->descuen."', fecha_venta='".$this->fechaventa."' WHERE id_venta='".$this->idventa."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM venta WHERE id_venta='".$this->idventa."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de venta
		// Consultar lista de pedidos
		public function venta_consultar(){
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

		public function totalventas(){
			$consulta = "SELECT COUNT(*) AS total FROM venta";
			$preparado = $this->objbd->prepare($consulta);
			$preparado->execute();
			$resultado = $preparado->fetch(PDO::FETCH_ASSOC);
			return $resultado['total'];
		}
	}
?>