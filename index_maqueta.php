<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Tienda Online</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <!-- Cabecera -->
  <header class="Conthcl" style="height: 60px;">
    <img class="ImgLog2" src="assets/images/amisoftoscuro80x40.png" style="margin-left: 20px;" alt="Logo Amisoft"/>
    <a class="txtitle20" href="index.php" style="margin-left: 20px;">Tienda Online</a>
  </header>

  <!-- Menu -->
  <nav id="menu" class="Conthcl">
    <ul>
      <li><a href="#">Inicio</a></li>
      <li><a href="#">Categoria 1</a></li>
      <li><a href="#">Categoria 2</a></li>
      <li><a href="#">Categoria 3</a></li>
      <li><a href="#">Categoria 4</a></li>
      <li><a href="#">Categoria 5</a></li>
    </ul>
  </nav>

  <div id="content" class="Contptl">
    <!-- Barra lateral -->
    <aside class="Contvtc block_aside" style="height: 100%;">
      <div id="login" class="Contvtc">
        <p class="txbloq">Entrar a la web</p>
        <form action="#" method="post">
          <label for="email">Email</label>
          <input type="email" name="email">
          <label for="password">Contraseña</label>
          <input type="password" name="password">
          <input class="Bt4" type="submit" value="Enviar">
        </form>
        <ul style="margin-top: 10px;">
          <li><a href="#">Mis pedidos</a></li>
          <li><a href="#">Gestionar pedidos</a></li>
          <li><a href="#">Gestionar categorias</a></li>
        </ul>
      </div>
    </aside>
    <!-- Contenido Central -->
    <div id="central" class="Conthcc">
      <div class="product">
        <img src="assets/shoes/dac2023.png" alt="#">
        <h2>Zapato azul ancho</h2>
        <p>30 euros</p>
        <a href="#" class="Bt1">Comprar</a>
      </div>
      <div class="product">
        <img src="assets/shoes/dac2023.png" alt="#">
        <h2>Zapato azul ancho</h2>
        <p>30 euros</p>
        <a href="#" class="Bt1">Comprar</a>
      </div>
      <div class="product">
        <img src="assets/shoes/dac2023.png" alt="#">
        <h2>Zapato azul ancho</h2>
        <p>30 euros</p>
        <a href="#" class="Bt1">Comprar</a>
      </div>
    </div>
  </div>

  <!-- Pie de página -->
  <footer id="footer">
    <p>Developed by GabohSoft &copy; <?=date('Y')?></p>
  </footer>
  </body>
</html>