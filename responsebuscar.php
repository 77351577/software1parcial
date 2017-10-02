<?php

require_once 'class_subida.php';

$subida = new subida();


if ($_POST['buscarid'] != '') {
  $list = $subida->getAllArchivosBuscar($_POST['buscarid']);
  if ($list != false) {
    echo json_encode($list);
  }
}

?>