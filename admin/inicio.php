<?php
$conexion = mysqli_connect('localhost', 'root', '', 'ponentes') or die(mysqli_error($mysqli));

$sql = "SELECT * FROM regsiter_robotica"; // Debería ser "register_robotica" en lugar de "regsiter_robotica"
$result = $conexion->query($sql);
?>

<html>
<body>
    <h2>Lista de inscritos</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Categoria</th> <!-- Cambiado de 'categoria' -->
            <th>Institucion</th> <!-- Cambiado de 'institucion' -->
            <th>Nombre</th>
            <th>Correo</th>
            <the>Telefono</th>
        </tr>
        <?php while ($fila = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['categoria']; ?></td>
                <td><?php echo $fila['institucion']; ?></td>
                <td><?php echo $fila['correo']; ?></td>
                <td><?php echo $fila['telefono']; ?></td> 
                
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
$conexion = mysqli_connect('localhost', 'root', '', 'ponentes') or die(mysqli_error($conexion));

// Comprueba si se ha proporcionado un ID válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Comprueba si se ha enviado una solicitud POST para actualizar datos
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoria']) && isset($_POST['institucion']) && isset($_POST['nombre'])) {
        // Recoge los datos del formulario
        $categoria = $_POST['categoria'];
        $institucion = $_POST['institucion'];
        $nombre = $_POST['nombre'];

        // Construye la consulta de actualización
        $sql = "UPDATE regsiter_robotica SET categoria='$categoria', institucion='$institucion', nombre='$nombre' WHERE id=$id";

        // Ejecuta la consulta
        if ($conexion->query($sql) === TRUE) {
            header('Location: inicio.php'); // Redirige a la página principal
            exit();
        } else {
            echo 'Error: ' . $sql . '<br>' . $conexion->error;
        }
    }

    // Construye la consulta para obtener los datos del registro a editar
    $sql = "SELECT * FROM regsiter_robotica WHERE id=$id";

    // Ejecuta la consulta
    $result = $conexion->query($sql);

    // Comprueba si la consulta se ejecutó correctamente y obtiene los datos
    if ($result) {
        $fila = $result->fetch_assoc();
    } else {
        echo 'Error en la consulta: ' . $conexion->error;
    }
} else {
    echo 'ID no proporcionado en la URL';
}
?>

<html>
<body>
    <h2>Editar Usuario</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo isset($fila['id']) ? $fila['id'] : ''; ?>">
        Categoria: <input type="text" name="categoria" value="<?php echo isset($fila['categoria']) ? $fila['categoria'] : ''; ?>">
        Institucion: <input type="text" name="institucion" value="<?php echo isset($fila['institucion']) ? $fila['institucion'] : ''; ?>">
        Nombre: <input type="text" name="nombre" value="<?php echo isset($fila['nombre']) ? $fila['nombre'] : ''; ?>">
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
