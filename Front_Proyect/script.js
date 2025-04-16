document.addEventListener("click", function (event) {
    if (event.target.classList.contains("boton-mas")) {
        event.preventDefault();

        const formContainer = document.getElementById("form-container");
        const formCount = formContainer.querySelectorAll(".form").length;

        if (formCount < 5) {
            const originalForm = document.querySelector(".form");
            const newForm = originalForm.cloneNode(true);

            // Limpiar valores
            newForm.querySelectorAll("input").forEach(input => input.value = "");

            // Quitar botones extra
            newForm.querySelector(".boton-mas")?.remove();
            newForm.querySelector(".boton-guardar")?.remove();

            // ✅ Crear botón de eliminar
            const botonEliminar = document.createElement("button");
            botonEliminar.textContent = "Eliminar";
            botonEliminar.classList.add("boton-eliminar");
            botonEliminar.style.marginTop = "10px"; // puedes estilizarlo más con CSS
            botonEliminar.type = "button";
            newForm.appendChild(botonEliminar);

            formContainer.appendChild(newForm);
        } else {
            alert("Solo puedes agregar hasta 5 estudiantes.");
        }
    }

    // ✅ Eliminar formulario al hacer clic en "Eliminar"
    if (event.target.classList.contains("boton-eliminar")) {
        const formToRemove = event.target.closest(".form");
        formToRemove.remove();
    }
});





