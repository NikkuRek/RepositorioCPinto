<?php
    require_once("conexionPDO.php"); 
    //session_start();
    class pedidouModelo extends Conexion {

        private $idpedidoU;
        private $documentocliente;
        private $nombrepedidou;
        private $preciopu;
        private $imgpu;
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
		
		public function get_imgpu(){
			return $this->imgpu;
		}

		public function set_imgpu( $imgpu ){
			$this->imgpu = $imgpu;
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
			$registro = "INSERT INTO pedido_uniforme (documento_cliente,nombre,precio,img_producto,fecha_inicio,fecha_final,observacion) 
			VALUES (:documentocliente,:nombrepedidou,:preciopu,:imgpu,:fechai,:fechaf,:obserpu)";
			
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':documentocliente', $this->documentocliente); 
			$preparado->bindParam(':nombrepedidou', $this->nombrepedidou);
			$preparado->bindParam(':preciopu', $this->preciopu);
			$preparado->bindParam(':imgpu', $this->imgpu);
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
				$this->imgpu = $datos['img_producto'];
				$this->fechai = $datos['fecha_inicio'];
				$this->fechaf = $datos['fecha_final'];
				$this->obserpu = $datos['observacion'];
			} else
				$encontro = 0;
				
			return $encontro;
		}         

		public function modificar(){ 
			$registro= "UPDATE pedido_uniforme SET documento_cliente='".$this->documentocliente."', nombre='".$this->nombrepedidou."', precio='".$this->preciopu."', img_producto='".$this->imgpu."', fecha_inicio='".$this->fechai."', fecha_final='".$this->fechaf."', observacion='".$this->obserpu."' WHERE id_pedidoU='".$this->idpedidoU."'";  

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
			$registro = "SELECT * FROM cliente";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 

		public function SiguientePedidou(){

			$sql = "SELECT MAX(id_pedidoU) as siguiente FROM pedido_uniforme";
	
			$preparado = $this->objbd->prepare($sql);
			$preparado->execute();
			
			$ultimo = $preparado->fetchAll(PDO::FETCH_ASSOC);
			return $ultimo;
	
			$objbd = NULL;
	
		}
		
		public function SiguientePrendain(){

			$sql = "SELECT MAX(id_prendain) as siguientepi FROM prenda_inferior";
	
			$preparado = $this->objbd->prepare($sql);
			$preparado->execute();
			
			$ultimopi = $preparado->fetchAll(PDO::FETCH_ASSOC);
			return $ultimopi;
	
			$objbd = NULL;
	
		}
		
		public function SiguientePrendasu(){

			$sql = "SELECT MAX(id_prendasu) as siguientesu FROM prenda_superior";
	
			$preparado = $this->objbd->prepare($sql);
			$preparado->execute();
			
			$ultimosu = $preparado->fetchAll(PDO::FETCH_ASSOC);
			return $ultimosu;
	
			$objbd = NULL;
	
		}
		
		/*--------------------- Datos para Inicio ----------------------------*/
		public function totalPedidos(){
			$consulta = "SELECT COUNT(*) AS total FROM pedido_uniforme";
			$preparado = $this->objbd->prepare($consulta);
			$preparado->execute();
			$resultado = $preparado->fetch(PDO::FETCH_ASSOC);
			return $resultado['total'];
		}

		public function totalPedidosfinalizados() {
			$consulta = "SELECT COUNT(*) AS total
			FROM seguimiento s
			INNER JOIN pedido_uniforme p ON p.id_pedidoU = s.id_pedidoU
			WHERE id_proceso=7 AND estado=3";
			$preparado = $this->objbd->prepare($consulta);
			$preparado->execute();
			$resultado = $preparado->fetch(PDO::FETCH_ASSOC);
			return $resultado['total'];
		}

		public function totalPedidospedientes() {
			$consulta = "SELECT COUNT(*) AS total FROM pedido_uniforme WHERE fecha_final < NOW()";
			$preparado = $this->objbd->prepare($consulta);
			$preparado->execute();
			$resultado = $preparado->fetch(PDO::FETCH_ASSOC);
			return $resultado['total'];
		}
}


class prendainModelo extends Conexion {
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
		$preparado->bindParam(':idcostados', $this->idcostados);
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
			$this->idprendain = $datos['id_prendain'];
			$this->idpedidoU = $datos['id_pedidoU'];
			$this->idtela = $datos['id_tela'];
			$this->idcostados = $datos['id_costados'];
			$this->idtipoprod = $datos['id_tipoprod'];
			$this->idprotector = $datos['id_protector'];
			$this->idtipopi = $datos['id_tipoPI'];
			$this->color = $datos['color'];
			$this->tapatra = $datos['tapa_trasera'];
			$this->tirante = $datos['tirante'];	
			$this->obserpi = $datos['descripcion'];
			
			//var_dump($datos);
		} else
		$encontro = 0;
		
		return $encontro;
	}          

	public function modificar(){ 
		$registro= "UPDATE prenda_inferior SET id_tela='".$this->idtela."', id_tipoprod='".$this->idtipoprod."',id_costados='".$this->idcostados."', 
		id_protector='".$this->idprotector."', id_tipopi='".$this->idtipopi."', color='".$this->color."', descripcion='".$this->obserpi."', 
		tapa_trasera='".$this->tapatra."', tirante='".$this->tirante."'  WHERE id_pedidoU='".$this->idpedidoU."'";  
		
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

	//consulta de tablas auxiliares
	public function tablas_aux(){
		$tablas = ['cierre', 'corte_manga', 'costados', 'cuello', 'manga', 
		'protector', 'tela', 'tipo_pi', 'tipo_producto', 'tipo_ps', 'talla'];
		
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

class prendasuModelo extends Conexion {
	private $idprendasu;
	private $idpedidoU;
	private $idtelasu;
	private $idcostados;
	private $idtipoprod;
	private $idmanga;
	private $telamanga;
	private $idcortemanga;
	private $idcuello;
	private $idcierre;
    private $idtipoPS;
	private $obserps;
	private $objbd;

	public function __construct(){
		parent::__construct();
		$this->objbd = parent::conectar();
	}

	 // métodos 
	 public function get_idprendasu(){
		return $this->idprendasu;
	}
	
	public function set_idprendasu( $idprendasu ){
		$this->idprendasu = $idprendasu;	
	}

	public function get_idpedidoU(){
		return $this->idpedidoU;
	}
	
	public function set_idpedidoU( $idpedidoU ){
		$this->idpedidoU = $idpedidoU;	
	}

	public function get_idtelasu(){
		return $this->idtelasu;
	}
	
	public function set_idtelasu( $idtelasu ){
		$this->idtelasu = $idtelasu;
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

	public function get_idmanga(){
		return $this->idmanga;
	}
	
	public function set_idmanga( $idmanga ){
		$this->idmanga = $idmanga;
	}
	
	public function get_telamanga(){
		return $this->telamanga;
	}
	
	public function set_telamanga( $telamanga ){
		$this->telamanga = $telamanga;
	}

	public function get_idcortemanga(){
		return $this->idcortemanga;
	}
	
	public function set_idcortemanga( $idcortemanga ){
		$this->idcortemanga = $idcortemanga;
	}

	public function get_idcuello(){
		return $this->idcuello;
	}
	
	public function set_idcuello( $idcuello ){
		$this->idcuello = $idcuello;
	}

	public function get_idcierre(){
		return $this->idcierre;
	}

	public function set_idcierre( $idcierre ){
		$this->idcierre = $idcierre;
	}

    public function get_idtipoPS(){
		return $this->idtipoPS;
	}
	
	public function set_idtipoPS( $idtipoPS ){
		$this->idtipoPS = $idtipoPS;
	}

	public function get_obserps(){
		return $this->obserps;
	}

	public function set_obserps( $obserps ){
		$this->obserps = $obserps;
	}

	public function consultar(){ // funcion para Buscar
		$lista = array();
		$registro = "SELECT * FROM prenda_superior";
		$preparado = $this->objbd->prepare($registro);
		$resul = $preparado->execute();
		// Almacenar en un arreglo todos los registros
		while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
			$lista[] = $datos;
		}
		return $lista;
	} 

	public function incluir() { // funcion para Incluir
		$registro = "INSERT INTO prenda_superior (id_pedidoU, id_tela, id_costados, id_tipoprod, id_manga, tela_manga, id_cortemanga, id_cuello, id_cierre, id_tipoPS , descripcion) 
		VALUES (:idpedidoU, :idtelasu, :idcostadossu, :tipoprodsu, :idmangasu, :idtelaman, :idcortemanga, :idcuello, :idcierre, :idtipops, :obserps)";

		$preparado = $this->objbd->prepare($registro);
		$preparado->bindParam(':idpedidoU', $this->idpedidoU); 
		$preparado->bindParam(':idtelasu', $this->idtelasu); 
		$preparado->bindParam(':idcostadossu', $this->idcostados);
		$preparado->bindParam(':tipoprodsu', $this->idtipoprod);
		$preparado->bindParam(':idmangasu', $this->idmanga);
		$preparado->bindParam(':idtelaman', $this->telamanga);
		$preparado->bindParam(':idcortemanga', $this->idcortemanga);
		$preparado->bindParam(':idcuello', $this->idcuello);
		$preparado->bindParam(':idcierre', $this->idcierre);
        $preparado->bindParam(':idtipops', $this->idtipoPS);
		$preparado->bindParam(':obserps', $this->obserps);

		$resul= $preparado->execute();
		
		if( $resul )
			$res = 1;
		else
			$res = 0;
		return $res;   		
	}

	 public function buscar(){ // funcion para Buscar
		$registro="SELECT * from prenda_superior where id_pedidoU='".$this->idpedidoU."'";
		$preparado = $this->objbd->prepare($registro);
		$preparado->execute();
		$datos = $preparado->fetch(PDO::FETCH_ASSOC);
		if( $datos) {
			$encontro = 1;
			$this->idprendasu = $datos['id_prendasu'];
			$this->idpedidoU = $datos['id_pedidoU'];
			$this->idtelasu = $datos['id_tela'];
			$this->idcostados = $datos['id_costados'];
			$this->idtipoprod = $datos['id_tipoprod'];
			$this->idmanga = $datos['id_manga'];
			$this->telamanga = $datos['tela_manga'];
			$this->idcortemanga = $datos['id_cortemanga'];
			$this->idcuello = $datos['id_cuello'];
			$this->idcierre = $datos['id_cierre'];
            $this->idtipoPS = $datos['id_tipoPS'];		
			$this->obserps = $datos['descripcion'];
			
			//var_dump($datos);
		} else
		$encontro = 0;
		
		return $encontro;
	}          

	public function modificar(){ 
		$registro= "UPDATE prenda_superior SET id_tela='".$this->idtelasu."', id_tipoprod='".$this->idtipoprod."',id_costados='".$this->idcostados."', 
		id_manga='".$this->idmanga."', tela_manga='".$this->telamanga."', id_cortemanga='".$this->idcortemanga."', descripcion='".$this->obserps."', 
		id_cuello='".$this->idcuello."', id_cierre='".$this->idcierre."', id_tipoPS='".$this->idtipoPS."'  WHERE id_pedidoU='".$this->idpedidoU."'";  
		
		$preparado = $this->objbd->prepare($registro);
		$resul = $preparado->execute();
		return $resul;
	}
	
	
	public function eliminar() 	{ // funcion para Eliminar
		$registro = "DELETE FROM prenda_superior WHERE id_pedidou='".$this->idpedidoU."'";
		$preparado = $this->objbd->prepare( $registro );
		$resul = $preparado->execute();
		return $resul;
	}
	// Fin de funciones CRUD de pedidou

	// Consultar lista de pedidoues
	public function prendain_consultar(){
		$lista = array();
		$registro = "SELECT * FROM prenda_superior";
		$preparado = $this->objbd->prepare($registro);
		$resul = $preparado->execute();
		// Almacenar en un arreglo todos los registros
		while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
			$lista[] = $datos;
		}
		return $lista;
	} 

		//consulta de tablas auxiliares

	public function tablas_auxa(){
		$tablas = ['cierre', 'corte_manga', 'costados', 'cuello', 'manga', 
		'protector', 'tela', 'tipo_pi', 'tipo_producto', 'tipo_ps', 'talla'];
			
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


class tallapiModelo extends Conexion {
	// Atributos
	private $idprendain;
	private $idtalla;
	private $cantidad;
	private $objbd;


	 // Constructor -> Activar conexión de clase padre
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

	public function get_idtalla(){
		return $this->idtalla;
	}
	
	public function set_idtalla( $idtalla ){
		$this->idtalla = $idtalla;
	}

	public function get_cantidad(){
		return $this->cantidad;
	}
	
	public function set_cantidad( $cantidad){
		$this->cantidad = $cantidad;
	}

	public function consultar(){ // funcion para Buscar
		$lista = array();
		$registro = "SELECT * FROM talla_pi";
		$preparado = $this->objbd->prepare($registro);
		$resul = $preparado->execute();
		// Almacenar en un arreglo todos los registros
		while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
			$lista[] = $datos;
		}
		return $lista;
	} 
	
	public function incluirMultiple(array $datos){

			$registro = "INSERT INTO talla_pi (id_prendain,id_talla,cantidad) VALUES ";
			$valores = [];
			foreach ($datos as $dato){

				$valores[] = "(?,?,?)"; 
			}
			$registro .= implode(',', $valores);

			$preparado = $this->objbd->prepare($registro);
			$parametros = [];
			foreach ($datos as $dato){
				$parametros[] = $dato['idprendain'];
				$parametros[] = $dato['idtalla'];
				$parametros[] = $dato['cantidad'];
	}
		$resul= $preparado->execute($parametros);
		
		if( $resul )
			$res = 1;
		else
			$res = 0;
		return $res;   		
	}


	 public function buscar(){ // funcion para Buscar
		$registro="SELECT pi.*, t.talla AS nombre_talla, t.genero AS nombre_genero
						FROM talla_pi pi
						INNER JOIN talla t ON pi.id_talla = t.id_talla
						WHERE pi.id_prendain='".$this->idprendain."'";
		$preparado = $this->objbd->prepare($registro);
		$preparado->execute();
		$resultados = [];
		while ($fila = $preparado->fetch(PDO::FETCH_ASSOC)){
			$resultados[] = $fila;
		}
		return $resultados;

	} 
	  
	public function modificar(){ 
		$registro= "UPDATE talla_pi SET id_prendain='".$this->idprendain."', idtalla='".$this->idtalla."', cantidad='".$this->cantidad."' WHERE id_prendain='".$this->idprendain."'";  
		$preparado = $this->objbd->prepare($registro);
		$resul = $preparado->execute();
		return $resul;
	}
	
	public function eliminar() 	{ // funcion para Eliminar
		$registro = "DELETE FROM talla_pi WHERE id_prendain='".$this->idprendain."'";
		$preparado = $this->objbd->prepare( $registro );
		$resul = $preparado->execute();
		return $resul;
	}
	// Fin de funciones CRUD de idtalla

	//consulta de tablas auxiliares
	public function tablas_aux(){
		$tablas = ['cierre', 'corte_manga', 'costados', 'cuello', 'manga', 
		'protector', 'tela', 'tipo_pi', 'tipo_producto', 'tipo_ps', 'talla'];
			
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

class tallasuModelo extends Conexion {
	// Atributos
	private $idprendasu;
	private $idtallasu;
	private $cantidadsu;
	private $objbd;


	 // Constructor -> Activar conexión de clase padre
	 public function __construct(){
		parent::__construct();
		$this->objbd = parent::conectar();
	}
	 
	 // métodos 
	public function get_idprendasu(){
		return $this->idprendasu;
	}
	
	public function set_idprendasu( $idprendasu ){
		$this->idprendasu = $idprendasu;	
	}

	public function get_idtallasu(){
		return $this->idtallasu;
	}
	
	public function set_idtallasu( $idtallasu ){
		$this->idtallasu = $idtallasu;
	}

	public function get_cantidadsu(){
		return $this->cantidadsu;
	}
	
	public function set_cantidadsu( $cantidadsu){
		$this->cantidadsu = $cantidadsu;
	}

	public function consultar(){ // funcion para Buscar
		$lista = array();
		$registro = "SELECT * FROM talla_ps";
		$preparado = $this->objbd->prepare($registro);
		$resul = $preparado->execute();
		// Almacenar en un arreglo todos los registros
		while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
			$lista[] = $datos;
		}
		return $lista;
	} 
	
	public function incluirMultiple(array $datossu){

			$registro = "INSERT INTO talla_ps (id_prendasu,id_talla,cantidad) VALUES ";
			$valores = [];
			foreach ($datossu as $dato){

				$valores[] = "(?,?,?)"; 
			}
			$registro .= implode(',', $valores);

			$preparado = $this->objbd->prepare($registro);
			$parametros = [];
			foreach ($datossu as $dato){
				$parametros[] = $dato['idprendasu'];
				$parametros[] = $dato['idtallasu'];
				$parametros[] = $dato['cantidadsu'];
	}
		$resul= $preparado->execute($parametros);
		
		if( $resul )
			$res = 1;
		else
			$res = 0;
		return $res;   		
	}


	 public function buscar(){ // funcion para Buscar
		$registro="SELECT ps.*, t.talla AS nombre_talla, t.genero AS nombre_genero
						FROM talla_ps ps
						INNER JOIN talla t ON ps.id_talla = t.id_talla
						WHERE id_prendasu='".$this->idprendasu."'";
		$preparado = $this->objbd->prepare($registro);
		$preparado->execute();
		$resultados = [];
		while ($fila = $preparado->fetch(PDO::FETCH_ASSOC)){
			$resultados[] = $fila;
		}
		return $resultados;

	} 
	  
	public function modificar(){ 
		$registro= "UPDATE talla_ps SET id_prendasu='".$this->idprendasu."', idtalla='".$this->idtallasu."', cantidad='".$this->cantidadsu."' WHERE id_prendasu='".$this->idprendasu."'";  
		$preparado = $this->objbd->prepare($registro);
		$resul = $preparado->execute();
		return $resul;
	}
	
	public function eliminar() 	{ // funcion para Eliminar
		$registro = "DELETE FROM talla_ps WHERE id_prendasu='".$this->idprendasu."'";
		$preparado = $this->objbd->prepare( $registro );
		$resul = $preparado->execute();
		return $resul;
	}
	// Fin de funciones CRUD de idtalla

	//consulta de tablas auxiliares
	public function tablas_auxps(){
		$tablas = ['cierre', 'corte_manga', 'costados', 'cuello', 'manga', 
		'protector', 'tela', 'tipo_pi', 'tipo_producto', 'tipo_ps', 'talla'];
			
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