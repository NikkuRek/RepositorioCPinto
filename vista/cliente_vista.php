<!DOCTYPE html>
<html>
	<head>
    <meta charset="UTF-8">
		<title>Clientes</title>
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
        <h1>Listado de Clientes</h1>

    <hr>

    <div class="px-6 py-4">
                <div class="contenedor-entrada1 px-6 pt-5">

                <!--<div class="alert alert-azul">
                    <a href="../controlador/clienteForm_controlador.php" class="btn btn-azul">Agregar</a>
                </div>-->
                
                <div class="">
                    <a href="#" class="btn btn-infox modal_abrir">
                        <!--<a href="../controlador/proveedorForm_controlador.php" class="btn btn-azulx">-->
                        <img src="../vista/img/iconmas.png" alt="">
                        <div class="texto-contenedor-pagina">
                        <span class="texto-superior">Agregar Cliente</span>
                        </div>
                    </a>
                </div>

                <div class="caja_scroll">
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <tr>
                            <th>ID</th>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Acciones</th>
                        </tr>
                        <?php foreach ($lista_cliente as $cliente){ ?>
                            <tr>
                                <td><?php echo $cliente['id_cliente']; ?></td>
                                <td><?php echo $cliente['cedula_c']; ?></td>
                                <td><?php echo $cliente['nombre_c']; ?></td>
                                <td><?php echo $cliente['apellido_c']; ?></td>
                                <td><?php echo $cliente['telefono_c']; ?></td>
                                <td><?php echo $cliente['direccion_C']; ?></td>
                                <td>
                                  <a href="../controlador/clienteForm_controlador.php?id=<?php echo $cliente['id_cliente'] ?>" class="btn btn-azul">
                                     <img src="../vista/img/pencil.png" alt="Modificar" width="16" height="16"></a>
                                  <a href="../controlador/clienteForm_controlador.php?eliminarId=<?php echo $cliente['id_cliente'] ?>" class="btn btn-rojo">
                                     <img src="../vista/img/trash.png" alt="Eliminar" width=16 height=16></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>




        <section class="modal_section">
                <div class="modal__contenedor">
                </div>       
         </section>

	    <script src="../vista/js/bootstrap.min.js"></script>
        <script src="../vista/js/sweetalert2.min.js"></script>
	</body>
</html>