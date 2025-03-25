<div class="Contvtc" style="width: auto;">
  <h1>Registrarse</h1>
  
  <?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'completed'): ?>
    <strong class='alt_green'>Registro completado correctamente</strong>
  <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong class='alt_red'>Registro fallido, por favor verifica tus datos</strong>
  <?php endif; ?>
  <?php Utils::deleteSession('register'); ?>

  <form action="<?=base_url?>usuario/save" method="POST">
    <div class="Contvtl">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" required />
      <label for="apellidos">Apellidos:</label>
      <input type="text" name="apellidos" required />
      <label for="email">Email:</label>
      <input type="email" name="email" required />
      <label for="password">Password:</label>
      <input type="password" name="password" required />
      <input type="submit" value="Registrarse" />
    </div>
  </form>
</div>
