<?php
	// Temporal: Llamamos al modelo de conexión [ Nos interesa, para mantener la sessión ]
	require_once("../modelo/conexionPDO.php");
    require_once("../modelo/producto_modelo.php");
    require_once("../modelo/entrada_modelo.php");
    require_once("../modelo/salida_modelo.php");
    require_once("../modelo/cliente_modelo.php");


	$inicio = new Conexion();
    $objProducto = new ProductoModelo();
    $objEntrada =new EntradaModelo();
    $objSalida = new SalidaModelo();
    $objCliente = new ClienteModelo();
    
    $total_productos = $objProducto->totalProductos();
    $total_entradas = $objEntrada->totalEntradas();
    $total_salidas = $objSalida->totalSalidas();
    $total_clientes = $objCliente->totalClientes();



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
        <a href="../controlador/transacciones_controlador.php" class="btn btn-blanco">      
                <img src="../vista/img/totalpedidos.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"><?php echo $total_entradas; ?></span>
                    <span class="texto-superior">Total de Pedidos</span> 
                    </div>    
            </a>
            <a href="../controlador/transacciones_controlador.php" class="btn btn-blanco">
                <img src="../vista/img/pedidospendientes.png" alt="Total Salidas">
                    <div class="texto-contenedor">
                      <span class="texto-inferior2"><?php echo $total_salidas; ?></span>
                      <span class="texto-superior">Pedidos Pendientes</span>
                     </div>
            </a>
            <a href="../controlador/producto_controlador.php" class="btn btn-blanco">
                <img src="../vista/img/pedidoscerrados.png" alt="Total Productos">
                    <div class="texto-contenedor">
                      <span class="texto-inferior3"><?php echo $total_productos; ?></span>
                      <span class="texto-superior">Pedidos Cerrados</span>
                     </div>
            </a>
            <a href="../controlador/cliente_controlador.php" class="btn btn-blanco">
                <img src="../vista/img/Ventas.png" alt="Total Clientes">
                    <div class="texto-contenedor">
                      <span class="texto-inferior4"><?php echo $total_clientes; ?></span>
                      <span class="texto-superior">Ventas</span>
                     </div>
            </a>
            </div>

        <div class="px-6 py-4">
            <div class="contenedor-entrada1 px-6 pt-5">


                <div class="contenedor-imagen">
                    <!-- <img src="../vista/img/imagen2.png" class="imagen2" alt="deportes variados">*/-->
                </div>
                
            </div>
        </div>

        </div>
	</body>
</html>