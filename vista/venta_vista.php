<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Ventas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../vista/css/estilos.css">
    <link rel="stylesheet" href="../vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vista/css/sweetalert2.min.css">
</head>

<body>

    <div class="barra-lateral">
        <?php menuLateralOpcion(); ?>
    </div>

    <div class="contenido">
        <h1>Listado de Ventas</h1>

        <hr>

        <div class="px-6 py-4">
            <div class="contenedor-entrada1 px-6 pt-5">
                <div class="caja_scroll">
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <tr>
                            <th>ID</th>
                            <th>N Pedido</th>
                            <th>Cedula</th>
                            <th>Cant. Prendas</th>
                            <th>Precio Unitario</th>
                            <th>Precio Total</th>
                            <th>Descripción</th>
                            <th>Descuento</th>
                            <th>Fecha de venta</th>
                            <th>Acciones</th>
                        </tr>
                        <?php foreach ($lista_venta1 as $venta) { ?>
                            <tr>
                                <td><?php echo $venta['id_venta']; ?></td>
                                <td><?php echo $venta['nombre_pedido']; ?></td>
                                <td><?php echo $venta['documento_cliente'], ' - ', $venta['nombre_cliente']; ?></td>
                                <td><?php echo $venta['cantidad_prendas']; ?></td>
                                <td><?php echo $venta['precio_unitario']; ?></td>
                                <td><?php echo $venta['precio_unitario'] * $venta['cantidad_prendas']; ?></td>
                                <td><?php echo $venta['descripcion']; ?></td>
                                <td><?php echo $venta['descuento']; ?>%</td>
                                <td><?php echo $venta['fecha_venta']; ?></td>
                                <td>
                                    <a href="venta_controlador.php?id=<?php echo $venta['id_venta'] ?>" class="btn btn-azul">
                                        <img src="../vista/img/pencil.png" alt="Modificar" width="16" height="16"></a>
                                    <a href="../controlador/venta_controlador.php?eliminarId=<?php echo $venta['id_venta'] ?>" class="btn btn-rojo">
                                        <img src="../vista/img/trash.png" alt="Eliminar" width=16 height=16></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="">
                    <a href="#" class="btn btn-infox modal_abrir_modificar">
                        <img src="../vista/img/iconmas.png" alt="">
                        <div class="texto-contenedor-pagina">
                            <span class="texto-superior">Agregar Venta</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <section class="modal_section <?php if (isset($_GET['id'])) { ?>modal--show<?php } ?>" id="modal_abrir_modificar">
            <div class="modal__contenedor">
                <hr>

                <div class="px-6 py-4">
                    <div class="contenedor-entrada1 px-6 pt-5 dd11">

                        <?php if (isset($_GET['id'])) { ?>
                            <h1 class="display-6"><b>Datos de la Venta</b></h1>
                        <?php } else { ?>
                            <h1 class="display-6"><b>Agregar Venta</b></h1>
                        <?php } ?>
                        <form action="" method="POST">
                            <div id="f1" class="row col-md-4">
                                <?php if (isset($_GET['id'])) { ?>
                                    <div class="col-md-12">
                                        <label for=area>ID: </label>
                                        <input type="text" id="id_venta" name="id_venta" value="<?php echo $id_venta; ?>" readonly class="form-control form-control-sm">
                                    </div>
                                <?php } ?>
                                <div class="col-md-12">
                                    <label for=area>N° Pedido: </label>
                                    <select id="idpedidoU" name="idpedidoU" class="form-control form-control-sm" onchange="rellenar()">
                                        <option value="0">-- Seleccione --</option>
                                        <?php foreach ($lista_venta as $venta) {
                                            $seleccionado = "";
                                            if (isset($_GET['id']) and $idpedidoU == $venta['id_pedidoU']) $seleccionado = "selected"; ?>
                                            <option value="<?php echo $venta['id_pedidoU']; ?>" data-cedula="<?php echo $venta['documento_cliente']; ?>" <?php echo $seleccionado; ?>>

                                                <?php echo $venta['id_pedidoU'], '-', $venta['nombre']  ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                                <div class="col-md-12">
                                    <label for=area>Cliente: </label>
                                    <input type="text" id="documentocliente" name="documentocliente" value="<?php echo $documentocliente; ?>" readonly class="form-control form-control-sm">
                                </div>
                                <div class="col-md-12">
                                    <label for=area>Cantidad de Prendas: </label>
                                    <input type="text" id="cantidadprendas" name="cantidadprendas" value="<?php echo $cantidadprendas; ?>" class="form-control form-control-sm">
                                </div>
 
                                <div class="col-md-12">
                                    <label for=area>Precio por Unidad: </label>
                                    <input type="text" id="preciounitario" name="preciounitario" value="<?php echo $preciounitario; ?>" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-12">
                                    <label for=area>Descripción: </label>
                                    <input type="text" id="descrip" name="descrip" value="<?php echo $descrip; ?>" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-12">
                                    <label for=area>Descuento: </label>
                                    <input type="text" id="descuen" name="descuen" value="<?php echo $descuen; ?>" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-12"><br>
                                    <center>
                                        <?php if (!isset($_GET['id'])) { ?>
                                            <input type="submit" value="Guardar" name="guardar" class="btn btn-info">
                                            <input type="button" value="Limpiar" onclick="Limpiar();" class="btn btn-info">
                                        <?php } else { ?>
                                            <input type="submit" value="Modificar" name="modificar" class="btn btn-info">
                                        <?php } ?>
                                        <input type="submit" value="Volver" Name="Volver" class="btn btn-danger">
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="../vista/js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="../vista/js/funciones1.js"></script>
    <script src="../vista/js/Entrada_popup.js"></script>
    <script src="../vista/js/bootstrap.min.js"></script>
    <script src="../vista/js/sweetalert2.min.js"></script>
</body>

</html>