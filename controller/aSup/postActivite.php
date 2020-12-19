<?php
  require('controller.php');

 // function postActivite($id){
    if (isset($_GET['Id']) && intval($_GET['Id']) >= 1 ) {
     // if ($id >= 1 ) {
            //echo '--'. $_GET['Id'];
          $req = postActivite($_GET['Id']);
          while ($data = $req->fetch()) {
                echo $data['id_Activite'].'--'.$data['titre_A'].'--'.$data['photos_P'].'<br />';
        }
            //echo $_GET['Id'] ;
           // echo $req['id'] .''.$req['A.titre'] ;
    /*  }else{
        echo "nbr <= 0 ";
      }*/
    }else{
       echo "Id <= 0 ET ou C'est un String";
    }  
//  }  
?>