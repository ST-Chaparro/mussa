<?php

   $conexion = mysqli_connect('localhost', 'root', '', 'ponentes')
  or die(mysqli_error($mysqli));

  insertar($conexion);
  function insertar($conexion) {
    $categoria = $_POST["categoria"];
    $institucion = $_POST["institucion"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];

    $consulta = "INSERT INTO regsiter_robotica (categoria, institucion, nombre, correo, telefono)
        values ('$categoria', '$institucion', '$nombre', '$correo', '$telefono')";
      mysqli_query($conexion, $consulta);
      mysqli_close($conexion);

  }


?>