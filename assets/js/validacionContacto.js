document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("contactoForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Evita el envío por defecto

        // Obtener valores
        let email = document.getElementById("email");
        let nombre = document.getElementById("nombre");
        let mensaje = document.getElementById("mensaje");

        let emailValido = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        let nombreValido = /^[a-zA-Z\s]+$/;

        let esValido = true;

        // Validación de Email
        if (!emailValido.test(email.value)) {
            email.classList.add("is-invalid");
            esValido = false;
        } else {
            email.classList.remove("is-invalid");
            email.classList.add("is-valid");
        }

        // Validación de Nombre
        if (!nombreValido.test(nombre.value)) {
            nombre.classList.add("is-invalid");
            esValido = false;
        } else {
            nombre.classList.remove("is-invalid");
            nombre.classList.add("is-valid");
        }

        // Validación de Mensaje
        if (mensaje.value.trim() === "") {
            mensaje.classList.add("is-invalid");
            esValido = false;
        } else {
            mensaje.classList.remove("is-invalid");
            mensaje.classList.add("is-valid");
        }

        // Si todo está correcto, mostrar alerta y limpiar el formulario
        if (esValido) {
            alert("Tu mensaje ha sido enviado.");
            email.value = "";
            nombre.value = "";
            mensaje.value = "";
            email.classList.remove("is-valid");
            nombre.classList.remove("is-valid");
            mensaje.classList.remove("is-valid");
        }
    });
});