<!DOCTYPE html>
<?php
require_once("../modelo/conexionPDO.php");
?>
<html>

<head>
    <title>Lista de Pedidos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vista/css/estilos.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../vista/css/sweetalert2.min.css">
</head>

<body>

    <div class="barra-lateral">
        <?php menuLateralOpcion(); ?>
    </div>

    <div class="contenido">
        <div class="ml-1">
            <h1>Pedidos</h1>
        </div>
        <hr>

        <div class="">
            <a href="../controlador/pedido_controlador.php" class="btn btn-infox modal_abrir_modificar">
                <img src="../vista/img/iconmas.png" alt="">
                <div class="texto-contenedor-pagina">
                    <span class="texto-superior">Agregar Pedido</span>
                </div>
            </a>
        </div>

        <div class="px-6 py-4">
            <div class="contenedor-entrada1 px-6 pt-5">
                <div id="f1" class="contenedor-entrada1 px-6 pt-5">
                    <?php foreach ($lista_pedidou1 as $pedidou) { ?>
                        <div class="vista-tablon">
                            <div class="texto-contenedor">
                                <label class="texto-superior">Pedido
                                    <?php echo $pedidou['id_pedidoU']; ?></label>
                                <label class="texto-superior">Nombre pedido: <br>
                                    <?php echo $pedidou['nombre']; ?></label>
                                <label class="texto-superior">Fecha Limite: <br>
                                    <?php echo $pedidou['fecha_final']; ?></label>
                                <a href="pedido_controlador.php?id=<?php echo $pedidou['id_pedidoU'] ?>" class="btn btn-azul modal_abrir_modificar">Ver pedido</a>


                            </div>
                        </div>
                    <?php } ?>
                </div>

<!-- 
                <div class="px-6 py-4">
                    <div class="contenedor-entrada1 px-6 pt-5">
                        <div class="caja_scroll">
                            <table class="table table-striped table-bordered table-hover table-sm">
                                <tr>
                                    <th>ID Pedido U</th>
                                    <th>Documento Cliente</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Final</th>
                                    <th>Observación</th>
                                    <th>Acciones</th>
                                </tr>
                                <?php foreach ($lista_pedidou1 as $pedidou) { ?>
                                    <tr>
                                        <td><?php echo $pedidou['id_pedidoU']; ?></td>
                                        <td><?php echo $pedidou['documento_cliente']; ?></td>
                                        <td><?php echo $pedidou['nombre']; ?></td>
                                        <td><?php echo $pedidou['precio']; ?></td>
                                        <td><?php echo $pedidou['fecha_inicio']; ?></td>
                                        <td><?php echo $pedidou['fecha_final']; ?></td>
                                        <td><?php echo $pedidou['observacion']; ?></td>
                                        <td>
                                            <a href="pedido_controlador.php?id=<?php echo $pedidou['id_pedidoU'] ?>" class="btn btn-azul modal_abrir_modificar">
                                                <img src="../vista/img/pencil.png" alt="Modificar" width="16" height="16"></a>
                                            <a href="../controlador/pedido_controlador.php?eliminarId=<?php echo $pedidou['id_pedidoU'] ?>" class="btn btn-rojo">
                                                <img src="../vista/img/trash.png" alt="Eliminar" width=16 height=16></a>
                                        </td>
                                    </tr>


                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div> -->
            </div>


            <?php if (isset($_GET['id'])) { ?>
                <!-- Pop-up -->
                <div class="mod">
                    <input type="checkbox" id="btn-mod" class="Check" checked>

                    <div class="back"></div>

                    <div class="container-mod">
                        <div class="cont-mod">
                            <div class="px-6 py-4">
                                <div class="contenedor-entrada1 px-6 pt-5">
                                    <?php if (isset($_GET['id'])) { ?>
                                        <h1 class="display-6"><b>Datos del Pedido</b></h1>
                                    <?php } else { ?>
                                        <h1 class="display-6"><b>Agregar Pedido</b></h1>
                                    <?php } ?>
                                    <form action="" method="POST">
                                        <div id="f1" class="row col-md-4">
                                            <?php if (isset($_GET['id'])) { ?>
                                                <div class="col-md-12">
                                                    <label for=area>ID: </label>
                                                    <input type="text" id="id_pedidoU" name="id_pedidoU" value="<?php echo $id_pedidoU; ?>" readonly class="form-control form-control-sm">
                                                </div>
                                            <?php } ?>
                                            <div class="col-md-12">
                                                <label for=area>Cliente: </label>
                                                <input type="text" id="documentocliente" name="documentocliente" value="<?php echo $documentocliente; ?>" class="form-control form-control-sm">
                                            </div>

                                            <div class="col-md-12">
                                                <label for=area>Nombre: </label>
                                                <input type="text" id="nombrepedidou" name="nombrepedidou" value="<?php echo $nombrepedidou; ?>" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-12">
                                                <label for=area>Precio: </label>
                                                <input type="text" id="preciopu" name="preciopu" value="<?php echo $preciopu; ?>" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-12">
                                                <label for=area>Fecha Inicio: </label>
                                                <input type="text" id="fechai" name="fechai" value="<?php echo $fechai; ?>" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-12">
                                                <label for=area>Fecha Fin: </label>
                                                <input type="text" id="fechaf" name="fechaf" value="<?php echo $fechaf; ?>" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-12">
                                                <label for=area>Observaciones: </label>
                                                <input type="text" id="obserpu" name="obserpu" value="<?php echo $obserpu; ?>" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-12"><br>
                                                <center>
                                                    <?php if (!isset($_GET['id'])) { ?>
                                                        <input type="submit" value="Guardar" name="guardar" class="btn btn-info">
                                                        <input type="button" value="Limpiar" onclick="Limpiar();" class="btn btn-info">
                                                    <?php } else { ?>
                                                        <input type="submit" value="Modificar" name="modificar" class="btn btn-info">
                                                    <?php } ?>
                                                    <a href="../controlador/pedido_controlador.php" class="btn btn-danger"> Volver </a>
                                                </center>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php } ?>


                    <script type="text/javascript" src="../vista/js/jquery-3.7.1.min.js"></script>
                    <script type="text/javascript" src="../vista/js/funciones1.js"></script>
                    <script src="../vista/js/sweetalert2.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                    <script src="../vista/js/bootstrap.min.js"></script>
</body>

</html>