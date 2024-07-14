
<!DOCTYPE html>
<?php
   require_once("../modelo/conexionPDO.php"); 
?>
<html>
	<head>
    <title>Transacciones - Inventario</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../vista/css/estilos.css">
        <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
		<link rel="stylesheet" href="../vista/css/bootstrap.min.css">
        <link rel="stylesheet" href="../vista/css/sweetalert2.min.css">
	</head>
    <body>

    <div class="barra-lateral">
    <?php menuLateralOpcion(); ?>
    </div>

    <div class="contenido">
    <div class="ml-1">
        <h1>Transacciones</h1>
    </div>

    <hr>

    <div class="px-6 py-4">
        <div class="contenedor-entrada1 px-6 pt-5">

            <div class="contenedor-botones">
            <a href="../controlador/entrada_controlador.php" class="btn btn-blanco">
                <img src="../vista/img/Entradas.png" alt="Agregar Entrada">
                    <div class="texto-contenedor">
                      <span class="texto-superior">Agregar Entrada</span>
                     </div>
            </a>

            <a href="../controlador/salidaForm_controlador.php" class="btn btn-blanco">
                <img src="../vista/img/Salidas.png" alt="Agregar Salida">
                    <div class="texto-contenedor">
                      <span class="texto-superior">Agregar Salida</span>
                     </div>
            </a>
            </div>
  <hr>

    <h1 class="titulo"><b>Selecciona el tipo de transacción a consultar</b></h1>

<form id="productoForm" action="" method="POST" target="_blank">
	<div id="zona06">		 
		<select class="select-menu" name="valor" value="" id="valor"  onchange="Funcion01()">
			<option value="#">Seleccione</option>
			<option value="0">General</option> 
			<option value="1">Entrada</option>
			<option value="2">Salida</option>
		</select>	
    </div>

    </form>
    
<div id="zona07">
         <p> </p>
</div>


<script type="text/javascript" src="../vista/js/jquery-3.7.1.min.js"></script>
	<script type="text/javascript" src="../vista/js/funciones1.js"></script>	


    </div>
    <script src="../vista/js/sweetalert2.min.js"></script>
</body>
</html>