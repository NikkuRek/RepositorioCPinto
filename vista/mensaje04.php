
<?php
   require_once("../modelo/conexionPDO.php"); 
   	// Llamada al modelo
	require_once("../modelo/transaccion_modelo.php");
	$objTransaccion = new TransaccionModelo();
	$datos_combinados = $objTransaccion -> DatosCombinados();
?>

<div class="caja_scroll">
<table class="table table-striped table-bordered table-hover table-sm">
        <tr>
            <th>E/S</th>
            <th>Id</th>
            <th>Producto</th>
            <th>Detalles</th>
            <th>Total</th>
            <th>Cantidades</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>

        <?php 
if(isset($_POST['numero'])) {
        $seleccion = $_POST['numero'];
        switch($seleccion) {
            case 0:?>
        <tbody>
           <?php
            foreach ($datos_combinados as $data) { ?>
                <tr>
                <?php if ($data['tipo'] == 'entrada') {?>
                    <td><img src="../vista/img/enter copia.png" alt="Agregar Entrada"></td>
                    <td><?php echo $data['codigo_entrada']; ?></td>
                    <td><?php echo $data['nombre_prod']; ?></td>
                    <td><?php echo $data['descripcion']; ?></td>
                    <td>$<?php echo $data['precio'] * $data['cantidad_entrada']; ?></td>
                    <td><?php echo $data['cantidad_entrada']; ?></td>
                    <td><?php echo $data['fecha_entrada']; ?></td>
            
                    <td>
                    <a href="../controlador/entrada_controlador.php?id=<?php echo $data['codigo_entrada']; ?>" class="btn btn-azul">
                    <img src="../vista/img/pencil.png" alt="Modificar" width="16" height="16"></a>
                    
                    <a href="../controlador/entrada_controlador.php?eliminarId=<?php echo $data['codigo_entrada'] ?>" class="btn btn-rojo">
                    <img src="../vista/img/trash.png" alt="Eliminar" width=16; height=16;></a>
                    </td>
                
                <?php }else if ($data['tipo'] == 'salida'){?>

                    <td><img src="../vista/img/exit copia.png" alt="Agregar Salida"></td>
                    <td><?php echo $data['codigo_salida']; ?></td>
                    <td><?php echo $data['nombre_prod']; ?></td>
                    <td><?php echo $data['descripcion']; ?></td>
                    <td>$<?php echo $data['precio']* $data['cant_salida']; ?></td>
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
                     <?php if ($data['tipo'] == 'entrada') {?>
                         <td><img src="../vista/img/enter copia.png" alt="Agregar Entrada"></td>
                         <td><?php echo $data['codigo_entrada']; ?></td>
                         <td><?php echo $data['nombre_prod']; ?></td>
                         <td><?php echo $data['descripcion']; ?></td>
                         <td>$<?php echo $data['precio'] * $data['cantidad_entrada']; ?></td>
                         <td><?php echo $data['cantidad_entrada']; ?></td>
                         <td><?php echo $data['fecha_entrada']; ?></td>
                     
                         <td>
                            <a href="../controlador/entrada_controlador.php?id=<?php echo $data['codigo_entrada']; ?>" class="btn btn-azul">
                            <img src="../vista/img/pencil.png" alt="Modificar" width="16" height="16"></a>
                    
                            <a href="../controlador/entrada_controlador.php?eliminarId=<?php echo $data['codigo_entrada'] ?>" class="btn btn-rojo">
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
                    <?php if ($data['tipo'] == 'salida'){?>

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
                 <?php exit();?>
                <?php } ?> 
                <?php } ?>
</div>

<script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
	<script type="text/javascript" src="js/funciones1.js"></script>	 
    <script src="../vista/js/sweetalert2.min.js"></script> 
</table>