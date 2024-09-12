<?php
    require_once("conexionPDO.php");
    //session_start();
    class Usuario extends Conexion {
        private $id_usuario;
        private $usuario;
        private $contraseña;
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
        
        public function get_contraseña(){
            return $this->contraseña;
        }
        
        public function set_contraseña($contraseña){
            $this->contraseña=$contraseña;
        }
    
        public function get_correou(){
            return $this->correo_u;
        }
        
        public function set_correou($correo_u){
            $this->correo_u=$correo_u;
        }

		public function autenticarUsuario($usuario, $contraseña) {
			$registro = "SELECT * FROM usuario WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
			$preparado = $this->objbd->prepare($registro);
			$resul = $preparado->execute();
			$datos = $preparado->fetch(PDO::FETCH_ASSOC);
			if ($datos) {
				$this->id_usuario = $datos['id_usuario'];
                //$this->iddepartamento = $datos['id_departamento'];
				$encontro = 1;
			} else
				$encontro = 0;
				
			return $encontro;
		} // Fin de autenticar
    }

?>