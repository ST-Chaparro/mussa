<?php

  $conexion = mysqli_connect('localhost', 'root', '' ,'ponentes')
  or die(mysqli_error($mysqli));


  insert($conexion);
  function insert($conexion) {
    $institucion = $_POST["institucion"];
    $numero_personas = $_POST["numero_personas"];
    $titulo_proyecto = $_POST["titulo_proyecto"];
  

    $consulta = "INSERT INTO register_feria (institucion, numero_personas, titulo_proyecto)
    VALUES('$institucion', '$numero_personas', '$titulo_proyecto')";
      mysqli_query($conexion, $consulta);
      mysqli_close($conexion);


  }





?>