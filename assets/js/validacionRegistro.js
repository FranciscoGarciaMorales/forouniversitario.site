document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("#registroForm").addEventListener("submit", function (event) {
        //event.preventDefault(); // Evita que el formulario se envíe automáticamente

        let errores = [];
        let nombre = document.getElementById("floatingName").value.trim();
        let apellido = document.getElementById("floatingLastname").value.trim();
        let nick = document.getElementById("floatingNick").value.trim();
        let password = document.getElementById("floatingPassword").value.trim();
        let fechaNacimiento = document.getElementById("floatingdate").value;
        let checkTerminos = document.getElementById("flexCheckDefault").checked;

        // Validacion del nombre y apellido (máx 30 caracteres)
        if (nombre.length > 30) errores.push("El nombre debe tener máximo 30 caracteres.");
        if (apellido.length > 30) errores.push("El apellido debe tener máximo 30 caracteres.");

        // Validacion de la contraseña (solo alfanumérica)
        if (!/^[a-zA-Z]+/.test(nombre&&apellido)) {
            errores.push("La el nombre y apellido solo puede ser de la A - Z...");
        }
        
        // Validacion de Nick (solo letras y números, sin espacios, máx 10 caracteres)
        if (!/^[a-zA-Z0-9]{1,10}$/.test(nick)) {
            errores.push("El nick debe tener máximo 10 caracteres, solo letras y números, sin espacios.");
        }

        // Validacion de la contraseña (solo alfanumérica)
        if (!/^[a-zA-Z0-9]+$/.test(password)) {
            errores.push("La contraseña debe ser alfanumérica (sin símbolos ni espacios).");
        }

        // Validacion de la edad mínima de 18 años
        let fechaNacimientoObj = new Date(fechaNacimiento);
        let fechaActual = new Date();
        let edad = fechaActual.getFullYear() - fechaNacimientoObj.getFullYear();

        // Ajuste por mes/día
        if (fechaActual.getMonth() < fechaNacimientoObj.getMonth() || 
           (fechaActual.getMonth() === fechaNacimientoObj.getMonth() && fechaActual.getDate() < fechaNacimientoObj.getDate())) {
            edad--;
        }

        if (edad < 18) {
            errores.push("Debes tener al menos 18 años para registrarte.");
        }

        // Validar términos y condiciones
        if (!checkTerminos) {
            errores.push("Debes aceptar los términos y condiciones.");
        }
        
        // Mostrar errores o mensaje de éxito
        if (errores.length > 0) {
            alert(errores.join("\n")); // Muestra los errores en una alerta
        } else {
            alert("Registro exitoso ✅ \n Serás redirigido al inicio para iniciar sesión...");

            // Redirige a index.php después de 2 segundos
            setTimeout(() => {
                //He puesto esto, ya que con esa ruta no me redirecciona al index
                //window.location.href = "/proyecto_forouniversitario/vistas/home/index.php";
                window.location.href = "index.php";
            }, 2000);
        }
    });
});