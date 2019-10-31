<?php

require_once 'inc/functions.php';

$db = App::getDatabase('elearning');

$auth = new Auth();
$auth->restricteEtu(Session::getInstance());
$user_id = session::getInstance()->read('etud')->idEtu;
$bool = false;
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>

<script src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="css/headerP.css">
<link rel="stylesheet" href="css/menu.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/cssRe.css">

    <title>Document</title>
    
</head>

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
 .fir{
     margin-left:0px;
 }
 .form-contro{

height: 50px;
margin-top:50px;
font-size: 23px;
margin-left: -40;
background:#34495e;
color:white;
border:15px;

 }
 .col{
         background:rgb(199, 74, 74);
    }
 .btn-danger{
    margin-top: 5px;
    width:200px;
    height: 40px;
    margin-left: 459px; 
    border:0px;
    border-radius: 0px;
  
 }
 .ff{
     font-size:17px;
 }
 

 .d{
      margin-top:40px;
height:20vh;
display: flex;
background:#374d63;
display:flex;
width:100vh;}
.left{
margin-left:151px;

}
.tex{
    margin-top:150px;
    
 }
.lig{
    font-size:90px;
    color:red;
}
.f{
    color:#597189;
}.en{
    color:rgb(69, 65, 89);
}

.btn-info{
  
  font-size:18px;
    margin-left:20px;
  
    background-color:#34495e;
    width:130px;
    height: 40px;
    border:0px;
    border-radius: 0px;
    
}

 .btn-info:hover{
    background-color:#597189;
 }
 
 .btn-info:focus{
    background-color:#597189;
 }
 .co{
  margin-top:50px;
}
.card-header{
   margin-top:50px;
 }
 @media screen and (min-width:600px) and (max-width:1200px){
    .form-contro{
        margin-left:3px;
    }
    .btn-danger{
    
    margin-left:430px;
    
    
}
.left{
    margin-left:10px;
 
   
}
}


@media screen and (max-width:600px){
  
          .btn-danger{
    
    margin-left:320px;
    
    
}
.left{
    margin-left:10px;
    width:520px;
    float:none;
}
.show{
    margin-top:-34px;
   
        height:220px;
  
}
.d{
    width:520px;
}
.form-contro{
    width:440px;
}
}

 .btn-success:hover{
  background-color:#597189;
 }
 
 .btn-success:focus{
  background-color:#597189;
 }


  .btn-success{
    margin-left:-10px;
  }

}


</style>
<?php

 
  
  
    $enseignants = $db->query("SELECT en.idEns,nomEns,prenomEns,emailEns FROM cours c,etudiants e,courinscrit ci,specialites s,enseignants en WHERE ci.idCours=c.idCours AND c.id_Spe=s.id_Spe AND s.idEns=en.idEns AND ci.idEtu=?",[$user_id]);
  
  

?>
<body>


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
              <li><a href=".php"><span class="glyphicon glyphicon-envelope"></span> Contact</a>
              <ul class="sub-nav">
           <li role="presentation"><a href="contacterEnseignant.php" role="menuitem">Contactez enseignant</a></li>
                <li role="presentation"><a href="contacterAdmin.php" role="menuitem">Contactez admin</a></li>
               
           </ul>
           </li>
           <li><a href="profilEtudiant.php"><span class="glyphicon glyphicon-user"></span> Profil</a></li> 
    <li> <a  href="logout.php" class="col"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>
    
                  

         
        
        </div> </div>
    
    </div>

              <script type="text/javascript"> 
                  $(".btnn").on("click",function(){
                      $(".menu").toggleClass("show")
                  })
              
                  </script>
div class="col-sm-12 text-center">
        <div class="panel panel-default">
          <div class="panel-heading">


            <h2 class="m5050"> <span class="en"><strong> Voila tous les cours</strong></span> </h2>
          </div>
          
          
          <div class="panel-body p5555">
            <div class="col-xs-12 col-sm-12 text-center">
              <div class="col-sm-12">
                <table class="co table table-striped">
                <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>email</th>
                <th>Action</th>
                </tr>

                <?php while($ens =  $enseignants->fetch()):?>
                <tr>
                 
               
                <tr>
                <td><?php echo $ens->nomEns ?></td>
                <td><?php echo $ens->prenomEns ?></td>
                <td><?php echo $ens->emailEns?></td>
                
                
                <td>
                <form method="POST" class="formulaire">
               <input type="submit" class="submit formulaire btn  btn btn-success" value="contacter"  onclick="Envoyer(<?php echo $ens->idEns ?>)"/>
              
               </form>
               </td>
        
            
                <!-- <a href="formation.php?delete=<?//php echo $cours->idCours;?>" class="btn btn-danger" id="suppression"> supprimer</button> -->
                </tr>
                <?php endwhile ?>
              
                

                </table>
              
             
              </div>
            </div>
            
      
        </div>
      </div>
      </div>

      <div id="description"></div>
    
      <script type="text/javascript">
    
    var  val1 = null;
   
      function Envoyer(valeur1){
          val1 = valeur1;
     
   
        }
   
    $(document).ready(function(){
 
  $('.formulaire').submit(function(){
    

     $.post('contacteEtu.php',{to:val1},function(donnees){
     $('#description').html(donnees);
     
         
     });
     return false;
  });


});

</script>


</body>
</html>  


