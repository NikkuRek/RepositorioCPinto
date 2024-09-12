<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
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
        <h1>Listado de Clientes</h1>

        <hr>

        <div class="px-6 py-4">
            <div class="contenedor-entrada1 px-6 pt-5">

                <!--<div class="alert alert-azul">
                    <a href="../controlador/cliente_controlador.php" class="btn btn-azul">Agregar</a>
                </div>-->



                <div class="caja_scroll">
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <tr>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Acciones</th>
                        </tr>
                        <?php foreach ($lista_cliente as $cliente) { ?>
                            <tr>
                                <td><?php echo $cliente['documento_cliente']; ?></td>
                                <td><?php echo $cliente['nombre']; ?></td>
                                <td><?php echo $cliente['telefono']; ?></td>
                                <td><?php echo $cliente['direccion']; ?></td>
                                <td>
                                    <a href="cliente_controlador.php?id=<?php echo $cliente['documento_cliente'] ?>" class="btn btn-azul">
                                        <img src="../vista/img/pencil.png" alt="Modificar" width="16" height="16"></a>
                                    <a href="cliente_controlador.php?eliminarId=<?php echo $cliente['documento_cliente'] ?>" class="btn btn-rojo">
                                        <img src="../vista/img/trash.png" alt="Eliminar" width=16 height=16></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="f1">
                    <a href="#" class="btn btn-infox modal_abrir_modificar">
                        <!--<a href="../controlador/proveedor_controlador.php" class="btn btn-azulx">-->
                        <img src="../vista/img/iconmas.png" alt="">
                        <div class="texto-contenedor-pagina">
                            <span class="texto-superior">Agregar Cliente</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <section class="modal_section <?php if (isset($_GET['id'])) { ?>modal--show<?php } ?>" id="modal_abrir_modificar">
            <div class="modal__contenedor">
                <hr>

                <div class="px-6 py-4">
                    <div class="contenedor-entrada1 px-6 pt-5">
                        <?php if (isset($_GET['id'])) { ?>
                            <h1 class="display-6"><b>Datos del Cliente</b></h1>
                        <?php } else { ?>
                            <h1 class="display-6"><b>Agregar Cliente</b></h1>
                        <?php } ?>

                        <form action="" method="POST">
                            <div id="f1" class="row col-md-4">

                                <?php if (isset($_GET['id'])) { ?>
                                <?php } ?>
                                <div class="col-md-12">
                                    <label for=area>Cédula: </label>
                                    <input type="text" id="documentocliente" name="documentocliente" value="<?php echo $documentocliente; ?>" class="form-control form-control-sm">
                                </div>


                                <div class="col-md-12">
                                    <label for=area>Nombre: </label>
                                    <input type="text" id="nombrec" name="nombrec" value="<?php echo $nombrec; ?>" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-12">
                                    <label for=area>Teléfono: </label>
                                    <input type="text" id="telefonoc" name="telefonoc" value="<?php echo $telefonoc; ?>" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-12">
                                    <label for=area>Dirección: </label>
                                    <input type="text" id="direccionc" name="direccionc" value="<?php echo $direccionc; ?>" class="form-control form-control-sm">
                                </div>

                                <div class="col-md-12"><br>
                                    <center>
                                        <?php if (!isset($_GET['id'])) { ?>
                                            <input type="submit" value="Guardar" name="guardar" class="btn btn-info">
                                            <input type="button" value="Limpiar" onclick="Limpiar();" class="btn btn-info">
                                        <?php } else { ?>
                                            <input type="submit" value="Modificar" name="modificar" class="btn btn-info">
                                        <?php } ?>
                                        <input type="submit" value="Volver" Name="volver" class="btn btn-danger">
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

        </section>
        <script src="../vista/js/sweetalert2.min.js"></script>
        <script src="../vista/js/Entrada_popup.js"></script>
        <script src="../vista/js/bootstrap.min.js"></script>
        <script src="../vista/js/sweetalert2.min.js"></script>
</body>

</html>