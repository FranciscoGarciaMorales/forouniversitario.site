<?php
// Incluir el modelo de usuario para la validación de datos
require_once "../modelos/usuario.php";

class UsuarioExistente
{

    private $usuario;
    private $apellidos;
    private $contraseña;
    private $fecha_nacimiento;
    private $email;
    private $nick;
    private $boton;
    private $modelo;

    // Constructor de la clase
    function __construct()
    {
        $this->modelo = new Usuario();
        $this->menUsuario();
    }

    public function menUsuario()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->boton = $_POST["accion"] ?? null;
            switch ($this->boton) {
                case "login":
                    $this->recibirUsuario();
                    break;

                case "registrar":
                    $this->registrarUsuario();
                    break;

                default:
                    echo "Acción no válida";
                    break;
            }
        }
    }

public function registrarUsuario()
{
    $this->usuario = $_POST["nombre"] ?? "";
    $this->apellidos = $_POST["apellidos"] ?? "";
    $this->fecha_nacimiento = $_POST["fecha_nacimiento"] ?? "";
    $this->email = $_POST["email"] ?? "";
    $this->nick = $_POST["nick"] ?? "";
    $this->contraseña = $_POST["contrasena"] ?? "";

    if (
        !empty($this->usuario) &&
        !empty($this->apellidos) &&
        !empty($this->fecha_nacimiento) &&
        !empty($this->email) &&
        !empty($this->nick) &&
        !empty($this->contraseña)
    ) {
        // ⚠️ Comprobación de edad mínima
        $hoy = new DateTime();
        $nacimiento = new DateTime($this->fecha_nacimiento);
        $edad = $hoy->diff($nacimiento)->y;

        if ($edad < 18) {
            header("Location: ../vistas/home/registro.php");
            exit;
        }

        if ($this->comprobarUsuarioExistente($this->email, $this->nick)) {
            $this->modelo->registrarUsuario(
                $this->usuario,
                $this->apellidos,
                $this->fecha_nacimiento,
                $this->email,
                $this->nick,
                $this->contraseña
            );
            header("Location: ../index.php");
            exit;
        }
    }
}

    public function comprobarUsuarioExistente($email, $nick)
    {
        if ($this->modelo->usuarioExiste($email, $nick)) {
            echo "<script>
                alert('⚠️ Ya existe un usuario con ese correo o nick.');
                window.location.href = '../vistas/home/registro.php';
              </script>";
            return false;
        }
        return true;
    }


    // Recibir los datos del formulario
    public function recibirUsuario()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Capturamos los valores del formulario
            $this->email = $_POST["email"] ?? "";
            $this->contraseña = $_POST["contrasena"] ?? "";
            $this->buscarUsuario(); // Llamamos a la validación
        } else {
            echo "Datos inválidos";
            header("Location: ../index.php");
            exit;
        }
    }

    // Buscar usuario en la base de datos
    public function buscarUsuario()
    {
        $usuarioValido = $this->modelo->buscarUsuario($this->email, $this->contraseña);

        if ($usuarioValido) {
            echo "✅ Ha funcionado";
            header("Location: ../vistas/perfil/indexperfil.php");
            exit;
        } else {
            echo "❌ Usuario o contraseña incorrectos.";
            header("Location: ../index.php");
            exit;
        }
    }
}

// Aquí ejecutamos la clase
new UsuarioExistente();
?>