

<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="css/menuEn.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/headerEn.css">
<?php 
require_once 'inc/functions.php';

 $auth = new Auth();
 $auth->restricteEns(Session::getInstance());
$db2 = App::getDatabase('elearning');
$validator = new Validator($_POST);
$validatorCour = new Validator($_FILES);
$user_id = session::getInstance()->read('auth')->idEns;
$errors= array(); 
$errors_photo = array();
if(!empty($_POST)){
    
        $validator->isObligation('nom',"champ obligatoire");
        $validator->isObligation('type',"champ obligatoire");
      

        if(!empty($_FILES)){
          $validatorCour->isCour('fichier',"sauf les documents pdf sont autorisés","Ajouter votre document");
        }
      }
       

        if($validator->isValide()){
            if(isset($_POST['nom']) AND isset($_POST['description'])){
              $req2 = $db2->query('SELECT id_Spe FROM specialites WHERE idEns=?',[$user_id]);
                while($spe = $req2->fetch())
              $spec= $spe->id_Spe;
              $specialite = intval($spec);
          
            
          
                
          $db2->query('INSERT INTO cours SET nomCours = ?, descriptionCours = ?,id_Spe=?,fileCours=?,typeCour=?',[$_POST['nom'],$_POST['description'],$specialite,'cours/'.$_FILES['fichier']['name'],$_POST['type']]);
            
            }
        }else{
          $errors = $validator->getErreur();
          $errors_photo = $validatorCour->getErreur();
        }
       
    
 
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css1.css">

  
  <title>Elearning</title> 
</head>
<style>
.sa{
  margin-top:
    25px;
    background: #E2472F;
  color:#fff;
  border-radius: 6px;
 font-size:18px;

}
.co{
  box-shadow:0px 2px 6px   rgb(171, 166, 166);
  margin-top:120px;
  width:680px;
  height:400px;
}
.btn-danger{
    font-size:18px;
    margin-left:420px;
    background-color:#34495e;
    width:200px;
    height: 40px;
    border:0px;
    border-radius: 0px;
    
}

 .btn-danger:hover{
  background-color:#597189;
 }
 .btn-danger:focus{
  background-color:#597189;
 }
.well{
  margin-top:120px;
  width:900px;

}
.form-group{
  margin-left:30px;
  margin-right:30px;
}
 .col{
         background:rgb(199, 74, 74);
    }
    .for{
      margin-top:50px;
    }
    @media only screen and (max-width:600px){
          .container{
            margin-top:240px;
width:500px
          }
          .btn-danger{
            margin-top:20px;
    font-size:18px;
    margin-left:220px;
    
  }
  .co{
    height:450px;
  }
.show{
    margin-top:-34px;
  
}
.requis{
  color:red;
}

            }
    
</style>

<body>

      <div class="rows">
      <div class="col-lg-5">  
               <a class="btnn">
                  <span></span>
                  <span></span>
                  <span></span>
              </a>
              <img src="000.png" class="logo"> </div>
              
       
       <div class="col-lg-7">
      <div class="menu"> 
              <ul class="nav navbar-nav">

       
                    <li><a href="compte.php"><span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
           
              <li><a href="compte.php"><span class="glyphicon glyphicon-user"></span> Profil</a></li> 

              <li><a href=""><span class="glyphicon glyphicon-briefcase"></span> Formation </a>
       <ul class="sub-nav">
       <li role="presentation"><a href="mesCours.php" role="menuitem">Mes cours</a></li>
            <li role="presentation"><a href="mesEtudiants.php" role="menuitem">Mes etudiant</a></li>
       </ul>
       
       </li>

    <li> <a  href="logout.php" class="col"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>

  
                  </ul>

          
        
        </div> </div>
    
    </div>

              <script type="text/javascript"> 
                  $(".btnn").on("click",function(){
                      $(".menu").toggleClass("show")
                  })
                  </script>


   

<?php     ?>

         
<div class="co container">
<div class="row">

 <form action="" method="post" enctype="multipart/form-data" class="for"  >
                    <div class="form-group">
                    <label for="nom">Nom du cour</label>
                    
                    <input type="text"  name="nom" class="form-control" />
                    <?php if(array_key_exists('nom',$errors)):?>
                    <div style="color:red;"><?php echo $errors['nom']?></div>
                    <?php endif;?>
                   </div> 
                   <div class="col-lg-6">         
                   <div class="form-group">
                    <label for="description">Type de cour</label>
                    <input name="type" class="form-control" />
                    <?php if(array_key_exists('type',$errors)):?>
                    <div style="color:red;"><?php echo $errors['type']?></div>
                    <?php endif;?>
                   </div>
                </div> 
                      
                <div class="col-lg-6">         
                   <div class="form-group">
                    <label for="description">Desciption</label>
                    <textarea  name="description" class="form-control"></textarea>
                    <?php if(array_key_exists('description',$errors)):?>
                    <div style="color:red;"><?php echo $errors['description']?></div>
                    <?php endif;?>
                   </div>
                </div> 
              
                <div class="form-group">
                    <label for="fichier"></label>
                    <input type="file" id="fichier" name="fichier">
                   
                    <?php if(array_key_exists('fichier',$errors_photo)):?>
                    <div style="color:red;"><?php echo $errors_photo['fichier']?></div>
                    <?php endif;?>
                  </div>
                  <button type="submit" class="btn btn-danger">Ajouter</button>

                       </form>     
                       </div>    
                </div>
    


