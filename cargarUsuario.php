<?php

require_once 'views/heard.php';
require_once 'config/connection.php';

// Comprobar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $mensaje = $_POST['mensaje'];

    // Conectarse a la base de datos
    $conn = DataBase::connect();

    // Verificar si hay algún error en la conexión
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para insertar los datos del usuario
    $sql = "INSERT INTO usuarios (nombre, apellido, email, edad, mensaje)
            VALUES ('$nombre', '$apellido', '$email',$edad,'$mensaje')";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {

        $recipient = $email;
        $subject = 'Confirmación de registro en Base de Datos';

        $message = "Hola $nombre $apellido,\n\n";
        $message .= "Gracias por registrarte. Tu registro ha sido exitoso.\n";
        $message .= "A continuación, se muestran los detalles de tu registro:\n\n";
        $message .= "Nombre: $nombre\n";
        $message .= "Apellido: $apellido\n";
        $message .= "Email: $email\n";
        $message .= "Edad: $edad\n";
        $message .= "Mensaje: $mensaje\n\n";
        $message .= "Te damos la bienvenida y quedamos a tu disposición para cualquier consulta.\n\n";
        $message .= "Saludos,\n";
        $message .= "Equipo de Base de Datos";

        $fromEmail = 'sebasnecocitric@gmail.com';
        
        $headers = 'From: ' . $fromEmail . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        

        if (mail($recipient, $subject, $message, $headers)) {
            echo 'El correo electrónico ha sido enviado correctamente.';
        } else {
            echo 'Ha ocurrido un error al enviar el correo electrónico.';
        }
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulario de Registro</title>
</head>

<body>
    <h1>Formulario de Registro</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="edad">Edad:</label>
        <input type="number" name="edad" required><br>

        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" required></textarea><br>

        <input type="submit" value="Registrar">

    </form>

</body>

</html>

<?php require_once 'views/footer.php'; ?>