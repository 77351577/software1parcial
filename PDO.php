<?php

  class database extends PDO {

    private $config = array(
      'host' => 'localhost',
      'user' => 'root',
      'password' => '',
      'db' => 'colegio'
    );
    private $con;

    public function __construct() {

        try {
          $this->con = new PDO('mysql:host='.$this->config['host'].';dbname='.$this->config['db'], $this->config['user'], $this->config['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $e) {
          die();
        }

    }

    public function getConnection() {
      return $this->con;
    }

    public function __destruct() {
      $this->con = null;
    }

  }

?>
