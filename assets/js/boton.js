document.addEventListener("DOMContentLoaded", () => {
    const toggleButton = document.getElementById("toggleMode");
    const modoTexto = document.getElementById("modoTexto");
    const modoIcono = document.getElementById("modoIcono");

    if (!toggleButton || !modoTexto || !modoIcono) return;

    const actualizarBoton = (modo) => {
        if (modo === "dark") {
            modoTexto.textContent = "Modo claro";
            modoIcono.classList.remove("bi-moon");
            modoIcono.classList.add("bi-sun", "rotar");
        } else {
            modoTexto.textContent = "Modo oscuro";
            modoIcono.classList.remove("bi-sun");
            modoIcono.classList.add("bi-moon", "rotar");
        }

        // Quitar rotación tras la animación para evitar acumulación
        setTimeout(() => modoIcono.classList.remove("rotar"), 400);
    };

    const savedMode = localStorage.getItem("modo");
    if (savedMode === "dark") {
        document.body.classList.add("dark");
        actualizarBoton("dark");
    } else {
        document.body.classList.add("light");
        actualizarBoton("light");
    }

    toggleButton.addEventListener("click", () => {
        document.body.classList.toggle("dark");
        document.body.classList.toggle("light");

        const modoActual = document.body.classList.contains("dark") ? "dark" : "light";
        localStorage.setItem("modo", modoActual);
        actualizarBoton(modoActual);

        const cards = document.querySelectorAll(".card");
        cards.forEach(card => {
            card.classList.toggle("dark");
            card.classList.toggle("light");
        });
    });
});


