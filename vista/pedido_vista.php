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

    <div class="division">
        <div class="barra-lateral">
            <?php menuLateralOpcion(); ?>
        </div>
<<<<<<< HEAD

        <div class="contenido">
            <div class="ml-1">
                <h1>Pedidos</h1>
            </div>
            <hr>
            <div class="px-6 py-4">
                <div class="contenedor-entrada1 px-6 pt-5">
                    <?php if (isset($_GET['id'])) { ?>
                        <h1 class="display-6"><b>Datos del Pedido</b></h1>
                    <?php } else { ?>
                        <h1 class="display-6"><b>Agregar Pedido</b></h1>
                    <?php } ?>

                    <!------------------------------------------------------------- Inicio del formulario ------------------------------------------------------->

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div id="f1" class="row col-md-4">

                            <div class="col-md-12">
                                <label for=area>ID: </label>
                                <input type="text" id="idpedidoU" name="idpedidoU" value="<?php echo htmlspecialchars($id_pedidoU); ?>" readonly class="form-control form-control-sm">
                            </div>

                            <div class="col-md-12">
                                <label for=area>Cliente: </label>
                                <select id="documentocliente" name="documentocliente" class="form-control form-control-sm">

                                    <option value="0">-- Seleccione --</option>

                                    <?php foreach ($lista_pedidou as $pedido) {
                                        $seleccionado = (isset($documentocliente) && $documentocliente == $pedido['documento_cliente']) ? "selected" : ""; ?>
                                        <option value="<?php echo $pedido['documento_cliente']; ?>" <?php echo $seleccionado; ?>>
                                            <?php echo $pedido['documento_cliente'], ' - ', $pedido['nombre']; ?>
                                        </option>
                                    <?php } ?>

                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for=area>Nombre del pedido: </label>
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

                            <div class="col-md-12">
                                <input type="checkbox" id="checkboxSuperior" name="mi_checkbox" value="si"> ¿Lleva prenda Inferior?
                            </div>

                            <div class="col-md-12">
                                <input type="checkbox" id="checkboxInferior" name="mi_checkbox" value="si"> ¿Lleva prenda Superior?
                            </div>

=======
        <hr>
        <div class="px-6 py-4">
        <div class="contenedor-entrada1 px-6 pt-5">
        <div id= "f1" class="contenedor-entrada1 px-6 pt-5">
            <?php foreach ($lista_pedidou1 as $pedidou){ ?>
                <div class="vista-tablon">
                    <div class="texto-contenedor">
                        <label class="texto-superior">Pedido
                            <?php echo $pedidou['id_pedidoU']; ?></label>
                        <label class="texto-superior">Nombre pedido: <br>
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
>>>>>>> de4a7b87e97764835d2b07c31a6ce63a69816cc5
                        </div>

                        <div class="col-md-12"><br>
                            <label class="form-label"> Seleccionar Imagen: </label>
                            <center>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                                
                                <?php if($imgpu != ""){?>
                                    <img src="../imgpedidos/<?php echo $imgpu; ?>" style="max-width: 500px; max-height: 300px;">
                                <?php } else { ?>
                                    <div id="prev-box">
                                        <label for=imagen class="btn" >
                                            <img id="preview" src="#" style="display: none; max-width: 500px; max-height: 400px;">
                                        </label>
                                    </div>
                                <?php } ?>
                            </center>
                        </div>

                        <hr>

                        <!------------------------------------------------------------- desplegable de prenda inferior ------------------------------------------------------->

                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button" id="btnInferior" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Detalles de Prenda Inferior
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="card-body">

                                        <?php if (isset($_GET['id'])) { ?>
                                            <h1 class="display-6"><b>Datos de la Prenda Inferior</b></h1>
                                        <?php } else { ?>
                                            <h1 class="display-6"><b>Agregar Prenda Inferior</b></h1>
                                        <?php } ?>
<<<<<<< HEAD

                                        <div id="f1" class="row col-md-4">
                                            <?php if (isset($_GET['id'])) { ?>

                                                <div class="col-md-12">
                                                    <label for=area>ID: </label>
                                                    <input type="text" id="idprendain" name="idprendain" value="<?php echo $idprendain; ?>" readonly class="form-control form-control-sm">
                                                </div>
                                            <?php } else { ?>
                                                <input type="text" id="idprendain" name="idprendain" value="<?php echo $id_prendain; ?>" hidden class="form-control form-control-sm">
                                            <?php } ?>

                                            <div class="col-md-12">
                                                <label for=area>Pedido: </label>
                                                <input type="text" id="idpedidoU" name="idpedidoU" value="<?php echo htmlspecialchars($id_pedidoU); ?>" readonly class="form-control form-control-sm">
                                            </div>

                                            <div class="col-md-12">
                                                <label for="idtela">Tela: </label>
                                                <select id="idtela" name="idtela" class="form-control form-control-sm">
                                                    <option value="0">-- Seleccione --</option>
                                                    <?php foreach ($tablas_auxi['tela'] as $tela) { ?>
                                                        <option value="<?php echo $tela['id_tela']; ?>" <?php echo (isset($_GET['id']) && $idtela == $tela['id_tela']) ? "selected" : ""; ?>>
                                                            <?php echo $tela['id_tela'], ' - ', $tela['tipo_tela']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="idcostados">Costados: </label>
                                                <select id="idcostados" name="idcostados" class="form-control form-control-sm">
                                                    <option value="0">-- Seleccione --</option>
                                                    <?php foreach ($tablas_auxi['costados'] as $costado) { ?>
                                                        <option value="<?php echo $costado['id_costados']; ?>" <?php echo (isset($_GET['id']) && $idcostados == $costado['id_costados']) ? "selected" : ""; ?>>
                                                            <?php echo $costado['id_costados'], ' - ', $costado['tipo_costados']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="idtipoprod">Tipo de producto: </label>
                                                <select id="idtipoprod" name="idtipoprod" class="form-control form-control-sm">
                                                    <option value="0">-- Seleccione --</option>
                                                    <?php foreach ($tablas_auxi['tipo_producto'] as $tipoprod) { ?>
                                                        <option value="<?php echo $tipoprod['id_tipoprod']; ?>" <?php echo (isset($_GET['id']) && $idtipoprod == $tipoprod['id_tipoprod']) ? "selected" : ""; ?>>
                                                            <?php echo $tipoprod['id_tipoprod'], ' - ', $tipoprod['nombre_tipoprod']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="idprotector">Tipo de protector: </label>
                                                <select id="idprotector" name="idprotector" class="form-control form-control-sm">
                                                    <option value="0">-- Seleccione --</option>
                                                    <?php foreach ($tablas_auxi['protector'] as $protector) { ?>
                                                        <option value="<?php echo $protector['id_protector']; ?>" <?php echo (isset($_GET['id']) && $idprotector == $protector['id_protector']) ? "selected" : ""; ?>>
                                                            <?php echo $protector['id_protector'], ' - ', $protector['tipo_protector']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="idtipopi">Tipo de Prenda Inferior: </label>
                                                <select id="idtipopi" name="idtipopi" class="form-control form-control-sm">
                                                    <option value="0">-- Seleccione --</option>
                                                    <?php foreach ($tablas_auxi['tipo_pi'] as $tipopi) { ?>
                                                        <option value="<?php echo $tipopi['id_tipoPI']; ?>" <?php echo (isset($_GET['id']) && $idtipopi == $tipopi['id_tipoPI']) ? "selected" : ""; ?>>
                                                            <?php echo $tipopi['id_tipoPI'], ' - ', $tipopi['nombre_tipoPI']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
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

                                            <!--Tallas Prenda inferior-->

                                            <div class="col-md-12">
                                                <label for="idtalla">Seleccione Talla: </label>
                                                <select id="idtallapi" name="idtallapi" class="form-control form-control-sm">
                                                    <option value="0">-- Seleccione --</option>
                                                    <?php foreach ($tablas_auxi['talla'] as $tallap) { ?>
                                                        <option value="<?php echo $tallap['id_talla']; ?>" <?php echo (isset($_GET['id']) && $idtalla == $tallap['id_talla']) ? "selected" : ""; ?>>
                                                            <?php echo $tallap['id_talla'], ' - ', $tallap['talla'], ' - ', $tallap['genero']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-12">
                                                <label for=area>Cantidad: </label>
                                                <input type="text" id="cantidad" name="cantidad" value="<?php echo $cantidad; ?>" class="form-control form-control-sm">
                                            </div>

                                            <div class="col-md-20">
                                                <label for=area>Tallas a agregar: </label>
                                                <div class="col-md-20" id="contenedorInputs"></div>
                                            </div>


                                            <div class="col-md-12">
                                                <button type="button" id="agregarInput" class="btn btn-info">Agregar Talla</button>
                                            </div>
                                            </div>
                                            
                                            <?php if (isset($_GET['id'])) { ?>
                                            <div class="col-md-12">
                                        <table class="table table-striped table-bordered table-hover table-sm">
                                            
                                             <tr>
                                                <th>ID Talla</th>
                                                <th>Cantidad</th>
                                             </tr>
                                                <?php foreach ($todosLosRegistros as $registros) { ?>

                                               <tr>
                                                <td> <?php echo $registros['nombre_talla'], ' - ', $registros['nombre_genero']?> </td>
                                                <td> <?php echo $registros['cantidad']?></td>
                                                <td></td>
                                               </tr>
                                                <?php } }?>
                                        </table>
                                                

                                            <!--FIN Tallas Prenda inferior-->

                                        </div>

                                    </div>
                                </div>


                                <!------------------------------------------------------------- desplegable de prenda superior ------------------------------------------------------->

                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" id="btnSuperior" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Detalles de Prenda Superior
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php if (isset($_GET['id'])) { ?>
                                                <h1 class="display-6"><b>Datos de la Prenda Superior</b></h1>
                                            <?php } else { ?>
                                                <h1 class="display-6"><b>Agregar Prenda Superior</b></h1>
                                            <?php } ?>
                                            <form action="" method="POST">
                                                <div id="f1" class="row col-md-4">
                                                    <?php if (isset($_GET['id'])) { ?>
                                                        <div class="col-md-12">
                                                            <label for=area>ID: </label>
                                                            <input type="text" id="idprendasu" name="idprendasu" value="<?php echo $idprendasu; ?>" readonly class="form-control form-control-sm">
                                                        </div>
                                                        <?php } else { ?>
                                                <input type="text" id="idprendasu" name="idprendasu" value="<?php echo $id_prendasu; ?>" hidden class="form-control form-control-sm">
                                            <?php } ?>

                                                    <div class="col-md-12">
                                                        <label for="idtelasu">Tela: </label>
                                                        <select id="idtelasu" name="idtelasu" class="form-control form-control-sm">
                                                            <option value="0">-- Seleccione --</option>
                                                            <?php foreach ($tablas_auxia['tela'] as $tela) { ?>
                                                                <option value="<?php echo $tela['id_tela']; ?>" <?php echo (isset($_GET['id']) && $idtelasu == $tela['id_tela']) ? "selected" : ""; ?>>
                                                                    <?php echo $tela['id_tela'], ' – ', $tela['tipo_tela']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="idcostadossu">Costados: </label>
                                                        <select id="idcostadossu" name="idcostadossu" class="form-control form-control-sm">
                                                            <option value="0">-- Seleccione --</option>
                                                            <?php foreach ($tablas_auxia['costados'] as $costado) { ?>
                                                                <option value="<?php echo $costado['id_costados']; ?>" <?php echo (isset($_GET['id']) && $idcostados == $costado['id_costados']) ? "selected" : ""; ?>>
                                                                    <?php echo $costado['id_costados'], ' – ', $costado['tipo_costados']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="idmangasu">Manga: </label>
                                                        <select id="idmangasu" name="idmangasu" class="form-control form-control-sm">
                                                            <option value="0">-- Seleccione --</option>
                                                            <?php foreach ($tablas_auxia['manga'] as $manga) { ?>
                                                                <option value="<?php echo $manga['id_manga']; ?>" <?php echo (isset($_GET['id']) && $idmanga == $manga['id_manga']) ? "selected" : ""; ?>>
                                                                    <?php echo $manga['id_manga'], ' – ', $manga['tipo_manga']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="idtelaman">Tela de la Manga: </label>
                                                        <select id="idtelaman" name="idtelaman" class="form-control form-control-sm">
                                                            <option value="0">-- Seleccione --</option>
                                                            <?php foreach ($tablas_auxia['tela'] as $tela) { ?>
                                                                <option value="<?php echo $tela['id_tela']; ?>" <?php echo (isset($_GET['id']) && $telamanga == $tela['id_tela']) ? "selected" : ""; ?>>
                                                                    <?php echo $tela['id_tela'], ' – ', $tela['tipo_tela']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>



                                                    <div class="col-md-12">
                                                        <label for="idcorteman">Corte de la Manga: </label>
                                                        <select id="idcorteman" name="idcorteman" class="form-control form-control-sm">
                                                            <option value="0">-- Seleccione --</option>
                                                            <?php foreach ($tablas_auxia['corte_manga'] as $corte_manga) { ?>
                                                                <option value="<?php echo $corte_manga['id_cortemanga']; ?>" <?php echo (isset($_GET['id']) && $idcortemanga == $corte_manga['id_cortemanga']) ? "selected" : ""; ?>>
                                                                    <?php echo $corte_manga['id_cortemanga'], ' – ', $corte_manga['tipo_cortemanga']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <label for="idcuello">Cuello: </label>
                                                        <select id="idcuello" name="idcuello" class="form-control form-control-sm">
                                                            <option value="0">-- Seleccione --</option>
                                                            <?php foreach ($tablas_auxia['cuello'] as $cuello) { ?>
                                                                <option value="<?php echo $cuello['id_cuello']; ?>" <?php echo (isset($_GET['id']) && $idcuello == $cuello['id_cuello']) ? "selected" : ""; ?>>
                                                                    <?php echo $cuello['id_cuello'], ' – ', $cuello['tipo_cuello']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <label for="idcierre">Cierre: </label>
                                                        <select id="idcierre" name="idcierre" class="form-control form-control-sm">
                                                            <option value="0">-- Seleccione --</option>
                                                            <?php foreach ($tablas_auxia['cierre'] as $cierre) { ?>
                                                                <option value="<?php echo $cierre['id_cierre']; ?>" <?php echo (isset($_GET['id']) && $idcierre == $cierre['id_cierre']) ? "selected" : ""; ?>>
                                                                    <?php echo $cierre['id_cierre'], ' – ', $cierre['tipo_cierre']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="idtipops">Tipo Prenda Superior: </label>
                                                        <select id="idtipops" name="idtipops" class="form-control form-control-sm">
                                                            <option value="0">-- Seleccione --</option>
                                                            <?php foreach ($tablas_auxia['tipo_ps'] as $tipo_ps) { ?>
                                                                <option value="<?php echo $tipo_ps['id_tipoPS']; ?>" <?php echo (isset($_GET['id']) && $idtipoPS == $tipo_ps['id_tipoPS']) ? "selected" : ""; ?>>
                                                                    <?php echo $tipo_ps['id_tipoPS'], ' – ', $tipo_ps['nombre_tipoPS']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="tipoprodsu">Tipo de Producto: </label>
                                                        <select id="tipoprodsu" name="tipoprodsu" class="form-control form-control-sm">
                                                            <option value="0">-- Seleccione --</option>
                                                            <?php foreach ($tablas_auxia['tipo_producto'] as $tipo_produ) { ?>
                                                                <option value="<?php echo $tipo_produ['id_tipoprod']; ?>" <?php echo (isset($_GET['id']) && $idtipoprod == $tipo_produ['id_tipoprod']) ? "selected" : ""; ?>>
                                                                    <?php echo $tipo_produ['id_tipoprod'], ' – ', $tipo_produ['nombre_tipoprod']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for=area>Observaciones: </label>
                                                        <input type="text" id="obserps" name="obserps" value="<?php echo $obserps; ?>" class="form-control form-control-sm">
                                                    </div>

                                                     
                                            <div class="col-md-12">
                                                <label for="idtallasu">Seleccione Talla: </label>
                                                <select id="idtallasu" name="idtallasu" class="form-control form-control-sm">
                                                    <option value="0">-- Seleccione --</option>
                                                    <?php foreach ($tablas_auxia['talla'] as $tallaps) { ?>
                                                        <option value="<?php echo $tallaps['id_talla']; ?>" <?php echo (isset($_GET['id']) && $idtallasu == $tallaps['id_talla']) ? "selected" : ""; ?>>
                                                            <?php echo $tallaps['id_talla'], ' - ', $tallaps['talla'], ' - ', $tallaps['genero']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-12">
                                                <label for=area>Cantidad: </label>
                                                <input type="text" id="cantidadsu" name="cantidadsu" value="<?php echo $cantidadsu; ?>" class="form-control form-control-sm">
                                            </div>

                                            <div class="col-md-20">
                                                <label for=area>Tallas a agregar: </label>
                                                <div class="col-md-20" id="contenedorInputs2"></div>
                                            </div>


                                            <div class="col-md-12">
                                                <button type="button" id="agregarInput2" class="btn btn-info">Agregar Talla</button>
                                            </div>




                                                </div>
=======
                                        <div class="col-md-12">
                                            <label for=area>Cliente: </label>
                                            <select id="documentocliente" name="documentocliente" class="form-control form-control-sm">
                                <option value="0">-- Seleccione --</option>
                                <?php foreach ($lista_pedidou as $pedido){
                                    $seleccionado = ""; if( isset($_GET['id']) and $idpedidoU == $pedido['documento_cliente'] ) $seleccionado = "selected"; ?>
                                    <option value="<?php echo $pedido['documento_cliente']; ?>"<?php echo $seleccionado; ?>>
                                    
                                    <?php echo $pedido['documento_cliente'], ' - ', $pedido['nombre']  ?></option>
                                <?php } ?>
                            </select>
                                </div>
                                        <div class="col-md-12">
                                            <label for=area>Nombre: </label>
                                            <input type="text" id="nombrepedidou" name="nombrepedidou" value="<?php echo $nombrepedidou; ?>" class="form-control form-control-sm">
>>>>>>> de4a7b87e97764835d2b07c31a6ce63a69816cc5
                                        </div>

                                        <?php if (isset($_GET['id'])) { ?>
                                        <div class="col-md-12">
<<<<<<< HEAD
                                        <table class="table table-striped table-bordered table-hover table-sm">
                                            
                                             <tr>
                                                <th>ID Talla</th>
                                                <th>Cantidad</th>
                                             </tr>
                                                <?php foreach ($todosLosRegistros2 as $registrosu) { ?>

                                               <tr>
                                                <td> <?php echo $registrosu['nombre_talla'], ' - ', $registrosu['nombre_genero']?> </td>
                                                <td> <?php echo $registrosu['cantidad']?></td>
                                                <td></td>
                                               </tr>
                                                <?php }} ?>
                                        </table>
                                                
                                    </div>
                                    <div class="col-md-12" style="grid-column: 2;"><br>
                                        <center>
                                            <?php if (!isset($_GET['id'])) { ?>
=======
                                            <label for=area>Precio: </label>
                                            <input type="text" id="preciopu" name="preciopu" value="<?php echo $preciopu; ?>" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-12">
                                            <label for=area>Fecha Inicio: </label>
                                            <input type="date" id="fechai" name="fechai" value="<?php echo $fechai; ?>" class="form-control form-control-sm">
                                        </div>           
                                        <div class="col-md-12">
                                            <label for=area>Fecha Fin: </label>
                                            <input type="date" id="fechaf" name="fechaf" value="<?php echo $fechaf; ?>" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-12">
                                            <label for=area>Observaciones: </label>
                                            <input type="text" id="obserpu" name="obserpu" value="<?php echo $obserpu; ?>" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-12"><br>
                                            <center>
                                                <?php if(!isset($_GET['id'])){ ?>
>>>>>>> de4a7b87e97764835d2b07c31a6ce63a69816cc5
                                                <input type="submit" value="Guardar" name="guardar" class="btn btn-info">
                                                <input type="button" value="Limpiar" onclick="Limpiar();" class="btn btn-info">
                                            <?php } else { ?>
                                                <input type="submit" value="Modificar" name="modificar" class="btn btn-info">
<<<<<<< HEAD
                                            <?php } ?>

                                            <input type="submit" value="Volver" Name="Volver" class="btn btn-danger">
                                        </center>
                                    </div>
                                </div>
=======
                                                <?php } ?> 
                                                <label for="btn-add" class="btn btn-danger"> Volver </label>           
                                            </center> 
                                        </div>
                                        <!--<div class="col-md-12">
                                            <div> 
                                                <label for="btn-add3" class="btn btn-infox modal_abrir_agregar">
                                                    <img src="../vista/img/iconmas.png" alt="">
                                                    <div class="texto-contenedor-pagina">
                                                        <a href="../controlador/prendasuperior_controlador.php" class="texto-superior">Agregar Prenda Superior </a>           
                                                    </div>
                                                </label>
                                            </div>   
                                        </div>  

                                        <div class="col-md-12">
                                            <div> 
                                                <label for="btn-add3" class="btn btn-infox modal_abrir_agregar">
                                                    <img src="../vista/img/iconmas.png" alt="">
                                                    <div class="texto-contenedor-pagina">
                                                         <a href="../controlador/prendainferior_controlador.php" class="texto-superior">Agregar Prenda Inferior </a>              
                                                    </div>
                                                </label>
                                            </div>   
                                        </div> -->  
                                </form>
>>>>>>> de4a7b87e97764835d2b07c31a6ce63a69816cc5
                            </div>
                    </form>

                    <!------------------------------------------------------------- Fin del formulario ------------------------------------------------------->
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
=======
</div>


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
                        <?php foreach ($lista_pedidou1 as $pedidou){ ?>
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
                </div>

                </div>

                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
        </div>
        

        <?php if(isset($_GET['id'])){ ?>
        <!-- Pop-up -->
<div class="mod">
    <input type="checkbox" id="btn-mod" class="Check" checked>     

<div class="back"></div>    

<div class="container-mod">
    <div class="cont-mod">
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
    <?php } ?>
>>>>>>> de4a7b87e97764835d2b07c31a6ce63a69816cc5

    <script src="bootstrap.min.js"></script>

	
    <script type="text/javascript" src="../vista/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="../vista/js/funciones1.js"></script>
    <script src="../vista/js/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>