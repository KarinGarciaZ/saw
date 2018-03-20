<?php
  
    $host_db="localhost";
    $usuario_db="root";
    $pass_db="Bankai123";
    $db="saw";
  
    $conexion=new mysqli($host_db,$usuario_db, $pass_db);
    $conexion->set_charset("utf8");    
  
    mysqli_select_db($conexion, "saw");  

    session_start();
    $userId = $_SESSION['userId'];

    $valores = "SELECT * from shopping_cart WHERE statusCart = 0 AND idClient = ".$userId.";";
    $lector = mysqli_query($conexion, $valores);
    $row = mysqli_fetch_array($lector);
    if(count($row) > 0)           
      saveProduct($row[0]);      
    else {
      $consulta="INSERT INTO `shopping_cart` (`idClient`, `fecha`, `statusCart`) VALUES(".$userId.",'01-01-2018', 0);";
      $resultados=mysqli_query($conexion,$consulta);
      $valores = "SELECT * from shopping_cart WHERE statusCart = 0 AND idClient = ".$userId.";";
      $lector = mysqli_query($conexion, $valores);
      $row = mysqli_fetch_array($lector);
      if (count($row) > 0)
        saveProduct($row[0]);     
    }   

    function saveProduct($idCart) {
      $host_db="localhost";
      $usuario_db="root";
      $pass_db="Bankai123";
      $db="saw";
    
      $conexion=new mysqli($host_db,$usuario_db, $pass_db);
      $conexion->set_charset("utf8");   
      
      
      mysqli_select_db($conexion, "saw"); 
      $consulta="INSERT INTO `shopping_cart_details` (`idShoppingCart`, `idProduct`, `quantity`, `cost`) VALUES(".$idCart.",".$_GET['id'].", 1, ".$_GET['cost'].");";
      $resultados=mysqli_query($conexion,$consulta);
      if ($resultados){
        $valores = "SELECT COUNT(*) from shopping_cart_details WHERE idShoppingCart = ".$idCart.";";
        $lector = mysqli_query($conexion, $valores);
        $row = mysqli_fetch_array($lector);
        echo $row[0];
      }        
    }
?>