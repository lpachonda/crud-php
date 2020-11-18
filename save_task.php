<?php

$conn = mysqli_connect(
  'localhost',
  'root',
  'Andrewseigokan9',
  'dbluisa'
);

if (isset($_POST['save_task'])) {
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $id_rol = $_POST['id_rol'];
  $query = "INSERT INTO usuarios(id, nombre, username, password, id_rol) VALUES ($id, '$nombre', '$username', '$password', $id_rol)";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Guardado con exito';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
