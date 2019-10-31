<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="css/css42.css">
<link rel="stylesheet" href="css/css1.css">

<style>
.sl{
    background:rgb(255, 255, 255);
    margin-top: 58px;
    margin-right:25%;
    margin-left:30%;
    height: ;
    position:absolute;
   
   
}
body{
    background-image: url("img/11.png");
    background-size: cover;
   
}
.sec{ 
    height: 500px;
} 
.btn-danger{
    width:126px;
    margin-top: 20px;
    margin-left: 100px; 
    background: rgb(223, 90, 90);
background-color:red;
    
}

@media only screen and (max-width:600px){
.sl{
 margin-top:230px;
 right:2px;

}
.show{
    margin-top:-34px;
              
            }




}
@media only screen and (max-width:1300px){
    .sl{
 margin-top:230px;
 /* right:143px; */
 width:200px;
 padding-right: 150px;
    padding-left: 120px;
    margin-right: auto;
    margin-left: auto;
}
}
.show{
    margin-top:-34px;
              
            }


}
@media only screen and (max-width:750px){
    .sl{
 margin-top:250px;
 right:143px;
 width:200px;

}
}

</style>






<?php

 
 // controle formulaire 
 
 $errors= array();
 $errors_photo = array();
 

?>


<?php
require_once 'inc/functions.php';

$auth = new Auth();
$db = App::getDatabase('elearning');
Session::getInstance();




if(!empty($_POST) && !empty($_POST['pseudomail']) && !empty($_POST['motdepasse'])){
    
   if($auth->login($db,$_POST['pseudomail'],$_POST['motdepasse'],Session::getInstance())){
    App::redirect('compte.php');
   
   }elseif($auth->loginEtu($db,$_POST['pseudomail'],$_POST['motdepasse'],Session::getInstance())){
    App::redirect('compteEtudiant.php');
   }else{
     Session::getInstance()->setFlash('danger','Identifiant ou mot de passe incorrecte');

   }
    
  }
?>
<?php require 'header1.php';?>


<?php afficher_erreur(); ?>

<?php 
   if(!empty($_POST)){
    if(empty($_POST['pseudomail'])){
        $errors['pseudomail'] = "Voulez remplir le champ";
    }else  if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]\.[a-z]{2,4}$#",$_POST['pseudomail'])){
      $errors['pseudomail'] = "voulez écrire votre email correctement";
    }else{
        if(!filter_var($_POST['pseudomail'], FILTER_VALIDATE_EMAIL)){
          $errors['pseudomail'] = "veuillez écrire votre email correctement";
        }

    }

   
    if(empty($_POST['motdepasse'])){
        $errors['motdepasse'] = "Voulez remplir le champ";
    }

   }





   ?>


<div class="sec">

                <div class="container-fluid">
                        <div class="col-lg-4 col-md-8 col-xs-12"></div>
                    <div class="sl col-lg-4 col-md-8 col-xs-12">
                        <h2 class="text-center"> <strong>Connecter </strong></h2>
                        <p class="text-left">Vous avez pas de compte? <a href="acceuil.php">Inscrivez-vous</a></p>
                        <form action="" method="POST"> 
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" id="pseudomail"  name="pseudomail" class="form-control" 
                  value="<?php if (isset($_POST['pseudomail'])){echo $_POST['pseudomail'];} ?>" />
                  <?php if(array_key_exists('pseudomail',$errors)):?>
                  <div class="requis"><?php echo $errors['pseudomail']?></div>
                  <?php endif;?>
                 </div>
      
                 <div class="from-group">
                 <label for="passwords">Mot de passe</label>
                 <input type="password"  id="motdepasse"  name="motdepasse"  class="form-control" >
                 <?php if(array_key_exists('motdepasse',$errors)):?>
                 <div class="requis"><?php echo $errors['motdepasse']?></div>
                 <?php endif;?>
                </div>
                <a href="forget.php">j'ai oublie mon mot de passe</a>
                <button class="btn btn-danger">Se connecter</button><br><br>

     </form>
                    </div>
                   
                    <div class="col-lg-4 col-md-8 col-xs-12">
                       
                </div>  

   </div>  


</body>
</html>
  




  

