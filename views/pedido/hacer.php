<div class="Contvtc" style="width: 90%;">
  <div class="Contvcc" style="width: 100%;">
    <h3>Hacer Pedido</h3>
    <hr style="width: 60%;"><br>
    <?php if(isset($_SESSION['identity'])): ?>
      <a class="link" href="<?=base_url?>carrito/index">Ver Carrito</a><br>
      <form class="Contvtl" action="<?=base_url?>pedido/add" method="POST">
        <label for="provincia">Barrio</label>
        <input type="text" name="provincia" required>
        <label for="ciudad">Ciudad</label>
        <input type="text" name="localidad" required>
        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" required>
        <input class="Bt4v" type="submit" value="Confirmar pedido">
      </form>
    <?php else: ?>
      <h4>Necesitas iniciar sesión para hacer el pedido</h4>
    <?php endif; ?>
  </div>
</div>