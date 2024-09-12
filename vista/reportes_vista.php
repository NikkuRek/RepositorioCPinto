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
                <form method="post" action="../controlador/reporte_controlador.php" target="_blank">
                    <label for="fechai">Fecha Inicio: </label>
                    <input type="date" id="fechai" name="fechai" value="<?php echo isset($fechai) ? htmlspecialchars($fechai) : ''; ?>">
                    
                    <label for="fechaf">Fecha Fin: </label>
                    <input type="date" id="fechaf" name="fechaf" value="<?php echo isset($fechaf) ? htmlspecialchars($fechaf) : ''; ?>">
                    
                    <select id="imprimirReporte" name="imprimirReporte" class="select-menu">
                        <option value="ventas">Ventas</option>
                        <option value="clientes">Clientes</option>
                        <option value="pdoclientes">Pedidos por cliente</option>
                        <option value="pcerrados">Pedidos Cerrador</option>
                    </select>
                    
                    <button type="submit" class="boton-impresion">Imprimir</button>
                </form>
                <div class="contenedor-imagen">
                    <img src="../vista/img/imagen1.png" class="imagen1" alt="chica en una impresora">
                </div>
            </div>
        </div>
    </div>

</body>

</html>

