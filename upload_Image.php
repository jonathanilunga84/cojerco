<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>cojerco(photo)</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic|Roboto:400,300,700' rel='stylesheet' type='text/css'>
	<!-- Animate -->
	<link rel="stylesheet" href="assets_Activite/css/animate.css">
	<!-- Icomoon -->
	<link rel="stylesheet" href="assets_Activite/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="assets_Activite/css/bootstrap.css">

	<link rel="stylesheet" href="assets_Activite/css/style.css">


	<!-- Modernizr JS -->
	<script src="assets_Activite/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<style type="text/css">
		img{ max-width: 100%; margin: auto; }
	</style>
	<body>
		
		<?php include('header-upload.html'); ?>	
	
	<div class="container-fluid ct">
		<div class="row fh5co-post-entry single-entry1">
			<?php require('upload_controller.php'); //postImage_photos	?>
			<?php if (isset($_GET['IMAGE']) && intval($_GET['IMAGE']) >= 1 ) {
					//$data = postImage_photos($_GET['IMAGE']);
				$data = postActivite($_GET['IMAGE']);
			?>
			<article class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 Ac">
				<figure class="animate-box">
					<img src="<?php echo $data['photos_P']; ?>" alt="Image" class="img-responsive">
				</figure>
				<h2 class="fh5co-article-title animate-box"><a href="single.html"><?php echo $data['titre_A']; ?></a></h2>
				<span class="fh5co-meta fh5co-date animate-box"><?php echo $data['resume_A']; ?></span>
				<span class="fh5co-meta fh5co-date animate-box"><?php echo $data['dates']; ?></span>
			</article>
			<?php 
				} 
			?>			
		</div>
	</div>

	<footer id="fh5co-footer">
		<p><small>&copy; 2020 cojerco.drc@yahoo.fr. <br> <a href="index.php">Le Collectif des Jeunes Réalistes du Congo</a></small></p>
	</footer>
	
	<!-- jQuery -->
	<script src="assets_Activite/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="assets_Activite/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="assets_Activite/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="assets_Activite/js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="assets_Activite/js/main.js"></script>

	</body>
</html>

