

<?php
require_once('../modelo/reportes_modelo.php');

if (isset($_POST['imprimirReporte']) && isset($_POST['fechai']) && isset($_POST['fechaf'])) {
    $tipoReporte = $_POST['imprimirReporte'];
    $fechai = $_POST['fechai'];
    $fechaf = $_POST['fechaf'];

    // Redirigir al script adecuado según el tipo de reporte
    switch ($tipoReporte) {
        case 'ventas':
            header("Location: ../fpdf/ventas.php?fechai=" . urlencode($fechai) . "&fechaf=" . urlencode($fechaf));
            break;
        case 'clientes':
            header("Location: ../fpdf/clientes.php?fechai=" . urlencode($fechai) . "&fechaf=" . urlencode($fechaf));
            break;
        case 'pdoclientes':
            header("Location: ../fpdf/pdoclientes.php?fechai=" . urlencode($fechai) . "&fechaf=" . urlencode($fechaf));
            break;
            case 'pcerrados':
                header("Location: ../fpdf/pcerrados.php?fechai=" . urlencode($fechai) . "&fechaf=" . urlencode($fechaf));
                break;
        default:
            echo "Tipo de reporte no soportado.";
            exit();
    }
} else {
    echo "Datos no disponibles.";
}
?>