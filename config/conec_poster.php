<?php

     $conexion = mysqli_connect('localhost', 'root', '', 'ponentes')
     or die(mysqli_error($mysqli));
  
  insertar($conexion); 
  function insertar($conexion) {
    $institucion = $_POST["institucion"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $titulo = $_POST["titulo"];
  

    $consulta = "INSERT INTO register_poster(institucion, nombre, correo, telefono, titulo)
    values ('$institucion', '$nombre', '$correo',$telefono','$titulo')";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
  }

?>
