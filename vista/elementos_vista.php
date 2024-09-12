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

                <div class="cont-elementos">
                    <a href="../controlador/tipopi_controlador.php" class="btn btn-blanco">
                        <img src="../vista/img/PInferior.png" alt="Total Entradas">
                        <div class="texto-contenedor">
                            <span class="texto-inferior1"></span>
                            <span class="texto-superior">Tipo prenda Inferior</span>
                        </div>
                    </a>

                    <a href="../controlador/tipops_controlador.php" class="btn btn-blanco">
                        <img src="../vista/img/Psuperior.png" alt="Total Entradas">
                        <div class="texto-contenedor">
                            <span class="texto-inferior1"></span>
                            <span class="texto-superior">Tipo prenda Superior</span>
                        </div>
                    </a>

                    <a href="../controlador/protector_controlador.php" class="btn btn-blanco">
                        <img src="../vista/img/Protector.png" alt="Total Entradas">
                        <div class="texto-contenedor">
                            <span class="texto-inferior1"></span>
                            <span class="texto-superior">Protector</span>
                        </div>
                    </a>

                    <a href="../controlador/tela_controlador.php" class="btn btn-blanco">
                        <img src="../vista/img/Telas.png" alt="Total Entradas">
                        <div class="texto-contenedor">
                            <span class="texto-inferior1"></span>
                            <span class="texto-superior">Telas</span>
                        </div>
                    </a>

                    <a href="../controlador/costados_controlador.php" class="btn btn-blanco">
                        <img src="../vista/img/Costados.png" alt="Total Entradas">
                        <div class="texto-contenedor">
                            <span class="texto-inferior1"></span>
                            <span class="texto-superior">Costados</span>
                        </div>
                    </a>

                    <a href="../controlador/manga_controlador.php" class="btn btn-blanco">
                        <img src="../vista/img/Manga.png" alt="Total Entradas">
                        <div class="texto-contenedor">
                            <span class="texto-inferior1"></span>
                            <span class="texto-superior">Manga</span>
                        </div>
                    </a>

                    <a href="../controlador/cuello_controlador.php" class="btn btn-blanco">
                        <img src="../vista/img/Cuello.png" alt="Total Entradas">
                        <div class="texto-contenedor">
                            <span class="texto-inferior1"></span>
                            <span class="texto-superior">Cuello</span>
                        </div>
                    </a>

                    <a href="../controlador/cierre_controlador.php" class="btn btn-blanco">
                        <img src="../vista/img/Cierre.png" alt="Total Entradas">
                        <div class="texto-contenedor">
                            <span class="texto-inferior1"></span>
                            <span class="texto-superior">Cierre</span>
                        </div>
                    </a>

                    <a href="../controlador/cortemanga_controlador.php" class="btn btn-blanco">
                        <img src="../vista/img/CorteManga.png" alt="Total Entradas">
                        <div class="texto-contenedor">
                            <span class="texto-inferior1"></span>
                            <span class="texto-superior">Corte manga</span>
                        </div>
                    </a>

                    <a href="../controlador/talla_controlador.php" class="btn btn-blanco">
                        <img src="../vista/img/Tallas.png" alt="Total Entradas">
                        <div class="texto-contenedor">
                            <span class="texto-inferior1"></span>
                            <span class="texto-superior">Tallas</span>
                        </div>
                    </a>

                </div>
            </div>    
        </div>
    </div>

<<<<<<< HEAD
            <!-------------------------------FIN DE MODAL PARA PRODUCTO ----------------------------------->

            <script src="../vista/js/sweetalert2.min.js"></script>
            <script src="../vista/js/Entrada_popup.js"></script>
            <script src="../vista/js/bootstrap.min.js"></script>
            <script src="../vista/js/sweetalert2.min.js"></script>
            <script type="text/javascript" src="../vista/js/jquery-3.7.1.min.js"></script>
            <script type="text/javascript" src="../vista/js/funciones1.js"></script>
            <script src="../vista/js/sweetalert2.min.js"></script>
=======
    <hr>
            <div class="px-6 py-4">
                <div class="contenedor-entrada1 px-6 pt-5">
            
            <div class="cont-elementos">    
            <a href="../controlador/tipopi_controlador.php" class="btn btn-blanco">      
                <img src="../vista/img/PInferior.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Tipo prenda Inferior</span> 
                    </div>    
            </a>

            <a href="../controlador/tipops_controlador.php" class="btn btn-blanco">      
                <img src="../vista/img/Psuperior.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Tipo prenda Superior</span> 
                    </div>    
            </a>

            <a href="../controlador/protector_controlador.php" class="btn btn-blanco">      
                <img src="../vista/img/Protector.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Protector</span> 
                    </div>    
            </a>
            
            <a href="../controlador/tela_controlador.php" class="btn btn-blanco">      
                <img src="../vista/img/Telas.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Telas</span> 
                    </div>    
            </a>
            
            <a href="../controlador/costados_controlador.php" class="btn btn-blanco">      
                <img src="../vista/img/Costados.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Costados</span> 
                    </div>    
            </a>

            <a href="../controlador/manga_controlador.php" class="btn btn-blanco">      
                <img src="../vista/img/Manga.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Manga</span> 
                    </div>    
            </a>

            <a href="../controlador/cuello_controlador.php" class="btn btn-blanco">      
                <img src="../vista/img/Cuello.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Cuello</span> 
                    </div>    
            </a>

            <a href="../controlador/cierre_controlador.php" class="btn btn-blanco">      
                <img src="../vista/img/Cierre.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Cierre</span> 
                    </div>    
            </a>

            <a href="../controlador/cortemanga_controlador.php" class="btn btn-blanco">      
                <img src="../vista/img/CorteManga.png" alt="Total Entradas">
                    <div class="texto-contenedor">
                    <span class="texto-inferior1"></span>
                    <span class="texto-superior">Corte manga</span> 
                    </div>    
            </a>
            </div>
    </div>
     



 
<!-------------------------------FIN DE MODAL PARA PRODUCTO ----------------------------------->

    <script src="../vista/js/sweetalert2.min.js"></script>
    <script src="../vista/js/Entrada_popup.js"></script>
	<script src="../vista/js/bootstrap.min.js"></script>
    <script src="../vista/js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="../vista/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="../vista/js/funciones1.js"></script>	
    <script src="../vista/js/sweetalert2.min.js"></script>
>>>>>>> de4a7b87e97764835d2b07c31a6ce63a69816cc5
</body>

</html>