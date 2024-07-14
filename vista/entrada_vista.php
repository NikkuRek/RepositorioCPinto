<!DOCTYPE html>
<html>
	<head>
		<title>Entrada - Inventario</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="../vista/css/estilos.css">
		<link rel="stylesheet" href="../vista/css/bootstrap.min.css">
        <link rel="stylesheet" href="../vista/css/sweetalert2.min.css">
	</head>
	<body>

		<div class="barra-lateral">
        	<?php menuLateralOpcion(); ?> 
        </div>

           
                <div class="contenido">
                <div class="ml-1">
                  <h1>
                 Transacciones
                 </h1>
                </div>
<hr>

                <div class="contenedor-entrada1 px-6 pt-5">
 <?php if(isset($_GET['id'])){ ?>
	                <h1 class="display-6"><b>Modificar entrada</b></h1>
                <?php } else { ?>
	                <h1 class="display-6"><b>Nueva entrada</b></h1>
                <?php } ?>
                
                
                <form id="entradaForm" action="" method="POST" target="_self">
                <div id="f1" class="row col-md-4">
                    <div class="col-md-12">
                    </div>
                    <div class="col-md-12">
                        <label for=titulo>ID de entrada:</label>
                        <input type="text" id="codigo_entrada" name="codigo_entrada" value= "<?php echo htmlspecialchars($codigo_entrada); ?>" readonly class="form-control form-control-sm">
                    </div>
                    <div class="col-md-12">
                        <label for=titulo>Fecha:</label>
                        <input type="text" id="fecha" name="fecha" value="<?php echo date("d-m-20y"); ?>" readonly class="form-control form-control-sm">
                    </div>
                    <div class="col-md-12">
                        <label for=titulo>Cantidad de productos:</label>
                        <input type="text" id="cantidad_entrada" name="cantidad_entrada" value="<?php echo $cantidad_entrada; ?>" class="form-control form-control-sm">
                    </div>
                    <div>

                    <br>
                    </div>
                    
                    <div class="col-md-12">
                        <label for=id_producto>ID de producto </label>
                        <input name="id_producto" id="id_producto" value="<?php echo $id_producto; ?>" class="form-control form-control-sm" readonly>
                    </div>


 <?php if(isset($_GET['id'])){ ?>
<br>
                <?php } else { ?>

                                        <div class="col-md-12">
                        <label for=id_producto>Nombre de producto </label>
                        <input name="nombre_producto" id="nombre_producto" value="<?php echo $nombre_prod; ?>" class="form-control form-control-sm" readonly>
                    </div>
                <?php } ?>


                    <div class="col-md-12"><br>
                        <center>
                        <div id="botones">      
                            <?php if(!isset($_GET['id'])){ ?>
                            <a href="#" class="btn btn-info modal_abrir">Buscar producto</a>
                            <input type="submit" value="Guardar" name="Guardar" class="btn btn-info">
                            <input type="reset" value="Limpiar" class="btn btn-warning">
                            <?php } else { ?>
                            <input type="submit" value="Modificar" name="modificar" class="btn btn-info">
                            <?php } ?> 
                            <input type="submit" value="Volver" name="Volver" class="btn btn-danger">
                        </div>
                        </center>
                    </div>
				</div>
                </form>
			</div>
		</div>


        


        <section class="modal_section">
                <div class="modal__contenedor">
                    <h2 class="modal_titulo">Buscar producto</h2>

                    <input type="text" id="buscar_producto" placeholder="Buscar producto...">
                    
                    <table id="tabla_producto">  
                    <tr>
                            <th>Selec</th>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                        </tr> 
                        <tbody>
                            <?php
                            foreach ($resultados as $data) {
                                echo "<tr>";
                                echo "<td><input type='radio' name='producto_seleccionado' value='" . $data['id_producto'] . "'></td>";
                                echo "<td>" . $data['id_producto'] . "</td>";
                                echo "<td>" . $data['nombre_prod'] . "</td>";
                                echo "<td>" . $data['descripcion'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>


                    <input type="submit" for value="Guardar" class="modal__agregar finalizar" id="modal_eproducto">
                    <input type="button" value="Cancelar" class=" modal__cerrar finalizar">
                </div>
         </section>
    

        <script src="../vista/js/sweetalert2.min.js"></script>
        <script src="../vista/js/Entrada_popup.js"></script>
	</body>
</html>		