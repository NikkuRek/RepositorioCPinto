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
        <h1>Listado de Ventas  </h1>
    
    <hr>

    <div class="px-6 py-4">
                <div class="contenedor-entrada1 px-6 pt-5">
                <div class="caja_scroll">
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <tr>
                            <th>ID</th>
                            <th>N Pedido</th>
                            <th>Documento Cliente</th>
                            <th>Cant. Prendas</th>
                            <th>Precio U</th>
                            <th>Descripción</th>
                            <th>Descuento</th>
                            <th>Fecha_venta</th>
                            <th>Acciones</th>
                        </tr>
                        <?php foreach ($lista_venta as $venta){ ?>
                            <tr>
                                <td><?php echo $venta['id_venta']; ?></td>
                                <td><?php echo $venta['id_pedidoU']; ?></td>
                                <td><?php echo $venta['documento_cliente']; ?></td>
                                <td><?php echo $venta['cantidad_prendas']; ?></td>
                                <td><?php echo $venta['precio_unitario']; ?></td>
                                <td><?php echo $venta['descripcion']; ?></td>
                                <td><?php echo $venta['descuento']; ?></td>
                                <td><?php echo $venta['fecha_venta']; ?></td>
                                <td>
                                    <a href="venta_controlador.php?id=<?php echo $venta['id_venta'] ?>" class="btn btn-azul modal_abrir_modificar">
                                    <img src="../vista/img/pencil.png" alt="Modificar" width="16" height="16"></a>
                                  <a href="../controlador/venta_controlador.php?eliminarId=<?php echo $venta['id_venta'] ?>" class="btn btn-rojo">
                                     <img src="../vista/img/trash.png" alt="Eliminar" width=16 height=16></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class=""> 
                    <a href="#" class="btn btn-infox modal_abrir_agregar">
                        <img src="../vista/img/iconmas.png" alt="">
                        <div class="texto-contenedor-pagina">
                        <span class="texto-superior">Agregar Venta</span>                  
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <section class="modal_section" id = "modal_abrir_modificar">
                <div class="modal__contenedor">
    <hr>

    <div class="px-6 py-4">
                <div class="contenedor-entrada1 px-6 pt-5">
             
                <?php if(isset($_GET['id'])){ ?>
	                <h1 class="display-6"><b>Datos de la Venta</b></h1>
                <?php } else { ?>
	                <h1 class="display-6"><b>Agregar Venta</b></h1>
                <?php } ?>
                <form action="" method="POST">
                    <div id="f1" class="row col-md-4">
                        <?php if(isset($_GET['id'])){ ?>
                            <div class="col-md-12">
                                <label for=area>ID: </label>
                                <input type="text" id="id_venta" name="id_venta" value="<?php echo $id_venta; ?>" readonly class="form-control form-control-sm">
                            </div>
                        <?php } ?>
                        <div class="col-md-12">
                            <label for=area>Cliente: </label>
                            <input type="text" id="documentocliente" name="documentocliente" value="<?php echo $documentocliente; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12">
                            <label for=area>Cantidad: </label>
                            <input type="text" id="cantidadprendas" name="cantidadprendas" value="<?php echo $cantidadprendas; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12">
                            <label for=area>N° Pedido: </label>
                            <input type="text" id="idpedidoU" name="idpedidoU" value="<?php echo $idpedidoU; ?>" class="form-control form-control-sm">
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
                        <div class="col-md-12">
                            <label for=area>Fecha: </label>
                            <input type="text" id="fechaventa" name="fechaventa" value="<?php echo $fechaventa; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12"><br>
                            <center>
                                <?php if(!isset($_GET['id'])){ ?>
                                <input type="submit" value="Guardar" name="guardar" class="btn btn-info">
                                <input type="button" value="Limpiar" onclick="Limpiar();" class="btn btn-info">
                                <?php } else { ?>
                                <input type="submit" value="Modificar" name="modificar" class="btn btn-info">
                                <?php } ?> 
                                <input type="submit" value="Volver" Name ="Volver" class="btn btn-danger">
                            </center>
                        </div>
                    </div>
                </form>	
            </div>           
         </section>

        


		
	<!--</div>-->  

    <section class="modal_section" id= "modal_abrir_agregar">
                <div class="modal__contenedor">
                    
    <hr>
    <div class="px-6 py-4">
                <div class="contenedor-entrada1 px-6 pt-5">
             
                <?php if(isset($_GET['id'])){ ?>
	                <h1 class="display-6"><b>Datos de la Venta</b></h1>
                <?php } else { ?>
	                <h1 class="display-6"><b>Agregar Venta</b></h1>
                <?php } ?>
                <form action="" method="POST">
                    <div id="f1" class="row col-md-4">
                        <?php if(isset($_GET['id'])){ ?>
                            <div class="col-md-12">
                                <label for=area>ID: </label>
                                <input type="text" id="id_venta" name="id_venta" value="<?php echo $id_venta; ?>" readonly class="form-control form-control-sm">
                            </div>
                        <?php } ?>
                        <div class="col-md-12">
                            <label for=area>Cliente: </label>
                            <input type="text" id="documentocliente" name="documentocliente" value="<?php echo $documentocliente; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12">
                            <label for=area>Cantidad: </label>
                            <input type="text" id="cantidadprendas" name="cantidadprendas" value="<?php echo $cantidadprendas; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12">
                            <label for=area>N° Pedido: </label>
                            <input type="text" id="idpedidoU" name="idpedidoU" value="<?php echo $idpedidoU; ?>" class="form-control form-control-sm">
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
                        <div class="col-md-12">
                            <label for=area>Fecha: </label>
                            <input type="text" id="fechaventa" name="fechaventa" value="<?php echo $fechaventa; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12"><br>
                            <center>
                                <?php if(!isset($_GET['id'])){ ?>
                                <input type="submit" value="Guardar" name="guardar" class="btn btn-info">
                                <input type="button" value="Limpiar" onclick="Limpiar();" class="btn btn-info">
                                <?php } else { ?>
                                <input type="submit" value="Modificar" name="modificar" class="btn btn-info">
                                <?php } ?> 
                                <input type="submit" value="Volver" Name ="Volver" class="btn btn-danger">
                            </center>
                        </div>
                    </div>
                </form>	
            </div>         
         </section>
        <script src="../vista/js/sweetalert2.min.js"></script>
        <script src="../vista/js/Entrada_popup.js"></script>
	    <script src="../vista/js/bootstrap.min.js"></script>
        <script src="../vista/js/sweetalert2.min.js"></script>
	</body>

</html>