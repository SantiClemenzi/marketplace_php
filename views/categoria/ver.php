<?php if (isset($categoria)) : ?>
    <h1>Categoria de <?= $categoria->nombre ?></h1>
    <?php if (!$productos->num_rows == 0) : ?>
        <?php while ($prod = $productos->fetch_object()) : ?>
            <div class="product">
                <a href="http://localhost/projects/master_PHP/marketplace/productosControllers/ver/<?= $prod->id ?>" >
                    <?php if ($prod->imagen != NULL) : ?>
                        <img src="http://localhost/projects/master_PHP/marketplace/uploads/images/<?= $prod->imagen ?>" />
                    <?php else : ?>
                        <img src="http://localhost/projects/master_PHP/marketplace/assets/img/camiseta.png" />
                    <?php endif; ?>
                    <h2><?= $prod->nombre ?></h2>
                </a>
                <p><?= $prod->precio ?></p>
                <a class="button" href="#">Comprar</a>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <p>No hay productos para mostrar</p>
    <?php endif; ?>
<?php else : ?>
    <h1>La categoria no existe</h1>
<?php endif; ?>

