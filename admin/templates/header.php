<?php
$url = 'http://' . $_SERVER['HTTP_HOST'] . '/libreria-app';
// echo $url;
?>
<!-- bs5-navbar-minimal-a-->
<header>
  <nav class="navbar navbar-expand navbar-light bg-light d-flex justify-content-between mx-2">
    <div class="nav navbar-nav">
      <a class="nav-item nav-link active" href="<?= $url . "/admin/inicio.php"; ?>" aria-current="page">Área de administración <span class="visually-hidden">(current)</span></a>
      <a class="nav-item nav-link" href="<?= $url . "/admin/inicio.php"; ?>">Inicio</a>
      <a class="nav-item nav-link" href="<?= $url . "/admin/seccion/productos.php" ?>">Productos</a>
      <a class="nav-item nav-link" target="_blank" href="<?= $url; ?>">Ver sitio</a>
    </div>
    <div class="nav navbar-nav">
      <a class="nav-item nav-link bg-danger text-light rounded " href="<?= $url . '/admin/seccion/cerrarSesion.php' ?>">Cerrar sesión</a>
    </div>
  </nav>
</header>