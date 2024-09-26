<?php
include 'validaproductos.php';

// Mostar información en la lista de libros
$query = 'SELECT id, titulo, imagen  FROM libros';
$sentenciaSQL = $conexion->prepare($query);
$sentenciaSQL->execute();
$libros = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
$contador = 1;
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Área de administración</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
  <?php include '../templates/header.php' ?>
  <main class="container d-flex flex-row gap-2 mt-3">

    <!-- Formulario de Libros -->
    <section class="col-5 border border-1">
      <h4>FORMULARIO LIBROS</h4>
      <form action="" method="post" enctype="multipart/form-data">
        <!-- bs5-form- -->

        <input type="hidden" class="form-control" name="id" value="<?= empty($libro['id']) ? '' : $libro['id'] ?>" />

        <div class="mb-3">
          <label for="titulo" class="form-label">Título:</label>
          <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Introduce el título del libro" value="<?= empty($libro['titulo']) ? '' : $libro['titulo'] ?>" required />
        </div>
        <div class="mb-3">
          <label for="autor" class="form-label">Autor:</label>
          <input type="text" class="form-control" name="autor" id="autor" placeholder="Introduce el autor del libro" value="<?= empty($libro['autor']) ? '' : $libro['autor'] ?>" required />
        </div>
        <div class="mb-3">
          <label for="genero" class="form-label">Género:</label>
          <input type="text" class="form-control" name="genero" id="genero" placeholder="Introduce el género del libro" value="<?= empty($libro['titulo']) ? '' : $libro['titulo'] ?>" />
        </div>
        <div class="mb-3">
          <label for="fechaPublicacion" class="form-label">Año de publicación:</label>

          <input type="number" class="form-control" name="fechaPublicacion" id="fechaPublicacion" placeholder="Introduce la fecha de publicación" value="<?= empty($libro['anio_publicacion']) ? '' : $libro['anio_publicacion'] ?>" />
        </div>
        <div class="mb-3">
          <label for="precio" class="form-label">Precio:</label>
          <input type="text" class="form-control" name="precio" id="precio" placeholder="Introduce el precio del libro" value="<?= empty($libro['precio']) ? '' : $libro['precio'] ?>" />
        </div>

        <div class="mb-3">
          <label for="imgLibro" class="form-label">
            Imagen libro:
            <?php if (!empty($libro['imagen'])) : ?>
              <img src="<?= '../../img/' .  $libro['imagen'] ?>" alt=" <?= $libro['titulo'] ?>" width="200">
            <?php endif; ?>
          </label>
          <input type="file" class="form-control" name="imgLibro" id="imgLibro" placeholder="Introduce el imgLibro del libro" />
        </div>

        <!--bs5-bgroup-default-->
        <div class="btn-group d-flex gap-2 m-3" role="group" aria-label="Button group name">
          <button type="submit" name="btnFormulario" value="agregar" class="btn btn-primary rounded" <?php if (!empty($libro['id'])) echo 'hidden'; ?>> Agragar </button>
          <button type="submit" name="btnFormulario" value="actualizar" class="btn btn-success rounded" <?php if (empty($libro['id'])) echo 'hidden'; ?>>
            Actualizar
          </button>
          <button type="submit" name="btnFormulario" value="cancelar" class="btn btn-danger rounded">
            Cancelar
          </button>
        </div>
      </form>
    </section>



    <!-- Lista de Libros -->
    <section class=" col-7 border border-1">
      <!-- Mostrar los libros en una tabla -->
      <h4>Listado de Libros</h4>
      <!-- bs5-table-default-->
      <div class="table-responsive">
        <table class="table table-primary">
          <thead>
            <tr>
              <th scope="col">Nº</th>
              <th scope="col">Nombre</th>
              <th scope="col">Imagen</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($libros as $libro) : ?>
              <tr class="">
                <td scope="row"><?= $contador++; ?></td>
                <td><?= $libro['titulo'] ?></td>
                <td>
                  <img src="<?= '../../img/' . $libro['imagen'] ?>" alt="<?= $libro['titulo'] ?>" width="100" class="img-thumbnail">
                </td>
                <td>
                  <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $libro['id'] ?>">
                    <button type="submit" name="btnFormulario" value="seleccionar" class="btn btn-dark rounded">
                      Seleccionar
                    </button>
                    <button type="submit" name="btnFormulario" value="borrar" class="btn btn-danger rounded">
                      Borrar
                    </button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>

    </section>
  </main>

  <?php include '../templates/script.php' ?>
</body>

</html>