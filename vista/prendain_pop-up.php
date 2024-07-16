<!-- Pop-up -->
<div class="add3">
<input type="checkbox" id="btn-add3" class="Check">
<div> 
    <label for="btn-add3" class="btn btn-infox modal_abrir_agregar">
        <img src="../vista/img/iconmas.png" alt="">
        <div class="texto-contenedor-pagina">
            <span class="texto-superior">Agregar Prenda Inferior</span>                  
        </div>
    </label>
</div>       

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
                            <input type="text" id="tipopi" name="tipopi" value="<?php echo $tipopi; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12">
                            <label for=area>Protector: </label>
                            <input type="text" id="protector" name="protector" value="<?php echo $protector; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12">
                            <label for=area>Tipo de Prenda Inferior: </label>
                            <input type="text" id="tipopi" name="tipopi" value="<?php echo $tipopi; ?>" class="form-control form-control-sm">
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
                            <input type="text" id="obser" name="obser" value="<?php echo $obser; ?>" class="form-control form-control-sm">
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
                                <label for="btn-add3" class="btn btn-danger"> Volver </label>
                            </center>
                        </div>
                    </div>
                </form>
            
        </div>
    </div>
</div>
<!-- Pop-up -->