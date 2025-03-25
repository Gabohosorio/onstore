    <!-- Barra lateral -->
    <aside class="Contvtc block_aside" style="height: 100%;">
      <div class="Contvtc">
        <p class="txbloq">Mi Carrito</p>
        <ul>
          <?php $stats = Utils::statsCarrito(); ?>
          <li><a class="link" href="<?= base_url ?>carrito/index">Productos (<?= $stats['count'] ?>)</a></li>
          <li><a class="link" href="<?= base_url ?>carrito/index">Total: $ <?= $stats['total'] ?></a></li>
          <li><a class="link" href="<?= base_url ?>carrito/index">Ver carrito</a></li>
        </ul>        
      </div><br>
      <div class="Contvtc">
        <?php if(!isset($_SESSION['identity'])): ?>
          <p class="txbloq">Entrar a la web</p>
          <form action="<?=base_url?>usuario/login" method="post">
            <label for="email">Email</label>
            <input type="email" name="email">
            <label for="password">Contraseña</label>
            <input type="password" name="password">
            <input class="Bt4" type="submit" value="Enviar">
          </form>
        <?php else: ?>
          <p class="txbloq"><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></p>
        <?php endif; ?>
        <ul style="margin-top: 10px;">
          <?php if(isset($_SESSION['admin'])): ?>
            <li><a class="link" href="<?= base_url ?>categoria/index">Gestionar categorias</a></li>
            <li><a class="link" href="<?= base_url ?>producto/gestion">Gestionar productos</a></li>
            <li><a class="link" href="#">Gestionar pedidos</a></li>
          <?php endif; ?>
          <?php if(isset($_SESSION['identity'])): ?>
            <li><a class="link" href="#">Mis pedidos</a></li>
            <li><a class="link" href="<?=base_url?>usuario/logout">Cerrar Sesión</a></li>
          <?php else: ?>
            <li><a class="link" href="<?= base_url ?>usuario/registro">Registrate aquí</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </aside>
