<?php
// Temporal: Llamamos al modelo de conexión [ Nos interesa, para mantener la sessión ]
require_once("../modelo/conexionPDO.php");
require_once("../modelo/pedido_modelo.php");
require_once("../modelo/venta_modelo.php");
//require_once("../modelo/salida_modelo.php");
//require_once("../modelo/cliente_modelo.php");


$inicio = new Conexion();
$objpedidou = new pedidouModelo();
$objventa = new ventaModelo();


$total_pedidos = $objpedidou->totalPedidos();
$total_pedidoscerrados = $objpedidou->totalPedidosfinalizados();
$total_pedidospendientes = $objpedidou->totalPedidospedientes();
$total_ventas = $objventa->totalventas();


// Llamar controlador con funciones de diseño, para no repetir el mismo código
require_once("../controlador/vista_controlador.php");

// Desconectar, si le da clic en Volver
if (isset($_GET['Volver'])) {
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
    <title>GEDOP</title>
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
                ¡Bienvenido!
            </h1>
        </div>

        <hr>
<<<<<<< HEAD
        <div class="xd">
            <div class="contenedor-botones">
                <a href="../controlador/transacciones_controlador.php" class="btn btn-blanco">
                    <img src="../vista/img/totalpedidos.png" alt="Total pedidos">
=======
        <div class= "xd">
        <div class="contenedor-botones">
        <a href="../controlador/pedido_controlador.php" class="btn btn-blanco">      
                <img src="../vista/img/totalpedidos.png" alt="Total Entradas">
>>>>>>> de4a7b87e97764835d2b07c31a6ce63a69816cc5
                    <div class="texto-contenedor">
                        <span class="texto-superior">Total de Pedidos</span>
                        <span class="texto-inferior1"><?php echo $total_pedidos; ?></span>
                    </div>
                </a>

                <a href="../controlador/transacciones_controlador.php" class="btn btn-blanco">
                    <img src="../vista/img/pedidospendientes.png" alt="Total Salidas">
                    <div class="texto-contenedor">
                        <span class="texto-superior">Pedidos Pendientes</span>
                        <span class="texto-inferior2"><?php echo $total_pedidospendientes; ?></span>
                    </div>
                </a>
                <a href="../controlador/transacciones_controlador.php" class="btn btn-blanco">
                    <img src="../vista/img/pedidoscerrados.png" alt="Total Productos">
                    <div class="texto-contenedor">
                        <span class="texto-superior">Pedidos Cerrados</span>
                        <span class="texto-inferior3"><?php echo $total_pedidoscerrados; ?></span>
                    </div>
                </a>
                <a href="../controlador/venta_controlador.php" class="btn btn-blanco">
                    <img src="../vista/img/Ventas.png" alt="Total Clientes">
                    <div class="texto-contenedor">
                        <span class="texto-superior">Ventas</span>
                        <span class="texto-inferior4"><?php echo $total_ventas; ?></span>
                    </div>
                </a>
            </div>



            <script type="text/javascript" src="../vista/js/jquery-3.7.1.min.js"></script>
            <script type="text/javascript" src="../vista/js/funciones1.js"></script>


        </div>
        <script src="../vista/js/sweetalert2.min.js"></script>
    </div>
</body>

</html>