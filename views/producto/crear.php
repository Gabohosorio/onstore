<div class="Contvtc" style="width: 90%;">
  <div class="Contvcc" style="width: 100%;">
    <?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
      <h1>Editar producto <?= $pro->nombre ?></h1></br>
      <?php $url_action = base_url.'producto/save&id='.$pro->id; ?>
    <?php else: ?>
      <h1>Crear nuevos productos</h1></br>
      <?php $url_action = base_url.'producto/save'; ?>
    <?php endif; ?>
    <hr width="70%"></br>
  </div>
  <div class="Contvtl" id="AddProd">
    <form action="<?=$url_action?>" method="Post" enctype="multipart/form-data">
      <div class="Conthcl">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>" />
      </div>
      <div class="Conthcl">
        <label for="descripcion">Descripcion:</label>
        <textarea name="descripcion"><?=isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>
      </div>
      <div class="Conthcl">
        <label for="precio">Precio:</label>
        <input type="text" name="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : ''; ?>" />
      </div>
      <div class="Conthcl">
        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : ''; ?>" />
      </div>
      <div class="Conthcl">
        <label for="categoria">Categoria:</label>
        <?php $categorias = Utils::showCategorias(); ?>
        <select name="categoria">
          <?php while($cat = $categorias->fetch_object()): ?>
            <option value="<?=$cat->id?>" <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
              <?=$cat->nombre?>
            </option>
          <?php endwhile; ?>
        </select>
      </div>
      <div class="Conthcl">
        <label for="imagen">Imagen:</label>

        <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
          <img class="Img40x40" src="<?=base_url?>/uploads/images/<?=$pro->imagen?>" alt="Foto del producto" />
        <?php endif; ?>

        <input type="file" name="imagen"/>
      </div>
      <input type="submit" class="Bt4" style="width: 100px;" value="Guardar" />
    </form>
  </div>
</div>