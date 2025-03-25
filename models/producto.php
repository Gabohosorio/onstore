<?php
  require_once 'modelobase.php';
  class Producto extends ModeloBase{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;

    public function __construct(){
      parent::__construct();
    }

    function getId() {
      return $this->id;
    }

    function setId($id) {
      $this->id = $id;
    }

    function getCategoria_id() {
      return $this->categoria_id;
    }

    function setCategoria_id($categoria_id) {
      $this->categoria_id = $categoria_id;
    }

    function getNombre() {
      return $this->nombre;
    }

    function setNombre($nombre) {
      $this->nombre = $this->db->real_escape_string($nombre);
    }

    function getDescripcion() {
      return $this->descripcion;
    }

    function setDescripcion($descripcion) {
      $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function getPrecio() {
      return $this->precio;
    }

    function setPrecio($precio) {
      $this->precio = $this->db->real_escape_string($precio);
    }

    function getStock() {
      return $this->stock;
    }

    function setStock($stock) {
      $this->stock = $this->db->real_escape_string($stock);
    }

    function getOferta() {
      return $this->oferta;
    }

    function setOferta($oferta) {
      $this->oferta = $this->db->real_escape_string($oferta);
    }

    function getFecha() {
      return $this->fecha;
    }

    function setFecha($fecha) {
      $this->fecha = $fecha;
    }

    function getImagen() {
      return $this->imagen;
    }

    function setImagen($imagen) {
      $this->imagen = $imagen;
    }

    public function getAllCategory(){
      $sql = "Select p.*, c.nombre As 'catnombre' From productos p "
            ."Inner Join categorias c On c.id = p.categoria_id "
            ."Where p.categoria_id = {$this->getCategoria_id()} Order By id Desc";
      $productos = $this->db->query($sql);
      return $productos;
    }

    public function getRandom($limit){
      $sql = "Select * From productos Order By Rand() Limit  $limit";
      $productos = $this->db->query($sql);
      return $productos;
    }

    public function getOne(){
      $sql = "Select * From productos Where id = {$this->getId()}";
      $producto = $this->db->query($sql);
      return $producto->fetch_object();
    }

    public function save(){
      $sql = "Insert Into productos Values(null, '{$this->getCategoria_id()}', '{$this->getNombre()}', '{$this->getDescripcion()}',
       '{$this->getPrecio()}', '{$this->getStock()}', 'null', CURDATE(), '{$this->getImagen()}');";
      $save = $this->db->query($sql);

      // echo $this->db->error;
      $result = false;
      if($save){
        $result = true;
      }
      return $result;
    }

    public function edit(){
      $sql = "Update productos Set categoria_id='{$this->getCategoria_id()}', nombre='{$this->getNombre()}'";
      $sql .= ", descripcion='{$this->getDescripcion()}', precio='{$this->getPrecio()}', stock='{$this->getStock()}'";
      if($this->getImagen() != null){
        $sql .= ", imagen='{$this->getImagen()}'";
      }
      $sql .= " Where id={$this->getId()};";

      $save = $this->db->query($sql);
      $result = false;
      if($save){
        $result = true;
      }
      return $result;
    }

    public function delete(){
      $sql = "Delete From productos Where id={$this->getId()}";
      $delete = $this->db->query($sql);
      $result = false;
      if($delete){
        $result = true;
      }
      return $result;
    }
  }
?>