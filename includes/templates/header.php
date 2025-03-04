<?php


require_once __DIR__ . '/../../admin/propiedades/funciones.php';

$auth = verificarUsuario();


?>


<link rel="stylesheet" href="/build/css/app.css">

<header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
    <div class="contenedor contenido_header">
        <div class="barra">

            <img src="/src/img/logo.png" alt="logotipo de bienes raices">

            <div class="mobile-menu">
                <img src="/src/img/barras.svg" alt="menu responsive">
            </div>
            <div class="derecha">

                <nav class="navegacion">
                    <a href="../../index.php">Inicio</a>
                    <a href="../../nosotros.php">Nosotros</a>
                    <a href="../../anuncios.php">Anuncios</a>
                    <a href="../../blog.php">Blog</a>
                    <a href="../../contacto.php">Contacto</a>

                    <?php if ($auth): ?>
                        <a href="../../admin/index.php">Admin</a>
                        <a href="/cerrarSesion.php">Cerrar sesión</a>
                    <?php else: ?>
                        <a href="login.php">Login</a>
                    <?php endif; ?>

                </nav>
                <img class="dark-mode" src="/src/img/dark-mode.svg" alt="">

            </div>

        </div>

    </div>
</header>