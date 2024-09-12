<!DOCTYPE html>
<?php
require_once("../modelo/conexionPDO.php");
?>
<html>

<head>
    <title>Lista de Pedidos</title>
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
            <h1>Elementos - Tipo Tela</h1>
        </div>

        <hr>

        <!-------------------------------LISTO PRODUCTO ----------------------------------->

        <div class="px-6 py-4">
            <div class="contenedor-entrada1 px-6 pt-5">
                <div class="caja_scroll">
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <tr>
                            <th>ID</th>
                            <th>tipo de telas</th>
                            <th>Acciones</th>
                        </tr>
                        <?php foreach ($lista_tela as $tela) { ?>
                            <tr>
                                <td><?php echo $tela['id_tela']; ?></td>
                                <td><?php echo $tela['tipo_tela']; ?></td>
                                <td>
                                    <a href="tela_controlador.php?id=<?php echo $tela['id_tela'] ?>" class="btn btn-azul">
                                        <img src="../vista/img/pencil.png" alt="Modificar" width="16" height="16"></a>
                                    <a href="../controlador/tela_controlador.php?eliminarId=<?php echo $tela['id_tela'] ?>" class="btn btn-rojo">
                                        <img src="../vista/img/trash.png" alt="Eliminar" width=16 height=16></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>


                <?php if (isset($_GET['id'])) { ?>
                    <h1 class="display-6"><b>Datos Tela </b></h1>
                <?php } else { ?>
                    <h1 class="display-6"><b>Agregar Tela</b></h1>
                <?php } ?>
                <form action="" method="POST">
                    <div id="f1" class="row col-md-4">
                        <?php if (isset($_GET['id'])) { ?>
                        <?php } ?>

                        <div class="col-md-12">
                            <label for=area>ID: </label>
                            <input type="text" id="idtela" name="idtela" value="<?php echo $idtela; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12">
                            <label for=area>Tipo: </label>
                            <input type="text" id="tipotela" name="tipotela" value="<?php echo $tipotela; ?>" class="form-control form-control-sm">
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




    <!-------------------------------FIN DE MODAL PARA PRODUCTO ----------------------------------->

    <script src="../vista/js/sweetalert2.min.js"></script>
    <script src="../vista/js/Entrada_popup.js"></script>
    <script src="../vista/js/bootstrap.min.js"></script>
    <script src="../vista/js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="../vista/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="../vista/js/funciones1.js"></script>
    <script src="../vista/js/sweetalert2.min.js"></script>
</body>

</html>