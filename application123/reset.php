<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="css/stl.css">

<style>
.res{
  margin-top:100px;
  
}
.form-group{
  margin-top:20px;
margin-left:-20px;
width:500px;
}
.btn-danger{
  margin-left:-20px;
  border:0px;
  width:200px;
    height: 40px;
    border-radius: 0px;
    background-color:#597189;
    font-size:18px;
  
}
@media only screen and (max-width:600px){
  .res{
  margin-top: 170px;
  }
}
</style>
<?php
require_once 'inc/functions.php';



  $auth = new Auth();
  $db = App::getDatabase('elearning');
  $validator = new Validator($_POST);
  $validator->isObligation('password',"champ obligatoire");
  $validator->isConfirme('password', "le mot de n'est pas correcte");
  if($validator->isValide()){
    if(isset($_GET['idEn']) && isset($_GET['tokenEn'])){
          if($auth->userReset($db,$_GET['idEn'],$_GET['tokenEn'],$_POST['password'],Session::getInstance())){
            Session::getInstance()->setFlash('success',"Votre mot de passe a bien été modifier");
            App::redirect('compte.php');
          }else{
            Session::getInstance()->setFlash('danger',"ce token n est pas valide");
            App::redirect('login.php');
          }
        }else  if(isset($_GET['idEt']) && isset($_GET['tokenEt'])){
          if($auth->userResetEt($db,$_GET['idEt'],$_GET['tokenEt'],$_POST['password'],Session::getInstance())){
            Session::getInstance()->setFlash('success',"Votre mot de passe a bien été modifier");
            App::redirect('compteEtudiant.php');
          }else{
            Session::getInstance()->setFlash('danger',"ce token n est pas valide");
            App::redirect('login.php');
            }
          }
          
          }else{
          $errors = $validator->getErreur();

        }
      
    
    
?>

<?php
require 'header1.php'
?>
 <?php afficher_erreur(); ?>
<div class="res">              


<h1>Reinitiliser votre mot de passe </h1> 
 
  <div class="col-lg-6 center">
  
     <form action="" method="POST">

      <div class="form-group">
                      <!-- <label for="password">mot de passe</label> -->
                      <input type="password" id="password"  name="password" class="form-control" placeholder="Mot de passe">
      </div>  
      <div class="form-group">
                      <!-- <label for="password_confirm"> Confirmation mot de passe</label> -->
                      <input type="password" id="password_confirm"  name="password_confirm" class="form-control" placeholder="Confirmation mot de passe">
                      <?php if(array_key_exists('passowrds',$errors)):?>
                      <div class="requis"><?php echo $errors['prenom']?></div>
                      <?php endif;?>
      </div>   
    
      <button type="submit" class="btn btn-danger">Reinitialiser</button>              
    </form>  
  </div> 
</div>
