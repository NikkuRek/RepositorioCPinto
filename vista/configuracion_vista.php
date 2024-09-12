<!DOCTYPE html>
<?php
require_once("../modelo/conexionPDO.php");
?>
<html>

<head>
    <title>Configuracion</title>
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
            <h1>Configuraciones</h1>
        </div>

        <hr>
        <div class="px-6 py-4">  
            <div class="contenedor-entrada1 px-6 pt-5">

                <div class="cont-elementos">
                    <a href="../controlador/elementos_controlador.php" class="btn btn-blanco">
                        <img src="../vista/img/Elementos.png" alt="Total Entradas">
                        <div class="texto-contenedor">
                            <span class="texto-inferior1"></span>
                            <span class="texto-superior">Elementos</span>
                        </div>
                    </a>

                    <a href="../controlador/departamento_controlador.php" class="btn btn-blanco">
                        <img src="../vista/img/Departamentos.png" alt="Total Entradas">
                        <div class="texto-contenedor">
                            <span class="texto-inferior1"></span>
                            <span class="texto-superior">Departamentos</span>
                        </div>
                    </a>

                    <a href="../controlador/confiusuario_controlador.php" class="btn btn-blanco">
                        <img src="../vista/img/Usuarios.png" alt="Total Entradas">
                        <div class="texto-contenedor">
                            <span class="texto-inferior1"></span>
                            <span class="texto-superior">Usuarios</span>
                        </div>
                    </a>

                    <a href="../controlador/proceso_controlador.php" class="btn btn-blanco">
                        <img src="../vista/img/Proceso.png" alt="Total Entradas">
                        <div class="texto-contenedor">
                            <span class="texto-inferior1"></span>
                            <span class="texto-superior">Proceso</span>
                        </div>
                    </a>

                </div>
            </div>    
        </div>
    </div>



            <!-------------------------------FIN DE MODAL PARA CONFIGURACION ----------------------------------->

            <script src="../vista/js/sweetalert2.min.js"></script>
            <script src="../vista/js/Entrada_popup.js"></script>
            <script src="../vista/js/bootstrap.min.js"></script>
            <script src="../vista/js/sweetalert2.min.js"></script>
            <script type="text/javascript" src="../vista/js/jquery-3.7.1.min.js"></script>
            <script type="text/javascript" src="../vista/js/funciones1.js"></script>
            <script src="../vista/js/sweetalert2.min.js"></script>
</body>

</html>