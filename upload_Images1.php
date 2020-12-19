<?php session_start(); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Activité</title>
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
		article{ height: 450px; border: 1px solid red1; margin-bottom: 15px; text-align: center; overflow: hidden; background: silver1;}
		.card{ height: 430px; border: 1px solid red1; box-shadow: 0px 5px 20px #999; overflow: hidden; }
		figure{ height: 250px;  border-bottom: 1px solid red1; overflow: hidden;}
		figure img { width: 100%; height: auto; }
		.card-body{ display: block; height: 150px; text-align: center; box-sizing: border-box; display: flex;
			 flex-direction: column; justify-content: center;
			background-color: silver1; overflow: auto;
		}
		ft{height: 30px; background: red; overflow: hidden;}
		@font-face{
			font-family: Satisfy;
			src:url(assets/fonts/Satisfy-Regular.ttf);
		}
		#commentaire{ font-family: Satisfy; font-size: 2em; }
		p,h3 {margin: 0px; padding: 0px;}
		
	</style>
	<body>
		<?php include ('header-upload.html'); ?>
	<!-- END #fh5co-header -->
	<div class="container">
		<div class="row fh5co-post-entry" id="myligne">
			<?php require('upload_controller.php'); ?>
			<?php if ( isset($_GET['Id']) && intval($_GET['Id']) >= 1 ) {
				$req = postsActivites($_GET['Id']);
				while ($data = $req->fetch()) {				
			?>
			<article class="col-lg-4 col-md-4 col-sm-6 col-xs-12 contour animate-box">
				<div class="card">
					<figure>
						<a href="/cojerco/upload_Image.php?IMAGE=<?php echo htmlspecialchars($data['id_P']); ?>" id="text-color"> <img src="<?php echo htmlspecialchars($data['photos_P']); ?>" alt="Image" class="img-responsive">
						</a> 
					</figure>
					<figcaption class="card-body">
						<span id="commentaire"> <?php echo htmlspecialchars($data['resume_A']);?></span>
						
						<h3> <?php echo htmlspecialchars($data['dates']);?> </h3>
					</figcaption>
				</div>
				<div class="ft">
						<!-- div class="col-xs-6"><i class="fa fa-trash"></i><h3>Supprimer</h3>
							</div>
							<div class="col-xs-6"><i class="fa fa-trash"></i><h3>Modifier</h3>
						</div -->
				</div>
			</article>
			<?php
				} 
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
