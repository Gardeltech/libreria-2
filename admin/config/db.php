<?php
require_once 'constantes.php';

//Utilizando PDO PARA HACER LA CONEXIÓN A LA BASE DE DATOS
try {
  // Creamos una nueva instancia PDO para la base de datos
  $conexion = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . DBNAME, USERNAME, USERPASS);
  // Configuramos el modo de error PDO a excepciones para capturar y manejar los errores propios
  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo 'Conexión realizada con exito';
} catch (PDOException $e) {
  echo "Error en la conexión: " . $e->getMessage();
  die(); // = exit();
}