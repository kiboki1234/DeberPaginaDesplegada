document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("registrationForm").addEventListener("submit", function(event) {
        let isValid = true;

        // Obtener los valores de los campos
        const nombre = document.getElementById("nombre").value.trim();
        const email = document.getElementById("email").value.trim();
        const telefono = document.getElementById("telefono").value.trim();

        // Obtener los elementos de error
        const nombreError = document.getElementById("nombreError");
        const emailError = document.getElementById("emailError");
        const telefonoError = document.getElementById("telefonoError");

        // Limpiar los mensajes de error
        nombreError.textContent = "";
        emailError.textContent = "";
        telefonoError.textContent = "";

        // Validar nombre
        if (nombre === "") {
            nombreError.textContent = "Por favor ingrese un nombre.";
            isValid = false;
        } else if (!/^[a-zA-Z\s]+$/.test(nombre)) {
            nombreError.textContent = "El nombre solo puede contener letras y espacios.";
            isValid = false;
        }

        // Validar email
        if (email === "") {
            emailError.textContent = "Por favor ingrese un email.";
            isValid = false;
        } else if (!/\S+@\S+\.\S+/.test(email)) {
            emailError.textContent = "Formato de email no válido.";
            isValid = false;
        }

        // Validar teléfono
        if (telefono === "") {
            telefonoError.textContent = "Por favor ingrese un teléfono.";
            isValid = false;
        } else if (!/^[0-9]{10,20}$/.test(telefono)) {
            telefonoError.textContent = "El teléfono debe contener solo números y tener entre 10 y 20 caracteres.";
            isValid = false;
        }

        // Si no es válido, evitar el envío del formulario
        if (!isValid) {
            event.preventDefault();
        }
    });
});
