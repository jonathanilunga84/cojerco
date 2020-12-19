<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Liste-Photos</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

      <!-- HEAD -->
        
      <!-- END HEAD -->
      

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables <a href="index.php">retour</a></h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Liste Des Activités</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    	<th>Titre activite</th>
          						<th>Resumé de l'activité</th>
          						<th>Date activite</th>	
          						<th></th>	          						
          						<th>Supprimer</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    	<th>Titre activite</th>
						<th>Resumé de l'activité</th>
						<th>Date activite</th>	
						<th></th>
					
						<th>Supprimer</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php // require('../upload_controller.php'); $req = postsActivite(); ?>
                	<?php while($data = $req->fetch()) 
								{
								?>
									
										<tr>
											<td><h4><a href="index.php?action=postsPhotos&amp;ID_ACTIVITE=<?php echo $data['id']; ?>"> <?php echo nl2br(htmlspecialchars($data['titre'])); ?></a></h4></td>
											<td><p><?php echo nl2br(htmlspecialchars($data['resume_activite']));?></p></td>
											<td><p><?php echo nl2br(htmlspecialchars($data['dateposte']));?></p></td>
											<td><p><?php echo nl2br(htmlspecialchars($data['id']));?></p></td>
										  <td><a href="index.php?action=Modification&amp;Id=<?php echo $data['id']; ?>">Edition</a></td>
											<td> <a href="index.php?action=SUPPRIMER&amp;Id=<?php echo htmlspecialchars($data['id']);?>" onclick='return confirmation();'>Supprimer</a></td>
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

   <!-- Include JavaScript-->
      <?php include('js.html'); ?>
    <!-- END script-->
    <script type="text/javascript">
    //FUNCTION POUR SUPPRIMER 
    function confirmation(){
      return confirm("voulez-vous réellement supprimer cet Element");
    }
  </script>

</body>

</html>
