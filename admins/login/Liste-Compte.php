<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Liste Activité</title>

  <!-- Custom fonts for this template -->
  <link href="/cojerco/admins/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/cojerco/admins/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="/cojerco/admins/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Liste Activités</h1>
          <p class="mb-4">Dans la liste ci-dessous vous pouvez Editer ou Supprimer une Activité</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Activités</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Nom</th>
                      <th>PostNom</th>
                      <th>Pseudo/Email</th>
                      <th>Rôle</th>
                      <th>Éditer</th>
                      <th>Supprimer</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th></th>
                      <th>Nom</th>
                      <th>PostNom</th>
                      <th>Pseudo / Email</th>
                      <th>Rôle</th>
                      <th>Éditer</th>
                      <th>Supprimer</th>
                    </tr>
                  </tfoot>
                  <tbody>
                   <?php 
            // LA VARIABLE $req VOIR LE FICHIER CONTROLLER
            while ($data = $req->fetch()) {
          ?>  
          <tr>
            <th><?php echo $data['id']; ?></th>
            <th><?php echo $data['nom']; ?></th>
            <th><?php echo $data['prenom']; ?></th>
            <th><?php echo $data['pseudo']; ?></th>
            <th><?php echo $data['roles']; ?></th>
            <th> <a class="btn btn-primary" href="index.php?action=Modification&amp;ID=<?php echo $data['id']; ?>" >Editer</a></th>
            <th> <a href="index.php?action=SUPPRIMER&amp;ID_Activite=<?php echo $data['id']; ?>" class="btn btn-danger" onclick='return confirmation();'>Supprimer</a></th>
          </tr>
          <?php 
          }$req->closeCursor();
          ?>    
                  </tbody>
                </table>
              </div>
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
  <script type="text/javascript">
    //FUNCTION POUR SUPPRIMER 
    function confirmation(){
      return confirm("voulez-vous réellement supprimer cet Element");
    }
  </script>
</body>

</html>
