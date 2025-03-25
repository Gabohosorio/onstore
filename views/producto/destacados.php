    <!-- Contenido Central -->
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
