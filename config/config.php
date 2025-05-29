<?php

class Configuracion
{
    private static $instance = null;
    private $conn;

    private $rutaServidor = "http://localhost/forounivesitario.site";/*"http://localhost/Proyecto_ForoUniversitario2";*/
    private $rutaBD = "localhost";
    private $usuarioBD = "root"; /*"u353229583_foro_user";*/
    private $passwordBD = "";/*"74217151Ytg.";*/
    private $nombreBD = "foro_universitario";/* "u353229583_foro_db";*/

    // Constructor privado para evitar instanciación directa
    private function __construct()
    {
        // Silenciar errores de conexión para evitar warnings en pantalla
        mysqli_report(MYSQLI_REPORT_OFF);
        
        $puertos = [3306, 3308];
        foreach ($puertos as $puerto) {
            $conn = @new mysqli($this->rutaBD, $this->usuarioBD, $this->passwordBD, $this->nombreBD, $puerto);
            if (!$conn->connect_error) {
                $this->conn = $conn;
                break;
            }
        }
        if (!isset($this->conn)) {
            die("No se pudo conectar a la base de datos en ninguno de los puertos.");
        }
    }

    // Obtener la instancia única (Singleton)
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Configuracion();
        }
        return self::$instance;
    }

    // Obtener la conexión a la base de datos
    public function getConexion()
    {
        return $this->conn;
    }

    public function getRutaServidor()
    {
        return $this->rutaServidor;
    }
    public function getRutaBD()
    {
        return $this->rutaBD;
    }
    public function getUsuarioBD()
    {
        return $this->usuarioBD;
    }
    public function getPasswordBD()
    {
        return $this->passwordBD;
    }
    public function getNombreBD()
    {
        return $this->nombreBD;
    }
}

// Uso de la clase
$config = Configuracion::getInstance();
$conn = $config->getConexion();
?>