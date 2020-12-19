<?php
     //require('../model/manager.php');

     //post = expédier est Account = compte 
     function add($nom,$prenom,$pseudo,$role,$pwd){
        $db = dbPDO();         
        $req = $db->prepare('INSERT INTO user(nom,prenom,pseudo,roles,pwd,datacreation) VALUES (:nom,:prenom,:pseudo,:roles,:pwd,Now())');
        $affetedLines = $req->execute(array(
             'nom'=> $nom, 
             'prenom' => $prenom, 
             'pseudo' => $pseudo,
             'roles' => $role,
             'pwd' => $pwd
         ));
        // $affetedLines->closeCursor(); 
         return $affetedLines;
     }
     // Pour Verifier si le pseudo existe dans la bd
     function existPseudo($pseudo) {
         $db = dbPDO();
         $req = $db->prepare('SELECT COUNT(*) FROM user WHERE pseudo = :pseudo ');
         $req->execute(array(
             'pseudo' => $pseudo
         ));
         //$req->closeCursor();
         return (bool) $req->fetchColumn();
     } 
     function getCompte($pseudo){
        $db = dbPDO();
        $req = $db->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
        $req->execute(array(
            'pseudo' => $pseudo
        ));
       // $req->closeCursor();
        return $req->fetch(PDO::FETCH_ASSOC);
        //echo $pseudo.' --- '. 'modele';
    }

    function getCompteID($pseudo){
        $db = dbPDO();
        $req = $db->prepare('SELECT * FROM user WHERE id = :ID');
        $req->execute(array(
            'ID' => $pseudo
        ));
       // $req->closeCursor();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    function getListCompte(){
        $db = dbPDO();
        $req = $db->query('SELECT * FROM user');
        return $req;
    }

    function getUpdate($id,$nom,$prenom,$mail,$role,$pwd){
        $db = dbPDO();
        $req = $db->prepare('UPDATE user SET nom= :Nom,prenom= :Prenom,pseudo= :Pseudo,roles= :Roles,pwd= :Pwd WHERE id= :ID');
        $req->execute(array(
            'Nom' => $nom,
            'Prenom' => $prenom,
            'Pseudo' => $mail,
            'Roles' => $role,
            'Pwd' => $pwd,
            'ID' => $id
        ));
        return $req;
    }

    function getSupprimer($ID){
        $db = dbPDO();
        $req = $db->query('DELETE FROM user WHERE id ='.$ID);
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