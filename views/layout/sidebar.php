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
                       <li><a href="#">Gestionar categorias</a></li>
                       <li><a href="#">Gestionar productos</a></li>
                       <li><a href="#">Gestionar pedidos</a></li>
                   <?php endif; ?>

                   <?php if (isset($_SESSION['identify'])) : ?>
                       <li><a href="#">Mis pedidos</a></li>
                       <li><a href="http://localhost/projects/master_PHP/marketplace/usuarioControllers/logout">Cerrar sesión</a></li>
                   <?php else : ?>
                       <li><a href="http://localhost/projects/master_PHP/marketplace/usuarioControllers/registro">Registrate aqui</a></li>
                   <?php endif; ?>
               </ul>
           </div>
       </aside>
       <!-- contenido central -->
       <div id="central">