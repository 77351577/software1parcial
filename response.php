<?php

  require_once 'class_subida.php';

  $subida = new subida();

  if ($_FILES['archivo']['size'] > 0) {

    $nombreArchivo    = $_FILES['archivo']['name'];
    $nombreTmpArchivo = $_FILES['archivo']['tmp_name'];

    if (move_uploaded_file($nombreTmpArchivo, 'uploads/'.$nombreArchivo)){

      if ($subida->registerArchivo(1, $_POST['etiqueta'], 'uploads/'.$nombreArchivo)) {
        header('Location: index.php');
      } else {
        echo 'ERROR AL INGRESAR DATOS A LA BASE DE DATOS.';
      }

    }else{
      echo 'Ocurrió un error subiendo el archivo, valida los permisos de la carpeta "uploads"';
    }

  } else {

    header('Location: index.php');

  }


?>
