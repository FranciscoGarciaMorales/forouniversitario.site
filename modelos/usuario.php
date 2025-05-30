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
    public function actualizarUsuario($id, $nombre, $nick, $email, $contrasena = null)
    {
        // Verificar duplicado de email o nick para otros usuarios
        $sql = "SELECT id FROM usuario WHERE (email = ? OR nick = ?) AND id != ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $email, $nick, $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            return ['success' => false, 'error' => 'El correo o el nickname ya está en uso.'];
        }

        // Actualizar datos
        if ($contrasena !== null && $contrasena !== '') {
            $sql = "UPDATE usuario SET nombre = ?, nick = ?, email = ?, contrasena = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssssi", $nombre, $nick, $email, $contrasena, $id);
        } else {
            $sql = "UPDATE usuario SET nombre = ?, nick = ?, email = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssi", $nombre, $nick, $email, $id);
        }

        if ($stmt->execute()) {
            // Actualizar datos en sesión
            $_SESSION['nombre'] = $nombre;
            $_SESSION['nick'] = $nick;
            $_SESSION['email'] = $email;

            return ['success' => true];
        } else {
            return ['success' => false, 'error' => 'Error al actualizar los datos.'];
        }
    }

    public function usuarioExiste($email, $nick)
    {
        $sql = "SELECT * FROM usuario WHERE email = ? OR nick = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ss", $email, $nick);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->num_rows > 0;
        } else {
            return false;
        }
    }
}