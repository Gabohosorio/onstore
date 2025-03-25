<div class="Contvtc" style="width: 90%;">
  <div class="Contvcc" style="width: 100%;">
    <h3>Hacer Pedido</h3>
    <hr style="width: 60%;"><br>
    <?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'completed'): ?>
      <h6>
        Tu pedido ha sido guardado con exito, una vez que realices la transferencia 
        bancaria con el coste del pedido, será procesado y enviado.
      </h6><br>
      <?php if(isset($pedido)): ?>
        <h4>Datos del pedido</h4>
          Número de pedido: <?=$pedido->id?><br>
          Total a pagar: $<?=$pedido->coste?><br>
          Productos:<br>
          <?php while($producto = $productos->fetch_object()): ?>
            <ul>
              <li class="Conthcc">
                <?=$producto->nombre?> - <?=$producto->precio?>
                <img src="<?=base_url?>/uploads/images/<?=$producto->imagen?>" class="ImgMdl" alt="Foto del producto" />
                - x <?=$producto->unidades?>
              </li>
            </ul>
          <?php endwhile; ?>  
      <?php endif; ?>
    <?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'completed'): ?>
      <h4>Tu pedido NO ha podido procesarse.</h4>
    <?php endif; ?>
  </div>
</div>