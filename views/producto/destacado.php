<h1>Productos Destacados</h1>
<div>
    <?php while ($prod = $productos->fetch_object()) : ?>
        <div class="product">
            <img src="assets/img/<?= $prod->imagen ?>" />
            <h2><?= $prod->nombre ?></h2>
            <p><?= $prod->precio ?></p>
            <a class="button" href="#">Comprar</a>
        </div>
    <?php endwhile; ?>
</div>