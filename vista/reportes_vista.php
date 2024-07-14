<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reportes</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../vista/css/estilos.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<div class="barra-lateral">
    <?php menuLateralOpcion(); ?>
</div>

<div class="contenido">
<div class="ml-1">
        <h1>Reportes</h1>
</div>

    <hr>

    <div class="px-5 py-4">
        <div class="contenedor-entrada2 px-5 pt-5">
            <h1 class="titulo"><b>Selecciona el reporte que deseas consultar</b></h1>

            <form method="post" target="_blank">
                <select id="imprimirReporte" name="imprimirReporte" class="select-menu" >
                    <option value="productos">Productos</option>
                    <option value="entradas">Entradas</option>
                    <option value="salidas">Salidas</option>
                    <option value="proveedores">Proveedores</option>
                    <option value="clientes">Clientes</option>
                </select>

                <button type="submit" class="boton-impresion">
                    <i class="fas fa-print print-icon"></i> <b>Imprimir</b>
                </button>
            </form>

<?php
    if(isset($_POST['imprimirReporte'])) {
        $seleccion = $_POST['imprimirReporte'];
        switch($seleccion) {
            case "productos":
                header("Location: ../fpdf/productos.php");
                exit();
            case "entradas":
                header("Location: ../fpdf/entradas.php");
                exit();
            case "salidas":
                header("Location: ../fpdf/salidas.php");
                exit();
            case "proveedores":
                header("Location: ../fpdf/proveedores.php");
                exit();
            case "clientes":
                header("Location: ../fpdf/clientes.php");
                exit();
            case "entrada-salidas":
                header("Location: ../fpdf/reporte_alumno2.php");
                exit();
            default:
                // Manejo del caso por defecto
                break;
        }
    }
?>

            <div class="contenedor-imagen">
                <img src="../vista/img/imagen1.png" class="imagen1" alt="chica en una impresora">
            </div>
        </div>
    </div>
</div>

</body>
</html>