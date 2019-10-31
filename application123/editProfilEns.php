<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="css/mater.css">
<script src="js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="css/css1.css">
<link rel="stylesheet" href="css/style2.css">
<link rel="stylesheet" href="css/menu.css">
    <title>Document</title>



    <?php 

require 'inc/functions.php';
 $auth = new Auth();
 $auth->restricteEns(Session::getInstance());


?>
    <style>
   .r2{
    margin-top:80px;
    width:1150px;
    box-shadow:0px 2px 6px   rgb(171, 166, 166);
   }
   
.form-group{
height: 45px;
font-size: 18px;
margin-top:20px;


}
 .form-control{
border:15px;
border-radius: 100px;
height: 45px;
font-size: 18px;


} 
.r2 h1{
  
    margin-left:100px;
}
.btn-sucess{
    background-color:#34495e;
color:white;
    margin-top: 60px;
    width:150px;
    height: 40px;
    margin-right: 30px; 
    border:0px;
    border-radius: 0px;
    font-size:20px;

  
 }
 .btn-sucess:hover{
    color:white;
  background-color:#597189;

 }
 .btn-sucess:focus{
    color:white;
  background-color:#597189;
  
 }
 .btn-sucess:active{
    color:white;
 }
 @media only screen and (max-width:600px){
     .r2{
         margin-top:250px;
     }
 }
</style>
</head>

<body>
    


<?php

require_once 'inc/functions.php';
$db = App::getDatabase('elearning');
$validator = new Validator($_POST);
$validatorPhoto = new Validator($_FILES);


$errors= array();

if(!empty($_POST)){
    $validator->isAlpha('nom',"votre nom n'est pas valide","Champ obligatoire");
    $validator->isAlpha('prenom',"votre prenom n'est pas valide","Champ Obligatoire");
   // $validator->isUniq('pseudo',$db,'enseignants', "ce pseudo est deja pris");
                
       if(!empty($_FILES)){
        $validatorPhoto->isPhoto('photo',"sauf les photos sont autorisés","photo non prise en compte");
    }
          
if($validator->isValide()){


       
    $users_id =  Session::getInstance()->read('auth')->idEns;
    if(isset($_POST['pseudo']) AND isset($_POST['nom']) AND isset($_POST['prenom'])  AND isset($_POST['description'])){
     $req = $db->query('UPDATE  enseignants SET pseudoEns = ?,nomEns= ?,prenomEns=?,descriptionENS = ?,photoEns=? WHERE idEns = ?',[$_POST['pseudo'] , $_POST['nom'],$_POST['prenom'],$_POST['description'],'photos/'.$_FILES['photo']['name'],$users_id]);
     // faire une requette a la base de donnees
     $user = $db->query('SELECT * FROM enseignants WHERE idEns = ?',[$users_id])->fetch();
        
     Session::getInstance()->write('auth',$user);
         
        App::redirect('compte.php');
    exit();
}}else{
    $errors = $validator->getErreur();
    $errors_photo = $validatorPhoto->getErreur();

}


}
?>


   <div class="rows">
      <div class="col-lg-5">  
               <a class="btnn">
                  <span></span>
                  <span></span>
                  <span></span>
              </a>
              <img src="img/000.png" class="logo"> </div>
              
       
       <div class="col-lg-7">
      <div class="menu"> 
              <ul class="nav navbar-nav">

       
                    <li><a href="compte.php"><span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
           
          <li><a href=""><span class="glyphicon glyphicon-briefcase"></span> Formation </a>
           <ul class="sub-nav">
           <li role="presentation"><a href="recherche_Specialité.php" role="menuitem">recherche par specialite</a></li>
                <li role="presentation"><a href="recherche_Prof.php" role="menuitem">recherche par enseignant</a></li>
           </ul>
           
           </li>
              <li><a href="profil.php"><span class="glyphicon glyphicon-user"></span> Profil</a></li> 
    <li> <a  href="logout.php" class="col"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>

  
                  </ul>

         
        
        </div> </div>
    
    </div>

              <script type="text/javascript"> 
                  $(".btnn").on("click",function(){
                      $(".menu").toggleClass("show")
                  })
              
                  </script>

<div id="result"></div>

<div class="container">

<div class="r2 row">
<h1>

<?php //var_dump($_FILES['photo']['name']) ?>
Editer votre profil
</h1>
<div class="col-lg-1"></div>

<div class="col-lg-12">
<form  method="POST" action="" role="form" class="col-md-9 go-right" id="form" enctype="multipart/form-data">
<div class="col-lg-6" >
                <img src="img/no_photo_m.png" alt="">
                   <div class="form-group">
                    <label for="photo"></label>
                    <input type="file"  id="cPhoto"  class="upload" name="photo">
                    <?php if(array_key_exists('photo',$errors)):?>
                    <div id="cPhoto"><?php echo $errors['photo']?></div>
                    <?php endif;?>
                  </div>
    

</div>
			<div class="form-group">
            <label for="nom">Nom</label>
            
			<input id="nom" name="nom" type="text" class="form-control"  placeholder="entrer votre nouveau nom" value="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>" required />
			<?php if(array_key_exists('nom',$errors)):?>
                   <div class="requis"><?php echo $errors['nom']?></div>
                   <?php endif;?>
            <label for="nom">    <?=  Session::getInstance()->read('auth')->nomEns ?></label>
		</div>

		<div class="form-group">
        <label for="prenom">prenom</label>
			<input id="prenom" name="prenom" type="prenom" class="form-control"  placeholder="entrer votre nouveau prenom" value="<?php if (isset($_POST['prenom'])){echo $_POST['prenom'];} ?>" required>
            <?php if(array_key_exists('prenom',$errors)):?>
                   <div class="requis"><?php echo $errors['prenom']?></div>
                   <?php endif;?>
            <label for="prenom"><?=  Session::getInstance()->read('auth')->prenomEns ?></label>
		</div>
        <div class="form-group">
        <label for="pseudo">pseudo</label>
			<input id="pseudo" name="pseudo" type="tel" class="form-control"  placeholder="entrer votre nouveau pseudo" value="<?php if (isset($_POST['pseudo'])){echo $_POST['pseudo'];} ?>" required>
            <?php if(array_key_exists('pseudo',$errors)):?>
                   <div class="requis"><?php echo $errors['pseudo']?></div>
                   <?php endif;?>
            <label for="pseudo"><?=  Session::getInstance()->read('auth')->pseudoEns ?></label>
		</div>
        <div class="form-group">
			<textarea id="description"rows="=15" name="description" class="form-control"  placeholder="entrer votre nouvelle description" value="<?php if (isset($_POST['description'])){echo $_POST['description'];} ?>"description required></textarea>
			<label for="description">  <?= $_SESSION['auth']->descriptionEns ?></label>
		</div>
        <button type="submit" id="modification" class="btn btn-sucess">Modifier</button>
		</form>
</div>

 </div></div></div>
</div>

</body>
</html>


