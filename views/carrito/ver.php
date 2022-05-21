<h1>Carrito</h1>
<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
    </tr>
    <?php
    foreach ($carrito as $index => $elemento) :
        $producto = $elemento['producto'];
    ?>
        <tr>
            <td>
                <?php if ($producto->imagen != NULL) : ?>
                    <img src="http://localhost/projects/master_PHP/marketplace/uploads/images/<?= $producto->imagen ?>" class="img_carrito" />
                <?php else : ?>
                    <img src="http://localhost/projects/master_PHP/marketplace/assets/img/camiseta.png" class="img_carrito" />
                <?php endif; ?>
            </td>
            <td>
                <a href="http://localhost/projects/master_PHP/marketplace/productosControllers/ver/<?= $producto->id ?>">
                    <?= $producto->nombre; ?>
                </a>
            </td>
            <td><?= $producto->precio ?></td>
            <td><?= $elemento['unidades'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</br>

<div class="total-carrito">
    <?php $stats = utils::stateCarrito() ?>
    <h3>Total: <?= $stats['total'] ?>$</h3>
    <a href="http://localhost/projects/master_PHP/marketplace/pedidoControllers/hacer" class="button button-pedido">Confirmar</a>
</div>