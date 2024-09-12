<?php
	// Llamada al modelo de usuarios
	require_once("modelo/usuario_modelo.php");
	$objUsuario = new Usuario();
	
	// Verificar si ya inicio session
	if( isset( $_SESSION['id_usuario']) ){
		if ($_SESSION['id_usuario'] == 1 || $_SESSION['id_usuario'] == 2) {
			header("Location: vista/inicio.php");
		} else {
			session_destroy();
			header("Location: index.php");
		}
	}
	// Si hacen clic en botón de inicio de sesión
	if( isset($_POST['iniciar_sesion']) ){
		$usuario = $_POST['usuario'];
		$contraseña = $_POST['contraseña'];
		// Función que verifica si el usuario y contraseña existen	
		if($objUsuario->autenticarUsuario( $usuario, $contraseña )){
			$_SESSION['id_usuario'] = $objUsuario->get_idusuario();
			if ($_SESSION['id_usuario'] > 0) {
				header("Location: vista/inicio.php");
			}
		} else
			echo "<script>alert('Usuario o contraseña incorrectos, vuelva a intentarlo')</script>";
	}
?>