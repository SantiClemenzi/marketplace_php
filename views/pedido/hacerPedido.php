<?php if (isset($_SESSION['identify'])) : ?>
    <h1>Hacer Pedido</h1>
    <a href="http://localhost/projects/master_PHP/marketplace/carritoControllers/index" style="float: right;">Ver productos del carrito</a>
    <h3>Indique su direccion</h3>
    <form action="http://localhost/projects/master_PHP/marketplace/pedidoControllers/add" method="POST">
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia">
        
        <label for="ciudad">Ciudad</label>
        <input type="text" name="ciudad">
        
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion">
        
        <input type="submit" value="Confirmar" />
    </form>
<?php else : ?>
    <h1>No estas registrado</h1>
    <p>Necesitas estar logueado para realizar un pedido.</p>
<?php endif; ?>