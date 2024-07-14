<?php
    require_once("conexionPDO.php");
	class ProductoModelo extends Conexion {
		// Atributos
		private $idproducto;
		private $idproveedor;
		private $nomproducto;
		private $descripcion;
		private $precio;
		private $cantidaddisp;
		private $objbd;
	
		 // Constructor -> Activar conexión de clase padre
		public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
		public function get_idproducto(){
			return $this->idproducto;
		}
		
		public function set_idproducto( $idproducto ){
			$this->idproducto = $idproducto;	
		}
	
		public function get_idproveedor(){
			return $this->idproveedor;
		}
		
		public function set_idproveedor( $idproveedor ){
			$this->idproveedor = $idproveedor;
		}
	
		public function get_nomproducto(){
			return $this->nomproducto;
		}
		
		public function set_nomproducto( $nomproducto ){
			$this->nomproducto = $nomproducto;
		}
	
		public function get_descripcion(){
			return $this->descripcion;
		}
		
		public function set_descripcion( $descripcion ){
			$this->descripcion = $descripcion;
		}
		
		public function get_precio(){
			return $this->precio;
		}
		
		public function set_precio( $precio ){
			$this->precio = $precio;
		}
		public function get_cantidaddisp(){
			return $this->cantidaddisp;
		}
		
		public function set_cantidaddisp( $cantidaddisp ){
			$this->cantidaddisp = $cantidaddisp;
		}
	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT * FROM producto";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 
		
		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO producto (id_proveedor,nombre_prod,descripcion,precio,cantidad_disp) VALUES (:idproveedor,:nomproducto,:descripcion,:precio,:cantidaddisp)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':idproveedor', $this->idproveedor);
			$preparado->bindParam(':nomproducto', $this->nomproducto); 
			$preparado->bindParam(':descripcion', $this->descripcion);
			$preparado->bindParam(':precio', $this->precio);
			$preparado->bindParam(':cantidaddisp', $this->cantidaddisp);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}
	
		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from producto where id_producto='".$this->idproducto."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idproducto = $datos['id_producto'];
				$this->idproveedor = $datos['id_proveedor'];
				$this->nomproducto = $datos['nombre_prod'];
				$this->descripcion = $datos['descripcion'];
				$this->precio = $datos['precio'];
				$this->cantidaddisp = $datos['cantidad_disp'];
			} else
				$encontro = 0;
				
			return $encontro;
		} 
		 
		public function modificar(){ 
			$registro= "UPDATE producto SET id_proveedor='".$this->idproveedor."',nombre_prod='".$this->nomproducto."', descripcion='".$this->descripcion."', precio='".$this->precio."', cantidad_disp='".$this->cantidaddisp."' WHERE id_producto='".$this->idproducto."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
			
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM producto WHERE id_producto='".$this->idproducto."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de Producto
		// Consultar lista de proveedores
		public function proveedor_consultar(){
			$lista = array();
			$registro = "SELECT * FROM proveedor";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 

		public function totalProductos(){
			$consulta = "SELECT COUNT(*) AS total FROM producto";
			$preparado = $this->objbd->prepare($consulta);
			$preparado->execute();
			$resultado = $preparado->fetch(PDO::FETCH_ASSOC);
			return $resultado['total'];
		}
	}
?>