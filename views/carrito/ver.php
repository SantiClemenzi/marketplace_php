<h1>Carrito</h1>
<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Eliminar</th>
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
                <td>
                    <?= $elemento['unidades'] ?>
                    <div class="updown-unidades">
                        <a href="http://localhost/projects/master_PHP/marketplace/carritoControllers/up/<?= $index ?>" class="button">+</a>
                        <a href="http://localhost/projects/master_PHP/marketplace/carritoControllers/down/<?= $index ?>" class="button">-</a>
                    </div>
                </td>
                <td><a href="http://localhost/projects/master_PHP/marketplace/carritoControllers/remove/<?= $index ?>" class="button button-carrito button-red">Eliminar <?= $producto->id ?></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </br>
    <div class="delete-carrito">
        <a href="http://localhost/projects/master_PHP/marketplace/carritoControllers/delete" class="button button-delete button-red">Vaciar carrito</a>
    </div>
    <div class="total-carrito">
        <?php $stats = utils::stateCarrito() ?>
        <h3>Total: <?= $stats['total'] ?>$</h3>
        <a href="http://localhost/projects/master_PHP/marketplace/pedidoControllers/hacer" class="button button-pedido">Confirmar</a>
    </div>
<?php else : ?>
    <p>No hay productos en el carrito</p>
<?php endif; ?>