<div class="Contvtc" style="width: 90%;">
  <div class="Contvcc" style="width: 100%;">
    <?php if(isset($categoria)): ?>
      <h1><?= $categoria->nombre ?></h1>
    <?php else: ?>
      <h1>La categoria no existe</h1>
    <?php endif; ?>
    </br><hr width="70%"></br>
    <?php if($productos->num_rows == 0): ?>
      <p>No hay productos para mostrar</p>
    <?php else: ?>
      <div id="central" class="Conthcc">
        <?php while($product = $productos->fetch_object()): ?>
          <div class="product">
            <a href="<?=base_url?>/producto/ver&id=<?=$product->id?>">
              <?php if($product->imagen != null): ?>
                <img src="<?=base_url?>/uploads/images/<?=$product->imagen?>" alt="Foto del producto">
              <?php else: ?>
                <img src="<?=base_url?>assets/images/nodisponible.png" alt="Foto del producto">
              <?php endif; ?>
              <h2><?=$product->nombre?></h2>
              <p><?=$product->precio?></p>
              <a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="Bt1">Comprar</a>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</div>