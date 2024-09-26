<?php
include 'admin/config/db.php';

$query = 'SELECT * FROM libros';
$sentenciaSQL = $conexion->prepare($query);
try {
  $sentenciaSQL->execute();
} catch (PDOException $th) {
  echo "Error: " . $th->getMessage();
}
$listaLibros = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
//print_r($listaLibros);
echo "</pre>";
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php include './templates/header.php'; ?>
    <main class="container col-12 flex-row d-flex gap-2 flex-wrap mt-2">
        <!-- bs5-card-default-->
        <?php foreach ($listaLibros as $libro) : ?>
        <div class="card col-3">
            <img class="card-img-top" src="img/<?= $libro['imagen'] ?>" alt="Title" />
            <div class="card-header"><strong>Género: </strong><?= $libro['genero'] ?> </div>
            <div class="card-body">
                <h3 class="card-title"><?= $libro['titulo'] ?></h3>
                <h4 class="card-title"><?= $libro['autor'] ?></h4>
                <p class="card-text"><?= $libro['anio_publicacion'] ?></p>
            </div>
            <div class="card-footer"><?= $libro['precio'] ?> €</div>
        </div>
        <?php endforeach; ?>


    </main>


    <?php include './templates/footer.php'; ?>
    <?php include './templates/script.php'; ?>

</body>

</html>