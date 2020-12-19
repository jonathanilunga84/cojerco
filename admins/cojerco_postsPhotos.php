<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Modication Activité</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
  <style type="text/css">
    article{ height: 450px; border: 1px solid red1; margin-bottom: 15px; text-align: center; overflow: hidden; background: silver1;}
    .card{ height: 430px; border: 1px solid red1; box-shadow: 0px 5px 20px #999; overflow: hidden; }
    figure{ height: 250px;  border-bottom: 1px solid red1; overflow: hidden;}
    figure img { width: 100%; height: auto; }
    /*.card-body{ display: block; height: 150px ; text-align: center; box-sizing: border-box; display: flex;
       flex-direction: column; justify-content: center; background-color: silver; overflow: auto;
    }*/
    #conten-card{height: 150px; overflow:; background: yellow1;}
    .footer_photos {height: px; background: silver1; overflow: hidden; margin-left: 2px;}
    @font-face{
      font-family: Satisfy;
      src:url(assets/fonts/Satisfy-Regular.ttf);
    }
    #commentaire{ font-family: Satisfy; font-size: 2em; }
    p,h3 {margin: 0px; padding: 0px;}
    #fh5co-footer {padding: 3em 0; text-align: center;}
    #adImage{text-align: center;}   
  </style>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
      <?php require('head/Sidebar.html'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
           <?php require('head/Topbar.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="row">
      <div class="col-md-2 offset-md-10 bg-primary" id="adImage"> <a class="text-light" href="index.php?action=AjoutPhoto&amp;IdActivite=<?php echo $_GET['ID_ACTIVITE']; ?>">Ajout Images</a></div>
    </div>
    <div class="row">

      <?php //require('upload_controller.php'); ?>
      <?php //if ( isset($_GET['Id']) && intval($_GET['Id']) >= 1 ) {
        //$req = postsActivites($_GET['Id']);
        while ($data = $req->fetch()) {       
      ?>
      <article class="col-lg-4 col-md-4 col-sm-6 col-xs-12 contour animate-box">
        <div class="card">
          <figure class="">
            <a href="/cojerco/upload_Image.php?IMAGE=<?php echo htmlspecialchars($data['id_P']); ?>" id="text-color"> <img src="<?php echo htmlspecialchars('../'.$data['photos_P']); ?>" alt="Image" class="img-responsive">
            </a> 
          </figure>
          <figcaption class="card-body cby">
            <div id="conten-card">            
              <span id="commentaire"> <?php echo htmlspecialchars($data['resume_A']);?></span>
              
              <h3> <?php echo htmlspecialchars($data['dates']);?> </h3>
            </div>
          </figcaption>
          <div class="row  footer_photos">
            <div class="col-md-6 offset-md-3"><i class="fa fa-trash"></i><h5> <a href="index.php?action=SupprimePhoto&amp;Id_Photo=<?php echo htmlspecialchars($data['id_P']); ?>&amp;IdACtivite=<?php echo htmlspecialchars($_GET['ID_ACTIVITE']); ?>" onclick="return Confirmation();">Supprimer</a> </h5>
            </div>
            <!--div class="col-md-6"><i class="fa fa-trash"></i><h5><a href="#"> Modifier</a></h5>
            </div-->
        </div>
        </div>
        
      </article>
      <?php
        } $req->closeCursor();
      //}
      ?>
      
    </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
       <?php include('footer.html'); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script type="text/javascript">
    function Confirmation(){
      return confirm('Voulez vous réelement Supprimer cet Photos');
    }
  </script>
</body>

</html>
