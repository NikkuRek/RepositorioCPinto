<?php
require_once('controlador/usuario_controlador.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Iniciar Sesión</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="vista/css/estilologin.css">
</head>

<body>
    <div class="contenedor">
        <div class="login-form">
            <div class="login-conten">
                <h1>Iniciar sesión</h1>
                <form action="" method="POST" autocomplete="off">
                    <div class="form-grupo">
                        <label for="usuario">Usuario:</label>
                        <input type="text" id="usuario" name="usuario" required>
                    </div>
                    <div class="form-grupo">
                        <label for="contraseña">Contraseña:</label>
                        <input type="password" id="contraseña" name="contraseña" required>
                    </div>
                    <div class="boton">
                        <input type="submit" value="Iniciar Sesión" name="iniciar_sesion">
                    </div>
            </div>
            </form>
        </div>
    </div>
</body>

</html>