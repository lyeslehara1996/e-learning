<link rel="stylesheet" href="css/bootstrap.min.css" />

<link rel="stylesheet" href="css/css1.css">
<style>
    .forg{
        margin-top:120px;
    }
.f{
    color:#597189;
}
    @media only screen and (max-width:600px){
    .forg{
        margin-top:230px;
    }
}
</style>

<?php
require_once 'inc/functions.php';

$auth = new Auth();
$db1 = App::getDatabase('elearning');
Session::getInstance();

if(!empty($_POST) && !empty($_POST['emailEn'])){
 
  if($auth->forget($db1,$_POST['emailEn'],Session::getInstance())){
    Session::getInstance()->setFlash('success',"les instruction du rappel de mot de passe vous ont été envoyées par email");
    App::redirect('login.php');
  }else{
        $_SESSION['flash']['danger'] = 'aucun compte ne correspant a cette adresse';
    }
}

if(!empty($_POST) && !empty($_POST['emailEt'])){
 
    if($auth->forgetEt($db1,$_POST['emailEt'],Session::getInstance())){
      Session::getInstance()->setFlash('success',"les instruction du rappel de mot de passe vous ont été envoyées par email");
      App::redirect('login.php');
    }else{
          $_SESSION['flash']['danger'] = 'aucun compte ne correspant a cette adresse';
      }
  }
require 'header1.php';
?>


 <?php afficher_erreur(); ?>
     


<div class="col-lg-2"></div>
<div class="forg">
    <div class="text-center"><h1>Mot de passe oublie</h1></div>
<div class="row">
  <div class="col-lg-6">
     <?php afficher_erreur(); ?>
    
     <h3 class="f">Email pour enseignant </h3>
      <form action="" method="POST">

      <div class="form-group">
                    <input type="text" id="email"  name="emailEn" class="form-control" placeholder="test@gmail.com">
        </div>  
      <div>
     <button type="submit" class="btn btn-danger">modifier</button>  <br>            
        <a href="login.php">Voulez vous se connecter?</a>
      </div>
      </form>  
    </div>
    <div class="col-lg-6">
     <?php afficher_erreur(); ?>


     <h3 class="f">Email pour l'etudiant </h3>
      <form action="" method="POST">

      <div class="form-group">
                    <input type="text" id="email"  name="emailEt" class="form-control" placeholder="test@gmail.com">
        </div>  
      <div>
     <button type="submit" class="btn btn-danger">modifier</button>  <br>            
        <a href="login.php">Voulez vous se connecter?</a>
      </div>
     </form>
    </div> 
</div>