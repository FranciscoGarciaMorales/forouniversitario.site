document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("contactoForm");
    const botonEnviar = form.querySelector("button[type='submit']"); 
        
        form.addEventListener("submit", function (event) {
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

        if (esValido) {
        botonEnviar.disabled = true;  // dESABILITAMOS EL BTN ENVIAR PARA NO REENVIAR EL MISMO

        const datos = new FormData();
        datos.append("email", email.value);
        datos.append("nombre", nombre.value);
        datos.append("mensaje", mensaje.value);

        fetch("/forouniversitario.sitegithub/controladores/notificaciones.php", {
        method: "POST",
        body: datos,
        })
        .then(response => response.text())
        .then(respuesta => {
        if (respuesta.trim() === "ok") {
            alert("Tu mensaje ha sido enviado correctamente.");
            email.value = "";
            nombre.value = "";
            mensaje.value = "";
            email.classList.remove("is-valid");
            nombre.classList.remove("is-valid");
            mensaje.classList.remove("is-valid");
        } else {
            alert("Error al enviar el mensaje. Intenta más tarde.");    
        }
        botonEnviar.disabled = false;  // Aqui habilitamos
        })
        .catch(error => {
        console.error("Error:", error);
        alert("Hubo un problema al enviar el mensaje.");
        botonEnviar.disabled = false;  // volvemos a habilitar
        });
        }
    });
});