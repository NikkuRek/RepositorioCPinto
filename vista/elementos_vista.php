
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
        <h1>Elementos</h1>
    </div>

    <hr>
            <div class="px-6 py-4">
                <div class="contenedor-entrada1 px-6 pt-5">

            <a href="../controlador/tipopi_controlador.php" class="btn btn-blanco">      
                <img src="../vista/img/totalpedidoss.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Tipo prenda Inferior</span> 
                    </div>    
            </a>

            <a href="../controlador/tipops_controlador.php" class="btn btn-blanco modal_abrir_modificar">      
                <img src="../vista/img/totalpedidoss.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Tipo prenda Superior</span> 
                    </div>    
            </a>

            <a href="#" class="btn btn-blanco">      
                <img src="../vista/img/totalpedidoss.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Protector</span> 
                    </div>    
            </a>
            
            <a href="#" class="btn btn-blanco">      
                <img src="../vista/img/totalpedidoss.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Telas</span> 
                    </div>    
            </a>
            
            <a href="#" class="btn btn-blanco">      
                <img src="../vista/img/totalpedidoss.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Costados</span> 
                    </div>    
            </a>

            <a href="#" class="btn btn-blanco">      
                <img src="../vista/img/totalpedidoss.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Manga</span> 
                    </div>    
            </a>

            <a href="#" class="btn btn-blanco">      
                <img src="../vista/img/totalpedidoss.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Cuello</span> 
                    </div>    
            </a>

            <a href="#" class="btn btn-blanco">      
                <img src="../vista/img/totalpedidoss.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Cierre</span> 
                    </div>    
            </a>

            <a href="#" class="btn btn-blanco">      
                <img src="../vista/img/totalpedidoss.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Corte manga</span> 
                    </div>    
            </a>

    </div>
     



 
<!-------------------------------FIN DE MODAL PARA PRODUCTO ----------------------------------->

    <script src="../vista/js/sweetalert2.min.js"></script>
    <script src="../vista/js/Entrada_popup.js"></script>
	<script src="../vista/js/bootstrap.min.js"></script>
    <script src="../vista/js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="../vista/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="../vista/js/funciones1.js"></script>	
    <script src="../vista/js/sweetalert2.min.js"></script>
</body>
</html>