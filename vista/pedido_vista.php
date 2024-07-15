
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
                <div ip= "f1" class="contenedor-entrada1 px-6 pt-5">


            <?php foreach ($lista_pedidou as $pedidou){ ?>
            <div class="contenedor-botones">

           

           <a href="#" class=" btn-blanco">
                <!--<img src="../vista/img/tablon.png" alt="Agregar Salida">-->
                    <div class="texto-contenedor">
                      <span class="texto-superior">Pedido: <?php echo $pedidou['id_pedidoU']; ?></span>
                      <span class="texto-superior">Cliente: <?php echo $pedidou['nombre']; ?></span>
                      <span class="texto-superior">fecha Limite: <?php echo $pedidou['fecha_final']; ?></span>
                      <input type="submit" value="Ver pedido" name="verpedido" class="btn btn-info">
                     </div>
            </a> 
             <?php } ?>
                <!-- </div> 
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
                        <?php foreach ($lista_pedidou as $pedidou){ ?>
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
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div> -->


                
                </div>
            </div>
            <div class=""> 
                    <a href="#" class="btn btn-infox modal_abrir_agregar">
                        <img src="../vista/img/iconmas.png" alt="">
                        <div class="texto-contenedor-pagina">
                        <span class="texto-superior">Agregar pedido</span>                  
                        </div>
                    </a>
        </div>


          
        <!--<div id="zona06">		 	
        </div>
    
        <div id="zona07">
        </div>-->




    
    
    <script type="text/javascript" src="../vista/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="../vista/js/funciones1.js"></script>	
    <script src="../vista/js/sweetalert2.min.js"></script>
</body>
</html>