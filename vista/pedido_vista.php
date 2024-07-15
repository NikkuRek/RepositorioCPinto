
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
            <h1>Pedidos</h1>
        </div>
        <hr>
        <div class="px-6 py-4">
        <div class="contenedor-entrada1 px-6 pt-5">
        <div id= "f1" class="contenedor-entrada1 px-6 pt-5">
            <?php foreach ($lista_pedidou as $pedidou){ ?>
                <div class="vista-tablon">
                    <div class="texto-contenedor">
                        <label class="texto-superior">Pedido
                            <?php echo $pedidou['id_pedidoU']; ?></label>
                        <label class="texto-superior">Cliente: <br>
                            <?php echo $pedidou['nombre']; ?></label>
                        <label class="texto-superior">Fecha Limite: <br>
                            <?php echo $pedidou['fecha_final']; ?></label>
                        <input type="submit" value="Ver pedido" name="verpedido" class="btn btn-info texto-superior">
                     </div>         
                </div> 
            <?php } ?>
               
        </div>
            <!-- Pop-up -->
            <div class="add">
                <input type="checkbox" id="btn-add" class="Check">
                <div> 
                    <label for="btn-add" class="btn btn-infox modal_abrir_agregar">
                        <img src="../vista/img/iconmas.png" alt="">
                        <div class="texto-contenedor-pagina">
                            <span class="texto-superior">Agregar pedido</span>                  
                        </div>
                    </label>
                </div>

                <div class="back"></div>        
    
                <div class="container-add">
                    <div class="cont-add">
                        <div class="px-6 py-4">
                            <div class="contenedor-entrada1 px-6 pt-5">
                                <?php if(isset($_GET['id'])){ ?>
                                    <h1 class="display-6"><b>Datos del Pedido</b></h1>
                                <?php } else { ?>
                                    <h1 class="display-6"><b>Agregar Pedido</b></h1>
                                <?php } ?>
                                <form action="" method="POST">
                                    <div id="f1" class="row col-md-4">
                                        <?php if(isset($_GET['id'])){ ?>
                                            <div class="col-md-12">
                                                <label for=area>ID: </label>
                                                <input type="text" id="idpedidoU" name="idpedidoU" value="<?php echo $idpedidoU; ?>" readonly class="form-control form-control-sm">
                                            </div>
                                        <?php } ?>
                                        <div class="col-md-12">
                                            <label for=area>Cliente: </label>
                                            <input type="text" id="documentocliente" name="documentocliente" value="<?php echo $documentocliente; ?>" class="form-control form-control-sm">
                                        </div>

                                        <div class="col-md-12">
                                            <label for=area>N° Pedido: </label>
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
                                                <?php if(!isset($_GET['id'])){ ?>
                                                <input type="submit" value="Guardar" name="guardar" class="btn btn-info">
                                                <input type="button" value="Limpiar" onclick="Limpiar();" class="btn btn-info">
                                                <?php } else { ?>
                                                <input type="submit" value="Modificar" name="modificar" class="btn btn-info">
                                                <?php } ?> 
                                                <label for="btn-add" class="btn btn-danger"> Volver </label>           
                                            </center>
                                        </div>
                                        <div class="col-md-12">
                                            <?php include ("prendasu_pop-up.php") ?>
                                        </div>
                                    </div>

                                        <div class="col-md-12">
                                            <?php include ("prendain_pop-up.php") ?>
                                        </div>  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Pop-up -->							
            </div>
        </div>
    </div>
</div>
        
    <script type="text/javascript" src="../vista/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="../vista/js/funciones1.js"></script>	
    <script src="../vista/js/sweetalert2.min.js"></script>
    </body>
</html>



