<div class="Contvtc" style="width: 90%;">
  <div class="Contvcc" style="width: 100%;">
    <h1>Crear nueva categorias</h1></br>
    <hr width="70%"></br>
  </div>
  <div class="Contvtl" style="width: 70%;">
    <form action="<?=base_url?>categoria/save" method="post">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" required/>
      <input type="submit" value="Guardar" />
    </form>
  </div>
</div>