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
      $username = $_SESSION['username'];
        $userId = $_SESSION['userId'];
        $valores = "SELECT * FROM `shopping_cart` WHERE `idClient` = $userId";
        $lector = mysqli_query($conexion, $valores);
        $row = mysqli_fetch_array($lector);
        $idCar = $row[0];

        $consulta ="SELECT COUNT(id) FROM sales";
        $r = mysqli_query($conexion, $consulta);
        $con = mysqli_fetch_array($r);
        $idSales = $con[0] + 1;
        
        if(count($row) > 0) { 
              
            $query = "INSERT INTO `sales`(`id`, `idShoppingCart`, `date`, `total`, `status`) VALUES (".$idSales.",".$row[0].",'0000-00-00','100','0')";
            $result = mysqli_query($conexion, $query);    
            foreach ($conexion->query('SELECT * from shopping_cart_details WHERE idShoppingCart = '.$row[0].' AND statusProduct = 0;') as $row){          
                
                $valores2 = "INSERT INTO `sales_details`(`idSale`, `idProduct`, `quantity`, `price`) VALUES (".$idSales.", ".$row['idProduct'].",".$row['quantity'].", ".$row['cost'].");";
                $res = mysqli_query($conexion, $valores2);
            }   

            $query3 = "UPDATE `shopping_cart` SET `statusCart`='1' WHERE `idClient` = $userId";
            $res2 = mysqli_query($conexion, $query3); 

            $query4 = "DELETE FROM `shopping_cart_details` WHERE `idShoppingCart` = '.$idCar.'";
            $res3 = mysqli_query($conexion, $query4); 
            echo "GRacias por la compra";
            
        }   
?>