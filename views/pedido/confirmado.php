<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] = 'complete') : ?>
    <h1>Tu pedido fue realizado</h1>
    <p>Tu pedido se realizo con exito. A la brevedad le enviaremos el mail de confirmacion.</p>
<?php elseif (!isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>
    <h1>Error</h1>
    <p>Tu pedido no se ha podido realizar.</p>
<?php endif; ?>