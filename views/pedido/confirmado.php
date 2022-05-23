<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] = 'complete') : ?>
    <h1>Tu pedido fue realizado</h1>
    <table>
	<tr>
		<th>Imagen</th>
		<th>Nombre</th>
		<th>Precio</th>
		<th>Unidades</th>
		<th>Eliminar</th>
	</tr>
	<?php 
		foreach($_SESSION['carrito'] as $indice => $elemento): 
		$producto = $elemento['producto'];
	?>
	
	<tr>
		<td>
			<?php if ($producto->imagen != null): ?>
				<img src="http://localhost/projects/master_PHP/marketplace/uploads/images/<?= $producto->imagen ?>" class="img_carrito" />
			<?php else: ?>
				<img src="http://localhost/projects/master_PHP/marketplace/assets/img/camiseta.png" class="img_carrito" />
			<?php endif; ?>
		</td>
		<td>
			<a href="http://localhost/projects/master_PHP/marketplace/productosControllers/ver/<?=$producto->id?>"><?=$producto->nombre?></a>
		</td>
		<td>
			<?=$producto->precio?>
		</td>
		<td>
			<?=$elemento['unidades']?>
			<div class="updown-unidades">
				<a href="http://localhost/projects/master_PHP/marketplace/carrito/up&index=<?=$indice?>" class="button">+</a>
				<a href="http://localhost/projects/master_PHP/marketplace/carrito/down&index=<?=$indice?>" class="button">-</a>
			</div>
		</td>
		<td>
			<a href="http://localhost/projects/master_PHP/marketplace/carrito/delete&ver=<?=$indice?>" class="button button-carrito button-red">Quitar producto</a>
		</td>
	</tr>
	
	<?php endforeach; ?>
</table>
<br/>
<div class="delete-carrito">
	<a href="http://localhost/projects/master_PHP/marketplace/carritoControllers/delete_all" class="button button-delete button-red">Vaciar carrito</a>
</div>
<div class="total-carrito">
	<?php $stats = utils::stateCarrito(); ?>
	<h3>Precio total: <?=$stats['total']?> $</h3>
	<a href="http://localhost/projects/master_PHP/marketplace/pedidoControllers/hacer" class="button button-pedido">Hacer pedido</a>
</div>

<?php elseif (!isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>
    <h1>Error</h1>
    <p>Tu pedido no se ha podido realizar.</p>
<?php endif; ?>