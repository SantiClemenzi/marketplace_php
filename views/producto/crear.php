<h1>Crear nuevos productos</h1>
<div class="form_container">
    <form action="http://localhost/projects/master_PHP/marketplace/productosControllers/save" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" require />

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" rows="4" cols="4"></textarea>

        <label for="precio">Precio</label>
        <input type="text" name="precio" require />

        <label for="stock">Stock</label>
        <input type="number" name="stock" require />

        <label for="categoria">Categoria</label>
        <?php $categorias = utils::showCategorias(); ?>
        <select name="categoria">
            <?php while ($cat = $categorias->fetch_object()) : ?>
                <option value="<?= $cat->id ?>">
                    <?= $cat->nombre ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="imagen">Imagen</label>
        <input type="file" name="imagen" require />

        <input type="submit" value="Crear">
    </form>
</div>