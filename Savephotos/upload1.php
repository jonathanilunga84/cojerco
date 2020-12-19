
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
	<body>
		
	<div id="fh5co-offcanvas">
		<a href="#" class="fh5co-close-offcanvas js-fh5co-close-offcanvas"><span><i class="icon-cross3"></i> <span>Close</span></span></a>
		<div class="fh5co-bio">
			<figure>
				<img src="images/person1.jpg" alt="Free HTML5 Bootstrap Template" class="img-responsive">
			</figure>
			<h3 class="heading">About Me</h3>
			<h2>Emily Tran Le</h2>
			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
			<ul class="fh5co-social">
				<li><a href="#"><i class="icon-twitter"></i></a></li>
				<li><a href="#"><i class="icon-facebook"></i></a></li>
				<li><a href="#"><i class="icon-instagram"></i></a></li>
			</ul>
		</div>

		<div class="fh5co-menu">
			<div class="fh5co-box">
				<h3 class="heading">Menu</h3>
				<ul>
					<li><a href="index.php">Accueil</a></li>
					<li><a href="missions.php">Missions</a></li>
					<li><a href="fonctionnement.php">Fonctionnement</a></li>
					<li><a href="historique.php">Historique</a></li>
					<li><a href="composition.php">Composition</a></li>
					<li><a href="login.php">ESPACE MEMBRE</a></li>
				</ul>
			</div>
			<div class="fh5co-box">
				<h3 class="heading">Search</h3>
				<form action="#">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Type a keyword">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- END #fh5co-offcanvas -->
	<header id="fh5co-header">
		
		<div class="container-fluid">

			<div class="row">
				<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
				<ul class="fh5co-social">
					<li><a href="#"><i class="icon-twitter"></i></a></li>
					<li><a href="#"><i class="icon-facebook"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
				</ul>
				<div class="col-lg-12 col-md-12 text-center">
					<h1 id="fh5co-logo"><a href="index.html"><?php echo 'AJOUT D\'UNE ACTIVITÉ';  ?> <sup>cojerco</sup></a></h1>
				</div>

			</div>
		
		</div>

	</header>
	
	<!-- END #fh5co-header -->
	<div class="container-fluid">
		<div class="row fh5co-post-entry single-entry">
			<article class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
					<form action="/cojerco/upload_index.php" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>Titre : </label>
							<input type="text" name="titre" class="form-control"/>
						</div>
						<div class="form-group">
							<label>Resumé Activité: </label>
							<textarea name="resume_activite" class="form-control"></textarea>
						</div> 
						<div class="form-group">
							<label>Photos:</label>
							<input type="file" name="photos[]" multiple />
						</div>
						
						 <div class="row">
						 	<div class="col-md-6 form-group">  
			                    <input type="submit" value="Enregistrer" class="btn btn-primary form-control"/>
			                </div> 
		                    <div class="col-md-6 form-group">  
			                    <input type="reset" value="reinitialiser" class="btn btn-primary form-control"/>
		                    </div> 
		                </div> 
					</form>	
				<span class="fh5co-meta animate-box"><a href="single.html"></a></span>
				<h2 class="fh5co-article-title animate-box"><a href="single.html"></a></h2>
				<span class="fh5co-meta fh5co-date animate-box"></span>
			</article>			
		</div>	
		<footer id="fh5co-footer">
				<p><small>&copy; 2020 cojerco.drc@yahoo.fr. <br> <a href="index.php">Le Collectif des Jeunes Réalistes du Congo</a></small></p>
		</footer>	
	</div>
	
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

