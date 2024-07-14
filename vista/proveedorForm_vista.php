<!DOCTYPE html>
<html>
	<head>
    <meta charset="UTF-8">
		<title>Proveedores</title>
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
        <h1>Listado de Proveedores</h1>

    <hr>

    <div class="px-6 py-4">
                <div class="contenedor-entrada1 px-6 pt-5">
            	<?php if(isset($_GET['id'])){ ?>
	                <h1 class="display-6"><b>Datos del Proveedor</b></h1>
                <?php } else { ?>
	                <h1 class="display-6"><b>Agregar Proveedor</b></h1>
                <?php } ?>
                
                <form action="" method="POST">
                    <div id="f1" class="row col-md-4">
                        <?php if(isset($_GET['id'])){ ?>
                            <div class="col-md-12">
                                <label for=area>ID: </label>
                                <input type="text" id="idproveedor" name="idproveedor" value="<?php echo $idproveedor; ?>" readonly class="form-control form-control-sm">
                            </div>
                        <?php } ?>
                        <div class="col-md-12">
                            <label for=area>Nombre: </label>
                            <input type="text" id="nombrep" name="nombrep" value="<?php echo $nombrep; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12">
                            <label for=area>Dirección: </label>
                            <input type="text" id="direccionp" name="direccionp" value="<?php echo $direccionp; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12">
                            <label for=area>Teléfono: </label>
                            <input type="text" id="telefonop" name="telefonop" value="<?php echo $telefonop; ?>" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12">
                            <label for=area>Correo: </label>
                            <input type="text" id="correop" name="correop" value="<?php echo $correop; ?>" class="form-control form-control-sm">
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
		<script type="text/javascript">
		  	function Limpiar() {
				var t = document.getElementById("f1").getElementsByTagName("input");
				for (var i=0; i<t.length; i++) {
    				t[i].value = "";
    			}
			}
		</script>
	    <script src="../vista/js/bootstrap.min.js"></script>
        <script src="../vista/js/sweetalert2.min.js"></script>
	</body>
</html>		