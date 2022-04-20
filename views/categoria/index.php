<h1>Gestionar Categorias</h1>
<?php while ($cat = $categorias->fetch_object()) : ?>
    <?= $cat->nombre; ?></br>
<?php endwhile; ?>