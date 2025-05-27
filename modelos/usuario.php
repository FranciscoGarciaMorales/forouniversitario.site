<?php
require_once __DIR__ . '/../config/config.php';

class Usuario
{
    private $conn;

    public function __construct()
    {
        // Obtenemos la instancia única de Configuracion y su conexión
        $config = Configuracion::getInstance();
        $this->conn = $config->getConexion();

    }

    public function buscarUsuario($usuario, $contraseña)
    {
        $sql = "SELECT * FROM usuario WHERE email = ? AND contrasena = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ss", $usuario, $contraseña);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows > 0) {
                $this->sesionUsuario($usuario);
                return true;
            } else {
                return false;
            }

        } else {
            echo "Error en la consulta: " . $this->conn->error;
            return false;
        }
    }
    public function registrarUsuario($nombre, $apellidos, $fecha_nacimiento, $email, $nick, $contraseña)
    {
        $sql = "INSERT INTO usuario (nombre, apellidos, fecha_nacimiento, email, nick, contrasena)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssssss", $nombre, $apellidos, $fecha_nacimiento, $email, $nick, $contraseña);

            if ($stmt->execute()) {
                echo "✅ Usuario registrado correctamente.";
                return true;
            } else {
                echo "❌ Error al registrar usuario: " . $stmt->error;
                return false;
            }

            $stmt->close();
        } else {
            echo "❌ Error en la preparación de la consulta: " . $this->conn->error;
            return false;
        }
    }
    public function sesionUsuario($nombreUsuario)
    {
        $sql = "SELECT * FROM usuario WHERE email = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $nombreUsuario);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $row = $result->fetch_assoc()) {
                session_start();

                $_SESSION['id'] = $row['id'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['apellidos'] = $row['apellidos'];
                $_SESSION['fecha_nacimiento'] = $row['fecha_nacimiento'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['nick'] = $row['nick'];
            }
        }
    }

}