<?php
  require_once 'config/db.php';
  class ModeloBase{
    public $db;

    public function __construct()
    { $this->db = Database::connect();     
    }
    
    public function getAll($tabla){
      $query = $this->db->query("Select * From $tabla");
      return $query;
    }    
  }
?>