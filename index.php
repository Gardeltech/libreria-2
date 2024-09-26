<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Libreria-app</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
  <?php include './templates/header.php'; ?>

  <main class="container">
    <!-- bs5-jumbotron-fluid  -->
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Bienvenido a librería-app</h1>
        <p class="col-md-8 fs-4">
          Using a series of utilities, you can create this jumbotron, just
          like the one in previous versions of Bootstrap. Check out the
          examples below for how you can remix and restyle it to your liking.
        </p>
        <a class="btn btn-primary btn-lg" type="button" href="libros.php">
          Ver libros
        </a>
      </div>
    </div>

  </main>
  <!-- CONTENIDO -->

  <?php include './templates/footer.php'; ?>
  <?php include './templates/script.php'; ?>

</body>

</html>