<?php
require_once __DIR__ . '/conexionbd.php';  

class M_Agregar {

    private $conn;  

    public function __construct() {
        $this->conn = Conexion::ConexionBD();  // Inicializamos la conexión a la base de datos
    } 

    // Método para insertar una estadía en la base de datos
    public function insertarEstadia($pais, $calle, $nro, $piso, $tipo_estadia) {
        $sql = "EXEC SP_InsertarEstadia ?, ?, ?, ?, ?, ?";
        
        $stmt = $this->conn->prepare($sql);
        // Vincular parámetros
        $stmt->execute([  
            $pais,        
            $calle,       
            $nro,         
            $piso,          
            $depto,
            $tipo_estadia
        ]);
        $stmt->nextRowset();
    }
}
?>
