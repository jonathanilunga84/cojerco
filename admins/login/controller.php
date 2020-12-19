<?php
   // session_start();
    require('model.php');
    function addCompte($nom,$prenom,$pseudo,$role,$pwd,$pwdConfirm) {
      
        if($pwd == $pwdConfirm){
                  
            if(existPseudo($pseudo)) {
               $message = "Les Pseudo ".$pseudo. ' est deja pris choisire une autre';
                header('Location: /cojerco/login/login-create.php?pseudo='.$pseudo);
            } 
            else{
                $pwdAsh = password_hash($pwd, PASSWORD_DEFAULT); 
                $affectedLines = add($nom,$prenom,$pseudo,$role,$pwdAsh);
                if ($affectedLines === false) {
                    throw new Exception('Impossible d\'ajouter le commentaire !');
                }else{
                   /*throw new Exception("Enregistrement effectuer avec succés Connecter vous avec pseudo=".$pseudo.'<BR />'.' Mot de psse '.$pwd.'<a href="index.php?action=login">'.' connecter'.'</a>');*/
                   throw new Exception("Enregistrement effectuer avec succés Connecter vous avec pseudo=".$pseudo.'<BR />'.' Mot de psse '.$pwd.'<a href="index.php">'.' connecter'.'</a>');
                }
            }          
        }
        else{
            $createcompteError = '<a href="index.php?action=Createcompte">'."retour".'</a>';
            throw new Exception("les deux champs de mot de passe doivent etre le même $createcompteError");             
        }
    //}
    }

    //POUR C'est CONNECTER
    function connectCompte($pseudo,$pwd){
        if (existPseudo($pseudo)){
           $donnees = getCompte($pseudo);
           if ($donnees['pseudo'] == $pseudo && password_verify($pwd,$donnees['pwd'])) {
                session_start();
                $_SESSION['id'] = $donnees['id'];
                $_SESSION['pseudo'] = $donnees['pseudo'];
                //$_SESSION['roles'] = $donnees['roles'];
               if($donnees['roles'] == 'Administrateur'){ 
                  //header('Location: page1.php');    
                    //echo 'Sup';
                  header('Location: /cojerco/admins');
               }elseif ($donnees['roles'] == 'Coordonateur'){
                   header('Location: /cojerco/upload.php');
               }
               else{
                $link = '<a href="index.php">retour<a>';
                  throw new Exception("Les n'est vous reconnais pas $link");
                  
               }
           }else{
              throw new Exception("pseudo ou mot de passe incorect");
            }
        }else{
           //header('Location: /cojerco2/login.php?message');
          throw new Exception("Les Compte n'est pas trouver");          
        }
    }

    function ListeCompte(){
      $req = getListCompte();
      require('Liste-Compte.php');
    }

    function getCompteUSer($ID){
      //RECUPERATION DE INFORMATION LIER A UN USER
      if (intval($ID)) {
        $data = getCompteID($ID);
        require('modification.php');
        //require('Liste-Compte.php');
      }
      else{
        throw new Exception("l'ID doit etre un Entier");
        
      }
    }

    function Modification($id,$nom,$prenom,$mail,$role,$pwd,$pwdConfirm){
      $formModifError = "<a href=\"index.php?action=Modification&ID=$id\">"."retour "."</a>" ;
      if (!empty($pwd) && !empty($pwdConfirm)) {
        if ($pwd == $pwdConfirm) {
          if (!empty($nom) && !empty($prenom) && !empty($mail) && !empty($role)) {
            $pwdAsh1 = password_hash($pwd, PASSWORD_DEFAULT);
            $data = getUpdate($id,$nom,$prenom,$mail,$role,$pwdAsh1);
            if ($data === false) {
             
              throw new Exception("Echec de la Modification $formModifError");
            }
            else{
             
              ListeCompte();
            }
          }
          else {
            throw new Exception("Les Champs ne sont pas bien remplie $formModifError");            
          }
        }else{
          throw new Exception("Les Deux de champs de mot de passe n'est sont le même $formModifError");
          
        }
      }else{
        throw new Exception("Les Deux champs de mot de passe doivent etre remplie $formModifError");
        
      }
    }

    function Supprimer($ID) {
      if ((int) $ID && $ID  > 0) {
        getSupprimer($ID);
        ListeCompte();
        //header('Location: Liste-Compte.php');
      }
      else{
        throw new Exception("L'ID doit etre un nombre");        
      }
    }
?>