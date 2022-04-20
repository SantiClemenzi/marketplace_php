<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'completed') : ?>
    <strong class="alert_green">Registro completado</strong>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
    <strong class="alert_red">Error al registrarse</strong>
<?php endif; ?>

<?php utils::deleteSession('register'); ?>

<h1>Registrarse</h1>
<form action='http://localhost/projects/master_PHP/marketplace/usuarioControllers/save' method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required />

    <label for="apellido">Apellido</label>
    <input type="text" name="apellido" required />

    <label for="email">Email</label>
    <input type="email" name="email" required />

    <label for="password">Contraseña</label>
    <input type="password" name="password" required />

    <input type="submit" value="Guardar" />
</form>