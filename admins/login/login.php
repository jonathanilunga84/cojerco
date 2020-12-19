<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Jonathan Ilunga (jonathanilunga84@gmail.com)">
	
	<title>connete cojerco</title>

	<link rel="shortcut icon" href="/cojerco/assets/images/logo1.ico">
	
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
		#head{padding-top-:; min-height: 80px ; }
		.cot{padding-bottom:0px; margin-bottom:0px;}
		#titre1{font-size: 20px;  background: red-; margin-bottom: 0px; line-height:; font-weight:bold;  font-family:"Open sans", Helvetica, Arial;}
		#fh5co-footer { padding: 3em 0; text-align: center;}
	</style>

<body>
	<!-- Fixed navbar -->
	<?php //include('/cojerco/header.html'); ?>
	<!-- /.navbar -->

	<!-- <header id="head" class="secondary"> </header> -->

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="/cojerco/index.php">ACCUEIL</a></li>
			<li class="active">User access</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">CONNECTE TOI</h3>
							
							<hr>
							
							<form action="/cojerco/admins/login/index.php" method="POST">
								<?php if(isset($_GET['errorMessage']))
								{ 
								?>
									<span><strong>LE INFORMATIONS D'IDENTIFICATION SONT INCORRECT</strong></span>
								<?php
								}
								?>
								<div class="top-margin">
									<label>Username/Email <span class="text-danger">*</span></label>
									<input type="text" name="pseudo" class="form-control" required>
								</div>
								<div class="top-margin">
									<label>Password <span class="text-danger">*</span></label>
									<input type="password"  name="pwd" class="form-control">
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-4">
										<!--b><a href="#">Forgot password?</a></b-->
									</div><div class="col-lg-4">
										<!-- b> <a href="/cojerco/login/login-create.php">Register</a> </b -->
									</div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" type="submit">Connexion</button>
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
	<?php //include('/cojerco/footer.html'); ?>
	
		<footer id="fh5co-footer">
			<p><small>&copy; 2020 cojerco.drc@yahoo.com <br> <a href="index.php">Le Collectif des Jeunes Réalistes du Congo</a></small></p>
		</footer>

	<!-- /footer -->
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="/cojerco/assets/js/modalimge.js"></script>
	<script src="/cojerco/assets/js/jquery-3.5.1.js"></script>
	<script src="/cojerco/assets/js/bootstrap4.min.js"></script>

	<script src="/cojerco/assets/js/headroom.min.js"></script>
	<script src="/cojerco/assets/js/jQuery.headroom.min.js"></script>
	<script src="/cojerco/assets/js/template.js"></script>
	<script>
		
	</script>
</body>
</html>