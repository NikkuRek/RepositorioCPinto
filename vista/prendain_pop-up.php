
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

            <!-- Pop-up -->
    <div class="add3">
    <input type="checkbox" id="btn-add3" class="Check" checked>
            

    <div class="container-add3">
        <div class="cont-add3">
            <div class="px-6 py-4">
                
                    <?php if(isset($_GET['id'])){ ?>
                        <h1 class="display-6"><b>Datos de la Prenda Inferior</b></h1>
                    <?php } else { ?>
                        <h1 class="display-6"><b>Agregar Prenda Inferior</b></h1>
                    <?php } ?>
                    <form action="" method="POST">
                        <div id="f1" class="row col-md-4">
                            <?php if(isset($_GET['id'])){ ?>
                                <div class="col-md-12">
                                    <label for=area>ID: </label>
                                    <input type="text" id="idprendain" name="idprendain" value="<?php echo $idprendain; ?>" readonly class="form-control form-control-sm">
                                </div>
                            <?php } ?>
                            <div class="col-md-12">
                                <label for=area>Pedido: </label>
                                <input type="text" id="idpedidoU" name="idpedidoU" value="<?php echo $idpedidoU; ?>" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-12">
                                <label for=area>Tela: </label> 
                                <input type="text" id="idtela" name="idtela" value="<?php echo $idtela; ?>" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-12">
                                <label for=area>Costados: </label>
                                <input type="text" id="idcostados" name="idcostados" value="<?php echo $idcostados; ?>" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-12">
                                <label for=area>Tipo de producto: </label>
                                <input type="text" id="idtipoprod" name="idtipoprod" value="<?php echo $idtipoprod; ?>" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-12">
                                <label for=area>Tipo de protector: </label>
                                <input type="text" id="idprotector" name="idprotector" value="<?php echo $idprotector; ?>" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-12">
                                <label for=area>Tipo de Prenda Inperior: </label>
                                <input type="text" id="idtipopi" name="idtipopi" value="<?php echo $idtipopi; ?>" class="form-control form-control-sm">
                            </div> 
                            <div class="col-md-12">
                                <label for=area>Color: </label>
                                <input type="text" id="color" name="color" value="<?php echo $color; ?>" class="form-control form-control-sm">
                            </div>          
                            <div class="col-md-12">
                                <label for=area>Tapa Trasera: </label>
                                <input type="text" id="tapatra" name="tapatra" value="<?php echo $tapatra; ?>" class="form-control form-control-sm">
                            </div>           
                            <div class="col-md-12">
                                <label for=area>Tirante: </label>
                                <input type="text" id="tirante" name="tirante" value="<?php echo $tirante; ?>" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-12">
                                <label for=area>Observaciones: </label>
                                <input type="text" id="obserpi" name="obserpi" value="<?php echo $obserpi; ?>" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-12"><br>
                                <center>
                                    <input type="file" id="imagen" name="imagen" style="display: none;">
                                    <label for="imagen" class="btn btn-info">Subir Imagen</label>
                                </center>
                            </div>
                            <div class="col-md-12"><br>
                                <center>
                                    <?php if(!isset($_GET['id'])){ ?>
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
    <!-- Pop-up -->

                </div>
            </div>
        </div>
        
    <script type="text/javascript" src="../vista/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="../vista/js/funciones1.js"></script>	
    <script src="../vista/js/sweetalert2.min.js"></script>
    </body>
</html>