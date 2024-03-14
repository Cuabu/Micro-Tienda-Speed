<?php
// Verifica si se ha enviado un archivo
if(isset($_FILES['profile_picture'])) {
    $file = $_FILES['profile_picture'];

    // Obtiene la información del archivo
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    // Obtiene la extensión del archivo
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Extensiones permitidas
    $allowedExtensions = array('jpg', 'jpeg', 'png');

    // Verifica si la extensión del archivo es válida
    if(in_array($fileExt, $allowedExtensions)) {
        // Verifica si no hay errores en la carga del archivo
        if($fileError === 0) {
            // Genera un nombre único para el archivo
            $fileNameNew = uniqid('', true) . "." . $fileExt;
            
            // Ruta de destino para almacenar la imagen
            $fileDestination = 'uploads/' . $fileNameNew;

            // Mueve el archivo a la ubicación de destino
            move_uploaded_file($fileTmpName, $fileDestination);

            // Redirige de vuelta al perfil
            header("Location: profile.php?uploadsuccess");
        } else {
            // Si hay un error en la carga del archivo
            echo "Hubo un error al cargar el archivo.";
        }
    } else {
        // Si la extensión del archivo no es válida
        echo "No puedes subir archivos de este tipo.";
    }
} else {
    // Si no se ha enviado ningún archivo
    echo "No se ha seleccionado ningún archivo.";
}
?>
