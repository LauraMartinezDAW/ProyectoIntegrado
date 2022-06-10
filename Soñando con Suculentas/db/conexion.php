<?php
/* Clase conexión. Establece la conexión con la base de datos. */
class Conexion {

    protected $conexion;

    function __construct() {

        try {
            // Establecemos el tipo de BBDD, el host y el nombre de la BBDD
            $dsn = "mysql:host=localhost;dbname=sonandoconsuculentas";
            // Para crear la conexión, pasamos los datos de conexión, el usuario y la contraseña de la BBDD.
            $this->conexion = new PDO($dsn, 'sonandoconsuculentas', 'daw12345');
            // Establecemos el tipo de control de errores
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexion->exec("SET CHARACTER SET UTF8"); 

        // Si hay errores
        } catch (PDOException $e) {
            echo "<h1>Error: " . $e->getMessage() . " línea " . $e->getLine()."</h1>";        
        }
    }
}

?>