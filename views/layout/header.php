<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Tienda Online</title>
  <link rel="stylesheet" href="<?=base_url?>assets/css/style.css">
</head>
<body>
  <!-- Cabecera -->
  <header class="Conthcl" style="height: 60px;">
    <img class="ImgLog2" src="<?=base_url?>assets/images/amisoftoscuro80x40.png" style="margin-left: 20px;" alt="Logo Amisoft"/>
    <a class="txtitle20" href="<?=base_url?>" style="margin-left: 20px;">Tienda Online</a>
  </header>

  <!-- Menu -->
  <nav id="menu" class="Conthcc">
    <?php $categorias = Utils::showCategorias(); ?>
    <ul>
      <li><a href="<?= base_url ?>">Inicio</a></li>
      <?php while($cat = $categorias->fetch_object()): ?>
        <li><a href="<?= base_url ?>/categoria/ver&id=<?= $cat->id ?>"><?= $cat->nombre ?></a></li>
      <?php endwhile; ?>
    </ul>
  </nav>
  <div id="content" class="Contptl">
