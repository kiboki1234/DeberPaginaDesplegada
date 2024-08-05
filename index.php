<?php
include 'db.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM usuarios WHERE nombre LIKE '%$search%' OR email LIKE '%$search%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Gestión de Usuarios</h1>
    <form method="GET" action="index.php">
        <input type="text" name="search" placeholder="Buscar usuarios" value="<?php echo $search; ?>">
        <button type="submit">Buscar</button>
    </form>
    <button onclick="location.href='registro.php'">Registrar</button>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td>
                <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                <a href="eliminar.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <script src="js/script.js"></script>
</body>
</html>

<?php
$conn->close();
?>
