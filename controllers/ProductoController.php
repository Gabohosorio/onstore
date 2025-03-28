<?php
  require_once 'models/producto.php';
  class ProductoController{
    public function index(){
      $producto = new Producto();
      $productos = $producto->getRandom(6);
      require_once 'views/producto/destacados.php';
    }    

    public function gestion(){
      Utils::isAdmin();
      $producto = new Producto();
      $productos = $producto->getAll('productos'); 
      require_once 'views/producto/gestion.php';
    }    

    public function crear(){
      Utils::isAdmin();
      require_once 'views/producto/crear.php';
    }

    public function ver(){
      if(isset($_GET['id'])){
        $producto = new Producto();
        $producto->setId($_GET['id']);
        $product = $producto->getOne();
      }
      require_once 'views/producto/ver.php';
    }

    public function save(){
      Utils::isAdmin();
      if(isset($_POST)){
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
        $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
        $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
        // $oferta = isset($_POST['oferta']) ? $_POST['oferta'] : false;
        // $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
    
        if($categoria && $nombre && $descripcion && $precio && $stock){
          $producto = new Producto();
          $producto->setCategoria_id($categoria);
          $producto->setNombre($nombre);
          $producto->setDescripcion($descripcion);
          $producto->setPrecio($precio);
          $producto->setStock($stock);
          
          if(isset($_FILES['imagen'])){
            $file = $_FILES['imagen'];
            $filename = $file['name'];
            $minetype = $file['type'];
  
            if ($minetype == 'image/jpg' || $minetype == 'image/jpeg' || $minetype == 'image/png' || $minetype == 'image/gif'){
              if(!is_dir('uploads/images')){
                mkdir('uploads/images', 0777, true);
              }
              $producto->setImagen($filename);
              move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
            }
          }
          
          if(isset($_GET['id'])){
            $producto->setId($_GET['id']);
            $save = $producto->edit();
          }else{
            $save = $producto->save();
          }
          
          if($save){
            $_SESSION['producto'] = 'completed';
          }else{
            $_SESSION['producto'] = 'failed';
          }
        }else{
          $_SESSION['producto'] = 'failed';
        }
      }else{
        $_SESSION['producto'] = 'failed';
      }
      header('Location:'.base_url.'producto/gestion');
    }

    public function editar(){
      Utils::isAdmin();
      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $edit = true;
        $producto = new Producto();
        $producto->setId($id);
        $pro = $producto->getOne();
        require_once 'views/producto/crear.php';
      }else{
        header('Location:'.base_url.'producto/gestion');
      }
    }

    public function eliminar(){
      Utils::isAdmin();
      if(isset($_GET['id'])){
        $producto = new Producto();
        $producto->setId($_GET['id']);
        $delete =  $producto->delete();
        if($delete){
          $_SESSION['delete'] = 'completed';
        }else{
          $_SESSION['delete'] = 'failed';
        }
      }else{
        $_SESSION['delete'] = 'failed';
      }
      header('Location:'.base_url.'producto/gestion');
    }
  }
?>