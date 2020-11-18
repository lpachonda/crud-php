<?php

$conn = mysqli_connect(
  'localhost',
  'root',
  'Andrewseigokan9',
  'dbluisa'
);

$id = 0;
$nombre = '';
$username = '';
$password = '';
$id_rol = 0;

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM usuarios WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $nombre = $row['nombre'];
    $username = $row['username'];
    $password = $row['password'];
    $id_rol = $row['id_rol'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre = $_POST['nombre'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $id_rol = $_POST['id_rol'];

  $query = "UPDATE usuarios set id = '$id', nombre = '$nombre', username = '$username', password = '$password', id_rol = '$id_rol' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
            <input type="text" name="id" class="form-control" value="<?php echo $id; ?>" placeholder="id" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" placeholder="nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="username" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="password" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="id_rol" class="form-control" value="<?php echo $id_rol; ?>" placeholder="id_rol" autofocus>
          </div>
          <button class="btn-success" name="update">
            Update
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>