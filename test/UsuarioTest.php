<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../modelos/usuario.php';  // Ajustamos la ruta

class UsuarioTest extends TestCase
{
    public function testBuscarUsuarioConCredencialesValidas()
    {
        $usuario = new Usuario();
        $resultado = $usuario->buscarUsuario('lucas.mg@estudiantes.upm.es', '1234pass');
        $this->assertTrue($resultado);
    }

    public function testBuscarUsuarioConCredencialesInvalidas()
    {
        $usuario = new Usuario();
        $resultado = $usuario->buscarUsuario('correo@example.com', 'clave_incorrecta');
        $this->assertFalse($resultado);
    }
    public function testRegistrarUsuario()
    {
        $usuario = new Usuario();

        $nombre = "TestNombre";
        $apellidos = "TestApellido";
        $fecha_nacimiento = "2000-01-01";
        $email = "test" . uniqid() . "@example.com"; // Correo único para evitar conflictos
        $nick = "test" . uniqid();
        $contrasena = "test1234";

        // Ejecutar el registro
        $resultado = $usuario->registrarUsuario($nombre, $apellidos, $fecha_nacimiento, $email, $nick, $contrasena);

        // Verificamos que devuelve true si se insertó correctamente
        $this->assertTrue($resultado);
    }

}

