<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE usuarios SET nombre='$nombre', email='$email', telefono='$telefono' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error actualizando el registro: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM usuarios WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Editar Usuario</h1>
    <form method="POST" action="">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
        <br>
        <label>Teléfono:</label>
        <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>" required>
        <br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
