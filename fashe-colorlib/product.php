<?php  
  $host_db="localhost";
  $usuario_db="root";
  $pass_db="Bankai123";
  $db="saw";

  $conexion=new mysqli($host_db,$usuario_db, $pass_db);
  $conexion->set_charset("utf8"); 
  mysqli_select_db($conexion, "saw");  
  $idCategory = $_GET['idCategory'];

  session_start();
  $username = $_SESSION['username'];
  
  $userId = $_SESSION['userId'];
	$arrayMoney;
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
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
          if ($lector)
            $rowC = mysqli_fetch_array($lector);
        ?>		
                    

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-03.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span id="itemsCart" class="header-icons-noti">
              <?php
                if($username and count($rowC) > 0) {
                  $total = 0;
                  foreach ($conexion->query('SELECT * from shopping_cart_details WHERE statusProduct = 0 AND idShoppingCart = '.$rowC[0].';') as $row){          
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

	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
              Categorias
						</h4>

						<ul class="p-b-54">
            
              <?php
              foreach ($conexion->query('SELECT * FROM `categorias`;') as $row){ ?> 
                <li class="p-t-4">
                  <a href="product.php?idCategory=<?php echo $row['id'];?>" class="s-text13 active1">
                    <?php echo $row['nombre']; ?>
                  </a>
                </li>		
              <?php } ?>
						</ul>

						<!--  -->
						<h4 class="m-text14 p-b-32">
							Filtros
						</h4>

						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Precio
							</div>

							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									<!-- Button -->
									<button id="recargado" class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4" >
										Filtrar
									</button>
								</div>
								<?php

										//$cantida = "<div id='dats'class='col-md-12 text-center'></div>";
										$cantida = "<script> document.getElementById('value-lower') </script>";
										echo "esto es el valor final".$cantida;

								?>

								<div class="s-text3 p-t-10 p-b-10">
									Rango: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
								</div>
							</div>
						</div>
						<div id='dats'class='col-md-12 text-center'></div>

						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Buscar productos...">

							<a href="product.php" class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50"> 

					<!-- Product -->
					<div class="row">
          <?php 
            if($idCategory)
              $query = "SELECT * from `products` WHERE idCategory = ".$idCategory." ORDER BY RAND();";             
            else
              $query = "SELECT * from `products` ORDER BY RAND() LIMIT 0,500;";              
            foreach ($conexion->query($query) as $row){ ?> 
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                  <?php echo "<img src='../../saw-admin/images/products/".$row['image']."' alt='IMG-PRODUCT'>";?> 

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
                      <!-- Button -->
                      <?php if($username) {?>
											<button class="block-btn-addcart flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                        Agregar carrito
                      </button>
                      <?php } else {?>
                        <a href="login.php" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">Agregar carrito</a>
                      <?php } ?>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="product-detail.php?idProduct=<?php echo $row['id'];?>" class="block2-name dis-block s-text3 p-b-5">
                    <?php echo $row['name']; ?>
									</a>

                  <span>$</span>
									<span class="block2-price m-text6 p-r-5">
									  <?php echo $row['cost']; ?>
                  </span>
                  <span class="block2-id2" style="opacity: 0;"><?php echo $row['id']; ?></span>
								</div>
							</div>
            </div>
          <?php } ?> 

						
					</div>

					<!-- Pagination -->
					<!-- <div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div> -->
				</div>
			</div>
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
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
      var idProduct = $(this).parent().parent().parent().find('.block2-id2').html();      
      var costProduct = $(this).parent().parent().parent().find('.block2-price').html();
			$(this).on('click', function(){
				swal(nameProduct, "Agregado al carrito!", "success");            
        loadCart(idProduct, costProduct);
			});
		});

    function loadCart(idProduct, costProduct){
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'getCountCart.php?id='+idProduct+'&cost='+costProduct, true);

      xhr.onload = function(){
        var span = document.getElementById("itemsCart");
        span.textContent = this.responseText;
      }

      xhr.send();
    }

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "Agregado a lista de deseos!", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		var datos;
		var cambia;
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 4000 ],
	        connect: true,
	        range: {
	            'min': 0,
	            'max': 5000
	        }
	    });
	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
					datos = values;
					
					$('#dats').html(datos);
	    });
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
