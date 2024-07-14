<?php
require_once("../modelo/conexionPDO.php");

class EntradaModelo extends Conexion {
	
	// Atributos
    private $id_producto;
	private $nombre_prod;
    private $codigo_entrada;
    private $cantidad_entrada;
    private $total_entrada;
	private $objbd;
	
	// Constructor -> Activar conexión de clase padre
    public function __construct(){
		parent::__construct();
		$this->objbd = parent::conectar();
    }

	// Métodos -> Setters
    public function setid_producto($id_producto){
		$this->id_producto = $id_producto;
    }  
    public function setcodigo_entrada($codigo_entrada){
		$this->codigo_entrada = $codigo_entrada;
    }
    public function setcantidad_entrada($cantidad_entrada){
		$this->cantidad_entrada = $cantidad_entrada;
	}

	// Métodos -> Getters
	public function getid_producto(){
		return $this->id_producto;
	}
	public function getcodigo_entrada(){
		return $this->codigo_entrada;
	}
	public function getcantidad_entrada(){
		return $this->cantidad_entrada;
	}

	
									/*---------- Inicio metodos del CRUD ----------*/
	
	//Funcion para crear
	public function insertar(){ 
        $sql = "INSERT INTO entrada (id_producto, codigo_entrada, cantidad_entrada) VALUES (:id_producto, DEFAULT, :cantidad_entrada)";
        $sentencia = $this->objbd->prepare($sql);
        $sentencia->bindValue(':id_producto', $this->id_producto);
        $sentencia->bindValue(':cantidad_entrada', $this->cantidad_entrada);

        // Ejecutar la sentencia
      $resultado = $sentencia->execute();
        
        if($resultado)
				$resultado = 1;
			else
				$resultado = 0;
			return $resultado;   		
		
        // Cerrar la conexión
        $objbd = NULL;
    }
	
	//Funcion para actualizar los productos
	public function Actualizar_producto(){

        $id_producto = $_POST['id_producto'];
        $cantidad_entrada = $_POST['cantidad_entrada'];
        $actualizar_consulta = "UPDATE producto SET cantidad_disp = cantidad_disp + :cantidad_entrada WHERE id_producto = :id_producto";
        $actualizar_stmt = $this->objbd->prepare($actualizar_consulta);
        $actualizar_stmt->bindValue(':cantidad_entrada', $cantidad_entrada, PDO::PARAM_INT);
        $actualizar_stmt->bindValue(':id_producto', $id_producto, PDO::PARAM_INT);
        $actualizar_result = $actualizar_stmt->execute();
		
		$objbd = NULL;
	}


	//Funcion para Eliminar
    public function eliminar(){

	    $sql = "DELETE FROM entrada WHERE codigo_entrada = :codigo_entrada";
    	$sentencia = $this->objbd->prepare($sql);
	    $sentencia->bindValue(':codigo_entrada', $this->codigo_entrada);
	    $resul = $sentencia->execute();
	    return $resul;

		$objbd =NULL;
	}
    		
	//Funcion para Modificar
	public function modificar(){ 

		$registro= "UPDATE entrada SET id_producto='".$this->id_producto."',codigo_entrada='".$this->codigo_entrada."', cantidad_entrada='".$this->cantidad_entrada."' WHERE codigo_entrada='".$this->codigo_entrada."'";  
		$preparado = $this->objbd->prepare($registro);
		$resul = $preparado->execute();

	return $resul;

		$objbd =NULL;
	}





	//Funcion para Buscar
    public function buscar(){
		$registro="SELECT * from entrada where codigo_entrada ='".$this->codigo_entrada."'";
		$preparado = $this->objbd->prepare($registro);
		$preparado->execute();
			
		$datos = $preparado->fetch(PDO::FETCH_ASSOC);
		if( $datos) {
			$encontro = 1;
			$this->id_producto = $datos['id_producto'];
			$this->codigo_entrada = $datos['codigo_entrada'];
			$this->cantidad_entrada = $datos['cantidad_entrada'];
		} else
			$encontro = 0;
				
		return $encontro;

		$objbd =NULL;
	} 



									/*---------- Fin metodos del CRUD ----------*/

	//funcion para mostrar los productos en la pantalla emergente del formulario de entradas
	public function ListaProductos(){

		$sql = "SELECT * FROM producto";

		$preparado = $this->objbd->prepare($sql);
		$preparado->execute();
		
		$lista = $preparado->fetchAll(PDO::FETCH_ASSOC);
		return $lista;

		//Cerrar conexion a base de datos
		$objbd = NULL;
	}
	
	//Funcion para llenar el input de codigo de entrada
	public function SiguienteEntrada(){

		$sql = "SELECT MAX(codigo_entrada) as siguiente FROM entrada";

		$preparado = $this->objbd->prepare($sql);
		$preparado->execute();
		
		$ultimo = $preparado->fetchAll(PDO::FETCH_ASSOC);
		return $ultimo;

		$objbd = NULL;

	}
	
	//funcion para mostrar el total de entradas en el inicio
	public function totalEntradas(){
		$consulta = "SELECT COUNT(*) AS total FROM entrada";
		$preparado = $this->objbd->prepare($consulta);
		$preparado->execute();
		$resultado = $preparado->fetch(PDO::FETCH_ASSOC);
		return $resultado['total'];

		$objbd = NULL;
	}
  }
?>
