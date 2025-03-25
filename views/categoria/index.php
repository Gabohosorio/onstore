<div class="Contvtc" style="width: 90%;">
  <div class="Contvcc" style="width: 100%;">
    <h1>Gestionar categorias</h1></br>
    <hr width="70%"></br>
  </div>
  <div class="Contvtl" style="width: 70%;">
    <a class="Bt4" href="<?= base_url ?>categoria/crear">Crear categoria</a></br>
    <table>
      <tr>
        <th>ID</th>
        <th>NOMBRE</th>
      </tr>
      <?php while($cat = $categorias->fetch_object()): ?>
        <tr>
          <td><?= $cat->id; ?></td>
          <td><?= $cat->nombre; ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</div>