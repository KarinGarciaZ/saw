<?php
  
  $host_db="localhost";
  $usuario_db="root";
  $pass_db="Bankai123";
  $db="saw";

  $conexion=new mysqli($host_db,$usuario_db, $pass_db);
  $conexion->set_charset("utf8");    

  mysqli_select_db($conexion, "saw");  
  session_start();
  $username = $_SESSION['username'];
  $userId = $_SESSION['userId'];
  $idCart = $_GET['idCart'];
  $idSale;


  if($username) {
    $valores = "SELECT * from shopping_cart WHERE statusCart = 0 AND idClient = ".$userId.";";
    $lector = mysqli_query($conexion, $valores);
    if ($lector){
      $total = 0;
      $rowCart = mysqli_fetch_array($lector);  
      $idShoppingCart = $rowCart[0];        
    
     foreach ($conexion->query('SELECT * from shopping_cart_details WHERE statusProduct = 0 AND idShoppingCart = '.$idShoppingCart.';') as $rowProducts){            
        $total = $total + $rowProducts['cost'] * $rowProducts['quantity']; 
      }		

      
      date_default_timezone_set('America/Monterrey');
      $date = date('Y-m-d', time());

      $total;
      $consulta="INSERT INTO `sales` (`idShoppingCart`, `date`, `total`, `status`) VALUES(".$idShoppingCart.",'".$date."',".$total.", 0);";
      $resultados=mysqli_query($conexion,$consulta);

      if($resultados){
        $valores = "SELECT * from sales ORDER BY id DESC LIMIT 1;";
        $lector = mysqli_query($conexion, $valores);
        $rowSale = mysqli_fetch_array($lector);  
        $idSale = $rowSale[0];    

        foreach ($conexion->query('SELECT * from shopping_cart_details WHERE statusProduct = 0 AND idShoppingCart = '.$idShoppingCart.';') as $row){   
          $consulta="INSERT INTO `sales_details` (`idSale`, `idProduct`, `quantity`, `price`) VALUES(".$idSale.",".$row['idProduct'].",".$row['quantity'].", ".$row['cost'].");";
          $resultados=mysqli_query($conexion,$consulta);
        }	
        $consulta="UPDATE `shopping_cart` SET statusCart = 1 WHERE id = ".$idShoppingCart.";";
        $resultados=mysqli_query($conexion,$consulta);
      }
    } 
  }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					¡Envío gratis en toda la ciudad!
				</span>				
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.php" class="logo">
					<img src="images/icons/letras.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
          <nav class="menu">
            <ul class="main_menu">
              <li>
                <a href="index.php">Inicio</a>
              </li>

              <li>
                <a href="product.php">Productos</a>
              </li>

              <li>              
                <a href="cart.php">Carrito</a>
              </li>

              <li>
              Sobre nosotros
                <!-- <a href="about.html">Sobre nosotros</a> -->
              </li>

              <li>
              Contactanos
                <!-- <a href="contact.html">Contactanos</a> -->
              </li>
            </ul>
          </nav>
        </div>

				<!-- Header Icon -->
				<div class="header-icons">
        <?php
          if($username){
            echo "<a href='' class='header-wrapicon1 dis-block'>$username<img src='images/icons/icon-header-01.png' class='header-icon1' alt='ICON'></a>";
          }
          else {?>
            <a href="signin.php" class="header-wrapicon1 dis-block">
              Crear cuenta | 
            </a>

            <a href="login.php" class="header-wrapicon1 dis-block">
              Iniciar sesión
              <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
            </a>
        <?php 
        } 

          $valores = "SELECT * from shopping_cart WHERE statusCart = 0 AND idClient = ".$userId.";";
          $lector = mysqli_query($conexion, $valores);
          $rowC = mysqli_fetch_array($lector);
        ?>		
                    

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-03.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span id="itemsCart" class="header-icons-noti">
              <?php
                if($username and count($rowC) > 0) {
                  $row = mysqli_fetch_array($lector);
                  $total = 0;
                  foreach ($conexion->query('SELECT * from shopping_cart_details WHERE idShoppingCart = '.$row[0].' AND statusProduct = 0;') as $row){          
                    $total = $total + $row['quantity'];
                  }                  
                  echo $total;
                }
                else
                  echo 0;
              ?>
            </span>

            <!-- Header cart noti -->
            <?php if($username) {
              $valores = "SELECT * from shopping_cart WHERE statusCart = 0 AND idClient = ".$userId.";";
              $lector = mysqli_query($conexion, $valores);
              if ($lector){
                $total = 0;
                $row = mysqli_fetch_array($lector);                        
              ?>
              
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
                <?php foreach ($conexion->query('SELECT * from shopping_cart_details WHERE statusProduct = 0 AND idShoppingCart = '.$row[0].';') as $row){    
                  $valores = "SELECT * from products WHERE id = ".$row['idProduct'].";";
                  $lectore = mysqli_query($conexion, $valores);
                  $productRow = mysqli_fetch_array($lectore);
                  ?>
								<li class="header-cart-item">
									<div class="header-cart-item-img">
                  <?php echo "<img src='../../saw-admin/images/products/".$productRow['image']."' alt='IMG'>";?> 
									</div>

									<div class="header-cart-item-txt">
										<a href="product-detail.php?idProduct=<?php echo $row['idProduct'];?>" class="header-cart-item-name">
                    <?php echo $productRow['name']; ?>
										</a>

										<span class="header-cart-item-info">
                    <?php echo $row['quantity']; ?> x $<?php echo $row['cost']; ?>
										</span>
									</div>
                </li>		
                <?php $total = $total + $row['cost'] * $row['quantity']; }?>						
							</ul>

							<div class="header-cart-total">
								Total: $<?php echo $total;?>		
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Ver Carro
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Pagar
									</a>
								</div>
							</div>
            </div>
            <?php } }?>

					</div>
          </div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.php" class="logo-mobile">
				<img src="images/icons/letras.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							¡Envío gratis en toda la ciudad!
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
							</span>

							<div class="topbar-language rs1-select2">
								<select class="selection-1" name="time">
									<option>USD</option>
									<option>EUR</option>
								</select>
							</div>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="index.php">Home</a>
						<ul class="sub-menu">
							<li><a href="index.php">Homepage V1</a></li>
							<li><a href="home-02.html">Homepage V2</a></li>
							<li><a href="home-03.html">Homepage V3</a></li>
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="product.php">Shop</a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.php">Sale</a>
					</li>

					<li class="item-menu-mobile">
						<a href="cart.php">Features</a>
					</li>

					<li class="item-menu-mobile">
						<a href="blog.html">Blog</a>
					</li>

					<li class="item-menu-mobile">
						<a href="about.html">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>

  <div class="container">
    <div class="text-center">
      <h1>Detalle del Pedido</h1>             
    </div>
    <hr>

    <div class="row">
      <div class="col-7"></div>            
      <div class="col-5 row">
        <div class="col-6"><label>Numero de pedido:</label></div>
        <div class="col-6">
          <div class="bo4 of-hidden size15 m-b-20">
            <?php echo "<input class='sizefull s-text7 p-l-22 p-r-22' type='text' value='".$idSale."' readonly>"; ?>       
          </div>
        </div>        
      </div>
    </div>   
  </div>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
    <?php 
      $valores = "SELECT * from sales WHERE `status` = 0 AND idShoppingCart = ".$idCart.";";
      $lector = mysqli_query($conexion, $valores);
      $rowC = mysqli_fetch_array($lector);
      if($username and count($rowC) > 0) {
        $total = 0;
        $idSale = $rowC[0];
          ?>
          
      

			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Producto</th>
							<th class="column-3">Precio</th>
							<th class="column-4 p-l-70">Cantidad</th>
              <th class="column-5">Total</th>
            </tr>
            
            <?php
              foreach ($conexion->query('SELECT * from sales_details WHERE idSale = '.$idSale.';') as $row){    
                $valores = "SELECT * from products WHERE id = ".$row['idProduct'].";";
                $lectore = mysqli_query($conexion, $valores);
                $productRow = mysqli_fetch_array($lectore);
            ?>	

						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
                <?php echo "<img src='../../saw-admin/images/products/".$productRow['image']."' alt='IMG-PRODUCT'>";?> 
								</div>
							</td>
							<td class="column-2">
                <span class="block2-id2" style="opacity: 0;"><?php echo $productRow['id']; ?></span>
                <?php echo $productRow['name']; ?>
              </td>
							<td class="column-3">$<?php echo $row['price']; ?></td>
							<td class="column-4" style='padding-left: 100px;'>		
                <?php echo "<input class='size8 m-text18 t-center num-product' id='quantities' type='number' name='num-product1' value='".$row['quantity']."'>"; ?>

                <?php $total = $total + $row['price'] * $row['quantity']; ?>                
							</td>
              <td class="column-5">$<?php echo $row['price'] * $row['quantity'];?></td>
            </tr>
            <?php } ?>
						
					</table>
				</div>
      </div>     	

      <div class="row">
        <div class="col-8 text-center">
          
          <a href="reportes/generate/salesReport.php" class="btn btn-danger" style="margin-top: 150px">Generar PDF del pedido</a>
        </div>
        <div class="col-4">
          <!-- Total -->
          <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
            <h5 class="m-text20 p-b-24">
              Cuenta del pedido
            </h5>

            <!--  -->
            <div class="flex-w flex-sb-m p-b-12">
              <span class="s-text18 w-size19 w-full-sm">
                Subtotal:
              </span>

              <span class="m-text21 w-size20 w-full-sm">
                $<?php echo $total * .84;?>	
              </span>
            </div>

            <div class="flex-w flex-sb-m p-b-12">
              <span class="s-text18 w-size19 w-full-sm">
                IVA:
              </span>

              <span class="m-text21 w-size20 w-full-sm">
                $<?php echo $total * .16;?>	
              </span>
            </div>

            <hr>

            <!--  -->
            <div class="flex-w flex-sb-m p-t-26 p-b-30">
              <span class="m-text22 w-size19 w-full-sm">
                Total:
              </span>

              <span class="m-text21 w-size20 w-full-sm">
                $<?php echo $total;?>	
              </span>
            </div>
          </div>
        </div>
      </div>		

			
      <?php  }?>
		</div>
	</section>

  <!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
    <h4 class="s-text12 text-center">
      CONTACTATE CON NOSOTROS
    </h4>

    <div>
      <p class="s-text7 text-center">
        ¿Alguna duda? haznosla saber. Estamos en la esquina entre Reforma y Ramón Corona, en el piso 3. Ciudad Guzmá, Jalisco.
      </p>

      <div class="text-center">
        <a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
        <a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
        <a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
        <a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
        <a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
      </div>
    </div>
    

    <div class="t-center p-l-15 p-r-15">	
      <div class="t-center s-text8 p-t-20">
        Copyright © 2018 Derechos reservados. | Aliados del Software.
      </div>
    </div>
  </footer>

	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});

	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>



