<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Marketplace</title>
</head>

<body>
    <!-- header -->
    <header id="header">
        <div id="icon">
            <img src="assets/img/camiseta.png" alt="Camiseta logo" />
            <a href="index.php">
                <h1>
                    Shirts market
                </h1>
            </a>
        </div>
    </header>

    <!-- menu -->
    <nav id="menu">
        <ul>
            <li>
                <a href="#">Inicio</a>
            </li>
            <li>
                <a href="#">Categoria 1</a>
            </li>
            <li>
                <a href="#">Categoria 2</a>
            </li>
            <li>
                <a href="#">Categoria 3</a>
            </li>
            <li>
                <a href="#">Categoria 4</a>
            </li>
            <li>
                <a href="#">Categoria 5</a>
            </li>
        </ul>
    </nav>
    <section id="content">
        <!-- barra lateral -->
        <aside id="lateral">
            <div id="login" class="block_aside">
                <form action="#" method="POST">
                    <label for="email">Email</label>
                    <input name="email" type="email" placeholder="nombre@correo.com" required/>
                    <label for="password">Contraseña</label>
                    <input name="password" type="password"  required/>
                    <input type="submit"/>
                </form>
                <a href="#">Mis pedidos</a>
                <a href="#">Gestionar pedidos</a>
                <a href="#">Gestionar Categorias</a>
            </div>
        </aside>
        <!-- contenido central -->
        <div id="central" >
            <div class="product">
                <img src="assets/img/camiseta.png"/>
                <h2>Remera Azul</h2>
                <p>1300$</p>
                <a href="#">Comprar</a>
            </div>
            <div class="product">
                <img src="assets/img/camiseta.png"/>
                <h2>Remera Azul</h2>
                <p>1300$</p>
                <a href="#">Comprar</a>
            </div>
            <div class="product">
                <img src="assets/img/camiseta.png"/>
                <h2>Remera Azul</h2>
                <p>1300$</p>
                <a href="#">Comprar</a>
            </div>
            <div class="product">
                <img src="assets/img/camiseta.png"/>
                <h2>Remera Azul</h2>
                <p>1300$</p>
                <a href="#">Comprar</a>
            </div>
            <div class="product">
                <img src="assets/img/camiseta.png"/>
                <h2>Remera Azul</h2>
                <p>1300$</p>
                <a href="#">Comprar</a>
            </div>
            <div class="product">
                <img src="assets/img/camiseta.png"/>
                <h2>Remera Azul</h2>
                <p>1300$</p>
                <a href="#">Comprar</a>
            </div>
        </div>
    </section>
    <!-- pie de pagina -->
    <footer id="footer">
        <p>Desarrollado por Santiago Clemenzi &copy; <?= date('Y') ?></p>
    </footer>
</body>

</html>