// Evento para el envío del formulario de inicio de sesión
document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita que el formulario se envíe automáticamente

    // Obtener los valores de los campos de entrada
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    // Realizar la validación de los campos (aquí puedes agregar más validaciones según tus requerimientos)

    // Envío de datos al servidor utilizando AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "views/resources/backend/log.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Manejar la respuesta del servidor (si es necesario)
            console.log(xhr.responseText);
            // Redirigir a la página de perfil después del inicio de sesión exitoso
            window.location.href = "views/resources/dashboard/perfil_config.html";
        }
    };
    xhr.send("email=" + email + "&password=" + password);
});
