<?php 


require_once 'inc/functions.php';
$db = App::getDatabase('elearning');

$auth = new Auth();
$auth->restricteEtu(Session::getInstance());
$etudiant=Session::getInstance()->read('etud')->idEtu;
$bool = false;
?>



<?php

 
   
  
$cours_chercher = $db->query("SELECT * FROM `specialites`");

$recherche = $db->query("SELECT * FROM `specialites`"); 
//$recherche2 = $db->query("SELECT * FROM `cours` WHERE nomCours LIKE ?",[$mot_cherche.'%']); 
$EnsDemander = $db->query("SELECT en.idEns FROM courinscrit ci,cours c,specialites s,etudiants e,enseignants en WHERE ci.idCours = c.idCours and c.id_spe =s.id_spe and ci.idEtu=? and en.idEns= s.idEns",[$etudiant])->fetch();





?>

<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  
  <script src="js/bootstrap.min.js"></script>
	 <script src="js/jquery.min.js"></script>
	 <script src="css/css2/boot.min.js"></script>
<link rel="stylesheet" href="css/sstt.css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/headerP.css">
<link rel="stylesheet" href="css/menu.css">
<script src="js/jquery-3.3.1.min.js"></script>

  <style>
  ul.sub-nav{
    position:absolute;
    background:#374d63;
    width:380px;
    height: 190px;
    box-shadow:1px 1px 2px rgba(0,0,0,0.14), -1px 0px 1px rgba(0,0,0,0.14);
    top:71px;
left:0;
visibility:headers_sent;
opacity:0;



}

.en{
    color:rgb(69, 65, 89);
}


        .btn-danger{
  
  font-size:18px;
    margin-left:200px;
    background-color:#34495e;
    width:180px;
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
 .co{
  margin-top:20px;
}

.tab{
  margin-top:120px;
}

@media only screen and (max-width:600px){
  .btn-danger{
    margin-left:80px;
  }
  .tab{
  margin-top:250px;
}
.show{
  height:220px;
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

       
                    <li><a href="compteEtudiant.php"><span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
           
          <li><a href=""><span class="glyphicon glyphicon-briefcase"></span> Formation </a>
           <ul class="sub-nav">
           <li role="presentation"><a href="recherche_Specialité.php" role="menuitem">recherche par specialite</a></li>
                <li role="presentation"><a href="recherche_Prof.php" role="menuitem">recherche par enseignant</a></li>
                <li role="presentation"><a href="courEtu.php" role="menuitem">Mes cours</a></li>
           </ul>
           
           </li>
              <li><a href="profilEtudiant.php"><span class="glyphicon glyphicon-user"></span> Profil</a></li> 
              <li><a href=".php"><span class="glyphicon glyphicon-envelope"></span> Contact</a>
              <ul class="sub-nav">
           <li role="presentation"><a href="contacterEnseignant.php" role="menuitem">Contactez enseignant</a></li>
                <li role="presentation"><a href="contacterAdmin.php" role="menuitem">Contactez admin</a></li>
               
           </ul>
           </li>
    <li> <a  href="logout.php" class="col"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>
    
                  

         
        
        </div> </div>
    
    </div>

      <script type="text/javascript"> 
          $(".btnn").on("click",function(){
              $(".menu").toggleClass("show")
          })
      
          </script>
       


<div class="container">
<div class="tab">
<div class="col-sm-12 text-center">
        <div class="panel panel-default">
          <div class="panel-heading">


            <h2 class="m5050"> <span class="en"><strong> Voici toutes les spécialités</strong></span> </h2>
          </div>
         <?php  if(empty($cours_chercher->fetch()))  { ?>
             <p>aucune recherche ne correspond</p>
         <?php } else {?>      
          
          <div class="panel-body p5555">
            <div class="col-xs-12 col-sm-6 text-center">
              

              <div class="col-sm-12">
                <table class="co table table-striped">
                <tr><h3 class="m9090"><span><strong>Spécialités</strong></span></h3>
                <th>nom de la spécialité</th>
                <th>action</th>
                </tr>
                <tr>
                <?php while($spe = $recherche->fetch()):?> 
               
                <tr>
                <td><?php echo $spe->nomSpe ?></td>
                 <td>
                <form method="POST" class="formulaire">

                <input type="submit" class="submit btn  btn btn-danger" value="select" 
                  onclick="afficher(<?php echo $spe->id_Spe ?>);">
                </form>
                 
                
                </td>
                <!-- <a href="formation.php?delete=<?//php echo $cours->idCours;?>" class="btn btn-danger" id="suppression"> supprimer</button> -->
                </tr>
               
                <?php endwhile ?>
                

                </table>
              

              </div>
            </div>
            
            <div id="result"></div>
          
              <h3 class="m9090"><span><strong>Désciption</strong></span></h3>
          <span id="description">
           
          </span>
         
          </div>
        </div>
      </div>
    
    
      <?php } ?>

    
    </div></div>

    

</body>
</html>   



<script type="text/javascript">
       var  val = null;
         function afficher(valeur){
          val = valeur;
  
        }
      
      $(document).ready(function(){
   
    $('.formulaire').submit(function(){
      

       $.post('rechercheSpe.php',{select1:val},function(donnees){
        $('#description').html(donnees);
       
           
       });
       return false;
    });

});

</script>


   