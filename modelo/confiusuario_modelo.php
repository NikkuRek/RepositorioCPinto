<?php
    require_once("conexionPDO.php");
	class confiusuarioModelo extends Conexion {
		// Atributos
		private $idusuario;
		private $iddepartamento;
		private $usuario;
		private $contrasena;
		private $nombre;
		private $rol;

		private $objbd;


		 // Constructor -> Activar conexión de clase padre
		 public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}
		 
		 // métodos 
	
		public function get_idusuario(){
			return $this->idusuario;
		}
		
		public function set_idusuario( $idusuario ){
			$this->idusuario = $idusuario;
		}

		public function get_iddepartamento(){
			return $this->iddepartamento;
		}
		
		public function set_iddepartamento( $iddepartamento ){
			$this->iddepartamento = $iddepartamento;	
		}

		public function get_usuario(){
			return $this->usuario;
		}
		
		public function set_usuario( $usuario ){
			$this->usuario = $usuario;	
		}
		
		public function get_contrasena(){
			return $this->contrasena;
		}
		
		public function set_contrasena( $contrasena ){
			$this->contrasena = $contrasena;	
		}

		public function get_nombre(){
			return $this->nombre;
		}
		
		public function set_nombre( $nombre ){
			$this->nombre = $nombre;	
		}

		public function get_rol(){
			return $this->rol;
		}
		
		public function set_rol( $rol ){
			$this->rol = $rol;	
		}

	
		public function consultar(){ // funcion para Buscar
			$lista = array();
			$registro = "SELECT * FROM usuario";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			// Almacenar en un arreglo todos los registros
			while( $datos = $preparado->fetch(PDO::FETCH_ASSOC) ){
				$lista[] = $datos;
			}
			return $lista;
		} 
		
		public function incluir() { // funcion para Incluir
			$registro = "INSERT INTO usuario (id_usuario,id_departamento,usuario,contraseña,nombre,rol) VALUES (:idusuario,:iddepartamento,:usuario,:contrasena,:nombre,:rol)";
			$preparado = $this->objbd->prepare($registro);
			$preparado->bindParam(':idusuario', $this->idusuario);
			$preparado->bindParam(':iddepartamento', $this->iddepartamento); 
			$preparado->bindParam(':usuario', $this->usuario); 
			$preparado->bindParam(':contrasena', $this->contrasena); 
			$preparado->bindParam(':nombre', $this->nombre); 
			$preparado->bindParam(':rol', $this->rol);
			$resul= $preparado->execute();
			
			if( $resul )
				$res = 1;
			else
				$res = 0;
			return $res;   		
		}

		 public function buscar(){ // funcion para Buscar
			$registro="SELECT * from usuario where id_usuario='".$this->idusuario."'";
			$preparado = $this->objbd->prepare($registro);
			$preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if( $datos) {
				$encontro = 1;
				$this->idusuario = $datos['id_usuario'];
				$this->iddepartamento = $datos['id_departamento'];
				$this->usuario = $datos['usuario'];
				$this->contrasena = $datos['contraseña'];
				$this->nombre = $datos['nombre'];
				$this->rol = $datos['rol'];
			} else
				$encontro = 0;
				 
			return $encontro;
		} 
		  
		public function modificar(){ 
			$registro= "UPDATE usuario SET id_usuario='".$this->idusuario."', id_departamento='".$this->iddepartamento."', usuario='".$this->usuario."', contraseña='".$this->contrasena."', nombre='".$this->nombre."', rol='".$this->rol."' WHERE id_usuario='".$this->idusuario."'";  
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			return $resul;
		}
		
		public function eliminar() 	{ // funcion para Eliminar
			$registro = "DELETE FROM usuario WHERE id_usuario='".$this->idusuario."'";
			$preparado = $this->objbd->prepare( $registro );
			$resul = $preparado->execute();
			return $resul;
		}
		// Fin de funciones CRUD de usuario

		// Consultar lista de usuarios
		public function usuario_consultar() {
			$lista = array();
			$registro = "SELECT u.*, d.nombre AS nombre_departamento 
						 FROM usuario u
						 INNER JOIN departamento d ON u.id_departamento = d.id_departamento";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
		
			while ($datos = $preparado->fetch(PDO::FETCH_ASSOC)) {
				$lista[] = $datos;
			}
		
			return $lista; 
		} 


		public function SiguienteUsuario(){

			$sql = "SELECT MAX(id_usuario) as siguiente FROM usuario";
	
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