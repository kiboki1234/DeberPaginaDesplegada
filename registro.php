<?php
include 'db.php';

$nombre = $email = $telefono = "";
$success_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y limpiar los datos
    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $telefono = trim($_POST["telefono"]);

    // Insertar en la base de datos si no hay errores
    $sql = "INSERT INTO usuarios (nombre, email, telefono) VALUES (?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $param_nombre, $param_email, $param_telefono);
        $param_nombre = $nombre;
        $param_email = $email;
        $param_telefono = $telefono;
        if ($stmt->execute()) {
            $success_msg = "Registro exitoso.";
            $nombre = $email = $telefono = "";
        } else {
            echo "Algo salió mal. Por favor, inténtelo de nuevo.";
        }
        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="css/register.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <?php if (!empty($success_msg)): ?>
        <p class="success"><?php echo $success_msg; ?></p>
    <?php endif; ?>
    <form id="registrationForm" method="post" action="registro.php">
        <label>Nombre</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
        <span class="error" id="nombreError"></span>
        <br>
        <label>Email</label>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>">
        <span class="error" id="emailError"></span>
        <br>
        <label>Teléfono</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
        <span class="error" id="telefonoError"></span>
        <br>
        <button type="submit">Registrar</button>
    </form>
    <button onclick="location.href='index.php'">Regresar</button>
</body>
</html>
