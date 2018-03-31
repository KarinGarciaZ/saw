<?php
  
  $host_db="localhost";
  $usuario_db="root";
  //Contrasenia Karin
	//$pass_db="Bankai123";
	//Contrasenia Diego
	$pass_db="root";
  $db="saw";

  $conexion=new mysqli($host_db,$usuario_db, $pass_db);
  $conexion->set_charset("utf8");    

  mysqli_select_db($conexion, "saw");  

  session_start();
  $userId = $_SESSION['userId'];

  $valores = "SELECT * from shopping_cart WHERE statusCart = 0 AND idClient = ".$userId.";";
  $lector = mysqli_query($conexion, $valores);
  $row = mysqli_fetch_array($lector);
  if(count($row) > 0){
    $consulta="UPDATE `shopping_cart_details` SET statusProduct = 1 WHERE idShoppingCart = ".$row[0]." AND idProduct = ".$_GET['id'].";";
    $resultados=mysqli_query($conexion,$consulta);
  }
  $total = 0;
  foreach ($conexion->query('SELECT * from shopping_cart_details WHERE idShoppingCart = '.$row[0].'  AND statusProduct = 0;') as $row){          
    $total = $total + $row['quantity'];
  }
  echo $total;
?>