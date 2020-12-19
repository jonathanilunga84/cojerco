<?php

    // SELECTION DE PLUSIEUR PHOTOS DONT LEUR ACTIVITE EXISTE C'EST UNE JOINTURE
    function postsActivites($ID){
        $db = dbPDO();
        $req = $db->query('SELECT A.id as id_Activite,A.titre as titre_A,A.resume_activite as resume_A,P.photos as photos_P,P.id as id_P,DATE_FORMAT(P.dateposte, \'%d/%m/%Y-%H:%i:%s\') as dates FROM activite as A INNER JOIN photos as P ON A.id = P.id_activite WHERE A.id='.$ID);
        //$req->closeCursor();
        return $req;
    }
    
    // SELECTION D'UN SEUL PHOTOS AVEC SON ACTIVITE
    function postActivite($ID){
        $db = dbPDO();
        $req = $db->query('SELECT A.id as id_Activite,A.titre as titre_A,A.resume_activite as resume_A,P.photos as photos_P,P.id as id_P,DATE_FORMAT(P.dateposte, \'%d/%m/%Y-%H:%i:%s\') as dates FROM activite as A RIGHT JOIN  photos as P ON A.id = P.id_activite WHERE P.id='.$ID);
        //$req->closeCursor();
        return $req->fetch();
    }

    function getId_Activite($titre){
        $db = dbPDO();
        $req = $db->prepare('SELECT A.id,A.titre as tit FROM activite as A WHERE A.titre = :titre');
        $req->execute(array(
            'titre' => $titre 
        ));
        //$req->CloseCursor();
        return $req->fetch();
    }

    function postImage_photos($Id){
        $db = dbPDO();
        $req = $db->prepare('SELECT * FROM photos WHERE id = :id');
        $req->execute(array(
            'id' => $Id 
        ));
        //$req->CloseCursor();
        return $req->fetch();
    }

    function getCount_ActiviteTitre($titre){
        $db = dbPDO();
        $req = $db->prepare('SELECT COUNT(A.titre) FROM activite as A WHERE A.titre = :titre');
        $req->execute(array(
            'titre' => $titre 
        ));
        //$req->CloseCursor();
        return (bool) $req->fetchColumn();
    }
    function Add_Titre_photos(){

        //METHODE POUR ENREGISTRER UNE ACTIVITÉ AVEC PLUSIEURS PHOTOS DANS UN BD
        if (isset($_POST['titre']) && isset($_POST['resume_activite']) && !empty($_POST['titre']) && !empty($_POST['resume_activite'])) {
            //echo $_POST['titre'].'--'.$_POST['resume_activite'];
             //$nbrAvatar = count($_FILES['photos']['name']);  
            if (isset($_FILES['photos']) && !empty($_FILES['photos']['name'])) {
               
                if (getCount_ActiviteTitre($_POST['titre'])) {                    
                    
                    throw new Exception('Les Titre ( '.$_POST['titre'].' ) EXIST DEJA DANS LA BASE DE DONNEES');
                    
                }else{                                         
                    $affectedLines = AddActivite($_POST['titre'],$_POST['resume_activite']);
                    if ($affectedLines === false) {
                       
                        throw new Exception('Impossible d\'ajouter l\'ACTIVITÉ !');
                        
                    }else{  
                        $recuperation_ID_activite = getId_Activite($_POST['titre']);              
                        $dates = date('d-m-Y)');
                        $destination='assets/images/upload/'; // destination de la ou vas enregistrer les photos
                        $nbrAvatar = count($_FILES['photos']['name']);  
                        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                        if($nbrAvatar >= 1) {
                            for ($i=0; $i < $nbrAvatar; $i++) { 
                                    $filename = $_FILES['photos']['name'][$i];
                                    $filetmp = $_FILES['photos']['tmp_name'][$i];
                                    $filetype = $_FILES['photos']["type"][$i];
                                    $filesize = $_FILES['photos']["size"][$i];  
                                    $file_error = $_FILES['photos']["error"][$i];
                                    
                                    if($file_error == 0){
                                        // Verifie si le fichier a été Uploadé sans erreur.
                                        $extension = pathinfo($filename,PATHINFO_EXTENSION);
                                        if(!array_key_exists($extension, $allowed)){
                                            //echo "l'Extension n'est pas supporter suel supporter est 'jpg','jpeg','gif','png' ";
                                            throw new Exception("l'Extension n'est pas supporter seul supporter est 'jpg','jpeg','gif','png' ");
                                        }else{
                                            // Vérifie le type MIME du fichie
                                            if(in_array($filetype, $allowed)) {
                                                //pour modifier le Nom des photos
                                                //$fileLongueur = strlen($filename);//On recupere la longueur du fichier
                                                $recupre_exention = substr($filename,-4);
                                                $nbr_Aleatoire = rand(10,1000000);
                                                $newName = $nbr_Aleatoire.'('.$dates.$recupre_exention;
                                                $fileFinaly = $destination.$newName;
                                                // Vérifie si le fichier existe avant de le télécharger.
                                                if (file_exists($fileFinaly)) {
                                                    //echo $filename.' Existe deja.';
                                                    throw new Exception($filename.' Existe deja.');
                                                }else{
                                                    if (move_uploaded_file($filetmp,$fileFinaly)) {
                                                        //Enregistrement dans la bd                                         
                                                      
                                                        $affectedLines = AddPhotos($fileFinaly,$recuperation_ID_activite['id']);
                                                        if ($affectedLines === false) {
                                                            //echo  ('Impossible d\'ajouter le PHOTOS !');
                                                            throw new Exception("Impossible d\'ajouter le PHOTOS !");
                                                            
                                                        }else{
                                                           // echo $data['id'].$data['titre']." Ok Upload".$fileFinaly;
                                                            //throw new Exception($data['id'].$data['titre']." Ok Upload ".$fileFinaly);
                                                            header('Location: upload_index.php?action=activite&Id='.$recuperation_ID_activite['id']);
                                                            
                                                        }                                                              
                                                          //echo $data['id'].$data['titre']." Ok Upload".$fileFinaly;                                                                                  
                                                    }else{
                                                        //echo "Echec Upload ".$destination;
                                                        throw new Exception("Echec Upload".$destination); 
                                                    }                                        
                                                }                                   
                                            }else{
                                                throw new Exception("l'Extension n'est pas supporter suel supporter est 'jpg','jpeg','gif','png' ");
                                                //echo "l'Extension n'est pas supporter suel supporter est 'jpg','jpeg','gif','png' ";
                                            }                           
                                        }                            
                                    }else{
                                       // echo ("photos mal envoyer");
                                        throw new Exception("photos mal envoyer");
                                    }                    
                                }            
                        }else{
                            //echo "Les nombre de photos";
                            throw new Exception("Les nombre de photos est inferier a UN (1)");                            
                        }
                    }//
                }//
            }else{
                //echo 'pas de photos';
                throw new Exception("pas de photos");
                
            }
        }else{
            //$message='LES deux Champs Titre et Resumer_activite sonts Oblicatoire';
            //require('../upload.php');
            //header('Location: ../upload.php?action=champsVIde'; 
            //echo "string";
            throw new Exception("LES deux Champs Titre et Resumer_activite sonts Oblicatoire");
            
        }
    }
   

    // METHODE POUR AFFICHE DANS TABLEAU TOUT LES ACTIVITE DANS LE FICHIE activite.php
    function postsActivite(){
        $db = dbPDO();
        $req = $db->query('SELECT * FROM activite');
        //$req->closeCursor();
        return $req;
    }

    function AddActivite($titre,$resume_activite){
        $db = dbPDO();
        $req = $db->prepare('INSERT INTO activite(titre,resume_activite,dateposte) VALUES (:titre,:resume_activite,Now())');
        $req->execute(array(
           'titre' => $titre,
           'resume_activite' => $resume_activite
       ));
        //$req->closeCursor();
        return $req;
    }

    function AddPhotos($fileFinaly,$id_Activite){
        $db = dbPDO();
        $req = $db->prepare('INSERT INTO photos(photos,id_activite,dateposte) VALUES (:destination,:id_Activite,Now())');
        $req->execute(array(
           'destination' => $fileFinaly,
           'id_Activite' => $id_Activite
       ));
        //$req->closeCursor();
        return $req;
    }

    // CONNECTION A LA BD
    function dbPDO()
    {
        try {
            // on se connecte a MySQL
            $db = new PDO('mysql:host=localhost;dbname=cojercoActivite;charset=utf8', 'jonathan84', 'jo0811748411', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }  
?>