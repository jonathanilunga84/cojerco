<?php
  session_start(); //$IdActivite
try{
      require('controller.php');
  if ( isset($_GET['action']) /*$_SERVER['REQUEST_METHOD'] == 'GET'*/) {
    if ($_GET['action'] == 'postsPhotos') {
      postsPhtos($_GET['ID_ACTIVITE']);
    }elseif($_GET['action'] == 'SUPPRIMER'){
     SupprimerActivite($_GET['Id']);
    }elseif($_GET['action'] == 'SupprimePhoto'){
     SupprimePhoto($_GET['Id_Photo'],$_GET['IdACtivite']); //
      //echo $_GET['Id'].'- ds -'.$_GET['IdACtivite'];
    }
    elseif($_GET['action'] == 'Modification'){
      FomModification($_GET['Id']);
    }elseif($_GET['action'] == 'AjoutPhoto'){
      FormAjoutPhotos($_GET['IdActivite']);
    }
    elseif($_GET['action'] == 'postsActivites'){
      postsActivites();
    }
  }
  elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['modif_Activite'])) {
      AddModification($_POST['Id'],$_POST['titre'],$_POST['resume_activite']);
    }
    elseif (isset($_POST['Ajout_Photos'])) {
     
      AddPhtos($_POST['IdActivite'],$_FILES['photos']); //
      //echo "ind ".$_POST['IdActivite'];
      //echo $_FILES['photos']['name'];
      /*if (isset($_FILES['photos'])){
        if (!empty($_FILES['photos']['name'])) {
          echo "n'est pas vide";
        }else{
          echo "Vide";
        }
      }
      else{
        echo "Faux existe pas";
      }*/
      /*$tab[] =$_FILES['photos'];
      var_dump($tab);*/
    }else{
      throw new Exception("L'OPERATION SOUHAITÉE N'EST PAS");
      
    }
  }
  else{
    require('accueil.php');
  }
}catch(Exception $e){
  $link = '<a href="index.php">retour<a>';
  $errorResult = $e->getMessage();
  //echo $e->getMessage().' '.$link;
  require('message.php');
}
?>