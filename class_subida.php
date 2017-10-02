<?php

  require_once 'PDO.php';

  class subida {

    public function registerArchivo($idusuario, $tag, $ubicacion) {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('INSERT INTO archivo (idusuario, fecha, tag, ubicacion) VALUES (:idusuario, :fecha, :tag, :ubicacion)');

      $fecha = date('Y-m-d H:i:s');
      $query->bindParam(':idusuario', $idusuario, PDO::PARAM_INT);
      $query->bindParam(':fecha', $fecha, PDO::PARAM_STR);
      $query->bindParam(':tag', $tag, PDO::PARAM_STR);
      $query->bindParam(':ubicacion', $ubicacion, PDO::PARAM_STR);

      $query->execute();

      if ($query->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    }

    public function getAllArchivos() {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('SELECT * FROM archivo');

      $query->execute();

      if ($query->rowCount() > 0) {
        return $query->fetchAll(PDO::FETCH_OBJ);
      } else {
        return false;
      }
    }

    public function getAllArchivosBuscar($tagcito) {
      $database = new database();
      $db = $database->getConnection();
      $query = $db->prepare('SELECT * FROM archivo where tag LIKE :tagcito');
      $tagcitoa = '%'.$tagcito.'%';
      $query->bindParam(':tagcito', $tagcitoa, PDO::PARAM_STR);

      $query->execute();

      if ($query->rowCount() > 0) {
        return $query->fetchAll(PDO::FETCH_OBJ);
      } else {
        return false;
      }
    }

  }

?>
