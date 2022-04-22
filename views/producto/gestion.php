<h1>Gestion Productos</h1>
<a class="button button-small" href="http://localhost/projects/master_PHP/marketplace/productosControllers/crear">
    Crear producto
</a>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete') : ?>
    <strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete') : ?>
    <strong class="alert_red">El producto NO se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
    <strong class="alert_green">El producto se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
    <strong class="alert_red">El producto NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
    </tr>
    <?php while ($prod = $productos->fetch_object()) : ?>
        <tr>
            <td><?= $prod->id; ?></td>
            <td><?= $prod->nombre; ?></td>
            <td><?= $prod->precio; ?></td>
            <td><?= $prod->stock; ?></td>
            <td>
                <a href="http://localhost/projects/master_PHP/marketplace/productosControllers/eliminar?id=<?= $prod->id ?>" class="button button-gestion button-red">Eliminar</a>
                <a href="http://localhost/projects/master_PHP/marketplace/productosControllers/editar?id=<?= $prod->id ?>" class="button button-gestion">Editar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>