<!DOCTYPE html>
<html>

<head>
    <title>Producto - Inventario</title>
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
            <h1>
                Lista de Productos
            </h1>
        </div>

        <hr>

        <div class="px-6 py-4">
            <div class="contenedor-entrada1 px-6 pt-5">
                <!--<div class="alert alert-azul">
                    <a href="../controlador/productoForm_controlador.php" class="btn btn-azul">Agregar</a>
                </div>-->
                <div class=""> <!--alert alert-azul-->
                    <a href="#" class="btn btn-infox modal_abrir">
                        <!--<a href="../controlador/proveedorForm_controlador.php" class="btn btn-azulx">-->
                        <img src="../vista/img/iconmas.png" alt="">
                        <div class="texto-contenedor-pagina">
                            <span class="texto-superior">Agregar Producto</span>
                        </div>
                    </a>
                </div>
                <div class="caja_scroll">
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <tr>
                            <th>Nº</th>
                            <th>ID Producto</th>
                            <th>ID Proveedor</th>
                            <th>Nombre del Producto</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Cantidad Disponible</th>
                            <th>Acciones</th>
                        </tr>
                        <?php
                        $contador = 1;
                        foreach ($lista_producto as $producto) { ?>
                            <tr>
                                <td><?php echo $contador; ?></td>
                                <td><?php echo $producto['id_producto']; ?></td>
                                <td><?php echo $producto['id_proveedor']; ?></td>
                                <td><?php echo $producto['nombre_prod']; ?></td>
                                <td><?php echo $producto['descripcion']; ?></td>
                                <td><?php echo $producto['precio']; ?></td>
                                <td><?php echo $producto['cantidad_disp']; ?></td>
                                <td>
                                    <a href="../controlador/productoForm_controlador.php?id=<?php echo $producto['id_producto'] ?>" class="btn btn-azul">
                                        <img src="../vista/img/pencil.png" alt="Modificar" width="16" height="16"></a>
                                    <a href="../controlador/productoForm_controlador.php?eliminarId=<?php echo $producto['id_producto'] ?>" class="btn btn-rojo">
                                        <img src="../vista/img/trash.png" alt="Eliminar" width="16" height="16"></a>
                                </td>
                            </tr>
                        <?php
                            $contador++;
                        } ?>

                    </table>
                </div>
            </div>
        </div>
        <script src="../vista/js/bootstrap.min.js"></script>
        <script src="../vista/js/sweetalert2.min.js"></script>
</body>

</html>