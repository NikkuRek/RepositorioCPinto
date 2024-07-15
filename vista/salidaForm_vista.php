<!DOCTYPE html>
<html>
	<head>
		<title>Salida - Inventario</title>
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
        <div class="main p-3">
            <div class="contenido">
                <div class="ml-1">
                  <h1>
                  Listado de Clientes
                 </h1>
            </div>
        <hr>


        <div class="px-6 py-4">
                <div class="contenedor-entrada1 px-6 pt-5">

                <!--<div class="alert alert-azul">
                    <a href="../controlador/clienteForm_controlador.php" class="btn btn-azul">Agregar</a>
                </div>-->
                


                <div class="caja_scroll">
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <tr>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Acciones</th>
                        </tr>
                        <?php foreach ($lista_cliente as $cliente){ ?>
                            <tr>
                                <td><?php echo $cliente['documento_cliente']; ?></td>
                                <td><?php echo $cliente['nombre']; ?></td>
                                <td><?php echo $cliente['telefono']; ?></td>
                                <td><?php echo $cliente['direccion']; ?></td>
                                <td>
                                  <a href="../controlador/clienteForm_controlador.php?id=<?php echo $cliente['documento_cliente'] ?>" class="btn btn-azul">
                                     <img src="../vista/img/pencil.png" alt="Modificar" width="16" height="16"></a>
                                  <a href="../controlador/clienteForm_controlador.php?eliminarId=<?php echo $cliente['documento_cliente'] ?>" class="btn btn-rojo">
                                     <img src="../vista/img/trash.png" alt="Eliminar" width=16 height=16></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>       
                 <div class="">
                    <a href="#" class="btn btn-infox modal_abrir">
                        <!--<a href="../controlador/proveedorForm_controlador.php" class="btn btn-azulx">-->
                        <img src="../vista/img/iconmas.png" alt="">
                        <div class="texto-contenedor-pagina">
                        <span class="texto-superior">Agregar Cliente</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>


        <div class="contenedor-entrada1 px-6 pt-5">
            <?php if(isset($_GET['id'])){ ?>
	            <h1 class="display-6"><b>Modificar Salida</b></h1>
                <?php } else { ?>
	                <h1 class="display-6"><b>Nueva Salida</b></h1>
                <?php } ?>


                <form id="salidaClienteForm" action="" method="POST" target="_self">
                <div id="f1" class="row col-md-4">
                    <div class="col-md-12">
                        <label for=cedula_c>Cédula</label> 
                        <input type="text" id="cliente_cedula_input" name="cliente_cedula_input" class="form-control form-control-sm" readonly>
                    </div>
                    <div id="f1" class="col-md-12">
                        <label for=nombre_c>Nombre</label>
                        <input type="text" id="cliente_nombre_input" name="cliente_nombre_input" class="form-control form-control-sm" readonly>
                    </div>
                    <div id="f1" class="col-md-12">
                        <label for=apellido_c>Apellido</label>
                        <input type="text" id="cliente_apellido_input" name="cliente_apellido_input" class="form-control form-control-sm" readonly>
                    </div>
                    <div id="f1" class="col-md-12">
                        <label for=telefono_c>Teléfono</label>
                        <input type="text" id="cliente_telefono_input" name="cliente_telefono_input" class="form-control form-control-sm" readonly>
                    </div>
                    <div id="f1" class="col-md-12"><br>
                        <center>
                        <div id="botones">
                            <a href="#" class="btn btn-info modal_abrir">Buscar cliente</a>
                            
                        </div>
                        </center>
                    </div>
				</div>
                </form>
            

                <form id="salidaForm" action="" method="POST" target="_self" onsubmit="return confirmacion()"> <br>
                <div id="f1" class="row col-md-4">
                    <div class="col-md-12">
                        <label for=id_cliente>Codigo de cliente</label>
                        <input type="text" id="cliente_codigo_input" name="cliente_codigo_input" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for=fecha_salida>Fecha</label>
                        <input type="date" id="fecha_s" name="fecha_s" readonly class="form-control form-control-sm">
                    </div>
                    <div class="col-md-12 aqui"> <br>
                        <label for=titulo>Producto</label>
                        <a href="#" class="btn btn-info modal_abrir2">+</a>
                        <div class="lista_productos"></div>
                        <input type="hidden" id="id_producto" name="id_producto">
                        <input type="hidden" id="cant_salida" name="cant_salida">
                        
                    </div>
                
                    
                    <div class="col-md-12"><br>
                        <center>
                        <div id="botones">
                            
                            <input type="submit" value="Enviar" name="Enviar" class="btn btn-info">
                            <input type="submit" value="Limpiar" name="Limpiar" onclick="Limpiar();" id=limpiar  class="btn btn-info">
                        </div>
                        </center>
                    </div>
				</div>
                </form>
        </div>
        </div>
        </div>


        <section class="modal_section">
                <div class="modal__contenedor">
                    <h2 class="modal_titulo">Buscar cliente</h2>


                    
                    <table id="tabla_cliente">
                        <tr>
                            <th>Seleccionar</th>
                            <th>#</th>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Teléfono</th>
                        </tr>
                        <tbody>
                            <?php
                            foreach ($data as $row) {
                                echo "<tr>";
                                echo "<td><input type='radio' name='cliente_seleccionado' value='" . $row['id_cliente'] . "'></td>";
                                echo "<td>" . $row['id_cliente'] . "</td>";
                                echo "<td>" . $row['cedula_c'] . "</td>";
                                echo "<td>" . $row['nombre_c'] . "</td>";
                                echo "<td>" . $row['apellido_c'] . "</td>";
                                echo "<td>" . $row['telefono_c'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>


                    <input type="submit" for value="Guardar" class="modal__agregar finalizar" id="modal_cliente">
                    <input type="button" value="Cancelar" class=" modal__cerrar finalizar">
                </div>
         </section>

         <section class="modal_section2">
                <div class="modal__contenedor2">

                <h2 class="modal_titulo">Buscar producto</h2>
        
            

           
                    
                    <table id="tabla_producto">
                        <tr>
                            <th>Seleccionar</th>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio c/u</th>
                            <th>Cant. disponible</th>
                            <th>Cant. seleccionada</th>
                        </tr>
                        <tbody>


                            <?php
                            foreach ($results as $row) {
                                if ($row['cantidad_disp'] != 0) {
                                    echo "<tr>";
                                    echo "<td><input type='radio' class='producto_seleccionado' name='producto_seleccionado' value='" . $row['id_producto'] . "'></td>";
                                    echo "<td>" . $row['id_producto'] . "</td>";
                                    echo "<td class='nombre_prod'>" . $row['nombre_prod'] . "</td>";
                                    echo "<td>" . $row['descripcion'] . "</td>";
                                    echo "<td class='precio_prod'>" . $row['precio'] . "</td>";
                                    echo "<td>" . $row['cantidad_disp'] . "</td>";
                                    echo "<td><input type='number' class='cant_seleccionada' min='1' max='" . $row['cantidad_disp'] . "' name='cant_seleccionada' value='1' disabled></td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>


                    <input type="submit" value="Guardar" class="modal__agregar finalizar" id="modal_producto">
                    <input type="button" value="Cancelar" class=" modal__cerrar finalizar">
                </div>
         </section>


		<script type="text/javascript">
		  	function Limpiar() {
				var t = document.getElementById("f1").getElementsByTagName("input");
				for (var i=0; i<t.length; i++) {
    				t[i].value = "";
    			}
			}	
		</script>
        <script src="../vista/js/jquery-3.7.1.min.js"></script>
        <script src="../vista/js/modal.js"></script>
        <script src="../vista/js/sweetalert2.min.js"></script>
	</body>
</html>		