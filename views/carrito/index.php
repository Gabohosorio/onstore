<div class="Contvtc" style="width: 90%;">
  <div class="Contvcc" style="width: 100%;">
    <h3>Carrito de compras</h3>
    <hr style="width: 60%;"><br>
    <?php if(!$carrito): ?>
      <h4>Carrito Vacío</h4>
    <?php else: ?>
      <table>
        <tr>
          <th>Imagen</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Unidades</th>
        </tr>
        <?php foreach($carrito as $indice => $elemento): 
            $producto = $elemento['producto'];
        ?>
          <tr>
            <td>
              <?php if($producto->imagen != null): ?>
                <img src="<?=base_url?>/uploads/images/<?=$producto->imagen?>" class="ImgMdl" alt="Foto del producto" />
              <?php else: ?>
                <img src="<?=base_url?>assets/images/nodisponible.png" class="ImgMdl" alt="Foto del producto" />
              <?php endif; ?>
            </td>
            <td>
              <a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
            </td>
            <td>
              <?=$producto->precio?>
            </td>
            <td>
              <?=$elemento['unidades']?>
            </td>
          </tr>
        <?php endforeach; ?>
      </table><br>
      <div class="Conthcr" style="width: 90%;">
        <?php $stats = Utils::statsCarrito(); ?>
        <h5>Precio total: <?=$stats['total']?></h5>
        <a class="Bt4v" href="<?=base_url?>pedido/hacer">Hacer pedido</a>
      </div>
    <?php endif; ?>
  </div> 
</div>