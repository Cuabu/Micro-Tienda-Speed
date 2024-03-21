// Función para cargar y mostrar la imagen
function mostrarImagen() {
    // Hacer una solicitud AJAX para obtener la imagen
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "imagen.php", true);
    xhr.responseType = "blob";

    xhr.onload = function() {
        if (xhr.status === 200) {
            // Crear un objeto URL para la imagen
            var imgUrl = URL.createObjectURL(xhr.response);

            // Mostrar la imagen en un elemento <img>
            var imgElement = document.createElement("img");
            imgElement.src = imgUrl;
            imgElement.alt = "Imagen del producto";
            imgElement.style.maxWidth = "100%"; // Establecer el ancho máximo

            // Mostrar la imagen en un contenedor en el documento
            var imgContainer = document.getElementById("imagen-container");
            imgContainer.innerHTML = ""; // Limpiar el contenedor
            imgContainer.appendChild(imgElement);
        }
    };

    xhr.send();
}

// Llamar a la función para mostrar la imagen cuando se cargue la página
window.onload = mostrarImagen;
