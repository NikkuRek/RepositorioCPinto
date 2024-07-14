<?php
	// Temporal: Llamamos al modelo de conexión [ Nos interesa, para mantener la sessión ]
	require_once("../modelo/conexionPDO.php");
    require_once("../modelo/producto_modelo.php");
    require_once("../modelo/entrada_modelo.php");
    require_once("../modelo/salida_modelo.php");
    require_once("../modelo/cliente_modelo.php");


	$inicio = new Conexion();
    // $objProducto = new ProductoModelo();
    // $objEntrada =new EntradaModelo();
    // $objSalida = new SalidaModelo();
    // $objCliente = new ClienteModelo();
    
    // $total_productos = $objProducto->totalProductos();
    // $total_entradas = $objEntrada->totalEntradas();
    // $total_salidas = $objSalida->totalSalidas();
    // $total_clientes = $objCliente->totalClientes();



	// Llamar controlador con funciones de diseño, para no repetir el mismo código
	require_once("../controlador/vista_controlador.php");
	
    // Desconectar, si le da clic en Volver
	if( isset($_GET['Volver'])){
		session_destroy();
		echo "<script>
			location.href='../index.php';
		</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
		<title>Librería y Papelería Los Mayureles, C.A.</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/estilosinicio.css">
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
            <h1>
            ¡Bienvenido, Irina!
            </h1>
        </div>

        <hr>
        <div class="contenedor-botones">
        <a href="../controlador/pedido_controlador.php" class="btn btn-blanco">      
                <img src="../vista/img/totalpedidos.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Total de Pedidos</span> 
                    </div>    
            </a>
            <a href="../controlador/pedido_controlador.php" class="btn btn-blanco">
                <img src="../vista/img/pedidospendientes.png" alt="Total Salidas">
                    <div class="texto-contenedor">
                      <span class="texto-inferior2"></span>
                      <span class="texto-superior">Pedidos Pendientes</span>
                     </div>
            </a>
            <a href="../controlador/pedido_controlador.php" class="btn btn-blanco">
                <img src="../vista/img/pedidoscerrados.png" alt="Total Productos">
                    <div class="texto-contenedor">
                      <span class="texto-inferior3"></span>
                      <span class="texto-superior">Pedidos Cerrados</span>
                     </div>
            </a>
            <a href="../controlador/venta_controlador.php" class="btn btn-blanco">
                <img src="../vista/img/Ventas.png" alt="Total Clientes">
                    <div class="texto-contenedor">
                      <span class="texto-inferior4"></span>
                      <span class="texto-superior">Ventas</span>
                     </div>
            </a>
            </div>

        <div class="px-6 py-4">
            <div class="contenedor-entrada1 px-6 pt-5">


        <div class="contenedor-imagen">
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
                </div>
                
            </div>
        </div>
        </div>
	</body>
</html>