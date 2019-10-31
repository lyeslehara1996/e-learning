<?php 


require_once 'inc/functions.php';
$db = App::getDatabase('elearning');

$auth = new Auth();
$auth->restricteEtu(Session::getInstance());
$etudiant = Session::getInstance()->read('etud')->idEtu;
$bool = false;
?>


<?php

 
   
  
    $prof_chercher = $db->query("SELECT * FROM `enseignants`");
  
    $recherche = $db->query("SELECT * FROM `enseignants`"); 
    //$recherche2 = $db->query("SELECT * FROM `cours` WHERE nomCours LIKE ?",[$mot_cherche.'%']); 
    
  $cour = $db->query("SELECT idCours FROM specialites s, cours c WHERE s.id_Spe = c.id_Spe");
   
   $cour_id = $cour->fetch()->idCours;
  

?>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	 
	 <script src="css/css2/boot.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
	 <script src="js/jquery.min.js"></script>
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
input.form-control.mr-sm-2 {
    margin-top: 10px;
}
button.btn.btn-outline-success.my-2.my-sm-0 {
    margin-top: 9px;
}

.container-field {
	height:60px
}


.th{
  font-size:18px;
}
.tab{
  margin-top:200px;
}
.navbar-nav li a:hover{
            background:rgb(199, 74, 74);
           color:white; 
        
        }
        .btn-danger{
  
  font-size:18px;
    margin-left:160px;
    background-color:#34495e;
    width:130px;
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
 .btn-success{
  
  font-size:18px;
    margin-left:20px;
    background-color:#597189;
    width:130px;
    height: 40px;
    border:0px;
    border-radius: 0px;
    
}

 .btn-success:hover{
  background-color:#34495e;
 }
 
 .btn-success:focus{
  background-color:#34495e;
 }
 .welll{
    margin-top:100px;
    box-shadow:0px 2px 6px   rgb(171, 166, 166);
   }
   .co{
  margin-top:50px;
}
   @media only screen and (max-width:600px){
     .btn-danger{
       margin-left:10px;
       width:100px;
     }
     .btn-success{
       margin-left:-10px;
       width:100px;
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
<div class="tab">

<div class="col-sm-12 text-center">
        <div class="panel panel-default">
          <div class="panel-heading">


            <h2 class="m5050"> <span class="en"><strong> Voici tout les enseignants</strong></span> </h2>
          </div>
         <?php  if(empty($prof_chercher->fetch()))  { ?>
             <p>aucune recherche ne correspond</p>
         <?php } else {?>      
          
          <div class="panel-body p5555">
            <div class="col-xs-12 col-sm-6 text-center">
            <h3 class="m9090"><span><strong>Enseignants</strong></span></h3>
              <div class="col-sm-12">
                <table class="co table table-striped">
                <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Cours</th>
               
                </tr>
                <tr>
                <?php while($prof = $recherche->fetch()):?> 
               
                <tr>
                <td><?php echo $prof->nomEns ?></td>
                <td><?php echo $prof->prenomEns ?></td>
                
                <td>
                <form method="POST" class="formulaire">
               <input type="submit" class="submit formulaire btn  btn btn-danger" value="select"   onclick="afficher(<?php echo $prof->idEns ?>);">
               </form></td>
            
               
                <!-- <a href="formation.php?delete=<?//php echo $cours->idCours;?>" class="btn btn-danger" id="suppression"> supprimer</button> -->
                </tr>
               
                <?php endwhile ?>
                

                </table>
              

              </div>
            </div>
            
            <div id="result"></div>
            
            <h3 class="m9090"><span><strong>Désciption </strong></span></h3>
          <span id="description">
           
          </span>
         
          </div>
        </div>
      </div>
      </div>
    
      <?php } ?>


</body>
</html>  


<script type="text/javascript">
       var  val = null;
       var  val1 = null;
        var  val2 = null;
        var   val3 = null;
        var   val4 = null;
        function Envoyer(valeur1,valeur2){
          val1 = valeur1;
          val2 = valeur2;
       
        }
       
      function Envoyer2(valeur3,valeur4){
        alert("vous étes sur de vouloir annuler l'inscription")
          val3 = valeur3;
          val4 = valeur4;
       
        }
    
         function afficher(valeur){
          val = valeur;
       
        
  
        }
      
      $(document).ready(function(){
   
    $('.formulaire').submit(function(){
      

       $.post('rechercheEns.php',{select:val},function(donnees){
        $('#description').html(donnees);
       
           
       });
       return false;
    });

      
   $('.form').submit(function(){
     
   

     $.post('recherche_prof.php',{etu2:val1,cour2:val2,etuDp:val3,courDp:val4},function(donnees){
       $('#result').html(donnees);
     
         
     });
     return false;
  });

});

</script>