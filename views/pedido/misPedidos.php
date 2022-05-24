<h1>Mis pedidos</h1>
<table>
    <tr>
        <th>Nº Pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <?php
    while ($ped = $pedidos->fetch_object()) :
    ?>

        <tr>
            <td>
                <a href="http://localhost/projects/master_PHP/marketplace/pedidoControllers/detalle/<?= $ped->id ?>"><?= $ped->id ?></a>
            </td>
            <td>
                <?= $ped->coste ?> $
            </td>
            <td>
                <?= $ped->fecha ?>
            </td>
            <td>
                <?= utils::showStatus($ped->estado) ?>
            </td>
        </tr>

    <?php endwhile; ?>
</table>