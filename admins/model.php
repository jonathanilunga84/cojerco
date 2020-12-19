 <?php 
   // session_start();
        //ENREGISTREMENT DE MODIFICATION DES ACTIVITE
    function SaveUpdate($Id,$titre,$resume){
        $db = dbPDO();
        $req = $db->prepare('UPDATE activite SET titre= :Titre,resume_activite= :Resume_Activite WHERE id= :ID');
        $req->execute(array(
            'Titre' => $titre,
            'Resume_Activite' => $resume,
            'ID' => $Id
        ));
        return $req;
    }

    // AJOUT DES PHOTOS AVEC UN IDENTIFIANT D'UNE ACTIVITE
    function AddPhotos($fileFinaly,$IdActivite){
        $db = dbPDO();
        $req = $db->prepare('INSERT INTO photos(photos,id_activite,dateposte) VALUES (:photo,:IdActivite,Now())');
        $req->execute(array(
            'photo' => $fileFinaly,
            'IdActivite' => $IdActivite
        ));
        return $req;
    }

     // SELECTION DE PLUSIEUR PHOTOS DONT LEUR ACTIVITE EXISTE C'EST UNE JOINTURE
    function getsActivitesPhotos($ID){
        $db = dbPDO();
        $req = $db->query('SELECT A.id as id_Activite,A.titre as titre_A,A.resume_activite as resume_A,P.photos as photos_P,P.id as id_P,DATE_FORMAT(P.dateposte, \'%d/%m/%Y-%H:%i:%s\') as dates FROM activite as A INNER JOIN photos as P ON A.id = P.id_activite WHERE A.id='.$ID);
        //$req->closeCursor();
        return $req;
    }

    // METHODE POUR AFFICHE DANS UN TABLEAU TOUT LES ACTIVITE DANS LE FICHIE cojerco_postsPhotos.php
   function getsActiviteListes(){
        $db = dbPDO();
        $req = $db->query('SELECT * FROM activite');
        return $req;
    }
    function getActivite($Id){
        $db = dbPDO();
        $req = $db->prepare('SELECT * FROM activite WHERE id = :ID');
        $req->execute(array(
            'ID' => $Id
        ));
        return $req->fetch();
    }
    /*function getPhoto(){
        $db = dbPDO();
        $req = $db->prepare('SELECT * FROM photos WHERE id = :ID');
        $req->execute(array(
            'ID' => $Id
        ));
        return $req->fetch();
    }*/

    function SupprimerActivites($ID){
        $db = dbPDO();
       /* $req = $db->prepare('DELETE FROM activite WHERE id = :ID');
        execute(array(
        'ID' => $ID
        ));*/
        $req = $db->query('DELETE FROM activite WHERE id ='.$ID);
    }

    function SpprimePhotos($ID){
        $db = dbPDO();
        $req = $db->prepare('DELETE FROM photos WHERE id = :ID');
        $req->execute(array(
        'ID' => $ID
        ));
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