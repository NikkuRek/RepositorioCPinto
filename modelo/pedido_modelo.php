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
			$registro = "INSERT INTO pedidou (documento_cliente,nombre,precio,fecha_inicio,fecha_final,observacion) VALUES (:documentocliente,:nombrepedidou,:preciopu,:fechai,:fechaf,:obserpu)";
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
			$registro="SELECT * from pedido_uniforme where id_pedidou='".$this->idpedidoU."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idpedidoU = $datos['id_pedidou'];
				$this->documentocliente = $datos['documento_cliente'];
				$this->nombrepedidou = $datos['nombre'];
				$this->preciopu = $datos['id_pedidoU'];
				$this->fechai = $datos['preciopu_unitario'];
				$this->fechaf = $datos['fechafcion'];
				$this->obserpu = $datos['obserputo'];
			} else
				$encontro = 0;
				
			return $encontro;
		}         

		public function modificar(){ 
			$registro= "UPDATE pedidou SET documento_cliente='".$this->documentocliente."', nombre='".$this->nombrepedidou."', precio='".$this->preciopu."', fecha_inicio='".$this->fechai."', fecha_final='".$this->fechaf."', observacion='".$this->obserpu."' WHERE id_pedidoU='".$this->idpedidoU."'";  
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


        // Funcion que solicita los datos de las tablas, los une y los ordena por fecha
        
        public function DatosCombinados(){
            
        $sql = "SELECT e.*, p.nombrepedidou_prod, p.fechaf, p.preciopu, 'entrada' as tipo, e.fecha_entrada as fecha_ordenada FROM entrada e JOIN producto p ON e.id_producto = p.id_producto";
        $sql2 = "SELECT s.*, p.nombrepedidou_prod, p.fechaf, p.preciopu, 'salida' as tipo, s.fecha_salida as fecha_ordenada FROM salida s JOIN producto p ON s.id_producto = p.id_producto";

        // Ejecutar la consulta y obtener los resultados en un array asociativo
        $resultados = $this->objbd->prepare($sql);
        $resultados -> execute();
        $datos_e = $resultados -> fetchAll(PDO::FETCH_ASSOC);

        $resultados2 = $this->objbd->prepare($sql2);
        $resultados2 -> execute();
        $datos_s = $resultados2 -> fetchAll(PDO::FETCH_ASSOC);

        //se combinan ambas consultas (entrada y salida) en un solo arreglo
        $datos_combinados = array_merge($datos_e, $datos_s);

        //se ordenan por fecha 
        usort($datos_combinados, function($a, $b){
            return strtotime($b['fecha_ordenada']) - strtotime($a['fecha_ordenada']);
        });
        
        return $datos_combinados;
    }
}
?>