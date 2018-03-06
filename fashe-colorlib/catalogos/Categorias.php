<?php
  if (!@$_POST['nombre'])
  {
    ?>
    <link href="Assets/bootstrap.min.css" rel="stylesheet">
    <form method="POST" action="Categorias.php">  
      <label for="id">ID: </label>
      <input type="text" name="id">   
      <label for="nombre">Nombre de categoría</label>   
      <input type="text" name="nombre">    
      <input type="submit" class="btn btn-primary" value="grabar">
    </form>
    <?php
  }
    else
  {
    $nombre = $_POST['nombre'];
    echo $nombre;
  }
?>