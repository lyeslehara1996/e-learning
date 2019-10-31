<?php 


require_once 'inc/functions.php';


  $auth = new Auth();
  $auth->restricteEtu(Session::getInstance());
 $db2 = App::getDatabase('elearning');
 $user_id = session::getInstance()->read('etud')->idEtu;
?>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="css/menuEn.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/headerEn.css">



<style>
ul.sub-nav{
    position:absolute;
    background:#374d63;
    width:464px;
    height: 230px;
    box-shadow:1px 1px 2px rgba(0,0,0,0.14), -1px 0px 1px rgba(0,0,0,0.14);
    top:71px;
left:0;
visibility:headers_sent;
opacity:0;



}
  .r1{
    margin-top:240px;
    margin-right:400px;
    box-shadow:0px 2px 6px   rgb(171, 166, 166);
    height:280px;

    
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
.btn-info{
  
  font-size:18px;
    margin-left:20px;
  
    background-color:#597189;
    width:130px;
    height: 40px;
    border:0px;
    border-radius: 0px;
    
}


 .btn-info:hover{
    background-color:#34495e;
 }
 
 .btn-info:focus{
    background-color:#34495e;
 }
 .co{
  margin-top:30px;
}
 .btn-success{
  
  font-size:18px;
    margin-left:20px;
  
    background-color:#34495e;
    width:130px;
    height: 40px;
    border:0px;
    border-radius: 0px;
    
}

 .btn-success:hover{
    background-color:#597189;
 }
 
 .btn-success:focus{
    background-color:#597189;
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
      margin-left:-100px;

       
     }
    
     .btn-primary{
       margin-top:-61px;
       margin-left:110px;
    

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


<?php $req2 = $db2->query('SELECT * FROM cours c,specialites s,enseignants e,etudiants et,courinscrit ci WHERE et.idEtu=ci.idEtu AND ci.idCours=c.idCours AND c.id_Spe=s.id_Spe AND s.idEns=e.idEns  AND ci.etat=1 AND et.idEtu=?',[$user_id]);
      

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


            <h2 class="m5050"> <span class="en"><strong> Voila tous les cours</strong></span> </h2>
          </div>
          
          
          <div class="panel-body p5555">
            <div class="col-xs-12 col-sm-12 text-center">
              <div class="col-sm-12">
                <table class="co table table-striped">
                <tr>
                <th>enseignant</th>
                <th>Nom de cour</th>
                <th>type de cour</th>
                <th>description</th>
                <th>Action</th>
                </tr>
                <tr>
                <?php while($cour = $req2->fetch()):?> 
               
                <tr>
                <td><?php echo $cour->nomEns ?></td>
                <td><?php echo $cour->nomCours ?></td>
                <td><?php echo $cour->typeCour?></td>
                <td><?php echo $cour->descriptionCours?></td>
                
                <td>
                <form method="POST" class="formulaire">
                <button type="submit" class="submit formulaire btn  btn btn-success"><a class='pa' href="<?php echo "$cour->fileCours"?>">voir</a> </button>
                <button type="submit" class="submit formulaire btn  btn btn-success"> 
               <a class='pa' href="mesCours.php?delete=<?php echo $cour->idCours?>">supprimer</a>
               </button>
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
    
   


</body>
</html>  