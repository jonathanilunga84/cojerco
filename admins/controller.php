<?php //session_start();
	require('model.php');

	function AddModification($Id,$titre,$resume){
		$affectedLine = SaveUpdate($Id,$titre,$resume);
		if ($affectedLine === false) {
			throw new Exception("IMPOSSILBE DE FAIRE LA MISE AJOUR");			
		}
		else{
			$req = getsActiviteListes();
			require('cojerco_ListeActivite.php');
		}
	}

	function AddPhtos($IdActivite,$photos) {

		if (intval($IdActivite) > 0) {
			$recuperation_ID_activite = $IdActivite;
			$dates = date('(d-m-Y)');
			$destination = 'assets/images/upload/'; 
			$nbrAvatar = count($photos['name']); 
			$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
			
			if($nbrAvatar >= 1) {
				for ($i=0; $i < $nbrAvatar ; $i++) { 
					$filename = $photos['name'][$i];
                    $filetmp =  $photos['tmp_name'][$i];
                    $filetype =  $photos["type"][$i];
                    $filesize =  $photos["size"][$i];  
                    $file_error =  $photos["error"][$i];
                   	if ($file_error == 0) {
                   		$extension = pathinfo($filename,PATHINFO_EXTENSION);
                   		if (!array_key_exists($extension, $allowed)) {
                   			throw new Exception("l'Extension n'est pas supporter seul supporter est 'jpg','jpeg','gif','png' ");
                   		}else{
                   			 // Vérifie le type MIME du fichie
                   			if (in_array($filetype, $allowed)) {
                   				//pour modifier le Nom des photos
                   				$recupre_exention = substr($filename,-4); //On recupere le 4 dernier lettre d'une photos
                   				$nbr_Aleatoire = rand(10,1000000);
                   				$newName = $IdActivite.'_'.$nbr_Aleatoire.$dates.$recupre_exention;
                   				$fileFinaly = $destination.$newName;    
                   				// Vérifie si le fichier existe avant de le télécharger.  
                   				if(file_exists($fileFinaly)){
                   					throw new Exception('UN FICHIER PORTANT LE MÊME NOM EXISTE DEJA '.$filename.' CHANGÉE LE NOM');
                   				}else{
                   					if (move_uploaded_file($filetmp, '../'.$fileFinaly)) {
                   						//Enregistrement dans la Base de données
                   						$affectedLines = AddPhotos($fileFinaly,$IdActivite); 
                   						if ($affectedLines === false) {
                   							throw new Exception("Impossible d\'ajouter le PHOTOS !");
                   						}
                   						else{                   							
                   							//$req = getsActivitesPhotos($ID);
	 										//require('cojerco_postsPhotos.php');
	 										$lien = "<a href=\"index.php?action=postsPhotos&amp;ID_ACTIVITE=$IdActivite\">Gallery</a>";
	 										throw new Exception("Photos Enregistrée Avec Succes".$lien);					
                   						}
                   					}
                   				}         				
                   			}else{
                   				throw new Exception("l'Extension n'est pas supporter suel supporter est 'jpg','jpeg','gif','png' ");
                   			}
                   		}
                   	}else{
                   		 throw new Exception("photos mal envoyer");
                   	}
				}
			}else{
				//echo "Les nombre de photos";
                throw new Exception("Les nombre de photos est inferier a UN (1)");                            
            }
		}
		else{
			throw new Exception("L'ID ACTIVITE N'EST PAS UN ENTIER");
			
		}
		///print_r($photos['name']);
		/*$nbrAvatar = count($photos['name']);
		//echo $nbrAvatar;
		for ($i=0; $i <  $nbrAvatar; $i++) { 
			$ab = $photos['name'][$i];
				$z = $ab;
			echo $z." ** ";
		}*/

	}

	//APPEL DU FORMULAIRE DE MODIFICATION
	function FomModification($ID){
		if (intval($ID) ) {
			$data = getActivite($ID);
			if (!empty($data['id'])) {
				require('cojerco_ModificationActivite.php');
			}
			else{
				throw new Exception("PAS DES INFORMATION ");				
			}
			
		}else{
			throw new Exception("L'ID n'est un Entier");			
		}
	}
	function FormAjoutPhotos($IdActivite){
		//echo $IdActivite;
		if (intval($IdActivite) > 0) {
			require('cojerco_AjoutPhotos.php');
		}
		else{
			throw new Exception("L'ID n'est un Entier");
		}
	}

	//AFFICHAGES D'UNE LISTE D'ACTIVITÉ DANS UN TABLE
	function postsActivites(){
		$req = getsActiviteListes();
		require('cojerco_ListeActivite.php');
		//require('tables1.php');
	}
	
	function postsPhtos($ID){
	 	if (intval($ID)) {
	 		$req = getsActivitesPhotos($ID);
	 		require('cojerco_postsPhotos.php');
	 	}else{
	 		throw new Exception("Les Parametre ID ne pas un Nombre"); 		
	 	}
 	}

	function SupprimerActivite($ID){
		SupprimerActivites($ID);
		postsActivites(); // methode pour affichée tout les Activité dans un table
		//require('cojerco_postsPhotos.php');
 	}
 	function SupprimePhoto($ID_Photo,$IdActivite){
 		if (intval($ID_Photo) > 0 ) {
 			//echo $ID_Photo."--".$IdActivite;
 			SpprimePhotos($ID_Photo);
 			$req = getsActivitesPhotos($IdActivite);
 			//header("Location: cojerco_postsPhotos.php");
	 		//require('cojerco_postsPhotos.php'/*?ID_ACTIVITEs='.$IdActivite*/);
	 		$lien = "<a href=\"index.php?action=postsPhotos&amp;ID_ACTIVITE=$IdActivite\">Retour</a>";
	 		throw new Exception("Photos Supprimer Avec Succes".$lien);
	 		
 		}
 		else{
 			throw new Exception("L'ID EST INFERIER A (0) IMPOSSIBLE DE SUPPRIMER ");
 			
 		}
 	}
?>