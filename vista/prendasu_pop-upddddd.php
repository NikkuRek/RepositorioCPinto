<!-- Pop-up -->
<div class="add2">
<input type="checkbox" id="btn-add2" class="Check">
<div> 
    <label for="btn-add2" class="btn btn-infox modal_abrir_agregar">
        <img src="../vista/img/iconmas.png" alt="">
        <div class="texto-contenedor-pagina">
            <span class="texto-superior">Agregar Prenda Superior</span>                  
        </div>
    </label>
</div>       

<div class="container-add2">
    <div class="cont-add2">
        <div class="px-6 py-4">
            
                <?php if(isset($_GET['id'])){ ?>
                    <h1 class="display-6"><b>Datos de la Prenda Superior</b></h1>
                <?php } else { ?>
                    <h1 class="display-6"><b>Agregar Prenda Superior</b></h1>
                <?php } ?>
                <form action="" method="POST">
                    <div id="f1" class="row col-md-4">
                        <?php if(isset($_GET['id'])){ ?>
                            <div class="col-md-12">
                                <label for=area>ID: </label>
                                <input type="text" id="idprendasu" name="idprendasu" value="<?php echo $idprendasu; ?>" readonly class="form-control form-control-sm">
                            </div>
                        <?php } ?>
                        <div class="col-md-12">
                            <label for=area>Tela: </label>
                            <input type="text" id="tela" name="tela" value="<?php echo $tela; ?>" class="form-control form-control-sm">
                        </div>

                        <div class="col-md-12">
                            <label for=area>Costados: </label>
                            <input type="text" id="costados" name="costados" value="<?php echo $costados; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12">
                            <label for=area>Manga: </label>
                            <input type="text" id="manga" name="manga" value="<?php echo $manga; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12">
                            <label for=area>Tipo de Prenda Superior: </label>
                            <input type="text" id="tipops" name="tipops" value="<?php echo $tipops; ?>" class="form-control form-control-sm">
                        </div>          
                        <div class="col-md-12">
                            <label for=area>Tela de la Manga: </label>
                            <input type="text" id="telaman" name="telaman" value="<?php echo $telaman; ?>" class="form-control form-control-sm">
                        </div>           
                        <div class="col-md-12">
                            <label for=area>Corte de la Manga: </label>
                            <input type="text" id="corteman" name="corteman" value="<?php echo $corteman; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12">
                            <label for=area>Cuello: </label>
                            <input type="text" id="cuello" name="cuello" value="<?php echo $cuello; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12">
                            <label for=area>Cierre: </label>
                            <input type="text" id="cierre" name="cierre" value="<?php echo $cierre; ?>" class="form-control form-control-sm">
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
                        </div>
                        <div class="col-md-12"><br>
                            <center>
                                <?php if(!isset($_GET['id'])){ ?>
                                <input type="submit" value="Guardar" name="guardar" class="btn btn-info">
                                <input type="button" value="Limpiar" onclick="Limpiar();" class="btn btn-info">
                                <?php } else { ?>
                                <input type="submit" value="Modificar" name="modificar" class="btn btn-info">
                                <?php } ?> 
                                <label for="btn-add2" class="btn btn-danger"> Volver </label>
                            </center>
                        </div>
                    </div>
                </form>
            
        </div>
    </div>
</div>
<!-- Pop-up -->