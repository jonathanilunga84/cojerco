<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Sign up - Progressus Bootstrap template</title>

	<link rel="shortcut icon" href="/cojerco/assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="/cojerco/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/cojerco/assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="/cojerco/assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="/cojerco/assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<style>
	mark{font-size:20px;}
	#head{ padding-bottom: 30px; }
	#fh5co-footer { padding: 3em 0; text-align: center;}
</style>

<body>
	<!-- Fixed navbar -->
		<?php //include('../header.html'); ?>
	<!-- /.navbar -->

	<!-- header id="head" class="secondary"></header-->

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="../index.php">Home</a></li>
			<li class="active">Registration</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Registration</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Register a new account</h3>
							<p class="text-center text-muted"><a href="login.php">Login</a></p>
							<hr>

							<form action="index.php" method="POST">
								<div class="top-margin">
									<label>Nom :</label>
									<input type="text" name="nom" class="form-control">
								</div>
								<div class="top-margin">
									<label>Prenom :</label>
									<input type="text" name="prenom" class="form-control">
								</div>
								<div class="top-margin">
									<?php 
										if(isset($_GET['pseudo']))
										{
									?> 
										<p>Les Pseudo <strong><mark><?php echo $_GET['pseudo'] ?> </mark> </strong> est deja pris choisire une autre</p>	
									<?php
										} 
									?>
									<label>Pseudo ou Address Email : <span class="text-danger">*</span></label>
									<input type="text" name="mail" class="form-control">
								</div>
								<div class="top-margin">
									<label>Rôle:</label>
									<select name="role" id="" class="form-control">
										<option>Coordonateur</option>
										<option>Administrateur</option>
									</select>
									
								</div>

								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Password : <span class="text-danger">*</span></label>
										<input type="text" name="pwd" class="form-control">
									</div>
									<div class="col-sm-6">
										<label>Confirm Password<span class="text-danger">*</span></label>
										<input type="text" name="pwdConfirm" class="form-control">
									</div>
								</div>

								<hr>
								
								<div class="row">
								<!----
									<div class="col-lg-8">
										<label class="checkbox">
											<input type="checkbox"> 
											I've read the <a href="page_terms.html">Terms and Conditions</a>
										</label>                        
									</div>
								-->
									<div class="col-lg-12 text-right">
										<button class="btn btn-action form-control" type="submit">Register</button>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	
	<!-- footer -->
		<footer id="fh5co-footer">
			<p><small>&copy; 2020 cojerco.drc@yahoo.com <br> <a href="index.php">Le Collectif des Jeunes Réalistes du Congo</a></small></p>
		</footer>
	<!-- /footer -->	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="/cojerco/assets/js/headroom.min.js"></script>
	<script src="/cojerco/assets/js/jQuery.headroom.min.js"></script>
	<script src="/cojerco/assets/js/template.js"></script>
</body>
</html>