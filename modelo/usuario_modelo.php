<?php
    require_once("conexionPDO.php");
    //session_start();
    class Usuario extends Conexion {
        private $id_usuario;
        private $usuario;
        private $clave;
        private $correo_u;
        private $objbd;

        public function __construct(){
			parent::__construct();
			$this->objbd = parent::conectar();
		}

        public function get_idusuario(){
            return $this->id_usuario;
        }
        
        public function set_idusuario($id_usuario){
            $this->id_usuario = $id_usuario;
        }
    
        public function get_usuario() {
            return $this->usuario;
        }
        
        public function set_nombre($usuario){
            $this->usuario = $usuario;
        }
        
        public function get_clave(){
            return $this->clave;
        }
        
        public function set_clave($clave){
            $this->clave=$clave;
        }
    
        public function get_correou(){
            return $this->correo_u;
        }
        
        public function set_correou($correo_u){
            $this->correo_u=$correo_u;
        }
		
		public function usuario_buscar(){
			$lista = array();
			$consulta=$this->db->query("SELECT* from dulcitos");
			while($filas=$consulta->fetch_assoc()){
				$lista[]=$filas;
			}
			return $this->dulces;	
		}
		public function autenticarUsuario($usuario, $clave) {
			$registro = "SELECT * FROM usuariot WHERE usuario = '$usuario' AND clave = '$clave'";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if ($datos) {
				$this->id_usuario = $datos['id_usuario'];
				$encontro = 1;
			} else
				$encontro = 0;
				
			return $encontro;
		} // Fin de autenticar
    }

?>