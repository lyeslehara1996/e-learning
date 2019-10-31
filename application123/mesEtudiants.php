<?php 


require_once 'inc/functions.php';


  $auth = new Auth();
  $auth->restricteEns(Session::getInstance());
 $db2 = App::getDatabase('elearning');
 $user_id = session::getInstance()->read('auth')->idEns;
?>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="css/menuEn.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/headerEn.css">



<style>
  .r1{
    margin-top:240px;
    margin-right:400px;
    box-shadow:0px 2px 6px   rgb(171, 166, 166);
    height:280px;

    
  }
.co{
  margin-top:40px;
}
  .mar{
    margin-top:120ox;
  }
  .txt{
    color:#597189;
    font-size:28px;
}
h1{
  font-size:38px;
}
  .but{
    margin-top:30px;
    margin-left:100px;
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


  .btn-danger{
  
  font-size:18px;
    margin-left:20px;
  
    background-color:#597189;
    width:130px;
    height: 40px;
    border:0px;
    border-radius: 0px;
    
}


 .btn-danger:hover{
    background-color:#34495e;
 }
 
 .btn-danger:focus{
    background-color:#34495e;
 }
 @media only screen and (min-width:600px) and (max-width:1200px) {
  .r1{
    margin-top:240px;
    margin-left:10px;
  width:695px;
    height:300px;
    }

 }
 @media only screen and (max-width:600px){
     .r1{
         margin-top:250px;
         width:510px;
         margin-left:16px;
         height:330px;
     }
     .btn-danger{
      margin-top:10px;

       
     }
    
     .btn-primary{
       margin-top:-61px;
       margin-left:110px;
    

     }
     .show{
         max-height:1200px;
     }
 
     .btn-success{
       margin-left:-95px;
       margin-top:-10px;
     }
     .but{
       margin-left:120px;
     }
 }
</style>

         <?php afficher_erreur(); ?>


<?php $req2 = $db2->query('SELECT * FROM cours c,specialites s,enseignants e,courinscrit ci, etudiants et 
WHERE e.idEns= s.idEns And s.id_Spe=c.id_Spe AND c.idCours=ci.idCours AND ci.idEtu=et.idEtu AND ci.etat=1 AND e.idEns=? ',[$user_id]);
      

?>

<body>
<div class="rows navbar-fixed-top ">
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
           <li role="presentation"><a href="mesCours.php" role="menuitem">Mes cours</a></li>
                <li role="presentation"><a href="mesEtudiants.php" role="menuitem">Mes etudiant</a></li>
           </ul>
           
           </li>
           <li><a href="profilEns.php"><span class="glyphicon glyphicon-user"></span> Profil</a></li> 

    <li> <a  href="logout.php" class="col"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>
     
  
                  </ul>

         
        
        </div> </div>
    
    </div>

              <script type="text/javascript"> 
                  $(".btnn").on("click",function(){
                      $(".menu").toggleClass("show")
                  })
              
                  </script>
  


  <div class="tab">
<div class="col-sm-1"></div>
<div class="col-sm-10 text-center">
        <div class="panel panel-default">
          <div class="panel-heading">


            <h2 class="m5050"> <span class="en"><strong>Voila tout les étudiants inscrit</strong></span> </h2>
          </div>
          
          
          <div class="panel-body p5555">
            <div class="col-xs-12 col-sm-12 text-center">
            <!-- <h3 class="m9090"><span><strong>Enseignants</strong></span></h3> -->
              <div class="col-sm-12">
                <table class="co table table-striped">
                <tr>
                <th>nom</th>
                <th>prenom</th>
                <th>email</th>
               
                <th>Action</th>
                </tr>
                <tr>
                <?php while($etudiant = $req2->fetch()):?> 
               
                <tr>
                <td><?php echo $etudiant->nomEtu ?></td>
                <td><?php echo $etudiant->prenomEtu?></td>
                <td><?php echo $etudiant->emailEtu?></td>
               
                
                <td>
                <form method="POST" class="formulaire">
        
               <input type="submit" class="submit formulaire btn  btn btn-info" value="supprimer"/>
               <input type="submit" class="submit formulaire btn  btn btn-danger" value="contacter"   onclick="Envoyer(<?php echo $etudiant->idEtu ?>);" />
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

      <div class="return"></div>
    
   
      <script type="text/javascript">
        var  val1 = null;
      
     
      function Envoyer(valeur1){
          val1 = valeur1;
     
   
        }
        
    
      $(document).ready(function(){
   
   $('.formulaire').submit(function(){
     
   

      $.post('contacteEns.php',{to:val1},function(donnees){
        $('.return').html(donnees);
      
          
      });
      return false;
   });

});
</script>

</body>
</html>  

