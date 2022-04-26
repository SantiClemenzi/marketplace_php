<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/projects/master_PHP/marketplace/assets/css/styles.css">
    <title>Marketplace</title>
</head>

<body>
    <!-- header -->
    <header id="header">
        <div id="icon">
            <img src="http://localhost/projects/master_PHP/marketplace/assets/img/camiseta.png" alt="Camiseta logo" />
            <a href="index.php">
                <h1>
                    Shirts market
                </h1>
            </a>
        </div>
    </header>

    <!-- menu -->
    <?php $categorias = utils::showCategorias(); ?>
    <nav id="menu">
        <ul>
            <li>
                <a href="http://localhost/projects/master_PHP/marketplace">Inicio</a>
            </li>
            <?php while ($cat = $categorias->fetch_object()) : ?>
                <li>
                    <a href="http://localhost/projects/master_PHP/marketplace/categoriaControllers/ver/<?= $cat->id ?>"><?= $cat->nombre ?></a>
                </li>
            <?php endwhile; ?>
        </ul>
    </nav>
    <section id="content">