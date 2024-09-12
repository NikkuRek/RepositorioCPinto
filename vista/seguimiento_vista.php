<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>seguimientos</title>
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
        <h1>Seguimiento de Pedido</h1>

        <hr>

        <div class="px-6 py-4">
            <div class="contenedor-entrada1 px-6 pt-5">
                <div class="caja_scroll">
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <tr>
                            <th>ID</th>
                            <th>Fecha de registro</th>
                            <th>Pedido</th>
                            <th>Departamento</th>
                            <th>Proceso</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                        <?php foreach ($lista_seguimiento1 as $seguimiento) { ?>
                            <tr>
                                <td><?php echo $seguimiento['id_seguimiento']; ?></td>
                                <td><?php echo $seguimiento['fecha']; ?></td>
                                <td><?php echo $seguimiento['nombre_pedido']; ?></td>
                                <td><?php echo $seguimiento['nombre_departamento']; ?></td>
                                <td><?php echo $seguimiento['nombre_proceso']; ?></td>

                                <!-- Color de la celda dependiendo del estado -->
                                <?php $X = $seguimiento['estado'];
                                if ($X == 1) { ?>
                                    <td>
                                        <div style="background-color: #ffff00; margin: .5px; border-radius: 5px; padding-left: 5%;">
                                            <?php echo "Recibido"; ?>
                                        </div>
                                    </td>
                                <?php } else if ($X == 2) { ?>
                                    <td>
                                        <div style="background-color: #2eb2ff; margin: .5px; border-radius: 5px; padding-left: 5%;">
                                            <?php echo "En Proceso"; ?>
                                        </div>
                                    </td>
                                <?php } else { ?>
                                    <td>
                                        <div style="background-color: #75f542; margin: .5px; border-radius: 5px; padding-left: 5%;">
                                            <?php echo "Finalizado"; ?>
                                        </div>
                                    </td>
                                <?php }  ?>


                                <td>
                                    <a href="seguimiento_controlador.php?id=<?php echo $seguimiento['id_seguimiento'] ?>" class="btn btn-azul">
                                        <img src="../vista/img/pencil.png" alt="Modificar" width="16" height="16"></a>
                                    <a href="../controlador/seguimiento_controlador.php?eliminarId=<?php echo $seguimiento['id_seguimiento'] ?>" class="btn btn-rojo">
                                        <img src="../vista/img/trash.png" alt="Eliminar" width=16 height=16></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>

                <?php if (isset($_GET['id'])) { ?>
                    <h1 class="display-6"><b>Datos de la seguimiento</b></h1>
                <?php } else { ?>
                    <h1 class="display-6"><b>Agregar seguimiento</b></h1>
                <?php } ?>
                <form action="" method="POST">
                    <div id="f1" class="row col-md-4">
                        <?php if (isset($_GET['id'])) { ?>
                            <div class="col-md-12">
                                <label for=area>ID: </label>
                                <input type="text" id="idseguimiento" name="idseguimiento" value="<?php echo $idseguimiento; ?>" readonly class="form-control form-control-sm">
                            </div>
                        <?php } ?>
                        <div class="col-md-12">
                            <label for="idpedidoU">Pedido: </label>
                            <select id="idpedidoU" name="idpedidoU" class="form-control form-control-sm">
                                <option value="0">-- Seleccione --</option>
                                <?php foreach ($tablas_auxi['pedido_uniforme'] as $pedidou) { ?>
                                    <option value="<?php echo $pedidou['id_pedidoU']; ?>" <?php echo (isset($_GET['id']) && $idpedidoU == $pedidou['id_pedidoU']) ? "selected" : ""; ?>>
                                        <?php echo $pedidou['id_pedidoU'], ' – ', $pedidou['nombre']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for=area>Proceso: </label>
                            <select id="idproceso" name="idproceso" class="form-control form-control-sm" onchange="rellenar()">
                                <option value="0">-- Seleccione --</option>
                                <?php foreach ($lista_seguimiento as $seguimiento) {
                                    $seleccionado = "";
                                    if (isset($_GET['id']) and $idproceso == $seguimiento['id_proceso']) $seleccionado = "selected"; ?>
                                    <option value="<?php echo $seguimiento['id_proceso']; ?>" data-proceso="<?php echo $seguimiento['id_departamento']; ?>" <?php echo $seleccionado; ?>>

                                        <?php echo $seguimiento['id_proceso'], '-', $seguimiento['nombre']  ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for=area>Departamento del proceso: </label>
                            <input type="text" id="iddepartamento" name="iddepartamento" value="<?php echo $iddepartamento; ?>" readonly class="form-control form-control-sm">
                        </div>

                        <div class="col-md-12">
                            <label for=area>Estado: </label>
                            <select id="estado" name="estado" value="<?php echo $estado; ?>" class="form-control form-control-sm">
                                <option value="0">-- Seleccione --</option>
                                <option value="1">RECIBIDO</option>
                                <option value="2">EN PROCESO</option>
                                <option value="3">FINALIZADO</option>
                            </select>
                        </div>

                        <div class="col-md-12"><br>
                            <center>
                                <?php if (!isset($_GET['id'])) { ?>
                                    <input type="submit" value="Guardar" name="guardar" class="btn btn-info">
                                    <input type="button" value="Limpiar" onclick="Limpiar();" class="btn btn-info">
                                <?php } else { ?>
                                    <input type="submit" value="Modificar" name="modificar" class="btn btn-info">
                                <?php } ?>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <script src="../vista/js/sweetalert2.min.js"></script>
        <script src="../vista/js/Entrada_popup.js"></script>
        <script src="../vista/js/bootstrap.min.js"></script>
        <script src="../vista/js/sweetalert2.min.js"></script>
</body>

</html>