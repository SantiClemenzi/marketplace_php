       <!-- barra lateral -->
       <aside id="lateral">
           <div id="login" class="block_aside">
               <?php if (!isset($_SESSION['identify'])) : ?>
                   <form action="http://localhost/projects/master_PHP/marketplace/usuarioControllers/login" method="POST">
                       <label for="email">Email</label>
                       <input name="email" type="email" placeholder="nombre@correo.com" required />
                       <label for="password">Contraseña</label>
                       <input name="password" type="password" required />
                       <input type="submit" />
                   </form>
               <?php else : ?>
                   <h3><?= $_SESSION['identify']->nombre ?> <?= $_SESSION['identify']->apellido ?></h3>
               <?php endif; ?>
               <ul>
                   <?php if (isset($_SESSION['admin'])) : ?>
                       <li><a href="http://localhost/projects/master_PHP/marketplace/categoriaControllers/index">Gestionar categorias</a></li>
                       <li><a href="http://localhost/projects/master_PHP/marketplace/productosControllers/gestion">Gestionar productos</a></li>
                       <li><a href="http://localhost/projects/master_PHP/marketplace/pedidoControllers/gestion">Gestionar pedidos</a></li>
                   <?php endif; ?>

                   <?php if (isset($_SESSION['identify'])) : ?>
                       <li><a href="http://localhost/projects/master_PHP/marketplace/pedidoControllers/misPedidos">Mis pedidos</a></li>
                       <li><a href="http://localhost/projects/master_PHP/marketplace/usuarioControllers/logout">Cerrar sesión</a></li>
                   <?php else : ?>
                       <li><a href="http://localhost/projects/master_PHP/marketplace/usuarioControllers/registro">Registrate aqui</a></li>
                   <?php endif; ?>
               </ul>
               <h3>Ver carrito</h3>
               <ul>
                   <?php $stats = utils::stateCarrito() ?>
                   <li>Productos: (<?= $stats['count'] ?>) </li>
                   <li>Total: <?=$stats['total']?>$</li>
                   <li><a href="http://localhost/projects/master_PHP/marketplace/carritoControllers/index">Mi carrito</a></li>
               </ul>
           </div>
       </aside>
       <!-- contenido central -->
       <div id="central">