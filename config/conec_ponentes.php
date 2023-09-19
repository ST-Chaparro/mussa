<?php
  
  $conexion = mysqli_connect('localhost', 'root', '', 'ponentes')
  or die(mysqli_error($mysqli));

  insertar($conexion);
  function insertar($conexion) {
    $ejeTematico = $_POST["ejeTematico"];
    $institucion = $_POST["institucion"];
    // Recibir datos del formulario
    $nombreInstitucion = $_POST["nombreInstitucion"];
    $programaFormacion = $_POST["programaFormacion"];
    $codigoFicha = $_POST["codigoFicha"];
    $nombrePonente = $_POST["nombrePonente"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $tituloProyecto = $_POST["tituloProyecto"];
    $tipoProyecto = $_POST["tipoProyecto"];
      
    $consulta = "INSERT INTO register_ponentes(ejeTematico, 
    institucion, nombreInstitucion, programaFormacion, codigoFicha, nombrePonente, correo, telefono, tituloProyecto, tipoProyecto) values('$ejeTematico', 
    '$institucion', '$nombreInstitucion', '$programaFormacion', '$codigoFicha', '$nombrePonente', '$correo', '$telefono', '$tituloProyecto', '$tipoProyecto') ";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);


    

   }
  
  

?>
