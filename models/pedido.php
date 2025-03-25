<?php
  require_once 'modelobase.php';
  class Pedido extends ModeloBase{
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    
    public function __construct(){
      parent::__construct();
    }

    function getId() {
      return $this->id;
    }

    function getUsuario_id() {
      return $this->usuario_id;
    }

    function getProvincia() {
      return $this->provincia;
    }

    function getLocalidad() {
      return $this->localidad;
    }

    function getDireccion() {
      return $this->direccion;
    }

    function getCoste() {
      return $this->coste;
    }

    function getEstado() {
      return $this->estado;
    }

    function getFecha() {
      return $this->fecha;
    }

    function getHora() {
      return $this->hora;
    }

    function setId($id) {
      $this->id = $id;
    }

    function setUsuario_id($usuario_id) {
      $this->usuario_id =  $usuario_id;
    }

    function setProvincia($provincia) {
      $this->provincia = $this->db->real_escape_string($provincia);
    }

    function setLocalidad($localidad) {
      $this->localidad = $this->db->real_escape_string($localidad);
    }

    function setDireccion($direccion) {
      $this->direccion = $this->db->real_escape_string($direccion);
    }

    function setCoste($coste) {
      $this->coste = $coste;
    }

    function setEstado($estado) {
      $this->estado = $estado;
    }

    function setFecha($fecha) {
      $this->fecha = $fecha;
    }

    function setHora($hora) {
      $this->hora = $hora;
    }

    public function getOne(){
      $sql = "Select * From pedidos Where id = {$this->getId()}";
      $pedido = $this->db->query($sql);
      return $pedido->fetch_object();
    }

    public function getOneByUser(){
      $sql = "Select p.id, p.coste From pedidos p "
        . "Where p.usuario_id = {$this->getUsuario_id()} Order By p.fecha Desc Limit 1";
      $pedido = $this->db->query($sql);
      return $pedido->fetch_object();
    }

    public function getProductosByPedido($id){
      $sql = "Select pr.nombre, pr.precio, pr.imagen, lp.unidades From productos pr "
        . "Inner Join lineas_pedidos lp On pr.id = lp.producto_id "
        . "Where lp.pedido_id = {$id}";
      $productos = $this->db->query($sql);
      return $productos;
    }

    public function save(){
      $sql = "Insert Into pedidos Values(null, '{$this->getUsuario_id()}', '{$this->getProvincia()}', '{$this->getLocalidad()}', '{$this->getDireccion()}', {$this->getCoste()}, 'confirm', CURDATE(), CURTIME());";
      $save = $this->db->query($sql);
      $result = false;
      if($save){
        $result = true;
      }
      return $result;
    }

    public function save_linea(){
      $sql = "Select Last_Insert_Id() as pedido;";
      $query = $this->db->query($sql);
      $pedido_id = $query->fetch_object()->pedido;
      foreach($_SESSION['carrito'] as $elemento){
        $producto = $elemento['producto'];
        $insert = "Insert into lineas_pedidos Values(null, {$pedido_id}, {$producto->id}, {$elemento['unidades']})";
        $save = $this->db->query($insert);
      }
      $result = false;
      if($save){
        $result = true;
      }
      return $result;
    }

    // public function login(){
    //   $result = false;
    //   $email = $this->email;
    //   $password = $this->password;
    //   $sql = "Select * From usuarios Where email = '$email'";
    //   $login = $this->db->query($sql);
    //   if($login && $login->num_rows == 1){
    //     $usuario = $login->fetch_object();
    //     $verify = password_verify($password, $usuario->password);
    //     if($verify){
    //       $result = $usuario;
    //     }
    //   }
    //   return $result;
    // }
  }
?>