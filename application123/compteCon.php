<?php 


require_once 'inc/functions.php';


// $auth = new Auth();
// $auth->restricteEns(Session::getInstance());
?>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/headerEn.css">



<?php 
  // $etudiantInvit = $db->query("SELECT e.idEtu,nomEtu,prenomEtu,emailEtu FROM courinscrit ci,cours c,specialites s,etudiants e WHERE ci.idCours = c.idCours and c.id_spe =s.id_spe and e.idEtu = ci.idEtu and s.idEns=?and ci.etat=?",[$ens,0]);
?>



<body>
<div class="rows  ">
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
                    <ul class="sub-nav">
           <li role="presentation"><a href="" role="menuitem">Mes cours</a></li>
                <li role="presentation"><a href="mesEtudiants.php" role="menuitem">Mes etudiants</a></li>
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
         <?php afficher_erreur(); ?>


    <style>
    .container-field {
	height:60px
}

 .com{
   margin-top:120px;
   margin-left:70px;
   
   
 } 
 .cam{
   margin-top:-120px;
 }
 .coll{
   margin-top:-385px;
   margin-left:200px;
 }  
 .en{
    color:rgb(69, 65, 89);
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
 .btn-danger{
  
  font-size:18px;
    margin-left:20px;
  margin-top:-22px;
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
.res {
  margin-top:-70px;
}
@media only screen and (min-width:600px)and (max-width:1200px){
  .com{
   margin-top:120px;
   margin-left:70px;
   
 } 
 .coll{
   margin-top:119px;
   margin-left:200px;
 } 
}
 @media only screen and (max-width:600px){
   .coll{
     margin-top:20px;
     width:550px;
     margin-left:10px;
   }
   .com{
    margin-left:-10px;
    margin-top:250px;
    

   }
   .show{
         max-height:1200px;
     }
 }
    </style>    
  
<div class="res conatainer ">
  <div class="row">
    <div class="com col-sm-4 text-center">
    <div class="panel panel-default">
          <div class="panel-heading">


            
            <h2 class="m5050"> <span class="en"><strong> Voici toutes les invitations</strong></span> </h2>

          </div>
           
          
      
          <div class="panel-body p5555">
            <div class="col-xs-12 col-sm-12 text-center">
             
              <div class="col-sm-12">
                
            <p>Vous avez des demandes d'acceptation</p>  <p class="text-nowrap"  class="text-nowrap center"> </p>
            <form method="POST" class="formulaire">
           <input type="submit" class="submit btn  btn btn-danger" value="Voir"   onclick="invitation();">
               </form> 
            
           
              

              </div>
            </div>
            
           
         
          </div>
        </div>
    </div>
    
    <div class="coll col-sm-4 text-center">
    <div class="panel panel-default">
          <div class="panel-heading">

          <h2 class="m5050"> <span class="en"><strong> Voici tout les messages </strong></span> </h2>

          </div>
           
            
          <div class="panel-body p5555">
            <div class="col-xs-12 col-sm-12 text-center">
             
              <div class="col-sm-12">
                
            <p>Vous avez des nouveaux Messages</p> 
             <p class="text-nowrap"  class="text-nowrap center"> </p>
            <form method="POST">
           <input type="submit" class="submit btn  btn btn-success" value="Consulter"   onclick="messages();">
          
               </form> 
            
            
           
              

              </div>
            </div>
            
           
         
          </div>
        </div>
      
    </div>
    <div class="col-lg-3">
    </div>

   
   <div class="container" id="result"></div>
  </div>

 
  </div>
        
 <script type="text/javascript">
       var  val = null;
         function afficher(valeur){
          val = valeur;
  
        }
      
      $(document).ready(function(){
   
    $('.formulaire').submit(function(){
      

       $.post('invitation.php',{},function(donnees){
        $('#result').html(donnees);
       
           
       });
       return false;
    });

});

</script>
		
         
