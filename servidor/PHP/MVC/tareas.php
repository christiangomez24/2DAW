<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>Tareas</h1>
<?php

  include('Config/conexion.php');


    // try {
    //     $pdo = new PDO("mysql:host=$host;dbname=$nombreBD;charset=utf8",$usuario,$password);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     } catch (PDOException $e) {
    //     echo 'Falló la conexión: ' . $e->getMessage();
    // }

    $consulta = $this->pdo->query("SELECT * FROM task");
    
    $consulta->execute();
?>



<?php
  if (isset($_GET["editar"])) {
      $editarID = $_GET["editar"];

      $consultaEditar = $pdo->query("SELECT * FROM `task`.`task` WHERE `task`.`id` = $editarID");
    
      $consultaEditar->execute();

      while($modificacion = $consultaEditar->fetch()){
        

        ?>

        <h2>Editar tarea:</h2>

        <form method="post">
        <div class="form-group">
          <label for="inputTitulo">Título:</label>
          <input type="text" class="form-control" id="inputTitulo" aria-describedby="título de la tarea" value="<?php echo $modificacion['title']; ?>" name="editarTitulo">
        </div>
        <div class="form-group">
          <label for="inputDescripcion">Descripción:</label>
          <textarea name="editarDescripcion" class="form-control" id="inputDescripcion" rows="4" cols="50"><?php echo $modificacion['description']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Modificar</button>
      </form>


<?php } ?>




<?php

  } else {
    ?>





<h2>Añadir tarea a la lista:</h2>


<form method="post">
  <div class="form-group">
    <label for="inputTitulo">Título:</label>
    <input type="text" class="form-control" id="inputTitulo" aria-describedby="título de la tarea" placeholder="Introduce el título de la tarea..." name="titulo">
  </div>
  <div class="form-group">
    <label for="inputDescripcion">Descripción:</label>
    <textarea name="descripcion" class="form-control" id="inputDescripcion" placeholder="Introduce la descripción de la tarea..." rows="4" cols="50"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Registrar</button>
</form>

 <?php } ?>





 <h2>Listado de tareas:</h2>


<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Título</th>
      <th scope="col">Descripción</th>
      <th scope="col">Fecha de creación</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>

    </tr>
  </thead>
  <tbody>

<?php 


  if (isset($_GET["borrar"])) {
    $borrarID = $_GET["borrar"];

    try {
      $sql = "DELETE FROM task WHERE `task`.`id` = $borrarID";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      echo "Tarea eliminada con éxito.";
      header('Location: tareas.php');
    } catch (\PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  };

  if (isset($_POST['titulo'])){
    $titulo=$_POST['titulo'];
    $descripcion=$_POST['descripcion'];
    try {
      $sql = "INSERT INTO task SET title='$titulo', description='$descripcion'";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      echo "Tarea añadida con éxito.";
      header("Refresh:0");
      } catch (\PDOException $e) {
      echo "Error: " . $e->getMessage();
      }
  };

  if (isset($_POST['editarTitulo'])){
    $editarID = $_GET["editar"];

    $titulo=$_POST['editarTitulo'];
    $descripcion=$_POST['editarDescripcion'];
    try {
      $sql = "UPDATE `task` SET `title` = '$titulo', `description` = '$descripcion' WHERE `task`.`id` = $editarID";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      echo "Tarea editada con éxito.";
      header('Location: tareas.php');
      } catch (\PDOException $e) {
      echo "Error: " . $e->getMessage();
      }
  };



    while($registro = $consulta->fetch()){ ?>
    <tr>
      <td scope="row"><?php echo $registro['id'];?></td>
      <td><?php echo $registro['title']; ?></td>
      <td><?php echo $registro['description'] ?></td>
      <td><?php echo $registro['created_at'] ?></td>
      <td>
      <a href="?editar=<?php echo $registro['id']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg></a>
      </td>
      <td>
        <a href="?borrar=<?php echo $registro['id']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg></a>
      </td>

    </tr>
    <?php }


?>
  </tbody>
</table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>