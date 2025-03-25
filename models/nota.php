<?php
  require_once 'ModeloBase.php';
  class Nota extends ModeloBase{
    public $id_usuario;
    public $titulo;
    public $descripcion;

    public function __construct()
    { parent::__construct();      
    }

    public function getId_usuario(){
      return $this->id_usuario;
    }
    public function setId_usuario($id_usuario){
      $this->id_usuario = $id_usuario;
    }
    public function getTitulo(){
      return $this->titulo;
    }
    public function setTitulo($titulo){
      $this->titulo = $titulo;
    }
    public function getDescripcion(){
      return $this->descripcion;
    }
    public function setDescripcion($descripcion){
      $this->descripcion = $descripcion;
    }

    public function guardar(){
      $sql =  "Insert Into notas(id_usuario_nota, titulo_nota, descripcion_nota) ";
      $sql .= "values({$this->id_usuario}, '{$this->titulo}', '{$this->descripcion}');";
      $guardado = $this->db->query($sql);
      return $guardado;
    }
  }
?>