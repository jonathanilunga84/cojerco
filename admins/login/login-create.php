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
  <link href="/cojerco/admins/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/cojerco/admins/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
      <?php require('../head/Sidebar.html'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
           <?php require('../head/Topbar.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- 404 Error Text -->
          <div class="text-center">
            <div class="row justify-content-center">
             <div class="col-md-12 col-xs-12">
                <header class="page-header">
          <h1 class="page-title">Création d'un nouveau compte</h1>
        </header>
             </div>
              <article class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
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
                  <div class="col-lg-12">
                    <button class="btn btn-primary form-control" type="submit">Register</button>
                  </div>
                </div>
              </form>
              </article>    
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
       <?php include('../footer.html'); ?>
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
  <?php include('../js.html'); ?>

</body>

</html>
