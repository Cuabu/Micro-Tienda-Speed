    <?php
    // Verificar si se recibieron datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conectar a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "speed_store";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Obtener los datos del formulario
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Verificar si el usuario ya existe en la base de datos
        $sql = "SELECT * FROM registrados WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // El usuario ya existe, mostrar mensaje de error
            echo "El usuario ya está registrado.";
        } else {
            // El usuario no existe, insertar datos en la base de datos
            $sql = "INSERT INTO registrados (fullname, email, password) VALUES ('$fullname', '$email', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "Usuario registrado correctamente.";
            } else {
                echo "Error al registrar el usuario: " . $conn->error;
            }
        }

        // Cerrar la conexión
        $conn->close();
    }
    ?>
