<?php
require_once("../modelo/conexionPDO.php");
// Llamada al modelo
require_once("../modelo/pedido_modelo.php");
$objpedido = new pedidoModelo();
$datos_combinados = $objpedido->DatosCombinados();
?>

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

        <?php
        if (isset($_POST['numero'])) {
            $seleccion = $_POST['numero'];
            switch ($seleccion) {
                case 0: ?>
                    <tbody>
                        <?php
                        foreach ($datos_combinados as $data) { ?>
                            <tr>
                                <?php if ($data['tipo'] == 'pedido') { ?>
                                    <td><?php echo $data['id_pedidoU']; ?></td>
                                    <td><?php echo $data['documento_cliente']; ?></td>
                                    <td><?php echo $data['nombre']; ?></td>
                                    <td><?php echo $data['precio']; ?></td>
                                    <td><?php echo $data['fecha_inicio']; ?></td>
                                    <td><?php echo $data['fecha_final']; ?></td>
                                    <td><?php echo $data['observacion']; ?></td>
                                    <td>
                                        <a href="../controlador/pedido_controlador.php?id=<?php echo $data['codigo_pedido']; ?>" class="btn btn-azul">
                                            <img src="../vista/img/pencil.png" alt="Modificar" width="16" height="16"></a>

                                        <a href="../controlador/pedido_controlador.php?eliminarId=<?php echo $data['codigo_pedido'] ?>" class="btn btn-rojo">
                                            <img src="../vista/img/trash.png" alt="Eliminar" width=16; height=16;></a>
                                    </td>

                                <?php } else if ($data['tipo'] == 'salida') { ?>

                                    <td><img src="../vista/img/exit copia.png" alt="Agregar Salida"></td>
                                    <td><?php echo $data['codigo_salida']; ?></td>
                                    <td><?php echo $data['nombre_prod']; ?></td>
                                    <td><?php echo $data['descripcion']; ?></td>
                                    <td>$<?php echo $data['precio'] * $data['cant_salida']; ?></td>
                                    <td><?php echo $data['cant_salida']; ?></td>
                                    <td><?php echo $data['fecha_salida']; ?></td>

                                    <td>
                                        <a href="../controlador/salidaForm_controlador.php?eliminarId=<?php echo $data['codigo_salida'] ?>" class="btn btn-rojo">
                                            <img src="../vista/img/trash.png" alt="Eliminar" width=16; height=16;></a>
                                    </td>

                                <?php } ?>
                            <?php } ?>
                            </form>
                            </td>
                            </tr>
                    </tbody>
                <?php exit();
                case 1: ?>
                    <tbody>
                        <?php
                        foreach ($datos_combinados as $data) { ?>
                            <tr>
                                <?php if ($data['tipo'] == 'pedido') { ?>
                                    <td><img src="../vista/img/enter copia.png" alt="Agregar pedido"></td>
                                    <td><?php echo $data['codigo_pedido']; ?></td>
                                    <td><?php echo $data['nombre_prod']; ?></td>
                                    <td><?php echo $data['descripcion']; ?></td>
                                    <td>$<?php echo $data['precio'] * $data['cantidad_pedido']; ?></td>
                                    <td><?php echo $data['cantidad_pedido']; ?></td>
                                    <td><?php echo $data['fecha_pedido']; ?></td>

                                    <td>
                                        <a href="../controlador/pedido_controlador.php?id=<?php echo $data['codigo_pedido']; ?>" class="btn btn-azul">
                                            <img src="../vista/img/pencil.png" alt="Modificar" width="16" height="16"></a>

                                        <a href="../controlador/pedido_controlador.php?eliminarId=<?php echo $data['codigo_pedido'] ?>" class="btn btn-rojo">
                                            <img src="../vista/img/trash.png" alt="Eliminar" width=16; height=16;></a>
                                    </td>

                                <?php } ?>
                            <?php } ?>
                            </form>
                            </td>
                            </tr>
                    </tbody>
                <?php exit();
                case 2: ?>
                    <tbody>

                        <?php
                        foreach ($datos_combinados as $data) { ?>
                            <tr>
                                <?php if ($data['tipo'] == 'salida') { ?>

                                    <td><img src="../vista/img/exit copia.png" alt="Agregar Salida"></td>
                                    <td><?php echo $data['codigo_salida']; ?></td>
                                    <td><?php echo $data['nombre_prod']; ?></td>
                                    <td><?php echo $data['descripcion']; ?></td>
                                    <td>$<?php echo $data['precio'] * $data['cant_salida']; ?></td>
                                    <td><?php echo $data['cant_salida']; ?></td>
                                    <td><?php echo $data['fecha_salida']; ?></td>

                                    <td>
                                        <a href="../controlador/salidaForm_controlador.php?eliminarId=<?php echo $data['codigo_salida'] ?>" class="btn btn-rojo">
                                            <img src="../vista/img/trash.png" alt="Eliminar" width=16; height=16;></a>
                                    </td>
                                <?php } ?>
                            <?php } ?>
                            </form>
                            </td>
                            </tr>
                    </tbody>
                    <?php exit(); ?>
            <?php } ?>
        <?php } ?>
</div>

<script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="js/funciones1.js"></script>
<script src="../vista/js/sweetalert2.min.js"></script>
</table>