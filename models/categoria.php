<?php
  require_once 'modelobase.php';
  class Categoria extends ModeloBase{
    private $id;
    private $nombre;
    //private $db;

    public function __construct(){
      parent::__construct();
    }

    function getId() {
      return $this->id;
    }

    function setId($id) {
      $this->id = $id;
    }

    function getNombre() {
      return $this->nombre;
    }

    function setNombre($nombre) {
      $this->nombre =  $this->db->real_escape_string($nombre);
    }

    public function getOne(){
      $categoria = $this->db->query("Select * From categorias Where id = {$this->getId()};");
      return $categoria->fetch_object();
    }
 
    public function save(){
      $sql = "Insert Into categorias Values(null, '{$this->getNombre()}');";
      $save = $this->db->query($sql);
      $result = false;
      if($save){
        $result = true;
      }
      return $result;
    }
  }
?>