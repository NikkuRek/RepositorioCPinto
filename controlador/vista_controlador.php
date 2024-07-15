
<?php
// Llamada al modelo de usuarios
if( !isset($_SESSION['id_usuario']) ){
  echo "<script>
    alert('Debe iniciar sesión para acceder a esta pantalla');
    location.href='../index.php';
  </script>";
}

	function menuLateralOpcion(){ ?>
    <div class="logo">
      <img src="../vista/img/logo.png" alt="Logo">
    </div>

    <ul class="menu">
        <li><img src="../vista/img/tacometro.png" alt="Inicio"><a href="../vista/inicio.php"><b>Inicio</b></a></li>
        <li><img src="../vista/img/arrows-repeat.png" alt="pedido"><a href="../controlador/pedido_controlador.php"><b>Pedidos</b></a></li>
        <li><img src="../vista/img/box-open.png" alt="venta"><a href="../controlador/venta_controlador.php"><b>Ventas</b></a></li>
        <li><img src="../vista/img/usuarios-alt.png" alt="Clientes"><a href="../controlador/cliente_controlador.php"><b>Clientes</b></a></li>
        <li><img src="../vista/img/box-open.png" alt="Productos"><a href="../controlador/producto_controlador.php"><b>Productos</b></a></li>
        <li><img src="../vista/img/box-open.png" alt="Productos"><a href="../controlador/elementos_controlador.php"><b>Elementos</b></a></li>
        <li><img src="../vista/img/documento.png" alt="Reportes"><a href="../controlador/reportes_controlador.php"><b>Reportes</b></a></li>
        <li><img src="../vista/img/salir.png" alt="Volver"><a href="../vista/inicio.php?Volver"><b>Salir</b></a></li>
    </ul> 
    <?php } ?>
    
