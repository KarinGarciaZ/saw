<script>
  window.loaction.reload(true);
</script>

<?php
  
  $host_db="localhost";
  $usuario_db="root";
  $pass_db="Bankai123";
  $db="saw";

  $conexion=new mysqli($host_db,$usuario_db, $pass_db);
  $conexion->set_charset("utf8");    

  mysqli_select_db($conexion, "saw");  
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
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

				<div class="topbar-child2">
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

							<li class="sale-noti">
              Categorias
								<!-- <a href="product.php">Categorias</a> -->
							</li>

							<li>
              Carrito
								<!-- <a href="cart.html">Carrito</a> -->
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
					<a href="signin.php" class="header-wrapicon1 dis-block">
            Crear cuenta | 
          </a>

          <a href="login.php" class="header-wrapicon1 dis-block">
            Iniciar sesión
            <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
          </a>
          
          

					<span class="linedivide1"></span>

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
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
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
					<a href="signin.php" class="header-wrapicon1 dis-block">
            Inicia sesión
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
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
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
							Free shipping for Freestandard order over $100
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
						<a href="cart.html">Features</a>
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

	<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(images/nike.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							Negocio de calidad
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							Nueva Temporada
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="product.php" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Compra ahora!
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(images/adidas.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
							Colección 2018
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
							Nueva Temporada
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
							<!-- Button -->
							<a href="product.php" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Compra ahora!
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item3-slick1" style="background-image: url(images/puma.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
							Nueva moda 2018
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
							Lo mejor en calzado
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
							<!-- Button -->
							<a href="product.php" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Compra ahora!
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
  </section>

  <?php
      $valores = "SELECT * from `categorias` ORDER BY RAND() LIMIT 0,6;";
      $lecto = mysqli_query($conexion,$valores);
  ?>
  <br>
	<!-- Banner -->
	<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
      <div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
          Algunas de nuestras categorías
          <hr>
				</h3>
			</div>
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
          <!-- block1 -->
          <?php $row = mysqli_fetch_array($lecto) ?>
					<div class="block1 hov-img-zoom pos-relative m-b-30">
            <?php echo "<img src='../../saw-admin/images/categories/".$row['image']."' alt='IMG-PRODUCT'>";?> 

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?idCategory=<?php echo $row['id'];?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                <?php echo $row['nombre']; ?>
							</a>
						</div>
					</div>

					<!-- block1 -->
					<?php $row = mysqli_fetch_array($lecto) ?>
					<div class="block1 hov-img-zoom pos-relative m-b-30">
            <?php echo "<img src='../../saw-admin/images/categories/".$row['image']."' alt='IMG-PRODUCT'>";?> 

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?idCategory=<?php echo $row['id'];?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                <?php echo $row['nombre']; ?>
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
          <!-- block1 -->
          <?php $row = mysqli_fetch_array($lecto) ?>
					<div class="block1 hov-img-zoom pos-relative m-b-30">
            <?php echo "<img src='../../saw-admin/images/categories/".$row['image']."' alt='IMG-PRODUCT'>";?> 

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?idCategory=<?php echo $row['id'];?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                <?php echo $row['nombre']; ?>
							</a>
						</div>
					</div>

					<!-- block1 -->
					<?php $row = mysqli_fetch_array($lecto) ?>
					<div class="block1 hov-img-zoom pos-relative m-b-30">
            <?php echo "<img src='../../saw-admin/images/categories/".$row['image']."' alt='IMG-PRODUCT'>";?> 

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?idCategory=<?php echo $row['id'];?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                <?php echo $row['nombre']; ?>
							</a>
						</div>
					</div>
        </div>
        
        <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
          <!-- block1 -->
          <?php $row = mysqli_fetch_array($lecto) ?>
					<div class="block1 hov-img-zoom pos-relative m-b-30">
            <?php echo "<img src='../../saw-admin/images/categories/".$row['image']."' alt='IMG-PRODUCT'>";?> 

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?idCategory=<?php echo $row['id'];?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                <?php echo $row['nombre']; ?>
							</a>
						</div>
					</div>

					<!-- block1 -->
					<?php $row = mysqli_fetch_array($lecto) ?>
					<div class="block1 hov-img-zoom pos-relative m-b-30">
            <?php echo "<img src='../../saw-admin/images/categories/".$row['image']."' alt='IMG-PRODUCT'>";?> 

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?idCategory=<?php echo $row['id'];?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                <?php echo $row['nombre']; ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- New Product -->
	<section class="newproduct bgwhite p-t-45 p-b-105" style="padding-bottom: 0;">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
          Nuestros Productos
          <hr>
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">

        <?php 
          foreach ($conexion->query('SELECT * from `products` ORDER BY RAND() LIMIT 0,10;') as $row){ ?> 
          <div class="item-slick2 p-l-15 p-r-15">
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
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Agregar carrito
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.php?idProduct=<?php echo $row['id'];?>" class="block2-name dis-block s-text3 p-b-5">
                  <h5><?php echo $row['name']; ?></h5>
								</a>

								<span class="block2-price m-text6 p-r-5">
                $<?php echo $row['cost']; ?>
								</span>
							</div>
						</div>
					</div>
        <?php } ?> 

				</div>
			</div>

		</div>
	</section>

	<!-- Shipping -->
	<section class="shipping bgwhite p-t-62 p-b-46" style="padding-top: 0;">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Envio gratis a toda la ciudad
				</h4>

				<a href="#" class="s-text11 t-center">
					
				</a>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
					Horario
				</h4>

				<span class="s-text11 t-center">
					Horario corrido de 10:00 a 21:00
				</span>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
        <h4 class="m-text12 t-center">
          Días de servicio de tienda
        </h4>

        <span class="s-text11 t-center">
          La tienda abre de Lunes a Sábado
        </span>
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
        ¿Alguna duda? haznosla saber. Estamos en la ezquina entre Reforma y Ramón Corona, en el piso 3. Ciudad Guzmá, Jalisco.
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

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



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
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>


<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
