<?php
    require('controller.php');
    $connexion = '<a href="index.php">retour<a>';
try {
    if(isset($_GET['action'])){
        //echo 'action existe';
        if($_GET['action'] == 'SUPPRIMER'){
           Supprimer($_GET['ID_Activite']);
        }elseif($_GET['action'] == 'Modification' && isset($_GET['ID'])) {
            getCompteUser($_GET['ID']);  

        }elseif ($_GET['action'] == 'ListeCompte') {
            ListeCompte();
        }
        elseif ($_GET['action'] == 'Createcompte') {
          header('Location: login-create.php');
        }
        else{
            throw new Exception("ERROR 404 $connexion");
            
        }
    } 
    elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
        //CONNECTION AU SITE;
       if(isset($_POST['pseudo']) && isset($_POST['pwd']) && !empty($_POST['pseudo']) && !empty($_POST['pwd'])){
            connectCompte($_POST['pseudo'],$_POST['pwd']);
         
        }elseif (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['role']) && isset($_POST['pwd']) && isset($_POST['pwdConfirm']) /* && isset($_POST['sexe']) */) 
        {
            //ENREGISTREMENT DE COMPTE
            if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['role']) && !empty($_POST['pwd']) && !empty($_POST['pwdConfirm']) ){

            addCompte($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['role'],$_POST['pwd'],$_POST['pwdConfirm']);
           }else{ 
             
            $createcompteError = '<a href="index.php?action=Createcompte">'."retour".'</a>';
             throw new Exception("tous les champs ne sont pas bien remplie $createcompteError");   
            }
        }elseif(isset($_POST['FormModification'])) {
            //CONDITION POUR LA MODIFICATION
            if(isset($_POST['nomModif']) && isset($_POST['prenomModif']) && isset($_POST['mailModif']) && isset($_POST['roleModif']) && isset($_POST['pwdModif']) && isset($_POST['pwdConfirmModif'])) {
               Modification($_POST['IdModif'],$_POST['nomModif'],$_POST['prenomModif'],$_POST['mailModif'],$_POST['roleModif'],$_POST['pwdModif'],$_POST['pwdConfirmModif']);    
               //echo $_POST['IdModif'];             
            }
            else{
                $formModifError = '<a href="modification.php">'."retour".'</a>' ;
                throw new Exception("une Erreur est survenue sur le formulaire de modification  $formModifError");                
            }
        }
        else{
         throw new Exception("Le formulaire n'est pas bien remplire $connexion");  
        }
    }else{
        header('Location: login.php');
    }
}catch (Exception $e) {
   // $link = '<a href="index.php">retour<a>';
    $errorResult = $e->getMessage();
    //echo $e->getMessage().' '.$link;
    include('errore.php');
}

?>