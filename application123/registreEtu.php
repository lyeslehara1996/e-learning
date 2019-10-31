<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/css1.css">
<style>
 .logo {
    margin-top: -87px;
}
.welll{
    margin-top:60px;
    box-shadow:0px 2px 6px   rgb(171, 166, 166);
}

.btn-primary{
    font-size:18px;
    margin-left:15px;
    background-color:#34495e;
    width:200px;
    height: 40px;
    border:0px;
    border-radius: 0px;
    
}

 .btn-primary:hover{
  background-color:#597189;
 }
 .btn-primary:focus{
  background-color:#597189;
 }
 .form-group{
  margin-left:30px;
  margin-right:30px;
  margin-top:30px;
}
.fo{
  margin-left:30px;
  margin-right:30px;
}
@media only screen and (max-width:600px){
    .welll{
        margin-top:220px;
    }
    .show{
    margin-top:-34px;
              
            }


}

</style>


<div class="rows  navbar-fixed-top">
      <div class="col-lg-4">  
               <a class="btnn">
                  <span></span>
                  <span></span>
                  <span></span>
              </a>
              <img src="img/000.png" class="logo"> </div>
              
       
       <div class="col-lg-8">
      <div class="menu"> 
              <ul class="nav navbar-nav">

       
              <li><a href="acceuil.php"><span class="glyphicon
            glyphicon-home"></span> Accueil </a> </li>
            <li><a href="#" ><span class="glyphicon glyphicon-book"></span> Modules</a></li>
                <li><a href="#" ><span class="glyphicon glyphicon-globe"></span> A propos</a></li>
                <li><a href="#" ><span class="glyphicon glyphicon-envelope"></span> Contacter nous</a></li>
       
  
                  </ul>

         
        
        </div> </div>
    
    </div>

              <script type="text/javascript"> 
                  $(".btnn").on("click",function(){
                      $(".menu").toggleClass("show")
                  })
              
                  </script>




<?php





require_once 'inc/functions.php';
 
  $db = App::getDatabase('elearning');
  $validator = new Validator($_POST);
  $validatorPhoto = new Validator($_FILES);
  if(!empty($_POST)){
  $validator->isObligation('pseudo',"champ obligatoire");
  $validator->isObligation('passwords',"champ obligatoire");
  $validator->isAlpha('nom',"votre nom n'est pas valide","Champ obligatoire");
  $validator->isAlpha('prenom',"votre prenom n'est pas valide","Champ Obligatoire");
  $validator->isUniq('pseudo',$db,'idEtu','pseudoEtu','etudiants', "ce pseudo est deja pris");
  $validator->isEmail('email',"Votre email est invalide","Champ obligatoire");
  $validator->isUniq('email',$db,'idEtu','emailEtu','etudiants',"cet email est deja utilisé pour un autre compte" );
  $validator->isConfirme('passwords', "le mot de n'est pas correcte");
  $validator->isAdresse('adresse',"votre adresse est faux","Champ obligatoire");
  $validator->isDate('dateN','Votre date est faux');
  $validatorPhoto->isPhoto('photo',"sauf les photos sont autorisés","photo non prise en compte");
  }


  $errors= array();
  $errors_photo = array();
   
  if($validator->isValide()){

   
      
    if(isset($_POST['pseudo']) AND isset($_POST['passwords']) AND isset($_POST['email']) AND isset($_POST['dateN'])  AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['adresse'])){ 
      $password = password_hash($_POST['passwords'], PASSWORD_BCRYPT);
      $token =  Str::random(60);
      $db->query('INSERT INTO etudiants SET pseudoEtu = ?,passwordEtu = ?,emailEtu = ?,date_NEtu = ?,nomEtu= ?,prenomEtu=?, adresseEtu = ?,confirmation_token =?,photoEtu = ?',[$_POST['pseudo'], $password, $_POST['email'],$_POST['dateN'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$token,'photos/'.$_FILES['photo']['name']]);
     
$Etu_id = $db->lastInsertId();
$headers = "From: Sendmail Tests" . PHP_EOL;
$headers .= 'Content-type: text/html; charset=utf-8' . PHP_EOL;
mail($_POST['email'],'confirmation de votre compte',"Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://localhost/application123/confirm.php?idEt=$Etu_id&tokenEt=$token",$headers);
Session::getInstance()->setFlash('success',"Un email de confiramation vous a été envoyer pour valide votre compte");

App::redirect('login.php');

        
    

}
}else{

$errors = $validator->getErreur();
$errors_photo = $validatorPhoto->getErreur();
}


?>
<?php require 'header1.php';?>



<div class="form1">
 <div class="welll">
   <form action="" method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="col-lg-4">
                <img src="img/no_photo_m.png" alt="">
                   <div class="form-group">
                    <label for="photo"></label>
                    <input type="file"  id="photo"  class="upload" name="photo">
                    <?php if(array_key_exists('photo',$errors_photo)):?>
                    <div style="color:orange;"><?php echo $errors_photo['photo']?></div>
                    <?php endif;?>
                  </div>
    </div>
    <div class="col-lg-8">
                    <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text"   name="nom" class="form-control" 
                    value="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>" />
                    <?php if(array_key_exists('nom',$errors)):?>
                    <div style="color:red;"><?php echo $errors['nom']?></div>
                    <?php endif;?>
                   </div> 
                   <div class="form-group">
                   <label for="prenom">Prenom</label>
                   <input type="text" id="prenom" name="prenom" class="form-control" 
                   value="<?php if (isset($_POST['prenom'])){echo $_POST['prenom'];} ?>" />
                   <?php if(array_key_exists('prenom',$errors)):?>
                   <div style="color:red;"><?php echo $errors['prenom']?></div>
                   <?php endif;?>
                   </div>    
                   <div class="form-group">
                   <label for="pseudo">Pseudo</label>
                   <input type="text" id="pseudo" name="pseudo" class="form-control" 
                   value="<?php if (isset($_POST['pseudo'])){echo $_POST['pseudo'];} ?>" />
                   <?php if(array_key_exists('pseudo',$errors)):?>
                   <div style="color:red;"><?php echo $errors['pseudo']?></div>
                   <?php endif;?>
                   </div>
                <div class="col-lg-6">         
                   <div class="form-group">
                    <label for="adresse">adresse</label>
                    <textarea  name="adresse" class="form-control" 
                    value="<?php if (isset($_POST['adresse'])){echo $_POST['adresse'];} ?>"></textarea>
                    <?php if(array_key_exists('adresse',$errors)):?>
                    <div style="color:red;"><?php echo $errors['adresse']?></div>
                    <?php endif;?>
                   </div>
                </div> 
                <div class="col-lg-4">      
                   <div class="form-group">
                             <label for="dateN">date de naissance</label>
                             <input type="date" id="dateN" name="dateN"
                             value="2018-07-22"
                             min="1800-01-01" max="2000-12-31"  
                             value="<?php if (isset($_POST['dateN'])){echo $_POST['dateN'];} ?>" />
                             <?php if(array_key_exists('dateN',$errors)):?>
                             <div style="color:red;"><?php echo $errors['dateN']?></div>
                               <?php endif;?>
                              </div> 
                </div>              
    </div>
    <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control" 
                  value="<?php if (isset($_POST['email'])){echo $_POST['email'];} ?>" />
                  <?php if(array_key_exists('email',$errors)):?>
                  <div style="color:red;"><?php echo $errors['email']?></div>
                  <?php endif;?>
                 </div>
      
                 <div class="fo from-group">
                 <label for="passwords">Mot de passe</label>
                 <input type="password" id="passwords" name="passwords" class="form-control" >
                 <?php if(array_key_exists('passwords',$errors)):?>
                 <div style="color:red;"><?php echo $errors['passwords']?></div>
                 <?php endif;?>
                </div>
                <div class="form-group">
                 <label for="passwords_confirm">Confirmation</label>
                <input type="password" name="passwords_confirm" class="form-control" >
                <?php if(array_key_exists('passwords_confirm',$errors)):?>
                 <div style="color:red;"><?php echo $errors['passwords_confirm']?></div>
                 <?php endif;?>
                </div>
    </div>
    </div>
        </div>
    <button type="submit" class="btn btn-primary">S'inscrire</button>
   </form>
</div> 