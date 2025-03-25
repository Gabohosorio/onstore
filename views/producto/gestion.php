<div class="Contvtc" style="width: 90%;">
  <div class="Contvcc" style="width: 100%;">
    <h1>Gestión de productos</h1></br>
    <hr width="70%"></br>
  </div>
  <div class="Contvtl" style="width: 70%;">
    <a class="Bt4" href="<?=base_url?>producto/crear">Crear producto</a></br>
    
    <?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'completed'): ?>
      <strong class="alt_green">El producto se ha creado correctamente</strong>
    <?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'completed'): ?>
      <strong class="alt_red">Error: Producto NO creado!!</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('producto'); ?>
    
    <?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'completed'): ?>
      <strong class="alt_green">El producto se ha Borrado correctamente</strong>
    <?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'completed'): ?>
      <strong class="alt_red">Error: Producto NO se ha Borrado!!</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('delete'); ?>

    <table>
      <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>
      </tr>
      <?php while($pro = $productos->fetch_object()): ?>
        <tr>
          <td><?= $pro->id; ?></td>
          <td><?= $pro->nombre; ?></td>
          <td><?= $pro->precio; ?></td>
          <td><?= $pro->stock; ?></td>
          <td class="Conthcs">
            <a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="Bt2">Editar</a>
            <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="Bt2r">Eliminar</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</div>