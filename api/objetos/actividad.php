<?php
class Actividad
{
	// conexion de base de datos y tabla actividades
	private $conn;
	private $nombre_tabla = "actividades";

	// atributos de la clase
	public $id;
	public $titulo;
	public $fecha;
	public $ubicacion;
	public $correo;
	public $repetir;
	public $repetir_inicio;
    public $repetir_final;
    public $tipo;
    public $hora;
	// constructor con $db como conexion a base de datos
	public function __construct($db)
	{
		$this->conn = $db;
	}

	// leer todas las actividades
	function read()
	{
		// query para seleccionar todos
		$query = "CALL sp_todas_actividades()";
		// sentencia para preparar query
		$stmt = $this->conn->prepare($query);
		// ejecutar query
		$stmt->execute();
		return $stmt;
	}

	function obtener_actividad(){
		$query = "CALL sp_obtener_actividad(?)";
		$stmt = $this->conn->prepare($query);
		// ID de enlace del producto a actualizar
		$stmt->bindParam(1, $this->id);
		// ejecutar consulta
		$stmt->execute();
		// obtener fila recuperada
		return $stmt;
	}
/*
	// crear producto
	function crear()
	{
		// query para insertar un registro
		$query = "INSERT INTO " . $this->nombre_tabla . " SET nombre=:nombre, precio=:precio, descripcion=:descripcion, categoria_id=:categoria_id, creado=:creado";
		// preparar query
		$stmt = $this->conn->prepare($query);
		// sanitize
		$this->nombre = htmlspecialchars(strip_tags($this->nombre));
		$this->precio = htmlspecialchars(strip_tags($this->precio));
		$this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
		$this->categoria_id = htmlspecialchars(strip_tags($this->categoria_id));
		$this->creado = htmlspecialchars(strip_tags($this->creado));
		// bind values
		$stmt->bindParam(":nombre", $this->nombre);
		$stmt->bindParam(":precio", $this->precio);
		$stmt->bindParam(":descripcion", $this->descripcion);
		$stmt->bindParam(":categoria_id", $this->categoria_id);
		$stmt->bindParam(":creado", $this->creado);
		// execute query
		if ($stmt->execute()) {
			return true;
		}
		return false;
	}

	// utilizado al completar el formulario de actualización del producto
	function readOne()
	{
		// consulta para leer un solo registro
		$query = "SELECT c.nombre as categoria_desc, p.id, p.nombre, p.descripcion, p.precio, p.categoria_id, p.creado FROM " . $this->nombre_tabla . " p LEFT JOIN categorias c ON p.categoria_id = c.id WHERE p.id = ? LIMIT 0,1";
		// preparar declaración de consulta
		$stmt = $this->conn->prepare($query);
		// ID de enlace del producto a actualizar
		$stmt->bindParam(1, $this->id);
		// ejecutar consulta
		$stmt->execute();
		// obtener fila recuperada
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		// establecer valores a las propiedades del objeto
		$this->nombre = $row['nombre'];
		$this->precio = $row['precio'];
		$this->descripcion = $row['descripcion'];
		$this->categoria_id = $row['categoria_id'];
		$this->categoria_desc = $row['categoria_desc'];
	}*/
}
?>
