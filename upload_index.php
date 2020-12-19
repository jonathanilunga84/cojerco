<?php 
    
try{
   require('upload_controller.php');
    if (isset($_GET['action'])) { 
    	//echo "Action";
        if ($_GET['action'] == 'activite' && $_GET['Id'] >= 1) {
            //echo $_GET['action'].'--'. $_GET['Id'];
            //postActivite($_GET['Id']);
            //header('Location: postActivite.php?Id='.$_GET['Id']);
            header('Location: /cojerco/upload_Images1.php?Id='.$_GET['Id']);
           //header('Location: /cojerco/mk.php?Id='.$_GET['Id']);
        }
    }
    elseif($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if (isset($_POST['pseudo']) && isset($_POST['pwd']) && !empty($_POST['pseudo']) && !empty($_POST['pwd'])) {
            if ($_POST['pseudo'] == 'ilunga' && $_POST['pwd'] == '1234' ) {
                header('Location: upload.php');
            }else{
                //throw new Exception("LE INFORMATIONS D'IDENTIFICATION SONT INCORRECT");
                //require('login.php?errorMessage');
               // echo "string";
                header('Location: login.php?errorMessage');                
            }
        }
    	elseif (isset($_POST['titre']) && isset($_POST['resume_activite']) && !empty($_POST['titre']) && !empty($_POST['resume_activite'])) {
    		Add_Titre_photos();
    	}else
    	{
    		throw new Exception("LES deux Champs Titre et Resumer_activite sonts Oblicatoire");    		
    	}
    }
    else{
    	//require('upload.php');
        header('Location: /cojerco/upload.php');
    }
    
}catch (Exception $e) {  
   $errorMessage = $e->getMessage();
   //require_once('view/login.php');
   //require('upload.php');
  //header('Location: /cojerco/upload.php?$errorMessage'); 
?>
    <script>
        alert("<?php echo($errorMessage); ?>");

    </script>

<?php  
    require('upload.php');
 //header('Location: upload.php');
}
?>