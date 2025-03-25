<div class="Contvtc" style="width: 90%;">
  <div class="Contvcc" style="width: 100%;">
    <?php if(isset($product)): ?>
      <h2><?= $product->nombre ?></h2>
      <div id="central" class="Conthcc">
        <div id="detail-product" class="product">
          <?php if($product->imagen != null): ?>
            <img src="<?=base_url?>/uploads/images/<?=$product->imagen?>" alt="Foto del producto">
          <?php else: ?>
            <img src="<?=base_url?>assets/images/nodisponible.png" alt="Foto del producto">
          <?php endif; ?>
          <p><?=$product->descripcion?></p>
          <p>Cop <?=$product->precio?></p>
          <a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="Bt1">Comprar</a>
        </div>
      </div>
    <?php else: ?>
      <h1>El producto no existe</h1>
    <?php endif; ?>
  </div>
</div>