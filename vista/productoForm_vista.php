<!DOCTYPE html>
<html>
	<head>
		<title>Producto - Inventario</title>
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
        <h1>
        Lista de Productos
        </h1>
    </div>

    <hr>

    <div class="px-6 py-4">
        <div class="contenedor-entrada1 px-6 pt-5">
            	<?php if(isset($_GET['id'])){ ?>
	                <h1 class="display-6"><b>Datos de Producto</b></h1>
                <?php } else { ?>
	                <h1 class="display-6"><b>Agregar Producto</b></h1>
                <?php } ?>
                
                <form action="" method="POST">
                    <div id="f1" class="row col-md-4">
                        <div class="col-md-12">
                            <label for=titulo>Cantidad Disponible:</label>
                            <input type="text" id="cantidaddisp" name="cantidaddisp" value="<?php echo $cantidaddisp; ?>" readonly class="form-control form-control-sm">
                        </div>
                        <?php if(isset($_GET['id'])){ ?>
                            <div class="col-md-12">
                                <label for=area>ID: </label>
                                <input type="text" id="idproducto" name="idproducto" value="<?php echo $idproducto; ?>" readonly class="form-control form-control-sm">
                            </div>
                        <?php } ?>
                        <div class="col-md-12">
                            <label for=area>Nombre: </label>
                            <input type="text" id="nomproducto" name="nomproducto" value="<?php echo $nomproducto; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12">
                            <label for=area>Descripcion: </label>
                            <input type="text" id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12">
                            <label for=area>Precio: </label>
                            <input type="text" id="precio" name="precio" value="<?php echo $precio; ?>" class="form-control form-control-sm">
                        </div>

                        <div class="col-md-12"><br>
                        <center>
                        <div id="botones">
                            <a href="#" class="btn btn-info modal_abrir">Buscar Proveedor</a>
                            
                        </div>
                        </center>
                    </div>


                    <div class="col-md-12">
                            <label for=id_provedor>Id Provedor</label>
                            <input type="text" id="id_proveedor_input" name="id_proveedor_input" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="col-md-12">
                            <label for=n_proveedor>Nombre</label>
                            <input type="text" id="proveedor_nombre_input" name="nproveedor_nombre_input" readonly class="form-control form-control-sm">
                
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
		</div>

<!-- MODAL -->
        <section class="modal_section">
                <div class="modal__contenedor">
                    <h2 class="modal_titulo">Buscar proveedor</h2>

                    <input type="text" id="buscar_cliente" placeholder="Buscar proveedor...">
                    
                    <table id="tabla_cliente">
                        <tr>
                            <th>Selec</th>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                        </tr>
                        <tbody>
                            <?php
                            foreach ($data as $row) {
                                echo "<tr>";
                                echo "<td><input type='radio' name='proveedor_seleccionado' value='" . $row['id_proveedor'] . "'></td>";
                                echo "<td>" . $row['id_proveedor'] . "</td>";
                                echo "<td>" . $row['nombre_p'] . "</td>";
                                echo "<td>" . $row['direccion_p'] . "</td>";
                                echo "<td>" . $row['telefono_p'] . "</td>";
                                echo "<td>" . $row['correo_p'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>


                    <input type="submit" for value="Guardar" class="modal__agregar finalizar" id="modal_proveedor">
                    <input type="button" value="Cancelar" class=" modal__cerrar finalizar">
                </div>
         </section>

<!-- CIERRE DE MODAL -->


		<script type="text/javascript">
		  	function Limpiar() {
				var t = document.getElementById("f1").getElementsByTagName("input");
				for (var i=0; i<t.length; i++) {
    				t[i].value = "";
    			}
			}
		</script>
        
	    <script src="../vista/js/bootstrap.min.js"></script>
        <script src="../vista/js/modal2.js"></script>
        <script src="../vista/js/sweetalert2.min.js"></script>
	</body>
</html>		