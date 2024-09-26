<?php
include '../config/db.php';

if (isset($_POST['btnFormulario'])) {

  $accion = $_POST['btnFormulario'];

  $id = (isset($_POST['id'])) ? $_POST['id'] : '';
  $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : '';
  $autor = (isset($_POST['autor'])) ? $_POST['autor'] : '';
  $genero = (isset($_POST['genero'])) ? $_POST['genero'] : '';
  $fechaPublicacion = (isset($_POST['fechaPublicacion']) ? $_POST['fechaPublicacion'] : '');
  $precio = (isset($_POST['precio'])) ? $_POST['precio'] : '';

  //*+++++++++++++++Imagen+++++++++++++++++++
  if (isset($_FILES['imgLibro'])) {
    $imgLibroName = $_FILES['imgLibro']['name'];
    $fecha = new DateTime();
    $nobreImagen = $fecha->getTimestamp() . "_" . $imgLibroName;

    $imgLibroTmp = $_FILES['imgLibro']['tmp_name'];
    if ($imgLibroTmp != '') {
      move_uploaded_file($imgLibroTmp, '../../img/' . $nobreImagen);
    }
  } else {
    $nobreImagen = 'avatar-libro.jpg';
  }

  /**********************************/
  /************ AGREGAR *************/
  if ($accion == 'agregar') {
    $query = 'INSERT INTO libros(titulo, autor, genero, anio_publicacion, precio, imagen) VALUES (:titulo, :autor, :genero, :anio_publicacion, :precio, :imagen)';

    $sentenciaSQL = $conexion->prepare($query);
    $sentenciaSQL->bindParam(':titulo', $titulo);
    $sentenciaSQL->bindParam(':autor', $autor);
    $sentenciaSQL->bindParam(':genero', $genero);
    $sentenciaSQL->bindParam(':anio_publicacion', $fechaPublicacion);
    $sentenciaSQL->bindParam(':precio', $precio);
    $sentenciaSQL->bindParam(':imagen', $nobreImagen);
    try {
      $sentenciaSQL->execute();
      header('Location: productos.php');
    } catch (PDOException $e) {
      echo 'Error al agregar el libro: ' . $e->getMessage();
    }
  }


  /**********************************/
  /************ ACTUALIZAR **********/
  if ($accion == 'actualizar') {

    //? SI actualizamos la imagen
    if (isset($_FILES['imgLibro']) && $_FILES['imgLibro']['name'] != '') {
      $imgLibroName = $_FILES['imgLibro']['name'];
      $fecha = new DateTime();
      $nobreImagen = $fecha->getTimestamp() . "_" . $imgLibroName;
      $imgLibroTmp = $_FILES['imgLibro']['tmp_name'];
      move_uploaded_file($imgLibroTmp, '../../img/' . $nobreImagen);

      //? Borramos la imagen anterior
      $query = 'SELECT imagen FROM libros WHERE id =:id';
      $sentenciaSQL = $conexion->prepare($query);
      $sentenciaSQL->bindParam(':id', $id);
      $sentenciaSQL->execute();
      $imagenAnterior = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);

      if ($imagenAnterior['imagen'] && $imagenAnterior['imagen'] != 'avatar-libro.jpg') {
        if (file_exists('../../img/' . $imagenAnterior['imagen'])) {
          unlink('../../img/' . $imagenAnterior['imagen']);
        }
      }

      $query = "UPDATE libros SET imagen = :imagen WHERE id=:id";
      $sentenciaSQL = $conexion->prepare($query);
      $sentenciaSQL->bindParam(':imagen', $nobreImagen);
      $sentenciaSQL->bindParam(':id', $id);
      $sentenciaSQL->execute();
    }

    $query = 'UPDATE libros SET titulo=:titulo, autor=:autor, genero=:genero, anio_publicacion=:anio_publicacion, precio=:precio WHERE id =:id';

    $sentenciaSQL = $conexion->prepare($query);
    $sentenciaSQL->bindParam(':titulo', $titulo);
    $sentenciaSQL->bindParam(':autor', $autor);
    $sentenciaSQL->bindParam(':genero', $genero);
    $sentenciaSQL->bindParam(':anio_publicacion', $fechaPublicacion);
    $sentenciaSQL->bindParam(':precio', $precio);
    $sentenciaSQL->bindParam(':id', $id);
    try {
      $valor = $sentenciaSQL->execute();
      header('Location: productos.php');
    } catch (PDOException $e) {
      echo 'Error al agregar el libro: ' . $e->getMessage();
    }
  }

  /**********************************/
  /************ CANCELAR *************/
  if ($accion == 'cancelar') {
    header('Location: productos.php');
  }


  /**********************************/
  /************ SELECCIONAR *********/
  if ($accion == 'seleccionar') {

    $query = 'SELECT * FROM libros WHERE id = :id';
    $sentenciaSQL = $conexion->prepare($query);
    $sentenciaSQL->bindParam(':id', $id);
    $sentenciaSQL->execute();
    $libro = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
  }

  /**********************************/
  /************ BORRAR *************/
  if ($accion == 'borrar') {

    $query = 'DELETE FROM libros WHERE id = :id';
    $sentenciaSQL = $conexion->prepare($query);
    $sentenciaSQL->bindParam(':id', $id);
    try {
      $sentenciaSQL->execute();
      header('Location: productos.php');
    } catch (PDOException $e) {
      echo 'Error al agregar el libro: ' . $e->getMessage();
    }
  }
}
