<h1>Productos Destacados</h1>
<div>
    <?php while ($prod = $productos->fetch_object()) : ?>
        <div class="product">
            <?php if($prod->imagen != NULL):?>
                <img src="uploads\images\<?= $prod->imagen ?>" />
            <?php else: ?>
                <img src="assets/img/camiseta.png" />
            <?php endif; ?>
            <h2><?= $prod->nombre ?></h2>
            <p><?= $prod->precio ?></p>
            <a class="button" href="#">Comprar</a>
        </div>
    <?php endwhile; ?>
</div>
