<?php if (isset($edit) && isset($pro) && is_object($pro)) : ?>
    <h1>Editar producto <?= $pro->nombre ?> <?= $_GET['id']; ?></h1>
    <?php $url_action = "http://localhost/projects/master_PHP/marketplace/productosControllers/save/".$_GET['id'];?>

<?php else : ?>
    <h1>Crear nuevo producto</h1>
    <?php $url_action = "http://localhost/projects/master_PHP/marketplace/productosControllers/save"; ?>
<?php endif; ?>


<div class="form_container">
    <form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?= isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>" require />

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" rows="4" cols="4"><?= isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>

        <label for="precio">Precio</label>
        <input type="text" name="precio" value="<?= isset($pro) && is_object($pro) ? $pro->precio : ''; ?>" require />

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?= isset($pro) && is_object($pro) ? $pro->stock : ''; ?>" require />

        <label for="categoria">Categoria</label>
        <?php $categorias = utils::showCategorias(); ?>
        <select name="categoria">
            <?php while ($cat = $categorias->fetch_object()) : ?>
                <option value="<?= $cat->id ?>" <?= isset($pro) && is_object($pro) && $cat->id == $pro->categorias_id ? 'selected' : ''; ?>>
                    <?= $cat->nombre ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="imagen">Imagen</label>
        <?php if (isset($pro) && is_object($pro) && !empty($pro->imagen)) : ?>
            <img src="http://localhost/projects/master_PHP/marketplace/uploads/images/<?= $pro->imagen ?>" class="thumb" />
        <?php endif; ?>
        <input type="file" name="imagen"/>

        <input type="submit" value="Crear">
    </form>
</div>